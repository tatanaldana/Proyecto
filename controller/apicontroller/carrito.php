<?php
header('content-Type: aplication/json');

require_once("../../model/conexion.php");
require_once("../../model/carrito.php");
$Ventas = new Ventas();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["arc"]){

    case "Get_v_ca":
        $datos=$Ventas->get_ventas_carrito();
        echo json_encode($datos);
        break;

        case "Get_v_ca_id":
            $datos=$Ventas->get_ventas_carrito_x_id($body["id"]);
            echo json_encode($datos);
            break;

                case "Insert_v_ca_for":
                $datos=$Ventas->insert_ventas_carrito($body["forma_pago"]);
                 echo json_encode("Insert Correto");
                 break;

                    case "Update_v_ca_for":
                    $datos=$Ventas->update_ventas_carrito($body["id"],$body["forma_pago"]);
                    echo json_encode("Update Correto");
                    break;

                    case "Eliminar_v_ca_id":
                        $datos = $Ventas->eliminar_ventas_carrito($body["id"]);
                        echo json_encode("Eliminacion Correcta");
                        break;  

                        case "Estado1":
                            $datos = $Ventas->cambiar_estado1($body["id"]);
                            echo json_encode("Cambio Correcto");
                            break;
                    
                            case "Estado2":
                                $datos = $Ventas->cambiar_estado2($body["idcarrito"]);
                                echo json_encode("Cambio Correcto");
                                break;

}
?>