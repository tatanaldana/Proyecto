<?php

# Incluimos la clase conexion para poder heredar los metodos de ella.
require_once('conexion.php');

class Carrito extends Conexion{
    
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
        $sql="SELECT * FROM carrito WHERE idcarrito = :id";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_ventas_carrito($forma_pago, $estado) {
        try {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO carrito(forma_pago, estado) VALUES (:forma_pago, :estado)";
            $stmt = $conectar->prepare($sql);
            $stmt->bindParam(':forma_pago', $forma_pago);
            $stmt->bindParam(':estado', $estado);
            $stmt->execute();
            return $conectar->lastInsertId(); // Devolver el ID del último registro insertado
        } catch (PDOException $e) {
            echo 'Error en la inserción del carrito: ' . $e->getMessage();
            return false;
        }
    }
    
    public function update_ventas_carrito($id,$forma_pago,){
        $conectar= parent::conexion();
        parent::set_names();
        $sql=" UPDATE carrito set
        forma_pago = :forma_pago
        WHERE
        idcarrito =:id";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':forma_pago', $forma_pago);
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function eliminar_ventas_carrito($idcarrito){
        try{
        $conectar= parent::conexion();
        parent::set_names();

        $sql="DELETE FROM carrito WHERE idcarrito = :idcarrito";

        $sql=$conectar->prepare($sql);
        $sql->bindParam(':idcarrito', $idcarrito);
        $sql->execute();
        return true;
    }
    catch (PDOException $e) {
        echo 'Error al eliminar: ' . $e->getMessage();
        return false;
      }
    }

    public function cambiar_estado1($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql=" UPDATE carrito set
        estado = '1'
        WHERE
        idcarrito =:id";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function cambiar_estado2($id){
        try{
        $conectar= parent::conexion();
        parent::set_names();
        $sql=" UPDATE carrito set
        estado = '2'
        WHERE
        idcarrito =:id";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':id', $id);
        return  $sql->execute();
        return true;
    } catch (PDOException $e) {
    echo 'Error en la actualizacion: ' . $e->getMessage();
    return false;
  }
}
}  

//Cambiar el estado de la venta de preapración a completada
?>