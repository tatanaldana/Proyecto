<?php
header('content-Type: aplication/json');

require_once("../../model/conexion.php");
require_once("../../model/categorias.php");
$Categorias = new Categorias();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["arc"]){

    case "Get_cat":
        $datos=$Categorias->get_categorias();
        echo json_encode($datos);
        break;

        case "Get_cat_Id":
            $datos=$Categorias->get_categorias_x_id($body["id_categoria"]);
            echo json_encode($datos);
            break;

                case "Insert_cat":
                $datos=$Categorias->insert_categorias($body["nombre_cat"]);
                 echo json_encode("Insert Correto");
                 break;

                    case "Update_cat":
                    $datos=$Categorias->update_categorias($body["id_categoria"],$body["nombre_cat"]);
                    echo json_encode("Update Correto");
                    break;

                    case "Eliminar_cat_Id":
                        $datos = $Categorias->eliminar_categorias($body["id_categoria"]);
                        echo json_encode("Eliminacion Correcta");
                        break;  

}
?>