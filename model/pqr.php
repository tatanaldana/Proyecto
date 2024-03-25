<?php
require_once('conexion.php');

#Creamos la clase usuarios y heredamos los metodos de la clase conexion.

class PQR extends Conexion{


public function insert_pqr($sugerencia,$tipo_sugerencia,$fecha_pqr,$usuarios_id)
{
  try {
  $conectar = parent::conexion();  
  parent::set_names();
  $stmt = "INSERT INTO pqr(sugerencia, tipo_sugerencia, fecha_pqr, estado, usuarios_id)
  VALUES (:sugerencia,:tipo_sugerencia, :fecha_pqr ,1, :usuarios_id)";
  $stmt = $conectar->prepare($stmt);
  $stmt->bindParam(':sugerencia', $sugerencia); 
  $stmt->bindParam(':tipo_sugerencia', $tipo_sugerencia); 
  $stmt->bindParam(':fecha_pqr', $fecha_pqr);
  $stmt->bindParam(':usuarios_id', $usuarios_id); 
  $stmt->execute();
  $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

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



//Mostrar pqrs pendintes por resolver 
public function show_pqr($id){
  try {
  $conectar= parent::conexion();
  parent::set_names();
  $stmt="SELECT * FROM pqr WHERE estado = 1";
  $stmt=$conectar->prepare($stmt);
  $stmt->execute();
  $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo 'Error en la activación: ' . $e->getMessage();
  return false;
}
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

public function historico_pqr(){
  try {
    $conectar= parent::conexion();
    parent::set_names();  
    $stmt=  "SELECT c.id, c.estado,cv.nombre,cv.apellido,c.usuarios_id, CASE WHEN c.estado = 2 THEN 'Completada' ELSE 'Trámite' END AS estado
    FROM pqr AS c JOIN usuarios AS cv ON c.usuarios_id = cv.doc ";
    $stmt=$conectar->prepare($stmt);
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
  } catch (PDOException $e) {
    echo 'Error al ejecutar la consulta SQL: ' . $e->getMessage();
    return false;
  }
} 

public function view_pqr(){
  try {
    $conectar= parent::conexion();
    parent::set_names();  
    $stmt=  "SELECT* FROM view_pqr ";
    $stmt=$conectar->prepare($stmt);
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
  } catch (PDOException $e) {
    echo 'Error al ejecutar la consulta SQL: ' . $e->getMessage();
    return false;
  }
} 


}



?>