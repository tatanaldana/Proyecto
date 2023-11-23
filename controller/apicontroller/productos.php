<?php

header('content-Type: aplication/json');
require_once("../../model/conexion.php");
require_once("../../model/productos.php");

$productos = new Productos();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){

    case "GetAll":
        $datos=$productos->get_productos();
        echo json_encode($datos);
        break;

        case "GetId":
            $datos=$productos->get_productos_x_id($body["idProducto"]);
            echo json_encode($datos);
            break;

                case "Insert":
                $datos=$productos->insert_productos($body["nombre_pro"],$body["detalle"],$body["precio_pro"],$body["categorias_idcategoria"],$body["cod"]);
                 echo json_encode("Insert Correto");
                 break;

                    case "Update":
                    $datos=$productos->update_productos($body["idProducto"],$body["nombre_pro"],$body["detalle"],$body["precio_pro"],$body["categorias_idcategoria"],$body["cod"]);
                    echo json_encode("Update Correto");
                    break;

                    case "EliminarId":
                        $datos = $productos->eliminar_productos($body["idProducto"]);
                        echo json_encode("Eliminacion Correcta");
                        break;

}
?>