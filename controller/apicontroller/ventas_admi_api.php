<?php
header('content-Type: aplication/json');

require_once("../view/administrador/crud/conexion.php");
require_once("../view/administrador/crud_ventas/ventasapi.php");
$Ventas = new Ventas();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){

    case "GetAll":
        $datos=$Ventas->get_ventas_carrito();
        echo json_encode($datos);
        break;

        case "GetId":
            $datos=$Ventas->get_ventas_carrito_x_id($body["id"]);
            echo json_encode($datos);
            break;

                case "Insert":
                $datos=$Ventas->insert_ventas_carrito($body["forma_pago"]);
                 echo json_encode("Insert Correto");
                 break;

                    case "Update":
                    $datos=$Ventas->update_ventas_carrito($body["id"],$body["forma_pago"]);
                    echo json_encode("Update Correto");
                    break;

                    case "EliminarId":
                        $datos = $Ventas->eliminar_ventas_carrito($body["id"]);
                        echo json_encode("Eliminacion Correcta");
                        break;  

                        case "Estado1":
                            $datos = $Ventas->cambiar_estado1($body["id"]);
                            echo json_encode("Cambio Correcto");
                            break;
                    
                            case "Estado2":
                                $datos = $Ventas->cambiar_estado2($body["id"]);
                                echo json_encode("Cambio Correcto");
                                break;

}
?>