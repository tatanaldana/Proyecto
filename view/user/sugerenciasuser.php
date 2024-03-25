

<html data-bs-theme="light" lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Sugerencias</title>
    <?php
    include '../includeUsuario/head.php';
    ?>

</head>

<?php
require '../includeUsuario/funciones.php';
incluirTemplate('header')
?>

<body class="imagensugerencias">

    <div class="imagenindex">

        <h1>Sugerencias</h1>

    </div>

    <section class="position-relative py-4 py-xl-5 img-sugerencias">
        <div class="container center">
            <div class="row mb-5 ">
                <div class="col-md-8 col-xl-6 text-center mx-auto">



                    <form id="formulario_pqr">
                        <h2 class="w-lg-50">Nos Encantaria Conocer tu Opinión</h2>
                </div>
            </div>


            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center ">




                            <div class="form-group">
                                <select class="form-control" name="tipo_sugerencia" id="tipo_sugerencia">
                                    <option value="">Selecciona tipo de sugerencia</option>
                                    <option value="sugerencia">Sugerencia</option>
                                    <option value="Queja">Queja</option>
                                    <option value="reclamo">reclamo</option>
                                </select>
                            </div>

                            <div class="mb-1"><textarea class="form-control mb-3" name="sugerencia" id="sugerencia" placeholder="Escribe tu comentario" class="tex" required></textarea>
                                <div class="mb-3"><button type="button" class="btn btn-primary d-block w-100" id="enviar">Enviar Comentario</button></div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Js personalizado -->
    <script src="../public/js/usuario.js"></script>
</body>

<br><br><br><br><br><br><br>
<?php
incluirTemplate('footer');
?>

</html>