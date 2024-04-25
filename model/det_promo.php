<?php

require_once('conexion.php');
require_once('APIRest.php');

class Det_promo extends Conexion{
    use Rutasapi;
    //se obtiene todos los registros de la tabla det_prom
    public function get_promo(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM det_promo";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
//Se obtiene el detalle de una promoción.
    public function get_promo_x_idpromo($idpromo){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM det_promo WHERE idpromo = :idpromo";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':idpromo', $idpromo);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
//se inserta el detalle de la promoción
public function insert_promo($cantidad, $descuento, $subtotal, $total,$promocion_idpromo) {
    try {
        $conectar = parent::conexion();
        parent::set_names();
        
        $sql = "INSERT INTO det_promo(cantidad, descuento, subtotal, promocion_idpromo) VALUES (:nom_prod, :pre_prod, :cantidad, :descuento, :subtotal, :promocion_idpromo)";
        
        $stmt = $conectar->prepare($sql);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':descuento', $descuento);
        $stmt->bindParam(':subtotal', $subtotal);  
        $stmt->bindParam(':promocion_idpromo', $promocion_idpromo);      
        $stmt->execute();
        
        // No necesitas usar fetchAll aquí, ya que no estás obteniendo resultados de una consulta SELECT
        // Solo necesitas devolver un booleano indicando si la inserción fue exitosa
        return true;
    } catch (PDOException $e) {
        // Si ocurre algún error durante la inserción, puedes manejarlo aquí
        // Por ejemplo, puedes imprimir el mensaje de error y devolver false
        echo "Error al insertar detalle de promoción: " . $e->getMessage();
        return false;
    }
}
public function update_or_insert_detalle($idPromo, $nom_prod, $pre_prod, $cantidad, $descuento, $subtotal) {
    $conectar = parent::conexion();
    try {
        parent::set_names();
        // Verificar si el producto ya existe en el detalle de la promoción
        $sql = "SELECT COUNT(*) FROM det_promo WHERE promocion_idpromo = :idPromo AND nom_prod = :nom_prod";
        $sql = $conectar->prepare($sql);
        $sql->bindParam(':idPromo', $idPromo);
        $sql->bindParam(':nom_prod', $nom_prod);
        $sql->execute();
        $existe_producto = $sql->fetchColumn();

        if ($existe_producto) {
            // Si el producto existe, actualizar los datos
            $sql = "UPDATE det_promo SET pre_prod = :pre_prod, cantidad = :cantidad, descuento = :descuento, subtotal = :subtotal WHERE promocion_idpromo = :idPromo AND nom_prod = :nom_prod";
        } else {
            // Si el producto no existe, insertar nuevos datos
            $sql = "INSERT INTO det_promo (promocion_idpromo, nom_prod, pre_prod, cantidad, descuento, subtotal) VALUES (:idPromo, :nom_prod, :pre_prod, :cantidad, :descuento, :subtotal)";
        }

        // Ejecutar la consulta
        $sql = $conectar->prepare($sql);
        $sql->bindParam(':idPromo', $idPromo);
        $sql->bindParam(':nom_prod', $nom_prod);
        $sql->bindParam(':pre_prod', $pre_prod);
        $sql->bindParam(':cantidad', $cantidad);
        $sql->bindParam(':descuento', $descuento);
        $sql->bindParam(':subtotal', $subtotal);
        $sql->execute();
        
        return true;
    } catch (PDOException $e) {
        echo 'Error en la actualización o inserción del detalle de la promoción: ' . $e->getMessage();
        return false;
    }
}

public function eliminar_productos_faltantes($idPromo, $productosActualizados) {
    $conectar = parent::conexion();
    try {
        parent::set_names();
        // Eliminar los productos faltantes
        $sql = "DELETE FROM det_promo WHERE promocion_idpromo = :idPromo AND nom_prod NOT IN ('" . implode("','", $productosActualizados) . "')";
        $sql = $conectar->prepare($sql);
        $sql->bindParam(':idPromo', $idPromo);
        $sql->execute();

        return true;
    } catch (PDOException $e) {
        echo 'Error al eliminar productos faltantes del detalle de la promoción: ' . $e->getMessage();
        return false;
    }
}
//Se elimina una el detalle de una promoción.
    public function eliminar_promo($idpromo){
        try {
        $conectar= parent::conexion();
        parent::set_names();
        $sql="DELETE FROM det_promo WHERE promocion_idpromo = :idpromo";
        $sql=$conectar->prepare($sql);
        $sql->bindParam(':idpromo', $idpromo);
        $sql->execute();
        return true;
    }catch (PDOException $e) {
        echo 'Error al eliminar productos faltantes del detalle de la promoción: ' . $e->getMessage();
        return false;
    }
}

    public function detalle_promo($promocion_idpromo){
        try {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT u.idPromo, u.nom_prod, u.pre_prod, u.cantidad, u.descuento, u.subtotal, u.promocion_idpromo,
                    cv.id_promo, cv.nom_promo, cv.totalpromo 
                    FROM det_promo AS u 
                    JOIN promocion AS cv ON u.promocion_idpromo = cv.id_promo 
                    WHERE u.promocion_idpromo = :promocion_idpromo";
            $sql = $conectar->prepare($sql);
            $sql->bindParam(':promocion_idpromo', $promocion_idpromo);
            $sql->execute();
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (PDOException $e) {
            // Si ocurre algún error durante la ejecución de la consulta, puedes manejarlo aquí
            // Por ejemplo, puedes imprimir el mensaje de error y devolver un array vacío o null
            echo "Error al obtener detalle de promoción: " . $e->getMessage();
        }  
    }
}
?>