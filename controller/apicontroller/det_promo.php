<?php
header('content-Type: aplication/json');

require_once("../../model/conexion.php");
require_once("../../model/det_promo.php");
$Promo = new Det_promo();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){

    case "Get_All":
        $datos=$Promo->get_det_promo();
        echo json_encode($datos);
        break;

        case "Get_Id":
            $datos=$Promo->get__det_promo_x_idpromo($body["idpromo"]);
            echo json_encode($datos);
            break;

                case "Insert_date":
                $datos=$Promo->insert_det_promo($body["nom_prod"],$body["pre_prod"],$body["cantidad"],$body["descuento"],$body["subtotal"],$body["total"],$body["promocion_idpromo"]);
                 echo json_encode("Insert Correto");
                 break;

                    case "Update_date":
                    $datos=$Promo->update_det_promo($body["idpromo"],$body["nom_prod"],$body["pre_prod"],$body["cantidad"],$body["descuento"],$body["subtotal"],$body["total"],$body["promocion_idpromo"]);
                    echo json_encode("Update Correto");
                    break;

                    case "Eliminar_Id":
                        $datos = $Promo->eliminar_det_promo($body["idpromo"]);
                        echo json_encode("Eliminacion Correcta");
                        break;  

}
?>