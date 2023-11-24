

<?php

require_once "conexion.php";

class categorias extends Conexion
{

    //Funcion para mostrar categoria en pantalla
    public function get_categorias()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM categorias";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //funcion que busca determinado producto con id
    public function get_categorias_x_id($id_categoria)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM categorias WHERE id_categoria = :id_categoria";
        $sql = $conectar->prepare($sql);
        $sql->bindParam(':id_categoria', $id_categoria);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    //Ingresar categoria
    public function insert_categorias($nombre_cat, $estado)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO categorias(id_categoria,nombre_cat,estado) VALUES (NULL,:id_categoria,:nombre_cat,:estado);";
        $sql = $conectar->prepare($sql);
        $sql->bindParam(':nombre_cat', $nombre_cat);
        $sql->bindParam(':estado', $estado);

        $sql->execute();


        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //actualizar categoria
    public function update_categorias($nombre_cat, $estado)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = " UPDATE categorias set
        nombre_cat = :nombre_cat,
        estado = :estado,
        WHERE
        id_categoria =:id_categoria";
        $sql = $conectar->prepare($sql);
        $sql->bindParam(':nombre_cat', $nombre_cat);
        $sql->bindParam(':estado', $estado);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //eliminar categoria
    public function eliminar_categorias($id_categoria)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "DELETE FROM categorias WHERE id_categoria = :id_categoria";
        $sql = $conectar->prepare($sql);
        $sql->bindParam(':id_categoria', $id_categoria);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

