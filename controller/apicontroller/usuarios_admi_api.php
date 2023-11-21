<?php
header('content-Type: aplication/json');

require_once("../view/administrador/crud/conexion.php");
require_once("../view/administrador/crud/usuariosapi.php");
$Usuarios = new Usuarios();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){

    case "GetAll":
        $datos=$Usuarios->get_usuarios();
        echo json_encode($datos);
        break;

        case "GetId":
            $datos=$Usuarios->get_usuarios_x_id($body["id"]);
            echo json_encode($datos);
            break;

                case "Insert":
                $datos=$Usuarios->insert_usuarios($body["doc"],$body["nombre"],$body["apellido"],$body["tipo_doc"],$body["clave"],$body["tel"],$body["email"],$body["fecha_naci"],$body["genero"],$body["direccion"],$body["fecha_reg"]);
                 echo json_encode("Insert Correto");
                 break;

                    case "Update":
                    $datos=$Usuarios->update_usuarios($body["id"],$body["nombre"],$body["apellido"],$body["clave"],$body["tel"],$body["email"],$body["fecha_naci"],$body["genero"],$body["direccion"]);
                    echo json_encode("Update Correto");
                    break;

                    case "EliminarId":
                        $datos = $Usuarios->eliminar_usuarios($body["id"]);
                        echo json_encode("Eliminacion Correcta");
                        break;

                        case "CamUser":
                            $datos = $Usuarios->cambiar_user($body["id"]);
                            echo json_encode("Cambio Correcto");
                            break;

                            case "CamAdmi":
                                $datos = $Usuarios->cambiar_admi($body["id"]);
                                echo json_encode("Cambio Correcto");
                                break;


}
?>