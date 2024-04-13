  <div class="fondo estilo-perfil">

    <div class="page-content page-container" id="page-content">
      <div class="letra-titulo">
        <p>Perfil</p>
      </div>
      <div class="padding-perfil">
        <div class="row container d-flex justify-content-center estilo-cuadro-perfil">
          <div class="col-xl-6 col-md-12">
            <div class="card user-card-full">
              <div class="row m-l-0 m-r-0">
                <div class="col-sm-4 bg-c-lite-green user-profile">
                  <div class="card-block text-center text-white">
                    <div class="m-b-25">
                      <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                    </div>
                    <h6 class="f-w-600" id="nombreCompleto"></h6>
                    <p>Web Designer</p>
                    <i class="mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                  </div>
                  <div class="card-block text-center text-white">
                    <a href='configuracion/editar.php?id=<?php $_SESSION['doc'] ?>'><button class='opacity-icono btn btn-danger' id='deleteUsuario' style="border:none;">
                        <img src='/Proyecto/view/public/icons/wired-lineal-35-edit.gif' alt='Icono de eliminar' style='width:20px; height:20px;' />
                      </button></a>

                    <button type="button" style="border:none" id="deleteUsuario" class="opacity-icono btn btn-danger" data-doc="<?php echo $_SESSION['doc']; ?>">
                      <img src='/Proyecto/view/public/icons/wired-lineal-185-trash-bin.gif' alt='Icono de eliminación' style='width:20px; height:20px;' />
                    </button>
                  </div>
                </div>
                <div class="col-sm-8">
                  <div class="card-block">
                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information Personal</h6>
                    <div class="row">
                      <div class="col-sm-6">
                        <p class="m-b-10 f-w-600">Tipo de documento</p>
                        <h6 class="text-muted f-w-400" id="tipo_doc"></h6>
                      </div>

                      <div class="col-sm-6">
                        <p class="m-b-10 f-w-600">Documento</p>
                        <h6 class="text-muted f-w-400" id="doc"></h6>
                      </div>
                      <div class="col-sm-6">
                        <p class="m-b-10 f-w-600">Nombre</p>
                        <h6 class="text-muted f-w-400" id="nombre"></h6>
                      </div>
                      <div class="col-sm-6">
                        <p class="m-b-10 f-w-600">Apellido</p>
                        <h6 class="text-muted f-w-400" id="apellido"></h6>
                      </div>
                      <div class="col-sm-6">
                        <p class="m-b-10 f-w-600">Genero</p>
                        <h6 class="text-muted f-w-400" id="genero"></h6>
                      </div>
                      <div class="col-sm-6">
                        <p class="m-b-10 f-w-600">Fecha de nacimiento</p>
                        <h6 class="text-muted f-w-400" id="fecha_naci"></h6>
                      </div>
                    </div>
                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Contacto</h6>
                    <div class="row">

                      <div class="col-sm-6">
                        <p class="m-b-10 f-w-600">Correo</p>
                        <h6 class="text-muted f-w-400" id="email"></h6>
                      </div>

                      <div class="col-sm-6">
                        <p class="m-b-10 f-w-600">Telefono</p>
                        <h6 class="text-muted f-w-400" id="tel"></h6>
                      </div>
                      <div class="col-sm-6">
                        <p class="m-b-10 f-w-600">Direccion</p>
                        <h6 class="text-muted f-w-400" id="direccion"></h6>


                      </div>
                    </div>
                    <ul class="social-link list-unstyled m-t-40 m-b-10">
                      <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                      <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                      <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  </div>
  </div>