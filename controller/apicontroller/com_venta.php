<?php
header('content-Type: aplication/json');

require_once("../../model/conexion.php");
require_once("../../model/com_venta.php");
$Com_venta = new Com_venta();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){

    case "GetAll":
        $datos=$Com_venta->get_venta();
        echo json_encode($datos);
        break;

        case "GetId":
            $datos=$Com_venta->get_venta_por_doc($body["doc_cliente"]);
            echo json_encode($datos);
            break;

                case "Insert":
                $datos=$Com_venta->registroVenta($body["doc_cliente"],$body["fecha_venta"], $body["producto"],$body["precio"], $body["cantidad"], $body["subtotal"], $body["totalventa"], $body["carrito_idcarrito"], $body["estado"]);
                 echo json_encode("Insert Correto");
                 break;

                    case "EliminarVenta":
                        $datos = $Com_venta->delete_venta($body["carrito_idcarrito"]);
                        echo json_encode("Eliminado correctamente");
                        break;  

                        case "UpdateEstado_1":
                            $datos = $Com_venta->upgrade_venta($body["carrito_idcarrito"]);
                            echo json_encode("Enviado");
                            break;  

}
?>