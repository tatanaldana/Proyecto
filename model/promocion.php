<?php

require_once('conexion.php');

class Promocion extends Conexion
{


    public function get_promocion()
    {
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM promocion";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function get_promocion_x_id($id_promo)
    {
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM promocion WHERE id_promo = :id_promo";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':id_promo', $id_promo);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_promocion($nom_promo, $totalpromo)
    {
        try {
            $conectar = parent::conexion();
            parent::set_names();
    
            $stmt = "INSERT INTO promocion(nom_promo, totalpromo, categorias_idcategoria) VALUES (:nom_promo, :totalpromo, 3);";
            $stmt = $conectar->prepare($stmt);
            $stmt->bindParam(':nom_promo', $nom_promo);
            $stmt->bindParam(':totalpromo', $totalpromo);
            $stmt->execute();
    
            // Obtener el ID del registro insertado
            $idpromo = $conectar->lastInsertId();
    
            if ($idpromo) {
                // La inserción se realizó correctamente
                return $idpromo;
            } else {
                // La inserción no tuvo éxito
                echo "Error: No se pudo insertar el registro en la promocion.";
                return false;
            }
        } catch (PDOException $e) {
            echo 'Error en el registro: ' . $e->getMessage();
            return false;
        }
    }
    
    
    public function update_promocion($nom_promo, $totalpromo, $id_promo)
    {
        try {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE promocion SET
                    nom_promo = :nom_promo,
                    totalpromo = :totalpromo
                    WHERE
                    id_promo = :id_promo";
            $sql = $conectar->prepare($sql);
            $sql->bindParam(':nom_promo', $nom_promo);
            $sql->bindParam(':totalpromo', $totalpromo);
            $sql->bindParam(':id_promo', $id_promo);
            $sql->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Error en la actualización de la promoción: ' . $e->getMessage();
            return false;
        }
    }

    //eliminar productos
    public function eliminar_promocion($id_promo){
        $conectar= parent::conexion();
        parent::set_names();
        $stmt=$conectar->prepare("DELETE FROM promocion WHERE id_promo = :id_promo");
        $stmt->bindParam(':id_promo', $id_promo);
        $stmt->execute();
       // Verificar si la eliminación fue exitosa
       if ($stmt->rowCount() > 0) {
        return true; // Éxito al eliminar
    } else {
        return false; // Error al eliminar
    }
    }




    // Funcion para buscar una promocion
    public function ver_promocion($buscar)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $stmt = "SELECT id_promo, nom_promo, totalpromo, categorias_idcategoria FROM promocion WHERE id_promo LIKE :buscar";
        $stmt = $conectar->prepare($stmt);
        $buscar = '%'.$buscar.'%';
        $stmt->bindParam(':buscar', $buscar);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }




}  
?>


