
<div class="progress-bar">
        <div class="stage">
          <div class="stage-icon">
            <span class="stage-number">1</span>
          </div>
          <div class="stage-description">Información</div>
        </div>
        <div class="stage">
          <div class="stage-icon">
            <span class="stage-number">2</span>
          </div>
          <div class="stage-description">Dirección de envío</div>
        </div>
        <div class="stage">
          <div class="stage-icon">
            <span class="stage-number">3</span>
          </div>
          <div class="stage-description">Forma de pago</div>
        </div>
        <div class="stage active">
          <div class="stage-icon">
            <span class="stage-number">4</span>
          </div>
          <div class="stage-description">Revisión y Aprobación</div>
        </div>
      </div>

        <div class="checkout container">
            <form action="pedido.php" method="POST">
            <div class="sec1">
                <fieldset>
                    <legend class="titulo-check">Tus Datos</legend>

                    <p>Nombres:</p> <h6 id = "nombre"></h6>
              

                </fieldset>
            </div>

            <div class="sec1" >
                <fieldset>
                    <legend class="titulo-check">Modo de Entrega</legend>
                    <label for="">
                        <input type="radio" name="domicilio" disabled> <p> A domicilio.</p>
                    </label>
                    <p><font color="silver"><?php echo $_SESSION['direccion']?> </font></p>
                    <label for="">
                        <input type="radio" name="domicilio" checked disabled> <p> Entrega en tienda. </p>
                    </label>
                </fieldset>
            </div>
            <div class="sec1">
                <fieldset>
                    <legend class="titulo-check">Modo de Pago</legend>
                    <?php

                    if(isset($_POST['metodo_pago'])){
                       echo $_POST['metodo_pago'];

                    };
                        
                    ?>
                    
                </fieldset>
            </div>
            <a href="confirmar_pago.html"><input type="submit" value="Continuar" class="btn regular-button"></a>
        </div>
        <?php
            echo '<pre>';
            var_dump($_POST['metodo_pago']);
            echo '<pre>';
        ?>

        
        </form>

        

<script src="../../public/js/jquery.js"></script>

<script src="../../public/js/sweetalert.min.js"></script>
<!-- Js usuarios -->
<script src="../../public/js/usuario.js"></script>
<!-- Js botones -->
<script src="../../public/js/buttons.js"></script>