<script>
    function abrirform(){
        
        document.getElementById("formregistrar").style.display="block";
    }
    function cancelarform(){
        document.getElementById("formregistrar").style.display="none";
    }
</script>

<div class="caja_popup" id="formregistrar">
    <form action="../gestion/categorias/agregar_cat.php" class="contenedor_popup" method="POST">
        <div class="container">
        <div class="d-flex justify-content-center">
        <div class="row">
        <div class="col-md-12 table-responsive" >
        <table class="table table-bordered border-primary table-striped" style="text-align:center" >
        <tbody>

                
                <tr>
                    <th colspan="2">Nueva Categoria</th>
                </tr>
                
                <tr>
                    <td>Nombre Categoria</td>
                    <td><input type="text" name="nombre_cat" required></td>
                </tr>
                


                <tr>
                    <td colspan="2">
                        <button type="button" class="btn btn-outline-primary" onclick="cancelarform()">Cancelar</button>
                        <input type="submit" class="btn btn-outline-primary" name="btnregistrar" value="Registrar" onclick= "javascript:return confirm
                        ('¿Deseas registrar a este usuario?');">
                    </td>
                </tr>
            </table>
        </form>
        </div>
        </div>
        </div>
    </div>


    </div>