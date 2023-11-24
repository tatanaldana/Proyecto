<?php
class Promocion extends Conexion
{


    public function get_promocion()
    {
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM promocion";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_promocion_x_id($id_promo)
    {
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM promocion WHERE id_promo = :id_promo";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(1,':id_promo', $id_promo);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_promocion($nom_promo,$totalpromo,$categorias_idcategoria)
    {
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO promocion(id_promo,nom_promo,totalpromo,categorias_idcategoria) VALUES (Null,:nom_promo,:totalpromo,:categorias_idcategoria);";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':nom_promo', $nom_promo);
        $sql->bindParam(':totalpromo', $totalpromo);
        $sql->bindParam(':categorias_idcategoria', $categorias_idcategoria);
        $sql->execute();
        
        
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_promocion($id_promo,$nom_promo,$totalpromo,$categorias_idcategoria)
    {
        $conectar= parent::conexion();
        parent::set_names();
        $sql=" UPDATE promocion set
        nom_promo = :nom_promo,
        totalpromo = :totalpromo,
        categorias_idcategoria = :categorias_idcategoria
        WHERE
        id_promo =:id_promo";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':nom_promo', $nom_promo);
        $sql->bindParam(':totalpromo', $totalpromo);
        $sql->bindParam(':categorias_idcategoria', $categorias_idcategoria);
        $sql->bindParam(':id_promo', $id_promo);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function eliminar_promocion($id_promo){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="DELETE FROM promocion WHERE id_promo = :id_promo";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':id_promo', $id_promo);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }






}  
?>


