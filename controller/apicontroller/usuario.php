<?php
header('content-Type: aplication/json');

require_once("../../model/conexion.php");
require_once("../../model/usuario.php");
$Usuarios = new Usuario();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["arc"]){

    case "Get_user":
        $datos=$Usuarios->get_usuario();
        echo json_encode($datos);
        break;

        case "Get_Id_user":
            $datos=$Usuarios->get_usuario_por_doc($body["doc"]);
            echo json_encode($datos);
            break;

                case "Insert_user":
                $datos=$Usuarios->registroUsuario($body["nombre"],$body["email"],$body["clave"],$body["tel"],$body["apellido"],$body["genero"],$body["fecha_naci"],$body["tipo_doc"],$body["doc"],$body["fecha_reg"],$body["direccion"]);
                 echo json_encode("Insert Correto");
                 break;

                    case "Update_user":
                    $datos=$Usuarios->editarUsuario($body["doc"],$body["email"],$body["tel"],$body["genero"],$body["direccion"]);
                    echo json_encode("Update Correto");
                    break;

                    case "Delete_Doc_user":
                        $datos = $Usuarios->delete_usuario($body["doc"]);
                        echo json_encode("Eliminacion Correcta");
                        break;

                        case "Down_user":
                            $datos = $Usuarios->down_usuario($body["doc"]);
                            echo json_encode("Cambio Correcto");
                            break;

                        case "Activa_user":
                            $datos = $Usuarios->active_usuario($body["doc"]);
                            echo json_encode("Cambio Correcto");
                            break;


}
?>