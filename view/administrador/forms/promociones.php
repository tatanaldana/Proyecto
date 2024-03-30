<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administrador - Clientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../public/css/bootstrap.css">
    <!-- Font Awesome: para los iconos -->
    <link rel="stylesheet" href="../../public/css/font-awesome.min.css">
    <!-- Sweet Alert: alertas JavaScript presentables para el usuario  -->
    <link rel="stylesheet" href="../../public/css/sweetalert.css">
    <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
    <link rel="stylesheet" href="../../public/css/style.css">
  </head>
  <body>
  <?php

require_once("../../model/conexion.php");

  include '../include/header.php';
  ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
    <li class="breadcrumb-item"><a href="../gestion.php">Gestion</a></li>
    <li class="breadcrumb-item active" aria-current="page">Promociones</li>
  </ol>
</nav>
<!-- Formulario de búsqueda -->
<form id="formmostrar">
    <div class="container">
        <div class="contenedor-busqueda" id="contenedor-busqueda">
            <div class="mx-auto " style="width:332px">
            
                <div class="input-group">
                    <input type="search" class="form-control rounded" placeholder="Ingrese codigo de materia prima " aria-label="Buscar" 
                    aria-describedby="search-addon" name="buscar" id="buscar"required/>
                    <div class="d-flex justify-content-around">
                    
                    <button type="button" class="btn btn-primary my-3" name="btnbuscar" id="btnbuscar">Buscar</button>

                </div>
            </div>
        </div>
    </div>
</form>


<!-- Espacio en blanco -->
<div class="my-5"></div> 

<!-- Contenedor de la tabla -->
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="row">
            <div class="col-md-12 table-responsive">
                <!-- Tabla de productos -->
                <table class="table table-bordered border-primary" style="text-align:center">
                    <thead>
                        <tr>
                            <th colspan="8" scope="col" style="text-align:center"> materia prima</th> <!-- Encabezado de la tabla -->
                        </tr>
                        <tr>
                            <th scope="col">seleccionar</th> <!-- Encabezado de la columna -->
                            <th scope="col">codigo</th><!-- Encabezado de la columna -->
                            <th scope="col">referencia</th> <!-- Encabezado de la columna -->
                            <th scope="col">descripcion</th> <!-- Encabezado de la columna -->
                            <th scope="col">existencia</th> <!-- Encabezado de la columna -->
                            <th scope="col">entrada</th> <!-- Encabezado de la columna -->
                            <th scope="col">salida</th> <!-- Encabezado de la columna -->
                            <th scope="col">stock</th> <!-- Encabezado de la columna -->
                        </tr>
                    </thead>
                    <tbody id="filasTabla"></tbody> <!-- Cuerpo de la tabla -->
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Contenedor de botones de acción -->
<div class="container">
    <div class="d-flex justify-content-around">
        <div class="row">
            <!-- Tabla de botones -->
            <table class="table-responsive">                    
                <tr>
                    <td><a href="../forms/maPrima/form_registro.php" class="btn btn-primary" id="addButton">Agregar</a></td>
                    <td><a class="btn btn-primary" id="viewButton">Visualizar</a></td>
                    <td><a class="btn btn-primary ms-3" id="editButton">Editar</a></td>
                    <td><button class="btn btn-danger delete-button ms-3" id="deleteButton">Eliminar</button></td>
                </tr> 
            </table>
        </div>
    </div>
</div>






<?php 
   
    
   
    include '../include/img_menu.php';

    include '../include/footer.php';
  ?> 

    </body>
</html>

<script src="../../public/js/jquery.js"></script>

<script src="../../public/js/sweetalert.min.js"></script>
<!-- Js usuarios -->
<script src="../../public/js/promociones.js"></script>

<script src="../../public/js/buttons.js"></script>
