<?php
header('content-Type: aplication/json');

require_once("../../model/conexion.php");
require_once("../../model/provee.php");
$provee = new provee();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){

    case "GetAll":
        $datos=$provee->get_provee();
        echo json_encode($datos);
        break;

        case "GetId":
            $datos=$provee->get_provee_x_idproveedor($body["idproveedor"]);
            echo json_encode($datos);
            break;

            case "Insert":
                $datos=$provee->insert_provee($body["nom_proveedor"], $body["telefono_proveedor"],$body["direccion_proveedor"]);
                echo json_encode("Insert Correto");
                break;

                    case "Update":
                        $datos=$provee->update_provee($body["idproveedor"],$body["nom_proveedor"], $body["telefono_proveedor"],$body["direccion_proveedor"]);
                         echo json_encode("Insert Correto");
                        break;
                
                            case "DeleteId":
                                $datos = $provee->delete_provee($body["idproveedor"]);
                                echo json_encode("Eliminado correctamente");
                                break;  

                       

}
?>