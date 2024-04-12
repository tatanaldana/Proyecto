<div class="container">
  <div class="row">
    <div class="col-xs-12 col-md-4 col-md-offset-4">
      <div class="spacing-1"></div>
      <form action="pedido.php" method="POST">

        <fieldset>
          <form id=formlogin>
            <div class="wrapper">
              <div class="my-5"></div>
              <div class="logo">
                <img src="/Proyecto/view/public/icons/system-solid-64-shopping-bag.gif" alt="">
              </div>
              <div class="text-center mt-4 name">
                Tus Datos
              </div>
              <div class="text-center mt-4 name">
                <p style="font-size: 1.2em; /* or any size you prefer */">Nombre: <span id="nombre"></span></p>

                <p style="font-size: 1.2em; /* or any size you prefer */">Apellidos: <span id="apellido"></span></p>
              </div>




              <div class="my-5"></div>
              <div class="text-center mt-4 name">
                Informacion de entrega
              </div>

              <div class="text-center mt-4 name">
                <label for="domicilio1">
                  <input type="radio" name="domicilio" id="domicilio1" value="domicilio">
                  <p style="font-size: -1.2em; /* or any size you prefer */"><span class="icon" style="font-size: 1.6em; /* or any size you prefer */">🛵</span>Entrega a domicilio</p>
                </label>

                <h6 style="font-size: 1.2em; /* or any size you prefer */" id="direccion"></h6>

                <label for="domicilio2">
                  <input type="radio" name="domicilio" id="domicilio2" value="tienda" checked>
                  <p style="font-size: -1.2em; /* or any size you prefer */"><span class="icon" style="font-size: 1.6em; /* or any size you prefer */">🏪</span> Entrega en tienda</p>
                </label>
              </div>




              <div class="my-5"></div>
              <div class="text-center mt-4 name">
                Modo de pago
              </div>
              <div class="text-center mt-4 name">
                <p style="font-size: 1.2em; /* or any size you prefer */">
                  <?php
                  if (isset($_POST['metodo_pago'])) {
                    echo $_POST['metodo_pago'];
                  };
                  ?></p>
              </div>
              <button type="button" class="btn btn-danger btn-block text-white" href="confirmar_pago.html">
                <input type="submit" value="Continuar" class="bg-danger" style="border: none;">
              </button>
            </div>

          </form>
        </fieldset>
        <!-- Final formulario login -->

    </div>
  </div>
</div>

<script src="../../public/js/jquery.js"></script>

<script src="../../public/js/sweetalert.min.js"></script>
<!-- Js usuarios -->
<script src="../../public/js/usuario.js"></script>
<script src="../../public/js/dates.js"></script>
<!-- Js botones -->
<script src="../../public/js/buttons.js"></script>