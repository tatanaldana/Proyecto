<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Registro-Adminsitrador</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
  <!-- Importamos los estilos de Bootstrap -->
  <link rel="stylesheet" href="../../../public/css/bootstrap.min.css">
  <!-- Font Awesome: para los iconos -->
  <link rel="stylesheet" href="../../../public/css/font-awesome.min.css">
  <!-- Sweet Alert: alertas JavaScript presentables para el usuario  -->
  <link rel="stylesheet" href="../../../public/css/sweetalert.css">
  <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
  <link rel="stylesheet" href="../../../public/css/style.css">
  <!-- Personalizado daniel  -->
</head>
<?php
include("../../include/header.php");
?>

<body>

  <!-- Las clases que se utlizan y los divs son de Bootstrap -->


  <!-- Formulario Login -->
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-4 col-md-offset-4">
        <!-- Margen superior (css personalizado )-->
        <div class="spacing-1"></div>

        <form id="formview">
          <!-- Estructura del formulario -->
          <fieldset>

            <legend class="center">Información del usuario</legend>

            <!-- Caja de texto para usuario -->
            <label class="sr-only" for="user">Nombre</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-user"></i></div>
              <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingresa tu nombre">
            </div>

            <!-- Div espaciador -->
            <div class="spacing-2"></div>


            <!-- Caja de texto para apellido -->
            <label class="sr-only" for="user">Apellido</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-user"></i></div>
              <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingresa tu apellido">
            </div>

            <!-- Div espaciador -->
            <div class="spacing-2"></div>

            <!-- Caja de texto para el Genero -->
            <div class="input-group">
              <div class="input-group-addon"><label for="genero">Genero:</label>
                <select name="genero" id="genero">
                  <option value="Hombre">Hombre</option>
                  <option value="Mujer">Mujer</option>
                </select>
              </div>
            </div>


            <!-- Div espaciador -->
            <div class="spacing-2"></div>

            <!-- Caja de texto para la fecha de nacimiento  -->
            <label class="sr-only" for="user">Fecha nacimiento</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-user"></i></div>
              <input type="date" class="form-control" name="fecha_naci" id="fecha_naci">
            </div>


            <!-- Div espaciador -->
            <div class="spacing-2"></div>


            <!-- Caja de texto para el tipo de documento -->
            <div class="input-group">
              <div class="input-group-addon"><label for="tipo_doc">Tipo de documento:</label>
                <select name="tipo_doc" id="tipo_doc">
                  <option value="CC">CC</option>
                  <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                </select>
              </div>
            </div>


            <!-- Div espaciador -->
            <div class="spacing-2"></div>

            <!-- Caja de texto para numero de documento  -->
            <label class="sr-only" for="user">No Documento</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-user"></i></div>
              <input type="number" class="form-control" name="doc" id="doc" placeholder="Ingresa tu numero de documento ">
            </div>
            <!-- Div espaciador
              <div class="spacing-2"></div>

              Caja de texto para email 
              <label class="sr-only" for="user">Email</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                <input type="text" class="form-control" name="email" placeholder="Ingresa tu email">
              </div> -->

            <!-- Div espaciador -->
            <div class="spacing-2"></div>

            <!-- Caja de texto para Documento -->
            <label class="sr-only" for="user">Documento</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-user"></i></div>
              <input type="text" class="form-control" name="email"  id="email" placeholder="Ingresa tu Email">
            </div>


            <!-- Div espaciador -->
            <div class="spacing-2"></div>

            <!-- Caja de texto para Direccion -->
            <label class="sr-only" for="user">Direccion</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-user"></i></div>
              <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Ingresa tu Direccion">
            </div>


            <!-- Div espaciador -->
            <div class="spacing-2"></div>


            <!-- Caja de texto para Telefono -->
            <label class="sr-only" for="user">telefono</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-user"></i></div>
              <input type="tel" class="form-control" name="tel" id="tel" placeholder="Ingresa tu Telefono">
            </div>

            <!-- Div espaciador -->
            <div class="spacing-2"></div>

            <!-- Boton Login para activar la funcion click y enviar los datos mediante ajax -->
            <div class="row">
              <div class="col-xs-8 col-xs-offset-2 ">
                <div class="spacing-2"></div>
                <div class="my-5"></div>
                <a href="../../clientes.php" class="btn btn-danger  btn-block"  name="button" id="Cancelar">Cancelar</a>
              </div>
              <div class="spacing-4"><br></div>
            </div>


          </fieldset>
        </form>
      </div>
    </div>
  </div>

  <!-- Final formulario login -->

  <!-- Jquery -->
  <script src="../../../public/js/jquery.js"></script>
  <!-- SweetAlert js -->
  <script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js " > </script> 
  <!-- Js personalizado -->
  <script src= "../../../public/js/usuario.js"></script>
  <!-- Js personalizado -->
  <script src= "../../../public/js/dates2.js"></script>
</body>

<br><br><br><br><br><br><br>
<?php
include("../../include/footer.php");
?>

</html>
