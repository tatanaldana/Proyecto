<?php

$doc=$_POST['doc_php'];


if(!empty($doc)){
    # Incluimos la clase usuario
    require_once('../../model/usuario.php');

    # Creamos un objeto de la clase usuario
    $usuario = new Usuario();

    # Llamamos una variable para guardar el resultado de la busqueda, para luego pasarlos a JSON y poderlos enviar al formulario de editar
    $usuario -> delete_usuario($doc);

}

  ?>