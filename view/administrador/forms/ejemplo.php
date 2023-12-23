<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gregar categorias</title>
    <!--  esto es para incluir jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!--ruta archivo JavaScript-->
    <script src="../../public/js/cat.js"></script>
</head>
<body>

<div class="caja_popup" id="formregistrar">
    <form id="registroForm" class="contenedor_popup">
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
                                        <button type="submit" class="btn btn-outline-primary" onclick="return confirm('¿Deseas registrar a esta categoria?');">Registrar</button>
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

</body>
</html>
