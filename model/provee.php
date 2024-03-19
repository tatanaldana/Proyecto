<?php

require_once('conexion.php');

class provee extends Conexion{
    //se obtiene todos los registros de la tabla det_prom
    public function get_provee(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM provee";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
//Se obtiene el detalle de una promoción.
    public function get_provee_x_idproveedor($idproveedor){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM provee WHERE idproveedor = :idproveedor";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':idproveedor', $idproveedor);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
//se inserta el detalle de la promoción
    public function insert_provee($nom_proveedor,$telefono_proveedor,$direccion_proveedor){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO provee(idproveedor,nom_proveedor,telefono_proveedor,direccion_proveedor) VALUES (NULL,:nom_proveedor,:telefono_proveedor,:direccion_proveedor);";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':nom_proveedor', $nom_proveedor);
        $sql->bindParam(':telefono_proveedor', $telefono_proveedor);
        $sql->bindParam(':direccion_proveedor', $direccion_proveedor);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
//Se actualiza el detalle de una promoción
    public function update_provee($idproveedor,$nom_proveedor,$telefono_proveedor,$direccion_provedor){
        $conectar= parent::conexion();
        parent::set_names();
        $sql=" UPDATE provee set
        nom_proveedor = :nom_proveedor,
        telefono_proveedor =:telefono_proveedor,
        direccion_proveedor = :direccion_proveedor
        WHERE idproveedor =:idproveedor";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':idproveedor', $idproveedor);
        $sql->bindParam(':nom_proveedor', $nom_proveedor);
        $sql->bindParam(':telefono_proveedor', $telefono_proveedor);
        $sql->bindParam(':direccion_proveedor', $direccion_provedor);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

//Se elimina una el detalle de una promoción.
    public function delete_provee($idproveedor){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="DELETE FROM provee WHERE idproveedor = :idproveedor";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':idproveedor', $idproveedor);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }





}  
?>