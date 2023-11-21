

<?php
class Productos extends Conectar{

    //Funcion para mostrar productos en pantalla
    public function get_productos(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM productos";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //funcion que busca determinado producto con id
    public function get_productos_x_id($idProducto){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM productos WHERE idProducto = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $idProducto);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


    //Ingresar productos
    public function insert_productos($nombre_pro,$detalle,$precio_pro,$categorias_idcategoria,$cod,){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO productos(idProducto,nombre_pro,detalle,precio_pro,categorias_idcategoria,cod) VALUES (NULL,?,?,?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $nombre_pro);
        $sql->bindValue(2, $detalle);
        $sql->bindValue(3, $precio_pro);
        $sql->bindValue(4, $categorias_idcategoria);
        $sql->bindValue(5, $cod);
        $sql->execute();
        
        
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //actualizar productos
    public function update_productos($idProducto,$nombre_pro,$detalle,$precio_pro,$categorias_idcategoria,$cod){
        $conectar= parent::conexion();
        parent::set_names();
        $sql=" UPDATE productos set
        nombre_pro = ?,
        detalle = ?,
        precio_pro = ?,
        categorias_idcategoria = ?,
        cod = ?
        WHERE
        idProducto =?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $nombre_pro);
        $sql->bindValue(2, $detalle);
        $sql->bindValue(3, $precio_pro);
        $sql->bindValue(4, $categorias_idcategoria);
        $sql->bindValue(5, $cod);
        $sql->bindValue(6, $idProducto);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //eliminar productos
    public function eliminar_productos($instru_id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="DELETE FROM productos WHERE idProducto = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $instru_id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
}  
?>

