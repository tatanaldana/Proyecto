<div class='container'>

<div class='perfil mx-auto'>

<!-- Titulo -->
  <h1 class='text-center my-5'>Tu Perfil</h1>

  <div class='row'>

    <div class='col center'>
    <input type='file'><img src='header/img/logo.jpg' alt='Imagen perfil' class='rounded-circle' width='100px' height='100px'>  
    </div>

    <div class='datos-perfil col center'>
      <h4><b>Nombre:</b>  <h4 id = "nombre"></h4>
      <h4><b>Apellido:</b>  <h4 id = "apellido"></h4>
      <h4><b>Correo:</b>  <h4 id = "email"></h4>
      <h4><b>Genero:</b> <h4 id = "genero"></h4>
      <h4><b>Fecha de Nacimiento:</b><h4 id = "fecha_naci"></h4>
      <h4><b>Tipo de documento:</b> <h4 id = "tipo_doc"></h4>
      <h4><b>Documento de Identidad:</b> <h4 id = "doc"></h4>
      <h4><b>Telefono:</b>  <h4 id = "tel"></h4>
      <h4><b>Direccion:</b>  <h4 id = "direccion"></h4>
    </div>


    <div class='col'>
      <a href='configuracion/editar.php?id=" <?php $_SESSION['doc'] ?>"'><button class='btn-event' id= "btn-editar" style = border:none ;><i class='fa fa-edit' style='font-size:20px'></i></button></a>

            <a href='configuracion/eliminar.php?id=" <?php $_SESSION['doc']  ?> "'><button class='btn-enviar' style = border:none ;><i class='fa fa-trash' style='font-size:20px'></i></button></a>
        </div>
      
      </div>

    </div>

