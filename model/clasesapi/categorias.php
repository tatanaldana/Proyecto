

<?php

require_once "conexion.php";

class categorias extends Conectar
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
        $sql = "SELECT * FROM categorias WHERE id_categoria = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_categoria);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    //Ingresar categoria
    public function insert_categorias($nombre_cat, $estado)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO categorias(id_categoria,nombre_cat,,estado) VALUES (NULL,?,?,?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre_cat);
        $sql->bindValue(3, $estado);

        $sql->execute();


        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //actualizar categoria
    public function update_categorias($nombre_cat, $estado)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = " UPDATE categorias set
        nombre_cat = ?,
        estado = ?,
        WHERE
        id_categoria =?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre_cat);
        $sql->bindValue(3, $estado);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //eliminar categoria
    public function eliminar_categorias($instru_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "DELETE FROM categorias WHERE id_categoria = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $instru_id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

