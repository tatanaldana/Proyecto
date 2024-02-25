<?php
$conexion = mysqli_connect("localhost", "root", "Facnow123.", "arca");
//Comproprobar conexion
if(mysqli_connect_errno())
{
    printf("fallo la conexion");
}
else{
    //printf("Estas conectado");
}
?>