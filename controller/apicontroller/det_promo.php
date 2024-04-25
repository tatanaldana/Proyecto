<?php
header('content-Type: aplication/json');

require_once("../../model/conexion.php");
require_once("../../model/det_promo.php");
$Promo = new Det_promo();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["arc"]){

    case "Get_det_promo":
        $datos=$Promo->get_promo();
        echo json_encode($datos);
        break;

        case "Get_Id_det_promo":
            $datos=$Promo->
            
            echo json_encode($datos);
            break;

                case "Insert_det_promo":
                $datos=$Promo->insert_promo($body["nom_prod"],$body["pre_prod"],$body["cantidad"],$body["descuento"],$body["subtotal"],$body["total"],$body["promocion_idpromo"]);
                 echo json_encode("Insert Correto");
                 break;

                    case "Update_det_promo":
                    $datos=$Promo->update_promo($body["idpromo"],$body["nom_prod"],$body["pre_prod"],$body["cantidad"],$body["descuento"],$body["subtotal"],$body["total"]);
                    echo json_encode("Update Correto");
                    break;

                    case "Eliminar_Id_det_promo":
                        $datos = $Promo->eliminar_promo($body["idpromo"]);
                        echo json_encode("Eliminacion Correcta");
                        break;  

}
?>