<script>
    function abrirform(){
        
        document.getElementById("form_promo").style.display="block";
    }
    function cancelarform(){
        document.getElementById("form_promo").style.display="none";
    }
</script>

<div class="caja_popup" id="form_promo">
    <form action="../gestion/promociones/agregar_promo.php" class="contenedor_popup" method="POST">
        <div class="container">
        <div class="d-flex justify-content-center">
        <div class="row">
        <div class="col-md-12 table-responsive" >
        <table class="table table-bordered border-primary table-striped" style="text-align:center" >
            <tbody>
                <tr>
                    <th colspan="2">Promociones</th>
                </tr>
                
                <tr>
                    <td>pollo</td>
                    <td><input type="text" name="pollo" required></td>
                </tr>
                <tr>
                    <td>Hamburguesa</td>
                    <td><input type="text" name="hamburguesa" required></td>
                </tr>
                
                <tr>
                    <td>Pizza</td>
                    <td><input type="text" name="pizza"></td>
                </tr>
                >
                <tr>
                    <td>Bebidas</td>
                    <td><input type="text" name="bebidas" required></td>
                </tr>
                
                <tr>
                    <td>Papas</td>
                    <td><input type="text" name="papas"></td>
                </tr>
                <tr>
                    <td>Precio</td>
                    <td><input type="text" name="precio"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="button" class="btn btn-outline-primary" onclick="cancelarform()">Cancelar</button>
                        <input type="submit" class="btn btn-outline-primary" name="btnregistrar" value="Registrar" onclick= "javascript:return confirm
                        ('¿Deseas registrar este nuevo producto?');">
                        <br><br>
                    </td>
                </tr>
            </table>
        </form>
        </div>
        </div>
        </div>
    </div>


    </div>