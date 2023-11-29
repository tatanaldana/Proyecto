<?php
require_once('conexion.php');

#Creamos la clase usuarios y heredamos los metodos de la clase conexion.
  class Com_venta extends Conexion{



public function registroVenta($doc_cliente,$fechaventa,$producto,$precio,$cantidad,$subtotal,$totalventa,$carrito_idcarrito,$estado)
{
  try {
  $conectar = parent::conexion();  
  parent::set_names();
  $stmt = "INSERT INTO com_venta (doc_cliente, fechaventa, producto, precio, cantidad, subtotal, totalventa, carrito_idcarrito, estado)
  VALUES (:doc_cliente, :fechaventa, :producto, :precio, :cantidad, :subtotal, :totalventa, :carrito_idcarrito, :estado)";
  $stmt = $conectar->prepare($stmt);
  $stmt->bindParam(':doc_cliente', $doc_cliente); 
  $stmt->bindParam(':fechaventa', $fechaventa); 
  $stmt->bindParam(':producto', $producto);
  $stmt->bindParam(':precio', $precio);
  $stmt->bindParam(':cantidad', $cantidad); 
  $stmt->bindParam(':subtotal', $subtotal); 
  $stmt->bindParam(':totalventa', $totalventa); 
  $stmt->bindParam(':carrito_idcarrito', $carrito_idcarrito); 
  $stmt->bindParam(':estado', $estado); 
  $stmt->execute();
  $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    echo '../../ventas.php';
} catch (PDOException $e) {
  echo 'Error en el registro: ' . $e->getMessage();
  return false;
}
}

//Cambiar el estado de la venta de preapración a completada
public function upgrade_venta($doc_cliente){
  try {
  $conectar= parent::conexion();
  parent::set_names();
  $stmt="UPDATE com_venta SET estado = '2' WHERE doc_cliente = :doc_cliente";
  $stmt=$conectar->prepare($stmt);
  $stmt->bindParam(':doc_cliente', $doc_cliente);
  $stmt->execute();
  $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo 'Error en la activación: ' . $e->getMessage();
  return false;
}
} 
//Eliminar la venta en caso de haber ingresado un dato de manera errada.
public function delete_venta($doc_cliente){
  try {
  $conectar= parent::conexion();
  parent::set_names();
  $stmt="DELETE FROM com_venta WHERE doc_cliente = :doc_cliente";
  $stmt=$conectar->prepare($stmt);
  $stmt->bindParam(':doc_cliente', $doc_cliente);
  $stmt->execute();
  $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

public function historico_venta($carrito_idcarrito,$docCliente){
  try {
  $conectar= parent::conexion();
  parent::set_names();
  $stmt="SELECT u.doc, u.nombre, u.apellido, u.tel, u.email, u.direccion, cv.fecha_venta, cv.totalventa, cv.estado
  FROM usuarios AS u JOIN com_venta AS cv ON u.doc = cv.doc_cliente WHERE u.doc=:docCliente AND cv.carrito_idcarrito = :carrito_idcarrito";
  $stmt=$conectar->prepare($stmt);
  $stmt->bindParam(':carrito_idcarrito', $carrito_idcarrito);
  $stmt->bindParam(':docCliente', $docCliente);
  $stmt->execute();
  $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo 'Error al eliminar: ' . $e->getMessage();
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



}

?>