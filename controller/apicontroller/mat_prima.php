<?php
header('content-Type: aplication/json');

require_once("../../model/conexion.php");
require_once("../../model/mat_prima.php");
$Mat_prima = new Mat_prima();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["arc"]){

    case "GetA_mat_prima":
        $datos=$Mat_prima->get_mat_prima();
        echo json_encode($datos);
        break;

        case "Get_mat_prima_Id":
            $datos=$Mat_prima->get_mat_prima_x_cod($body["cod"]);
            echo json_encode($datos);
            break;

                case "Insert_mat_prima":
                $datos=$Mat_prima->insert_mat_prima($body["cod"],$body["referencia"],$body["descripcion"],$body["existencia"],$body["entrada"],$body["salida"],$body["stock"]);
                 echo json_encode("Insert Correto");
                 break;

                    case "Update_mat_prima":
                    $datos=$Mat_prima->update_mat_prima($body["cod"],$body["referencia"],$body["descripcion"],$body["existencia"],$body["entrada"],$body["salida"],$body["stock"]);
                    echo json_encode("Update Correto");
                    break;

                    case "Eliminar_Id_mat_prima":
                        $datos = $Mat_prima->eliminar_mat_prima($body["cod"]);
                        echo json_encode("Eliminacion Correcta");
                        break;  

}
?>