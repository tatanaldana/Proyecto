<?php
header('content-Type: aplication/json');

require_once("../../model/conexion.php");
require_once("../../model/promo.php");
$Promocion = new Promocion();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){

    case "GetAll":
        $datos=$Promocion->get_promocion();
        echo json_encode($datos);
        break;

        case "GetId":
            $datos=$Promocion->get_promocion_x_id($body["id_promo"]);
            echo json_encode($datos);
            break;

                case "Insert":
                $datos=$Promocion->insert_promocion($body["nom_promo"],$body["totalpromo"],$body["categorias_idcategoria"]);
                 echo json_encode("Insert Correto");
                 break;

                    case "Update":
                    $datos=$Promocion->update_promocion($body["id_promo"],$body["nom_promo"],$body["totalpromo"],$body["categorias_idcategoria"]);
                    echo json_encode("Update Correto");
                    break;

                    case "EliminarId":
                        $datos = $Promocion->eliminar_promocion($body["id_promo"]);
                        echo json_encode("Eliminacion Correcta");
                        break;  

}
?>

<?php
header('content-Type: aplication/json');

require_once("../view/administrador/crud/conexion.php");
require_once("../view/administrador/gestion/crud_promocion/promoapi.php");
$Promo = new Det_promo();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){

    case "Get_All":
        $datos=$Promo->get_promo();
        echo json_encode($datos);
        break;

        case "Get_Id":
            $datos=$Promo->get_promo_x_idpromo($body["idpromo"]);
            echo json_encode($datos);
            break;

                case "Insert_date":
                $datos=$Promo->insert_promo($body["nom_prod"],$body["pre_prod"],$body["cantidad"],$body["descuento"],$body["subtotal"],$body["total"],$body["promocion_idpromo"]);
                 echo json_encode("Insert Correto");
                 break;

                    case "Update_date":
                    $datos=$Promo->update_promo($body["idpromo"],$body["nom_prod"],$body["pre_prod"],$body["cantidad"],$body["descuento"],$body["subtotal"],$body["total"],$body["promocion_idpromo"]);
                    echo json_encode("Update Correto");
                    break;

                    case "Eliminar_Id":
                        $datos = $Promo->eliminar_promo($body["idpromo"]);
                        echo json_encode("Eliminacion Correcta");
                        break;  

}
?>