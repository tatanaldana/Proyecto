<?php
$nombre_cat=$_POST['nombre_cat'];

if(empty($nombre_cat)){

    echo'error_1';// un campo esta vacio y es obligatorio

}else{
    try{
        //inclimos la clase categorias
        require_once('../../model/categorias.php');

        #creamos un objeto de la clase de  la categorias
        $categorias= new Categorias();

        #llamamos al metodo categorias para validar los datos de la base de datos 
        $categorias->insert_categorias($nombre_cat);
    }catch(PDOException $e){
        echo 'error en el registro';
    }
}


?>