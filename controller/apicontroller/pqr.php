<?php
header('content-Type: aplication/json');

require_once("../../model/conexion.php");
require_once("../../model/pqr.php");
$pqr = new pqr();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["arc"]){

    case "Get_pqr":
        $datos=$pqr->get_pqr();
        echo json_encode($datos);
        break;

        case "Get_Id_pqr":
            $datos=$pqr->get_id_pqr($body["estado"]);
            echo json_encode($datos);
            break;

            case "Insert_pqr":
                $datos=$pqr->insert_pqr($body["sugerencia"],$body["tipo_sugerencia"], $body["fecha_pqr"],$body["estado"], $body["usuarios_id"]);
                echo json_encode("Insert Correto");
                break;

                case "Eliminar_Id_pqr":
                    $datos = $pqr->delete_pqr($body["id"]);
                    echo json_encode("Eliminado correctamente");
                    break;  

                    case "Update_Estado_1_pqr":
                        $datos = $pqr->upgrade_pqr($body["id"]);
                        echo json_encode("Enviado");
                        break;  

}
?>