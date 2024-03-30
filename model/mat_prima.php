<?php
  require_once('conexion.php');
  
class Mat_prima extends Conexion{

    public function get_mat_prima(){
        $conectar= parent::conexion();
        parent::set_names();
        $stmt ="SELECT * FROM mat_pri";
        $stmt =$conectar->prepare($stmt);
        $stmt ->execute();
        $resultado=$stmt ->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
    
    public function get_mat_prima_x_cod($cod_materia_pri){
        $conectar= parent::conexion();
        parent::set_names();
        $stmt ="SELECT * FROM mat_pri WHERE cod_materia_pri = :cod_materia_pri";
        $stmt =$conectar->prepare($stmt );
        $stmt ->bindParam(':cod_materia_pri', $cod_materia_pri);
        $stmt ->execute();
        $resultado=$stmt ->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function insert_mat_prima( $referencia, $descripcion, $existencia, $entrada, $salida, $stock) {
        try {
            $conectar = parent::conexion();
            parent::set_names();

            $stmt = "INSERT INTO mat_pri (referencia, descripcion, existencia, entrada, salida, stock) 
                    VALUES (:referencia, :descripcion, :existencia, :entrada, :salida, :stock)";
            $stmt = $conectar->prepare($stmt);
            //$stmt->bindParam(':cod_materia_pri', $cod_materia_pri);
            $stmt->bindParam(':referencia', $referencia);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':existencia', $existencia);
            $stmt->bindParam(':entrada', $entrada);
            $stmt->bindParam(':salida', $salida);
            $stmt->bindParam(':stock', $stock);
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


    

    
    public function update_mat_prima($cod_materia_pri,$referencia,$descripcion,$existencia,$entrada,$salida,$stock){

        try{
        $conectar= parent::conexion();
        parent::set_names();
        $stmt =" UPDATE mat_pri SET
        referencia = :referencia,
        descripcion = :descripcion,
        existencia = :existencia,
        entrada = :entrada,
        salida = :salida,
        stock = :stock
        WHERE
        cod_materia_pri = :cod_materia_pri";
        $stmt =$conectar->prepare($stmt );
        $stmt ->bindParam(':referencia', $referencia);
        $stmt ->bindParam(':descripcion', $descripcion);
        $stmt ->bindParam(':existencia', $existencia);
        $stmt ->bindParam(':entrada', $entrada);
        $stmt ->bindParam(':salida', $salida);
        $stmt ->bindParam(':stock', $stock);
        $stmt ->bindParam(':cod_materia_pri', $cod_materia_pri);
        $stmt ->execute();
        }catch (PDOException $e) {
            echo 'Error en la actualizacion: ' . $e->getMessage();
            return false;}
    }
    

    public function eliminar_mat_prima($cod_materia_pri) {
        $conectar = parent::conexion();
        parent::set_names();
        $stmt = $conectar->prepare("DELETE FROM mat_pri WHERE cod_materia_pri = :cod_materia_pri");
        $stmt->bindParam(':cod_materia_pri', $cod_materia_pri);
        $stmt->execute();
        
        // Verificar si la eliminación fue exitosa
        if ($stmt->rowCount() > 0) {
            return true; // Éxito al eliminar
        } else {
            return false; // Error al eliminar
        }
    }

    // Funcion para buscar una materia prima
public function ver_mat_pri($buscar)
{
    $conectar = parent::conexion();
    parent::set_names();
    $stmt = "SELECT cod_materia_pri,referencia,descripcion,existencia,entrada,salida,stock FROM mat_pri WHERE cod_materia_pri LIKE :buscar";
    $stmt = $conectar->prepare($stmt);
    $buscar = '%'.$buscar.'%';
    $stmt->bindParam(':buscar', $buscar);
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
}

}  
?>