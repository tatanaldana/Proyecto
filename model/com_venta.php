<?php
require_once('conexion.php');

#Creamos la clase usuarios y heredamos los metodos de la clase conexion.
  class Com_venta extends Conexion{



    public function registroVenta($doc_cliente, $fechaventa, $producto, $precio, $cantidad, $subtotal, $totalventa, $carrito_idcarrito, $estado)
    {
        try {
            $conectar = parent::conexion();  
            parent::set_names();
            $stmt = "INSERT INTO com_venta (doc_cliente, fecha_venta, producto, precio, cantidad, subtotal, totalventa, carrito_idcarrito, estado)
                     VALUES (:doc_cliente, :fecha_venta, :producto, :precio, :cantidad, :subtotal, :totalventa, :carrito_idcarrito, :estado)";
            $stmt = $conectar->prepare($stmt);
            $stmt->bindParam(':doc_cliente', $doc_cliente); 
            $stmt->bindParam(':fecha_venta', $fechaventa); 
            $stmt->bindParam(':producto', $producto);
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':cantidad', $cantidad); 
            $stmt->bindParam(':subtotal', $subtotal); 
            $stmt->bindParam(':totalventa', $totalventa); 
            $stmt->bindParam(':carrito_idcarrito', $carrito_idcarrito); 
            $stmt->bindParam(':estado', $estado); 
            $stmt->execute();
    
            // Verificar si la inserción fue exitosa
            if ($stmt->rowCount() > 0) {
                // La inserción se realizó correctamente
                return true;
            } else {
                // La inserción no tuvo éxito
                echo "Error: No se pudo insertar el registro en la tabla com_venta.";
                return false;
            }
        } catch (PDOException $e) {
            echo 'Error en el registro: ' . $e->getMessage();
            return false;
        }
    }

//Cambiar el estado de la venta de preapración a completada
public function upgrade_venta($carrito_idcarrito){
  try {
  $conectar= parent::conexion();
  parent::set_names();
  $stmt="UPDATE com_venta SET estado = '2' WHERE carrito_idcarrito = :carrito_idcarrito";
  $stmt=$conectar->prepare($stmt);
  $stmt->bindParam(':carrito_idcarrito', $carrito_idcarrito);
  $stmt->execute();
  return true;
} catch (PDOException $e) {
  echo 'Error en la actualizacion: ' . $e->getMessage();
  return false;
}
} 

//Eliminar la venta en caso de haber ingresado un dato de manera errada.
public function delete_venta($carrito_idcarrito){
  try {
  $conectar= parent::conexion();
  parent::set_names();
  $stmt="DELETE FROM com_venta WHERE carrito_idcarrito = :carrito_idcarrito";
  $stmt=$conectar->prepare($stmt);
  $stmt->bindParam(':carrito_idcarrito', $carrito_idcarrito);
  $stmt->execute();
  return true;
} catch (PDOException $e) {
  echo 'Error al eliminar: ' . $e->getMessage();
  return false;
}
}

public function detalle_venta($carrito_idcarrito){
  try {
  $conectar= parent::conexion();
  parent::set_names();
  $stmt="SELECT producto, precio, cantidad, subtotal FROM com_venta WHERE carrito_idcarrito = :carrito_idcarrito";
  $stmt=$conectar->prepare($stmt);
  $stmt->bindParam(':carrito_idcarrito', $carrito_idcarrito);
  $stmt->execute();
  $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo 'Error al eliminar: ' . $e->getMessage();
  return false;
}
}

public function total_venta($carrito_idcarrito){
  try {
  $conectar= parent::conexion();
  parent::set_names();
  $stmt="SELECT totalventa FROM com_venta WHERE carrito_idcarrito = :carrito_idcarrito";
  $stmt=$conectar->prepare($stmt);
  $stmt->bindParam(':carrito_idcarrito', $carrito_idcarrito);
  $stmt->execute();
  $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo 'Error al eliminar: ' . $e->getMessage();
  return false;
}
}

public function historico_venta(){
  try {
    $conectar= parent::conexion();
    parent::set_names();  
    $stmt=  "SELECT c.doc_cliente, c.fecha_venta, c.carrito_idcarrito, c.totalventa, CASE WHEN c.estado = 2 THEN 'Completada' ELSE 'Otro Estado' END AS estado
    FROM com_venta AS c JOIN carrito AS cv ON c.carrito_idcarrito = cv.idcarrito WHERE c.estado = 2 GROUP BY cv.idcarrito";
    $stmt=$conectar->prepare($stmt);
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
  } catch (PDOException $e) {
    echo 'Error al ejecutar la consulta SQL: ' . $e->getMessage();
    return false;
  }
} 


public function historico_venta_x_fecha($fecha_inicial,$fecha_final){
  try {
    $conectar= parent::conexion();
    parent::set_names();  
    $stmt=  "SELECT c.doc_cliente, c.fecha_venta, c.carrito_idcarrito, c.totalventa, CASE WHEN c.estado = 2 THEN 'Completada' ELSE 'Otro Estado' END AS estado
    FROM com_venta AS c JOIN carrito AS cv ON c.carrito_idcarrito = cv.idcarrito  WHERE c.estado = 2 AND c.fecha_venta BETWEEN :fecha_inicial AND :fecha_final
    GROUP BY cv.idcarrito";
    $stmt=$conectar->prepare($stmt);
    $stmt->bindParam(':fecha_inicial', $fecha_inicial);
    $stmt->bindParam(':fecha_final', $fecha_final);
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
  } catch (PDOException $e) {
    echo 'Error al ejecutar la consulta SQL: ' . $e->getMessage();
    return false;
  }
} 

public function get_venta() {
  try {
      // ... tu código existente ...

      $conectar=parent::conexion();
      parent::set_names();
      $stmt="SELECT * FROM com_venta";
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

public function get_venta_por_doc($doc_cliente) {
  try {
      // ... tu código existente ...

      $conectar=parent::conexion();
      parent::set_names();
      $stmt="SELECT * FROM com_venta WHERE doc_cliente = :doc_cliente";
      $stmt=$conectar->prepare($stmt);
      $stmt->bindParam(':doc_cliente', $doc_cliente);
      $stmt->execute();
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

      return $resultado;
  } catch (PDOException $e) {
      // Mostrar detalles del error en la consola o en el registro de errores
      error_log('Error en la búsqueda: ' . $e->getMessage());
      return false;
  }
}

  public function preparacion_venta($docCliente){
  try {
    $conectar = parent::conexion();
    parent::set_names();
    $stmt = "SELECT c.doc_cliente, c.fecha_venta, c.carrito_idcarrito, c.totalventa, CASE WHEN c.estado = 1 THEN 'Preparación' ELSE 'Otro Estado' END AS estado
             FROM com_venta AS c JOIN carrito AS cv ON c.carrito_idcarrito = cv.idcarrito WHERE c.estado = 1 AND c.doc_cliente LIKE :docCliente GROUP BY cv.idcarrito";
    $stmt = $conectar->prepare($stmt);
    $stmt->bindParam(':docCliente',  $docCliente . '%');
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
  
  } catch (PDOException $e) {
    echo 'Error al consultar: ' . $e->getMessage();
    return false;
  }
}

public function ver_venta2(){
  try {
  $conectar= parent::conexion();
  parent::set_names();
  $stmt= "SELECT c.doc_cliente, c.fecha_venta, c.carrito_idcarrito, c.totalventa, CASE WHEN c.estado = 1 THEN 'Preparación' ELSE 'Otro Estado' END AS estado
  FROM com_venta AS c JOIN carrito AS cv ON c.carrito_idcarrito = cv.idcarrito WHERE c.estado = 1 GROUP BY cv.idcarrito";
  $stmt=$conectar->prepare($stmt);
  $stmt->execute();
  $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $resultado;

} catch (PDOException $e) {
  echo 'Error: ' . $e->getMessage();
  return false;
}
}

public function detalle_historico_venta($doc,$idCarrito){
  try {
    $conectar = parent::conexion();
    parent::set_names();
    $stmt="SELECT u.doc, u.nombre, u.apellido, u.tel, u.email, u.direccion, cv.fecha_venta, cv.totalventa, cv.estado
    FROM usuarios AS u JOIN com_venta AS cv ON u.doc = cv.doc_cliente WHERE u.doc = :doc AND cv.carrito_idcarrito = :idCarrito";
    $stmt = $conectar->prepare($stmt);
    $stmt->bindParam(':doc', $doc);
    $stmt->bindParam(':idCarrito', $idCarrito);
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
  
  } catch (PDOException $e) {
    echo 'Error al consultar: ' . $e->getMessage();
    return false;
  }
}

public function detalle_historico_venta2($idCarrito){
  try {
    $conectar = parent::conexion();
    parent::set_names();
    $stmt="SELECT cv.producto, cv.precio, cv.cantidad, cv.subtotal,c.forma_pago FROM com_venta AS cv JOIN carrito AS c 
    ON cv.carrito_idcarrito = c.idcarrito WHERE  cv.carrito_idcarrito = :idCarrito AND c.idcarrito = :idCarrito";
    $stmt = $conectar->prepare($stmt);
    $stmt->bindParam(':idCarrito', $idCarrito);
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
  
  } catch (PDOException $e) {
    echo 'Error al consultar: ' . $e->getMessage();
    return false;
  }
}

}

?>