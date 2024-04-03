<?php

  # Incluimos la clase conexion para poder heredar los metodos de ella.
  require_once('conexion.php');

#Creamos la clase usuarios y heredamos los metodos de la clase conexion.
  class Usuario extends Conexion
  {
#Creamos la funi
public function login($user, $clave)
{
    try {
        $conectar = parent::conexion();
        parent::set_names();

        $stmt = "SELECT doc, nombre, cargo, clave FROM usuarios WHERE email=:user";
        $stmt = $conectar->prepare($stmt);
        $stmt->bindParam(':user', $user);
        $stmt->execute();
        
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($resultado) {
            $hashed_password = $resultado['clave'];
            
            // Verificar si la contraseña coincide con el hash almacenado
            if (password_verify($clave, $hashed_password)) {
                // Generar un nuevo token CSRF y establecerlo en la sesión
                session_start();
                $_SESSION['doc'] = $resultado['doc'];
                $_SESSION['nombre'] = $resultado['nombre'];
                $_SESSION['cargo']  = $resultado['cargo'];

                // Verificar el cargo del usuario y proporcionar la respuesta para redirección en AJAX
                if ($_SESSION['cargo'] == 1) {
                    echo 'administrador/index.php';
                } else if ($_SESSION['cargo'] == 2) {
                    echo 'user/index.php';
                }

                exit();
            }
        }

        // La contraseña no coincide o el usuario no existe
        echo 'error_3';
        exit();
    } catch (PDOException $e) {
        echo 'Error en la consulta: ' . $e->getMessage();
        exit();
    }
}
public static function verificarSesion() {
  session_start();

  // Verificar si hay una sesión iniciada y si el usuario tiene un cargo definido
  if (isset($_SESSION['doc']) && isset($_SESSION['cargo'])) {
      $cargo = $_SESSION['cargo'];

      // Verificar el cargo del usuario
      if ($cargo == 1) {
          // El usuario es un administrador, permitir acceso a todas las vistas
          return true;
      } elseif ($cargo == 2) {
          // El usuario es un cliente
          // Verificar si la URL actual es para la vista del administrador
          if (strpos($_SERVER['REQUEST_URI'], 'view/administrador') !== false) {
              // Si es un cliente intentando acceder a la vista del administrador, redirigir al inicio de sesión
              echo "<script type='text/javascript'>
              document.addEventListener('DOMContentLoaded',function(){
                      swal('Advertencia','Acceso no autorizado','forbibben');
                      window.location.href='/Proyecto/view/login.php';
                    });
                    </script>";
              exit();
          }
          // Si es un cliente intentando acceder a otras vistas, permitir el acceso
          return true;
      }
  }

  // Si no hay sesión iniciada o el usuario no tiene un cargo definido, redirigir al inicio de sesión
  echo "<script type='text/javascript'>
          document.addEventListener('DOMContentLoaded',function(){
          swal('Aviso','Debes iniciar sesión para acceder a este contenido','warning');
          window.location.href='/Proyecto/view/login.php';
        });
        </script>";
  exit();
}

  public function registroUsuario($nombre, $email, $clave, $tel, $apellido, $genero, $fecha_naci , $tipo_doc, $doc, $fecha_reg, $direccion)
  {
      try {
          $conectar = parent::conexion();  
          parent::set_names();
  
          // Verificar si el usuario ya está registrado con ese correo electrónico
          $stmt = "SELECT doc FROM usuarios WHERE email=:email";
          $stmt = $conectar->prepare($stmt);
          $stmt->bindParam(':email', $email); 
          $stmt->execute();
          $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
  
          if ($resultado) {
              echo 'error_3'; // Usuario ya registrado con ese correo
          } else {
              // Generar el hash de la contraseña
              $hashed_password = password_hash($clave, PASSWORD_DEFAULT);
  
              // Insertar nuevo usuario con la contraseña hasheada
              $stmt = "INSERT INTO usuarios (nombre, email, clave, tel, apellido, genero, fecha_naci, tipo_doc, doc, fecha_reg, direccion, cargo) 
                       VALUES (:nombre, :email, :clave, :tel, :apellido, :genero, :fecha_naci, :tipo_doc, :doc, :fecha_reg, :direccion, 2)";
              $stmt = $conectar->prepare($stmt);
              $stmt->bindParam(':nombre', $nombre);
              $stmt->bindParam(':email', $email);
              $stmt->bindParam(':clave', $hashed_password); // Almacenar el hash de la contraseña
              $stmt->bindParam(':tel', $tel);
              $stmt->bindParam(':apellido', $apellido);
              $stmt->bindParam(':genero', $genero);
              $stmt->bindParam(':fecha_naci', $fecha_naci);
              $stmt->bindParam(':tipo_doc', $tipo_doc);
              $stmt->bindParam(':doc', $doc);
              $stmt->bindParam(':fecha_reg', $fecha_reg);
              $stmt->bindParam(':direccion', $direccion);
              $stmt->execute();
  
              // Iniciar sesión automáticamente después del registro
              session_start();
              $_SESSION['nombre'] = $nombre;
              $_SESSION['cargo']  = 2;
  
              echo 'user/index.php';
          }
      } catch (PDOException $e) {
          echo 'Error en el registro: ' . $e->getMessage();
          return false;
      }
  }

  public function registroUsuario2($nombre, $email, $clave, $tel, $apellido, $genero, $fecha_naci, $tipo_doc, $doc, $fecha_reg, $direccion)
  {
      try {
          $conectar = parent::conexion();  
          parent::set_names();
          
          // Validar si el correo electrónico ya está registrado
          $stmt = $conectar->prepare("SELECT doc FROM usuarios WHERE email=:email");
          $stmt->bindParam(':email', $email); 
          $stmt->execute();
          $resultado_email = $stmt->fetch(PDO::FETCH_ASSOC);
  
          // Validar si el documento ya está registrado
          $stmt = $conectar->prepare("SELECT* FROM usuarios WHERE doc=:doc");
          $stmt->bindParam(':doc', $doc); 
          $stmt->execute();
          $resultado_doc = $stmt->fetch(PDO::FETCH_ASSOC);
  
          if ($resultado_email && $resultado_doc) {
            echo 'error_9'; // Usuario ya registrado con ese correo y documento
        } elseif ($resultado_email) {
            echo 'error_8'; // Usuario ya registrado con ese correo
        } elseif ($resultado_doc) {
            echo 'error_7'; // Usuario  ya registrado con ese documento
          } else {
              // Insertar nuevo usuario
              $hashed_password = password_hash($clave, PASSWORD_DEFAULT);
              $stmt = $conectar->prepare("INSERT INTO usuarios (nombre, email, clave, tel, apellido, genero, fecha_naci, tipo_doc, doc, fecha_reg, direccion, cargo) 
                                          VALUES (:nombre, :email, :clave, :tel, :apellido, :genero, :fecha_naci, :tipo_doc, :doc, :fecha_reg, :direccion, 2)");
              $stmt->bindParam(':nombre', $nombre);
              $stmt->bindParam(':email', $email);
              $stmt->bindParam(':clave', $hashed_password);
              $stmt->bindParam(':tel', $tel);
              $stmt->bindParam(':apellido', $apellido);
              $stmt->bindParam(':genero', $genero);
              $stmt->bindParam(':fecha_naci', $fecha_naci);
              $stmt->bindParam(':tipo_doc', $tipo_doc);
              $stmt->bindParam(':doc', $doc);
              $stmt->bindParam(':fecha_reg', $fecha_reg);
              $stmt->bindParam(':direccion', $direccion);
              $stmt->execute();
          }
      } catch (PDOException $e) {
          echo 'Error en el registro: ' . $e->getMessage();
          return false;
      }
  }

public function editarUsuario($doc,$email, $tel, $genero, $direccion)
    {
      try {
      $conectar = parent::conexion();  
      parent::set_names();
      $stmt = "UPDATE usuarios SET 
      email=:email, 
      tel=:tel, 
      genero=:genero, 
      direccion=:direccion 
      WHERE 
      doc=:doc";
      $stmt = $conectar->prepare($stmt);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':tel', $tel);
      $stmt->bindParam(':genero', $genero);
      $stmt->bindParam(':direccion', $direccion);
      $stmt->bindParam(':doc', $doc);
      $stmt->execute();

  } catch (PDOException $e) {
      echo 'Error en el registro: ' . $e->getMessage();
      return false;
  }
}


public function editar_datos_personales($doc, $genero, $nombre, $apellido)
    {
      try {
      $conectar = parent::conexion();  
      parent::set_names();
      $stmt = "UPDATE usuarios SET 
      genero=:genero,
      nombre=:nombre,
      apellido=:apellido
      WHERE 
      doc=:doc";
      $stmt = $conectar->prepare($stmt);
      $stmt->bindParam(':genero', $genero);
      $stmt->bindParam(':nombre', $nombre);
      $stmt->bindParam(':apellido', $apellido);
      $stmt->bindParam(':doc', $doc);
      $stmt->execute();

  } catch (PDOException $e) {
      echo 'Error en el registro: ' . $e->getMessage();
      return false;
  }
}

public function editar_datos_Contacto($doc, $email, $tel, $direccion)
    {
      try {
      $conectar = parent::conexion();  
      parent::set_names();
      $stmt = "UPDATE usuarios SET
      email=:email,
      tel=:tel,
      direccion=:direccion
      WHERE 
      email=:email";
      $stmt = $conectar->prepare($stmt);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':tel', $tel);
      $stmt->bindParam(':direccion', $direccion);
      $stmt->bindParam(':doc', $doc);
      $stmt->execute();

  } catch (PDOException $e) {
      echo 'Error en el registro: ' . $e->getMessage();
      return false;
  }
}


public function editar_clave_usuario($doc, $clave) {
  try {
      $conectar = parent::conexion();  
      parent::set_names();
      $hashed_password = password_hash($clave, PASSWORD_DEFAULT);
      $stmt = "UPDATE usuarios SET
      clave=:clave
      WHERE 
      doc=:doc";
      $stmt = $conectar->prepare($stmt);
      $stmt->bindParam(':clave', $hashed_password);
      $stmt->bindParam(':doc', $doc);
      $stmt->execute();
      return true; // Indicar que la actualización fue exitosa
  } catch (PDOException $e) {
      echo 'Error en la actualización de la contraseña: ' . $e->getMessage();
      return false;
  }
}

public function trae_campo_clave($doc){
  try {
    $conectar = parent::conexion();  
    parent::set_names();
    $stmt = "SELECT clave FROM usuarios WHERE doc=:doc";
    $stmt = $conectar->prepare($stmt);
    $stmt->bindParam(':doc', $doc);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC); 
    return $resultado['clave'];
} catch (PDOException $e) {
    echo 'Error en el registro: ' . $e->getMessage();
    return false;
}
}

public function get_usuario() {
  try {
      // ... tu código existente ...

      $conectar=parent::conexion();
      parent::set_names();
      $stmt="SELECT * FROM usuarios";
      $stmt=$conectar->prepare($stmt);
      $stmt->execute();
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

      return $resultado;
  } catch (PDOException $e) {
      // Mostrar detalles del error en la consola o en el registro de errores
      error_log('Error en la búsqueda: ' . $e->getMessage());
      return false;
  }
}

public function get_usuario_por_doc($doc) {
  try {
      // ... tu código existente ...

      $conectar=parent::conexion();
      parent::set_names();
      $stmt="SELECT * FROM usuarios WHERE doc = :doc";
      $stmt=$conectar->prepare($stmt);
      $stmt->bindParam(':doc', $doc);
      $stmt->execute();
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

      return $resultado;
  } catch (PDOException $e) {
      // Mostrar detalles del error en la consola o en el registro de errores
      error_log('Error en la búsqueda: ' . $e->getMessage());
      return false;
  }
}

 
 public function down_usuario($doc){
  try {
  $conectar= parent::conexion();
  parent::set_names();
  $stmt="UPDATE usuarios SET cargo = '0' WHERE doc = :doc";
  $stmt=$conectar->prepare($stmt);
  $stmt->bindParam(':doc', $doc);
  $stmt->execute();
} catch (PDOException $e) {
  echo 'Error en el donwgrade: ' . $e->getMessage();
  return false;
}
}


public function active_usuario($doc){
  try {
  $conectar= parent::conexion();
  parent::set_names();
  $stmt="UPDATE usuarios SET cargo = '2' WHERE doc = :doc";
  $stmt=$conectar->prepare($stmt);
  $stmt->bindParam(':doc', $doc);
  $stmt->execute();
  $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo 'Error en la activación: ' . $e->getMessage();
  return false;
}
} 

public function delete_usuario($doc) {
  try {
      $conectar = parent::conexion();
      parent::set_names();

 

      // Luego, eliminar al usuario
      $stmt_delete_usuario = "DELETE FROM usuarios WHERE doc = :doc";
      $stmt_delete_usuario = $conectar->prepare($stmt_delete_usuario);
      $stmt_delete_usuario->bindParam(':doc', $doc);
      $stmt_delete_usuario->execute();
      
      return true; // Devuelve true para indicar éxito en la eliminación
  } catch (PDOException $e) {
      echo 'Error al eliminar usuario: ' . $e->getMessage();
      return false; // Devuelve false si ocurre un error durante la eliminación
  }
}


public function verificar_referencias($doc) {
  try {
      $conectar = parent::conexion();
      parent::set_names();
      $stmt = "SELECT COUNT(*) FROM com_venta WHERE doc_cliente = :doc";
      $stmt = $conectar->prepare($stmt);
      $stmt->bindParam(':doc', $doc);
      $stmt->execute();
      $count = $stmt->fetchColumn();

           // Eliminar registros asociados en la tabla com_venta
           $stmt_delete_com_venta = "DELETE FROM com_venta WHERE doc_cliente = :doc";
           $stmt_delete_com_venta = $conectar->prepare($stmt_delete_com_venta);
           $stmt_delete_com_venta->bindParam(':doc', $doc);
           $stmt_delete_com_venta->execute();
           
      return ($count > 0); // Devuelve true si hay referencias, false si no las hay
  } catch (PDOException $e) {
      echo 'Error al verificar referencias: ' . $e->getMessage();
      return true; // Se asume un error como referencia existente para evitar la eliminación accidental
  }
}


public function ver_usuario($buscar){
  try {
  $conectar= parent::conexion();
  parent::set_names();
  $stmt="SELECT doc,nombre,apellido,tel,email,cargo FROM usuarios WHERE doc LIKE :buscar";
  $stmt=$conectar->prepare($stmt);
  $buscar='%'.$buscar.'%';
  $stmt->bindParam(':buscar', $buscar);
  $stmt->execute();
  $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $resultado;

} catch (PDOException $e) {
  echo 'Error: ' . $e->getMessage();
  return false;
}
}

public function ver_usuario2(){
  try {
  $conectar= parent::conexion();
  parent::set_names();
  $stmt="SELECT * FROM usuarios WHERE cargo=2 ORDER BY doc ASC";
  $stmt=$conectar->prepare($stmt);
  $stmt->execute();
  $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $resultado;

} catch (PDOException $e) {
  echo 'Error: ' . $e->getMessage();
  return false;
}
}


public function datos_usuario_venta($buscar){
  try {
  $conectar= parent::conexion();
  parent::set_names();
  $stmt="SELECT doc,nombre,apellido,tel,email,direccion FROM usuarios WHERE doc= :buscar";
  $stmt=$conectar->prepare($stmt);
  $stmt->bindParam(':buscar', $buscar);
  $stmt->execute();
  $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $resultado;

} catch (PDOException $e) {
  echo 'Error: ' . $e->getMessage();
  return false;
}
}

function validarImagen($file) {
  $nombre_img = $file["name"];
  $tipo = $file["type"];
  $ruta_temporal = $file["tmp_name"];
  $tamano = $file["size"];

  // Directorio donde se guardarán las imágenes
  $carpeta_destino = "../../../public/img/";

  // Validar el tipo de archivo
  if (($tipo != 'image/jpeg') && ($tipo != 'image/png') && ($tipo != 'image/gif')) {
      return "error_5"; // Error: el archivo no es una imagen válida
  }

  // Validar el tamaño del archivo (3MB máximo)
  $tamano_maximo = 3 * 1024 * 1024; // 3MB en bytes
  if ($tamano > $tamano_maximo) {
      return "error_6"; // Error: tamaño máximo permitido excedido
  }

  // Generar una nueva ruta única para guardar la imagen
  $ruta_destino = $carpeta_destino . uniqid('img_', true) . '.' . pathinfo($nombre_img, PATHINFO_EXTENSION);

  // Mover el archivo cargado al directorio de destino
  if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
      // El archivo se ha cargado correctamente, retorna la ruta de destino
      return $ruta_destino;
  } else {
      return "error_7"; // Error al mover el archivo cargado
  }
}

public function view_clientes(){
  try {
  $conectar= parent::conexion();
  parent::set_names();
  $stmt="SELECT * FROM view_clientes";
  $stmt=$conectar->prepare($stmt);
  $stmt->execute();
  $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $resultado;

} catch (PDOException $e) {
  echo 'Error: ' . $e->getMessage();
  return false;
}
}


}
?>
