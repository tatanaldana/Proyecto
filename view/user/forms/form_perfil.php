<div class=''>

<div class='perfil mx-auto'>

<!-- Titulo -->
  <h1 class='text-center my-5'>Tu Perfil</h1>

  <div class='row'>

    <div class='col center'>
    <input type='file'><img src='header/img/logo.jpg' alt='Imagen perfil' class='rounded-circle' width='100px' height='100px'>  
    </div>

    <div class='datos-perfil col center'>
      <h4><b>Nombre:</b>  <h6 id = "nombre"></h6>
      <h4><b>Apellido:</b>  <h6 id = "apellido"></h6>
      <h4><b>Correo:</b>  <h6 id = "email"></h6>
      <h4><b>Genero:</b> <h6 id = "genero"></h6>
      <h4><b>Fecha de Nacimiento:</b><h6 id = "fecha_naci"></h6>
      <h4><b>Tipo de documento:</b> <h6 id = "tipo_doc"></h6>
      <h4><b>Documento de Identidad:</b> <h6 id = "doc"></h6>
      <h4><b>Telefono:</b>  <h6 id = "tel"></h6>
      <h4><b>Direccion:</b>  <h6 id = "direccion"></h6>
    </div>


    <div class='col'>
      <a href='configuracion/editar.php?id=" <?php $_SESSION['doc'] ?>"'><button class='btn-event' style = border:none ;><i class='fa fa-edit' style='font-size:20px'></i></button></a>
            <div class= 'vr'></div>
            <a href='configuracion/eliminar.php?id=" <?php $_SESSION['doc']  ?> "'><button class='btn-enviar' style = border:none ;><i class='fa fa-trash' style='font-size:20px'></i></button></a>
        </div>
      
      </div>

    </div>

