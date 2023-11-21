<?php

  # Incluimos la clase conexion para poder heredar los metodos de ella.
  require_once('conexion.php');

#Creamos la clase usuarios y heredamos los metodos de la clase conexion.
  class Usuario extends Conexion
  {
#Creamos la funi
    public function login($user, $clave)
    {
//Usamos el bloque try-catch para poder capturar y mostrar algun mensaje de error si ocurre un error durante la ejecución de la sentencia SQL  
      try {
//Creamos la objeto $conectar para obtener la conexión a la base de datos,que la podemos hacer por el metodo conexión que es heredado de la clase conexión(parent::) 
        $conectar = parent::conexion();  
        parent::set_names();
//Preparamos la consulta SQL con parametros, adcional usamos los marcadores de posición (:user), para evitar inyecciones SQL 
        $stmt = "SELECT doc, nombre, cargo FROM usuarios WHERE email=:user AND clave=:clave";
        $stmt = $conectar->prepare($stmt);
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':clave', $clave);
        $stmt->execute();
//Guardamos el resultado
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
//Verificamos si se encontro un usuario con las credenciales ingresadas.
        if ($resultado) {
//Iniciamos una sesión.          
            session_start();
//Guardamos los datos del usuario en variables
            $_SESSION['doc'] = $resultado['doc'];
            $_SESSION['nombre'] = $resultado['nombre'];
            $_SESSION['cargo']  = $resultado['cargo'];

            // Verificamos el cargo del usuario y proporcionamos la respuesta para redirección en AJAX
            if ($_SESSION['cargo'] == 1) {
                echo 'administrador/index.php';
            } else if ($_SESSION['cargo'] == 2) {
                echo 'user/index.php';
            }

            return true;
        } else {
            // El usuario y la clave son incorrectos
            echo 'error_3';
            return false;
        }
    } catch (PDOException $e) {
        echo 'Error en la consulta: ' . $e->getMessage();
        return false;
    }

    }

    public function registroUsuario($nombre, $email, $clave, $tel, $apellido, $genero, $fecha_naci , $tipo_doc, $doc, $fecha_reg, $direccion)
    {
      try {
      $conectar = parent::conexion();  
      parent::set_names();
      $stmt = "SELECT doc FROM usuarios WHERE email=:email";
      $stmt = $conectar->prepare($stmt);
      $stmt->bindParam(':email', $email); 
      $stmt->execute();
      $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($resultado) {
          echo 'error_3'; // Usuario ya registrado con ese correo
      } else {
          // Insertar nuevo usuario
          $stmt = "INSERT INTO usuarios (nombre, email, clave, tel, apellido, genero, fecha_naci, tipo_doc, doc, fecha_reg, direccion,cargo) 
                   VALUES (:nombre, :email, :clave, :tel, :apellido, :genero, :fecha_naci, :tipo_doc, :doc, :fecha_reg, :direccion,2)";
          $stmt = $conectar->prepare($stmt);
          $stmt->bindParam(':nombre', $nombre);
          $stmt->bindParam(':email', $email);
          $stmt->bindParam(':clave', $clave);
          $stmt->bindParam(':tel', $tel);
          $stmt->bindParam(':apellido', $apellido);
          $stmt->bindParam(':genero', $genero);
          $stmt->bindParam(':fecha_naci', $fecha_naci);
          $stmt->bindParam(':tipo_doc', $tipo_doc);
          $stmt->bindParam(':doc', $doc);
          $stmt->bindParam(':fecha_reg', $fecha_reg);
          $stmt->bindParam(':direccion', $direccion);
          $stmt->execute();

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

public function registroUsuario2($nombre, $email, $clave, $tel, $apellido, $genero, $fecha_naci , $tipo_doc, $doc, $fecha_reg, $direccion)
{
  try {
  $conectar = parent::conexion();  
  parent::set_names();
  $stmt = "SELECT doc FROM usuarios WHERE email=:email";
  $stmt = $conectar->prepare($stmt);
  $stmt->bindParam(':email', $email); 
  $stmt->execute();
  $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($resultado) {
      echo 'error_3'; // Usuario ya registrado con ese correo
  } else {
      // Insertar nuevo usuario
      $stmt = "INSERT INTO usuarios (nombre, email, clave, tel, apellido, genero, fecha_naci, tipo_doc, doc, fecha_reg, direccion) 
               VALUES (:nombre, :email, :clave, :tel, :apellido, :genero, :fecha_naci, :tipo_doc, :doc, :fecha_reg, :direccion)";
      $stmt = $conectar->prepare($stmt);
      $stmt->bindParam(':nombre', $nombre);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':clave', $clave);
      $stmt->bindParam(':tel', $tel);
      $stmt->bindParam(':apellido', $apellido);
      $stmt->bindParam(':genero', $genero);
      $stmt->bindParam(':fecha_naci', $fecha_naci);
      $stmt->bindParam(':tipo_doc', $tipo_doc);
      $stmt->bindParam(':doc', $doc);
      $stmt->bindParam(':fecha_reg', $fecha_reg);
      $stmt->bindParam(':direccion', $direccion);
      $stmt->execute();

      echo '../../clientes.php';
  }
} catch (PDOException $e) {
  echo 'Error en el registro: ' . $e->getMessage();
  return false;
}
}

public function editarUsuario($email, $tel, $apellido, $genero, $fecha_naci , $tipo_doc, $doc, $fecha_reg, $direccion)
    {
      try {
      $conectar = parent::conexion();  
      parent::set_names();

      $stmt = "UPDATE usuarios SET(nombre=:nombre, email=:email, clave=:clave, tel=:tel, apellido=:apellido, genero=:genero, fecha_naci=:fecha_naci,
       tipo_doc=:tipo_doc, doc=:doc, fecha_reg=:fecha_reg, direccion=:direccion) WHERE doc=:doc";
      $stmt->bindParam(':nombre', $nombre);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':clave', $clave);
      $stmt->bindParam(':tel', $tel);
      $stmt->bindParam(':apellido', $apellido);
      $stmt->bindParam(':genero', $genero);
      $stmt->bindParam(':fecha_naci', $fecha_naci);
      $stmt->bindParam(':tipo_doc', $tipo_doc);
      $stmt->bindParam(':doc', $doc);
      $stmt->bindParam(':fecha_reg', $fecha_reg);
      $stmt->bindParam(':direccion', $direccion);
      $stmt->execute();

      echo '../clientes.php';
  } catch (PDOException $e) {
      echo 'Error en el registro: ' . $e->getMessage();
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
  $sql="UPDATE usuarios SET estado = '0' WHERE doc = :doc";
  $stmt=$conectar->prepare($stmt);
  $stmt->bindParam(':doc', $doc);
  $stmt->execute();
  $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo 'Error en el donwgrade: ' . $e->getMessage();
  return false;
}
}


public function active_usuario($doc){
  try {
  $conectar= parent::conexion();
  parent::set_names();
  $sql="UPDATE usuarios SET estado = '2' WHERE doc = :doc";
  $stmt=$conectar->prepare($stmt);
  $stmt->bindParam(':doc', $doc);
  $stmt->execute();
  $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo 'Error en la activación: ' . $e->getMessage();
  return false;
}
} 

public function delete_usuario($doc){
  try {
  $conectar= parent::conexion();
  parent::set_names();
  $stmt="DELETE FROM usuarios WHERE doc = :doc";
  $stmt=$conectar->prepare($stmt);
  $stmt->bindParam(':doc', $doc);
  $stmt->execute();
  $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo 'Error al eliminar: ' . $e->getMessage();
  return false;
}
}
public function ver_usuario($buscar){
  try {
    $conectar= parent::conexion();
    parent::set_names();
  if($buscar=! 0){
  $stmt="SELECT doc,nombre,apellido,tel,email,cargo FROM usuarios WHERE doc LIKE :buscar";
  $stmt=$conectar->prepare($stmt);
  $stmt->bindParam(':buscar', $buscar.'%');
  $stmt->execute();
}
else{
  $stmt=$conectar->query("SELECT * FROM usuarios ORDER BY doc ASC");
}

return $stmt;

} catch (PDOException $e) {
  echo 'Error al eliminar: ' . $e->getMessage();
  return false;
}





  }
}

?>
