<?php
    session_start()
?>


<html data-bs-theme="light" lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Sugerencias</title>

        <?php 
            include 'includeUsuario/head.php';
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

 

                    <form class="text-center" action="sugerencia2.php" method="POST">
                        <h2 class="w-lg-50">Nos Encantaria Conocer tu Opinión</h2>
                </div>
            </div>


            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center ">



                            <div class="tipo">
                                <select class="form-select mb-3" aria-label="select example" >
                                    <option selected>Selecciona tipo de sugerencia</option>
                                    <option value="1">Sugerencia</option>
                                    <option value="2">Queja</option>
                                    <option value="3">Otro</option>
                                </select>
                            </div>

                            <div class="mb-1"><textarea class="form-control mb-3" name="sugerencia" placeholder="Escribe tu comentario" class="tex" required></textarea>
                                <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Enviar Comentario</button></div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</body>

<br><br><br><br><br><br><br>
<?php
        incluirTemplate('footer');
    ?>

</html>