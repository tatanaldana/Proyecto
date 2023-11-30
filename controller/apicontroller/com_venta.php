<?php
header('content-Type: aplication/json');

require_once("../../model/conexion.php");
require_once("../../model/com_venta.php");
$Com_venta = new Com_venta();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["arc"]){

    case "Get_com_venta":
        $datos=$Com_venta->get_venta();
        echo json_encode($datos);
        break;

        case "Get_Id_com_venta":
            $datos=$Com_venta->get_venta_por_doc($body["doc_cliente"]);
            echo json_encode($datos);
            break;

                case "Insert_com_venta":
                $datos=$Com_venta->registroVenta($body["doc_cliente"],$body["fechaventa"], $body["producto"],$body["precio"], $body["cantidad"], $body["subtotal"], $body["totalventa"], $body["carrito_idcarrito"], $body["estado"]);
                 echo json_encode("Insert Correto");
                 break;

                    case "Eliminar_com_Venta":
                        $datos = $Com_venta->delete_venta($body["doc_cliente"]);
                        echo json_encode("Eliminado correctamente");
                        break;  

                        case "Update_Estado_1":
                            $datos = $Com_venta->upgrade_venta($body["doc_cliente"]);
                            echo json_encode("Enviado");
                            break;  

}
?>