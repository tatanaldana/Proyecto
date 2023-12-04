<script>
    function abrirform() {
        document.getElementById("formregistrar").style.display = "block";
    }

    function cancelarform() {
        document.getElementById("formregistrar").style.display = "none";
    }

    function enviarFormulario() {
        var nombreCat = document.getElementById("nombre_cat").value;

        // Validar campos si es necesario

        // Crear objeto FormData para enviar datos
        var formData = new FormData();
        formData.append('nombre_cat', nombreCat);

        // Crear objeto XMLHttpRequest
        var xhr = new XMLHttpRequest();

        // Configurar la solicitud
        xhr.open('POST', '../gestion/categorias/agregar_cat.php', true);

        // Definir la función de devolución de llamada
        xhr.onload = function () {
            if (xhr.status === 200) {
                // Procesar la respuesta del servidor si es necesario
                console.log(xhr.responseText);
                // Puedes realizar acciones adicionales según la respuesta del servidor
            } else {
                // Manejar errores
                console.error('Error en la solicitud AJAX');
            }
        };

        // Enviar la solicitud con los datos del formulario
        xhr.send(formData);
    }
</script>

<div class="caja_popup" id="formregistrar">
    <form class="contenedor_popup" onsubmit="event.preventDefault(); enviarFormulario();">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-bordered border-primary table-striped" style="text-align:center">
                            <tbody>
                                <tr>
                                    <th colspan="2">Nueva Categoria</th>
                                </tr>
                                <tr>
                                    <td>Nombre Categoria</td>
                                    <td><input type="text" id="nombre_cat" required></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <button type="button" class="btn btn-outline-primary" onclick="cancelarform()">Cancelar</button>
                                        <button type="submit" class="btn btn-outline-primary" onclick="javascript:return confirm('¿Deseas registrar a esta categoria?');">Registrar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
