<?php

header('content-Type: aplication/json');
require_once("../../model/conexion.php");
require_once("../../model/productos.php");

$productos = new Productos();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["arc"]){

    case "Get_pro":
        $datos=$productos->get_productos();
        echo json_encode($datos);
        break;

        case "Get_Id_pro":
            $datos=$productos->get_productos_x_id($body["idProducto"]);
            echo json_encode($datos);
            break;

            case "Insert_pro":
                $datos=$productos->insert_productos($body["nombre_pro"],$body["detalle"],$body["precio_pro"],$body["categorias_idcategoria"],$body["cod"]);
                echo json_encode("Insert Correto");
                break;

                case "Update_pro":
                    $datos=$productos->update_productos($body["idProducto"],$body["nombre_pro"],$body["detalle"],$body["precio_pro"],$body["categorias_idcategoria"],$body["cod"]);
                    echo json_encode("Update Correto");
                    break;

                    case "Eliminar_Id_pro":
                        $datos = $productos->eliminar_productos($body["idProducto"]);
                        echo json_encode("Eliminacion Correcta");
                        break;

}
?>