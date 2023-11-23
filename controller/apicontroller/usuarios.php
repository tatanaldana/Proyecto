<?php
header('content-Type: aplication/json');

require_once("../../model/conexion.php");
require_once("../../model/usuario.php");
$Usuarios = new Usuario();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){

    case "GetAll":
        $datos=$Usuarios->get_usuario();
        echo json_encode($datos);
        break;

        case "GetId":
            $datos=$Usuarios->get_usuario_por_doc($body["doc"]);
            echo json_encode($datos);
            break;

                case "Insert":
                $datos=$Usuarios->registroUsuario($body["doc"],$body["nombre"],$body["apellido"],$body["tipo_doc"],$body["clave"],$body["tel"],$body["email"],$body["fecha_naci"],$body["genero"],$body["direccion"],$body["fecha_reg"]);
                 echo json_encode("Insert Correto");
                 break;

                    case "Update":
                    $datos=$Usuarios->editarUsuario($body["id"],$body["nombre"],$body["apellido"],$body["clave"],$body["tel"],$body["email"],$body["fecha_naci"],$body["genero"],$body["direccion"]);
                    echo json_encode("Update Correto");
                    break;

                    case "DeleteDoc":
                        $datos = $Usuarios->delete_usuario($body["doc"]);
                        echo json_encode("Eliminacion Correcta");
                        break;

                        case "actuser":
                            $datos = $Usuarios->active_usuario($body["doc"]);
                            echo json_encode("Cambio Correcto");
                            break;


}
?>