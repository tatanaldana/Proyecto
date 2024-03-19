<?php
echo "
<header class='py-3 mb-3 border-bottom' style='background-color: #31e621da'>
    <div class='container'>
      <div class='d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start'>
        <a href='index.php' class='d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none'>
        <img src='/Proyecto/view/public/img/image.6.jfif' alt='mdo' width='32' height='32' class='rounded-circle'>
        </a>

        <ul class='nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0'>
          <li><a href='/Proyecto/view/administrador/clientes.php' class='nav-link px-2 link-secondary'>Clientes</a></li>
          <li><a href='/Proyecto/view/administrador/ventas.php' class='nav-link px-2 link-body-emphasis'>Ventas</a></li>
          <li><a href='/Proyecto/view/administrador/gestion.php' class='nav-link px-2 link-body-emphasis'>Gestion</a></li>
          <li><a href='/Proyecto/view/administrador/sugerencias.php' class='nav-link px-2 link-secondary'>Sugerencias</a></li>
        </ul>

        <form class='col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3' role='search'>
          <input type='search' class='form-control' placeholder='Search...' aria-label='Search'>
        </form>

        <div class='d flex'>
          <a href='#' class='nav-link dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>
            <img src='https://github.com/mdo.png' alt='mdo' width='32' height='32' class='rounded-circle'>
          </a>
          <div class='dropdown-menu'>
            <a class='dropdown-item' href='#'>Perfil</a>
            <div class='dropdown-divider'></div>
            <a class='dropdown-item' href='/Proyecto/controller/usuario/cerrarSesion.php'>Cerrar sesion</a>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class='my-5'></div>";

  ?>
