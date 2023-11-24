<?php
header('content-Type: aplication/json');

require_once("../../model/conexion.php");
require_once("../../model/pqr.php");
$pqr = new pqr();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){

    case "GetAll":
        $datos=$pqr->get_pqr();
        echo json_encode($datos);
        break;

        case "GetId":
            $datos=$pqr->get_id_pqr($body["estado"]);
            echo json_encode($datos);
            break;

                case "Insert":
                $datos=$pqr->insert_pqr($body["sugerencia"],$body["tipo_sugerencia"], $body["fecha_pqr"],$body["estado"], $body["usuarios_id"]);
                 echo json_encode("Insert Correto");
                 break;

                    case "EliminarId":
                        $datos = $pqr->delete_pqr($body["id"]);
                        echo json_encode("Eliminado correctamente");
                        break;  

                        case "UpdateEstado_1":
                            $datos = $pqr->upgrade_pqr($body["id"]);
                            echo json_encode("Enviado");
                            break;  

}
?>