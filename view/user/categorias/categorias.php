<?php 

// pagina con todas la propiedades de administrador del software

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <?php
        include '../../includeUsuario/head.php';
    ?>
</head>

    <?php
        require_once '../../includeUsuario/funciones.php';
        incluirTemplate('header');
    ?>
<body>


<div class="imagenindex">

<h1>Categorias</h1>

</div>

    <main class="container">

    <div class="listado-categorias" id="listado-categorias">
    <script>
function mostrarCategorias(categorias) {
  // Obtener el contenedor donde se mostrarán las categorías
  var listadoCategorias = $('#listado-categorias');

  // Limpiar el contenido existente en el contenedor
  listadoCategorias.empty();

  // Verificar si categorias es un array antes de intentar iterar sobre él
  if (Array.isArray(categorias)) {
    // Iterar sobre las categorías y agregarlas al contenedor
    categorias.forEach(function(categoria) {
      var categoriaHTML = `
        <div class="categoria">
          <img src="ruta/para/tu/imagen/${categoria.nombre_cat}.jpg" alt="${categoria.nombre_cat}">
          <a href="#">${categoria.nombre_cat}</a>
          
        </div>
      `;

      // Agregar la categoría al contenedor
      listadoCategorias.append(categoriaHTML);
    });
  } else {
    // Si categorias no es un array, muestra un mensaje de error
    console.error("La respuesta no es un array:", categorias);
    // Puedes agregar un mensaje o realizar alguna acción en caso de error
  }
}

</script>
    </div>

    </main>

</body>

<br><br><br><br><br><br><br>
    <?php
        incluirTemplate('footer');
    ?>




</html>
