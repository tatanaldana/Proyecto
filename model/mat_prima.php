<?php
  require_once('conexion.php');
  
class Mat_prima extends Conexion{
    public function get_mat_prima(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM mat_pri";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_mat_prima_x_cod($cod){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM mat_pri WHERE cod = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $cod);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_mat_prima($cod,$referencia,$descripcion,$existencia,$entrada,$salida,$stock,){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO mat_pri(cod,referencia,descripcion,existencia,entrada,salida,stock) VALUES (?,?,?,?,?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $cod);
        $sql->bindValue(2, $referencia);
        $sql->bindValue(3, $descripcion);
        $sql->bindValue(4, $existencia);
        $sql->bindValue(5, $entrada);
        $sql->bindValue(6, $salida);
        $sql->bindValue(7, $stock);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function update_mat_prima($cod,$referencia,$descripcion,$existencia,$entrada,$salida,$stock,){
        $conectar= parent::conexion();
        parent::set_names();
        $sql=" UPDATE mat_pri set
        referencia = ?,
        descripcion = ?,
        existencia = ?,
        entrada = ?,
        salida = ?,
        stock = ?
        WHERE
        cod =?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $referencia);
        $sql->bindValue(2, $descripcion);
        $sql->bindValue(3, $existencia);
        $sql->bindValue(4, $entrada);
        $sql->bindValue(5, $salida);
        $sql->bindValue(6, $stock);
        $sql->bindValue(7, $cod);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function eliminar_mat_prima($cod){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="DELETE FROM mat_pri WHERE cod = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $cod);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

}  
?>