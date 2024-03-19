<?php

require_once('conexion.php');

class Det_promo extends Conexion{
    //se obtiene todos los registros de la tabla det_prom
    public function get_promo(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM det_promo";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
//Se obtiene el detalle de una promoción.
    public function get_promo_x_idpromo($idpromo){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM det_promo WHERE idpromo = :idpromo";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':idpromo', $idpromo);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
//se inserta el detalle de la promoción
    public function insert_promo($nom_prod,$pre_prod,$cantidad,$descuento,$subtotal,$total,$promocion_idpromo){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO det_promo(idPromo,nom_prod,pre_prod,cantidad,descuento,subtotal,total,promocion_idpromo) VALUES (NULL,:nom_prod,:pre_prod,:cantidad,:descuento,:subtotal,:total,:promocion_idpromo);";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':nom_prod', $nom_prod);
        $sql->bindParam(':pre_prod', $pre_prod);
        $sql->bindParam(':cantidad', $cantidad);
        $sql->bindParam(':descuento', $descuento);
        $sql->bindParam(':subtotal', $subtotal);
        $sql->bindParam(':total', $total);
        $sql->bindParam(':promocion_idpromo', $promocion_idpromo);
        $sql->execute();
        
        
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
//Se actualiza el detalle de una promoción
    public function update_promo($idPromo,$nom_prod,$pre_prod,$cantidad,$descuento,$subtotal,$total){
        $conectar= parent::conexion();
        parent::set_names();
        $sql=" UPDATE det_promo set nom_prod = :nom_prod,pre_prod =:pre_prod, cantidad = :cantidad, descuento = :descuento,
        subtotal = :subtotal, total = :total WHERE idPromo =:idPromo";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':nom_prod', $nom_prod);
        $sql->bindParam(':pre_prod', $pre_prod);
        $sql->bindParam(':cantidad', $cantidad);
        $sql->bindParam(':descuento', $descuento);
        $sql->bindParam(':subtotal', $subtotal);
        $sql->bindParam(':total', $total);
        $sql->bindParam(':idPromo', $idPromo);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

//Se elimina una el detalle de una promoción.
    public function eliminar_promo($idpromo){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="DELETE FROM det_promo WHERE idpromo = :idpromo";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':idpromo', $idpromo);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }





}  
?>