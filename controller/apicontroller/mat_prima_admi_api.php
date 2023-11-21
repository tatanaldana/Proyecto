<?php
header('content-Type: aplication/json');

require_once("../view/administrador/crud/conexion.php");
require_once("../view/administrador/gestion/ma_prima/mat_primaapi.php");
$Mat_prima = new Mat_prima();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){

    case "GetAll":
        $datos=$Mat_prima->get_mat_prima();
        echo json_encode($datos);
        break;

        case "GetId":
            $datos=$Mat_prima->get_mat_prima_x_cod($body["cod"]);
            echo json_encode($datos);
            break;

                case "Insert":
                $datos=$Mat_prima->insert_mat_prima($body["cod"],$body["referencia"],$body["descripcion"],$body["existencia"],$body["entrada"],$body["salida"],$body["stock"]);
                 echo json_encode("Insert Correto");
                 break;

                    case "Update":
                    $datos=$Mat_prima->update_mat_prima($body["cod"],$body["referencia"],$body["descripcion"],$body["existencia"],$body["entrada"],$body["salida"],$body["stock"]);
                    echo json_encode("Update Correto");
                    break;

                    case "EliminarId":
                        $datos = $Mat_prima->eliminar_mat_prima($body["cod"]);
                        echo json_encode("Eliminacion Correcta");
                        break;  

}
?>