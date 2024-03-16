<!--verificador para registrar pqr !-->
<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    echo "<script>alert('Por favor, inicia sesión para poder registrar una sugerencia.'); window.location.href='login.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validación de entrada
    if (empty(trim($_POST["sugerencia"]))) {
        $sugerencia_err = "Por favor, ingrese un comentario.";
    } else {
        $sugerencia = trim($_POST["sugerencia"]);
    }
    
    if (empty(trim($_POST["tipo_sugerencia"]))) {
        $tipo_sugerencia_err = "Por favor, seleccione un tipo de sugerencia.";
    } else {
        $tipo_sugerencia = trim($_POST["tipo_sugerencia"]);
    }
    
    // Si no hay errores de validación, almacene los datos en variables de sesión
    if (empty($sugerencia_err) && empty($tipo_sugerencia_err)) {
        $_SESSION["sugerencia"] = $sugerencia;
        $_SESSION["tipo_sugerencia"] = $tipo_sugerencia;
        header("location: sugerencia2.php");
    }
}
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
        require 'includeUsuario/funciones.php';
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

 

                    <form class="text-center" action="user/sugerencia2.php" method="POST">
                        <h2 class="w-lg-50">Nos Encantaria Conocer tu Opinión</h2>
                </div>
            </div>


            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center ">



                        <form class="text-center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="form-group">
                            <select class="form-control" name="tipo_sugerencia">
                                <option value="">Selecciona tipo de sugerencia</option>
                                <option value="sugerencia" <?php if(isset($_POST['tipo_sugerencia']) && $_POST['tipo_sugerencia'] == 'sugerencia') echo 'selected';?>>Sugerencia</option>
                                <option value="Queja" <?php if(isset($_POST['tipo_sugerencia']) && $_POST['tipo_sugerencia'] == 'Queja') echo 'selected';?>>Queja</option>
                                <option value="reclamo" <?php if(isset($_POST['tipo_sugerencia']) && $_POST['tipo_sugerencia'] == 'reclamo') echo 'selected';?>>reclamo</option>
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
    