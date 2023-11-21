
<script>
    function abrirform(){
        
        document.getElementById("form_prima").style.display="block";
    }
    function cancelarform(){
        document.getElementById("form_prima").style.display="none";
    }
</script>

<div class="caja_popup" id="form_prima">
    <form action="../gestion/ma_prima/agregar_ma_prima.php" class="contenedor_popup" method="POST">
        <div class="container">
        <div class="d-flex justify-content-center">
        <div class="row">
        <div class="col-md-12 table-responsive" >
        <table class="table table-bordered border-primary table-striped" style="text-align:center" >
            <tbody>
                <tr>
                    <th colspan="2">Nueva Materia Prima</th>
                </tr>
                
                
                        
                        <tr>
                            <td>Referencia</td>
                            <td><input type="text" name="referencia"  ></td>
                        </tr>
                        <tr>
                            <td>Descripcion</td>
                            <td><input type="text" name="descripcion"   ></td>
                        </tr>
                        
                        <tr>
                            <td>Existencia</td>
                            <td><input type="number" name="existencia" ></td>
                        </tr>
                        <tr>
                            <td>Entrada</td>
                            <td><input type="number" name="entrada" ></td>
                        </tr>
                        <tr>
                            <td>Salida</td>
                            <td><input type="number" name="salida"  ></td>
                        </tr>
                        <tr>
                            <td>Stock</td>
                            <td><input type="number" name="stock"  ></td>
                        </tr>
                <tr>
                    <td colspan="2">
                        <button type="button" class="btn btn-outline-primary" onclick="cancelarform()">Cancelar</button>
                        <input type="submit" class="btn btn-outline-primary" name="btnregistrar" value="Registrar" onclick= "javascript:return confirm
                        ('¿Deseas registrar esta nueva  materia prima?');">
                    </td>
                </tr>
            </table>
        </form>
        </div>
        </div>
        </div>
    </div>


    </div>