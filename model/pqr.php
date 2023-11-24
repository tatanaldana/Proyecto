<?php
require_once('conexion.php');

#Creamos la clase usuarios y heredamos los metodos de la clase conexion.

class pqr extends Conexion{


public function insert_pqr($sugerencia,$tipo_sugerencia,$fecha_pqr,$estado,$usuarios_id)
{
  try {
  $conectar = parent::conexion();  
  parent::set_names();
  $stmt = "INSERT INTO pqr(sugerencia, tipo_sugerencia, fecha_pqr, estado, usuarios_id)
  VALUES (:sugerencia,:tipo_sugerencia, :fecha_pqr, :estado, :usuarios_id)";
  $stmt = $conectar->prepare($stmt);
  $stmt->bindParam(':sugerencia', $sugerencia); 
  $stmt->bindParam(':tipo_sugerencia', $tipo_sugerencia); 
  $stmt->bindParam(':fecha_pqr', $fecha_pqr);
  $stmt->bindParam(':estado', $estado);
  $stmt->bindParam(':usuarios_id', $usuarios_id); 
  $stmt->execute();
  $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    echo '../../ventas.php';
} catch (PDOException $e) {
  echo 'Error en el registro: ' . $e->getMessage();
  return false;
}
}

//Se obtiene el detalle de los pqr.
public function get_pqr(){
    $conectar= parent::conexion();
    parent::set_names();
    $stmt="SELECT * FROM pqr";
    $stmt=$conectar->prepare($stmt);
    $stmt->execute();
    return $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
}

//Se obtiene el detalle de un pqr.
public function get_id_pqr($estado){
    $conectar= parent::conexion();
    parent::set_names();
    $sql="SELECT * FROM pqr WHERE estado = :estado";
    $sql=$conectar->prepare($sql);
    $sql->bindParam(':estado', $estado);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

//Cambiar el estado del pqr
public function upgrade_pqr($id){
  try {
  $conectar= parent::conexion();
  parent::set_names();
  $stmt="UPDATE pqr SET estado = 2 WHERE id = :id";
  $stmt=$conectar->prepare($stmt);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo 'Error en la activación: ' . $e->getMessage();
  return false;
}
} 

//Eliminar 
public function delete_pqr($id){
  try {
  $conectar= parent::conexion();
  parent::set_names();
  $stmt="DELETE FROM pqr WHERE id = :id";
  $stmt=$conectar->prepare($stmt);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo 'Error al eliminar: ' . $e->getMessage();
  return false;
}
}

}

?>