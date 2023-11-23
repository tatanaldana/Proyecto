<?php
class Promocion extends Conexion{
    public function get_promocion(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM promocion";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_promocion_x_id($id_promo){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM promocion WHERE id_promo = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_promo);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_promocion($nom_promo,$totalpromo,$categorias_idcategoria){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO promocion(id_promo,nom_promo,totalpromo,categorias_idcategoria) VALUES (Null,?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $nom_promo);
        $sql->bindValue(2, $totalpromo);
        $sql->bindValue(3, $categorias_idcategoria);
        $sql->execute();
        
        
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_promocion($id_promo,$nom_promo,$totalpromo,$categorias_idcategoria){
        $conectar= parent::conexion();
        parent::set_names();
        $sql=" UPDATE promocion set
        nom_promo = ?,
        totalpromo = ?,
        categorias_idcategoria = ?
        WHERE
        id_promo =?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $nom_promo);
        $sql->bindValue(2, $totalpromo);
        $sql->bindValue(3, $categorias_idcategoria);
        $sql->bindValue(4, $id_promo);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function eliminar_promocion($id_promo){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="DELETE FROM promocion WHERE id_promo = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_promo);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }




//insert into det_promo

}  
?>


<?php
class Det_promo extends Conexion{
    public function get_promo(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM det_promo";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_promo_x_idpromo($idpromo){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM det_promo WHERE idpromo = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $idpromo);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_promo($nom_prod,$pre_prod,$cantidad,$descuento,$subtotal,$total,$promocion_idpromo){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO det_promo(idpromo,nom_prod,pre_prod,cantidad,descuento,subtotal,total,promocion_idpromo) VALUES (Null,?,?,?,?,?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $nom_prod);
        $sql->bindValue(2, $pre_prod);
        $sql->bindValue(3, $cantidad);
        $sql->bindValue(4, $descuento);
        $sql->bindValue(5, $subtotal);
        $sql->bindValue(6, $total);
        $sql->bindValue(7, $promocion_idpromo);
        $sql->execute();
        
        
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_promo($idpromo,$nom_prod,$pre_prod,$cantidad,$descuento,$subtotal,$total,$promocion_idpromo){
        $conectar= parent::conexion();
        parent::set_names();
        $sql=" UPDATE det_promo set
        nom_prod = ?,
        pre_prod = ?,
        cantidad = ?,
        descuento = ?,
        subtotal = ?,
        total = ?,
        promocion_idpromo = ?
        WHERE
        idpromo =?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $nom_prod);
        $sql->bindValue(2, $pre_prod);
        $sql->bindValue(3, $cantidad);
        $sql->bindValue(4, $descuento);
        $sql->bindValue(5, $subtotal);
        $sql->bindValue(6, $total);
        $sql->bindValue(7, $promocion_idpromo);
        $sql->bindValue(8, $idpromo);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function eliminar_promo($idpromo){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="DELETE FROM det_promo WHERE idpromo = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $idpromo);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }





}  
?>