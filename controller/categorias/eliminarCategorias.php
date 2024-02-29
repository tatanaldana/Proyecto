<?php

$id_categoria=$_POST['id_categoria'];


if(empty($id_categoria)){
    # Incluimos la clase  categorias
    require_once('../../model/categorias.php');

    # Creamos un objeto de la clase categorias
    $categorias = new Categorias();

    # Llamamos una variable para guardar el resultado de la busqueda, para luego pasarlos a JSON y poderlos enviar al formulario de editar
    $categorias ->eliminar_categorias($id_categoria);

}

  ?>

