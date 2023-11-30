<?php
header('content-Type: aplication/json');

require_once("../../model/conexion.php");
require_once("../../model/promocion.php");
$Promocion = new Promocion();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["arc"]){

    case "Get_promocion":
        $datos=$Promocion->get_promocion();
        echo json_encode($datos);
        break;

        case "Get_Id_promocion":
            $datos=$Promocion->get_promocion_x_id($body["id_promo"]);
            echo json_encode($datos);
            break;

                case "Insert_promocion":
                $datos=$Promocion->insert_promocion($body["nom_promo"],$body["totalpromo"],$body["categorias_idcategoria"]);
                 echo json_encode("Insert Correto");
                 break;

                    case "Update_promocion":
                    $datos=$Promocion->update_promocion($body["id_promo"],$body["nom_promo"],$body["totalpromo"],$body["categorias_idcategoria"]);
                    echo json_encode("Update Correto");
                    break;

                    case "Eliminar_Id_promocion":
                        $datos = $Promocion->eliminar_promocion($body["id_promo"]);
                        echo json_encode("Eliminacion Correcta");
                        break;  

}
?>

