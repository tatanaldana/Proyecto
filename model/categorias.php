<?php

require_once "conexion.php";

class Categorias extends Conexion
{
    //Funcion para mostrar categorias en pantalla
    public function get_categorias()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM categorias";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    // Funcion para buscar una categoría por su ID
    public function get_categorias_x_id($id_categoria)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM categorias WHERE id_categoria = :id_categoria";
        $sql = $conectar->prepare($sql);
        $sql->bindParam(':id_categoria', $id_categoria);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    // Funcion para insertar una nueva categoría
    public function insert_categorias($nombre_cat)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO categorias(nombre_cat) VALUES (:nombre_cat)";
        $sql = $conectar->prepare($sql);
        $sql->bindParam(':nombre_cat', $nombre_cat);
        $sql->execute();
        return "Insert Correcto";
    }

    // Funcion para actualizar una categoría existente
    public function update_categorias($id_categoria,$nombre_cat)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE categorias SET nombre_cat = :nombre_cat WHERE id_categoria = :id_categoria";
        $sql = $conectar->prepare($sql);
        $sql->bindParam(':nombre_cat', $nombre_cat);
        $sql->bindParam(':id_categoria', $id_categoria);
        $sql->execute();
        return "Update Correcto";
    }

    // Funcion para eliminar una categoría
    public function eliminar_categorias($id_categoria)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "DELETE FROM categorias WHERE id_categoria = :id_categoria";
        $sql = $conectar->prepare($sql);
        $sql->bindParam(':id_categoria', $id_categoria);
        $sql->execute();
        return "Eliminacion Correcta";
    }


   // Funcion para buscar una categoría
public function ver_categoria($buscar)
{
    $conectar = parent::conexion();
    parent::set_names();
    $stmt = "SELECT id_categoria, nombre_cat FROM categorias WHERE id_categoria LIKE :buscar";
    $stmt = $conectar->prepare($stmt);
    $buscar = '%'.$buscar.'%';
    $stmt->bindParam(':buscar', $buscar);
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
}
}
    
  
?>


