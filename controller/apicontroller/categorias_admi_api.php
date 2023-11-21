<?php
header('content-Type: aplication/json');

require_once("../view/administrador/crud/conexion.php");
require_once("../view/administrador/gestion/categorias/categoriasapi.php");
$Categorias = new Categorias();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){

    case "GetAll":
        $datos=$Categorias->get_categorias();
        echo json_encode($datos);
        break;

        case "GetId":
            $datos=$Categorias->get_categorias_x_id($body["id_categoria"]);
            echo json_encode($datos);
            break;

                case "Insert":
                $datos=$Categorias->insert_categorias($body["id_categoria"],$body["nombre_cat"]);
                 echo json_encode("Insert Correto");
                 break;

                    case "Update":
                    $datos=$Categorias->update_categorias($body["id_categoria"],$body["nombre_cat"]);
                    echo json_encode("Update Correto");
                    break;

                    case "EliminarId":
                        $datos = $Categorias->eliminar_categorias($body["id_categoria"]);
                        echo json_encode("Eliminacion Correcta");
                        break;  

}
?>