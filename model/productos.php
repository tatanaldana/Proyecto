<?php
  require_once "conexion.php";


class Productos extends Conexion{

    //Funcion para mostrar productos en pantalla
    public function get_productos(){
        $conectar= parent::conexion();
        parent::set_names();
        $stmt="SELECT * FROM productos";
        $stmt=$conectar->prepare($stmt);
        $stmt->execute();
        $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    //funcion que busca determinado producto con id
    public function get_productos_x_id($idProducto){
        $conectar= parent::conexion();
        parent::set_names();
        $stmt="SELECT * FROM productos WHERE idProducto = :idProducto";
        $stmt=$conectar->prepare( $stmt);
        $stmt->bindParam(':idProducto', $idProducto);
        $stmt->execute();
        $resultado= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

//funcion que busca productos por categoría
        public function get_productos_por_categoria($idCategoria){
            $conectar = parent::conexion();
            parent::set_names();
            $stmt=  "SELECT p.idProducto, p.nombre_pro, p.detalle, p.precio_pro, c.nombre_cat, p.cod FROM productos AS p JOIN categorias AS c ON p.categorias_idcategoria = c.id_categoria where p.categorias_idcategoria = :idCategoria";
            $stmt = $conectar->prepare($stmt);
            $stmt->bindParam(':idCategoria', $idCategoria);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
            } else {
                return [];  // o return null; según tu lógica
            }
        }

        public function get_nombre_cat($idCategoria){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT c.nombre_cat, p.nombre_pro, p.detalle, p.precio_pro, p.cod, p.img from productos as p JOIN categorias as c on categorias_idcategoria = id_categoria where id_categoria = :idCategoria;";
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
            $stmt = "SELECT * FROM productos WHERE cod = :cod";
            $stmt = $conectar->prepare( $stmt);
            $stmt->bindParam(':cod', $cod);
            $stmt->execute();
            if ( $stmt->rowCount() > 0) {
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado[0];
            } else {
                return [];  // o return null; según tu lógica
            }
        }


    //Ingresar productos
         public function insert_productos($nombre_pro,$detalle,$precio_pro,$categorias_idcategoria,$cod,){
        try{
        $conectar= parent::conexion();
        parent::set_names();
        $stmt="INSERT INTO productos(idProducto,nombre_pro,detalle,precio_pro,categorias_idcategoria,cod) VALUES (NULL,:nombre_pro,:detalle,:precio_pro,:categorias_idcategoria,:cod);";
        $stmt=$conectar->prepare($stmt);
        $stmt->bindParam(':nombre_pro', $nombre_pro);
        $stmt->bindParam(':detalle', $detalle);
        $stmt->bindParam(':precio_pro', $precio_pro);
        $stmt->bindParam(':categorias_idcategoria', $categorias_idcategoria);
        $stmt->bindParam(':cod', $cod);
        $stmt->execute();
         // Verificar si la inserción fue exitosa
         if ($stmt->rowCount() > 0) {
            // La inserción se realizó correctamente
            return true;
        } else {
            // La inserción no tuvo éxito
            echo "Error: No se pudo insertar el registro en la tabla mat_pri.";
            return false;
        }
    } catch (PDOException $e) {
        echo 'Error en el registro: ' . $e->getMessage();
        return false;
    }
    }

    //actualizar productos
    public function update_productos($idProducto,$nombre_pro,$detalle,$precio_pro,$categorias_idcategoria,$img,$cod){
        try{
        $conectar= parent::conexion();
        parent::set_names();
        $stmt=" UPDATE productos set
        nombre_pro = :nombre_pro,
        detalle = :detalle,
        precio_pro = :precio_pro,
        categorias_idcategoria = :categorias_idcategoria,
        img = :img,
        cod = :cod
        WHERE
        idProducto =:idProducto";
        $stmt=$conectar->prepare($stmt);
        $stmt->bindParam(':nombre_pro', $nombre_pro);
        $stmt->bindParam(':detalle', $detalle);
        $stmt->bindParam(':precio_pro', $precio_pro);
        $stmt->bindParam(':categorias_idcategoria', $categorias_idcategoria);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':cod', $cod);
        $stmt->bindParam(':idProducto', $idProducto);
        $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error en la actualizacion: ' . $e->getMessage();
            return false;}
        }

    //eliminar productos
    public function eliminar_productos($idProducto){
        $conectar= parent::conexion();
        parent::set_names();
        $stmt=$conectar->prepare("DELETE FROM productos WHERE idProducto = :idProducto");
        $stmt->bindParam(':idProducto', $idProducto);
        $stmt->execute();
       // Verificar si la eliminación fue exitosa
       if ($stmt->rowCount() > 0) {
        return true; // Éxito al eliminar
    } else {
        return false; // Error al eliminar
    }
    }


   

    public function get_productos2(){
        $conectar= parent::conexion();
        parent::set_names();
        $stmt="SELECT idProducto, nombre_pro, precio_pro FROM productos";
        $stmt=$conectar->prepare($stmt);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }


    // Funcion para buscar una categoría
    public function ver_producto($buscar)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $stmt = "SELECT idProducto, nombre_pro, detalle, precio_pro, categorias_idcategoria, img, cod FROM productos WHERE idProducto LIKE :buscar";
        $stmt = $conectar->prepare($stmt);
        $buscar = '%'.$buscar.'%';
        $stmt->bindParam(':buscar', $buscar);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }


}  
?>

