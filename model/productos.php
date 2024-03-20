
<?php
  require_once "conexion.php";

class Productos extends Conexion{

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
        $sql="SELECT * FROM productos WHERE idProducto = :idProducto";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':idProducto', $idProducto);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

//funcion que busca productos por categoría
        public function get_productos_por_categoria($idCategoria){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM productos WHERE categorias_idcategoria = :idCategoria";
            $sql = $conectar->prepare($sql);
            $sql->bindParam(':idCategoria', $idCategoria);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return [];  // o return null; según tu lógica
            }
        }

        //funcion que busca productos por codigo
        public function get_productos_por_codigo($cod){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM productos WHERE cod = :cod";
            $sql = $conectar->prepare($sql);
            $sql->bindParam(':cod', $cod);
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return [];  // o return null; según tu lógica
            }
        }


    //Ingresar productos
    public function insert_productos($nombre_pro,$detalle,$precio_pro,$categorias_idcategoria,$cod,){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO productos(idProducto,nombre_pro,detalle,precio_pro,categorias_idcategoria,cod) VALUES (NULL,:nombre_pro,:detalle,:precio_pro,:categorias_idcategoria,:cod);";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':nombre_pro', $nombre_pro);
        $sql->bindParam(':detalle', $detalle);
        $sql->bindParam(':precio_pro', $precio_pro);
        $sql->bindParam(':categorias_idcategoria', $categorias_idcategoria);
        $sql->bindParam(':cod', $cod);
        $sql->execute();
        
        
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //actualizar productos
    public function update_productos($idProducto,$nombre_pro,$detalle,$precio_pro,$categorias_idcategoria,$cod){
        $conectar= parent::conexion();
        parent::set_names();
        $sql=" UPDATE productos set
        nombre_pro = :nombre_pro,
        detalle = :detalle,
        precio_pro = :precio_pro,
        categorias_idcategoria = :categorias_idcategoria,
        cod = :cod
        WHERE
        idProducto =:idProducto";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':nombre_pro', $nombre_pro);
        $sql->bindParam(':detalle', $detalle);
        $sql->bindParam(':precio_pro', $precio_pro);
        $sql->bindParam(':categorias_idcategoria', $categorias_idcategoria);
        $sql->bindParam(':cod', $cod);
        $sql->bindParam(':idProducto', $idProducto);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //eliminar productos
    public function eliminar_productos($idProducto){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="DELETE FROM productos WHERE idProducto = :idProducto";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':idProducto', $idProducto);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_productos2(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT idProducto, nombre_pro, precio_pro FROM productos";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $sql;
    }

}  
?>

