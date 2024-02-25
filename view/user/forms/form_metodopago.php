<div class="container mt-4">
    <div class="metodo_pago">

        <form action="../../user/pagos/checktout.php" method= "post">
            <fieldset>
                <legend class="titulo-check">Modo de Pago</legend>
                    <label for="tarjeta">
                        <input type="radio" name="metodo_pago" value= "tarjeta" required> <p> Terjeta Debito / Crédito </p>
                    </label>
                    <label for="plataforma">
                        <input type="radio" name="metodo_pago" value= "plataforma" required><p> Nequi o Daviplata</p>
                    </label>
                    <label for="efectivo">
                        <input type="radio" name="metodo_pago" value= "efectivo" required><p> Efectivo.</p>
                    </label>
            </fieldset>            

            <input type="submit" value="Continuar" class= "campo-obligatorio">
        </form>

    </div>
</div>