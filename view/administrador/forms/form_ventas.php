<script>
    function abrirform(){
        
        document.getElementById("formbuscar").style.display="block";
        document.getElementById("contenedor-busqueda").style.display="none";
    }
    function cancelarform(){
        document.getElementById("formbuscar").style.display="none";
        document.getElementById("contenedor-busqueda").style.display="block";
    }
</script>
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="row">
        <table class="table-responsive">
            <tr>
                <td><a class="btn btn-primary" onclick="abrirform()" style=' margin-left: 0px'>Ingresar Venta</a></td>
                <td><a href="ventas/ver_ventas.php" class="btn btn-primary" style=' margin-left: 200px'>Verificar venta</a></td>
                <td><a href="ventas/his_ventas.php"  class="btn btn-primary" style='margin-left: 200px'>Historico</a></td>
            </tr> 
        </table>
        </div>
    </div>
</div>

<div class="caja_popup" id="formbuscar">
    <form action="ventas\pre_ventas.php" class="contenedor_popup" method="POST">
        <div class="container">
        <div class="d-flex justify-content-center">
        <div class="row ">
        <div class="col-md-12 table-responsive" >
        <table class="table table-bordered border-primary" style="text-align:center" >
            <tbody>
                <tr>
                    <th colspan="2">Nuevo Venta</th>
                    <td>
                        <input type="search" class="form-control rounded" placeholder="Ingrese el documento" aria-label="Buscar" aria-describedby="search-addon" name="txtcontinuar" required/>
                    <td colspan="2">
                        <button type="button" class="btn btn-outline-primary" onclick="cancelarform()">Cancelar</button>
                        <input type="submit" class="btn btn-outline-primary" name="btncontinuar" value="Continuar" onclick= "javascript:return confirm
                        ('¿Deseas registrar un nuevo pedido?');">
                    </td>
                </tr>
            </table>
        </form>
        </div>
        </div>
        </div>
    </div>
</div>

