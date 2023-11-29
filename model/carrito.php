<?php
class Ventas extends Conexion{
    public function get_ventas_carrito(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM carrito";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_ventas_carrito_x_id($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM carrito WHERE id = :id";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_ventas_carrito($forma_pago,){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO carrito(id,forma_pago,estado) VALUES (NULL,:forma_pago,'1');";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':forma_pago', $forma_pago);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function update_ventas_carrito($id,$forma_pago,){
        $conectar= parent::conexion();
        parent::set_names();
        $sql=" UPDATE carrito set
        forma_pago = :forma_pago
        WHERE
        id =:id";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':forma_pago', $forma_pago);
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function eliminar_ventas_carrito($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="DELETE FROM carrito WHERE id = :id";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cambiar_estado1($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql=" UPDATE carrito set
        estado = '1'
        WHERE
        id =:id";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function cambiar_estado2($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql=" UPDATE carrito set
        estado = '2'
        WHERE
        idcarrito =:idcarrito";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':idcarrito', $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
}  
?>