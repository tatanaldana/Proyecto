<?php
$conexion= new mysqli("localhost", "root", "", "arca");
//Comproprobar conexion
if(mysqli_connect_errno())
{
    printf("fallo la conexion");
}
else{
    //printf("Estas conectado");
}
?>