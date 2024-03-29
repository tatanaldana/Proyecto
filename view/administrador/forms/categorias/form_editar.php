<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Editar Categoría</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <!-- Importamos los estilos de Bootstrap -->
  <link rel="stylesheet" href="../../../public/css/bootstrap.min.css">
  <!-- Font Awesome: para los iconos -->
  <link rel="stylesheet" href="../../../public/css/font-awesome.min.css">
  <!-- Sweet Alert: alertas JavaScript presentables para el usuario -->
  <link rel="stylesheet" href="../../../public/css/sweetalert.css">
  <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
  <link rel="stylesheet" href="../../../public/css/styles.css">
  <!-- Personalizado daniel  -->
</head>
<body>
  <!-- Espacio en blanco -->
  <div class="my-5"></div>

  <form id="editarCategoria">
    <div class="row d-flex justify-content-center">
      <div class="col-xs-2">
        <div class="card mb-5">
          <div class="card-body d-flex flex-column align-items-center">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Editar Categoría</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="mb-3">
                      <label for="idCategoria" class="form-label">ID Categoría</label>
                      <input type="number" class="form-control" id="id_categoria" name="id_categoria">
                    </div>
                    <div class="mb-3">
                      <label for="nombreCategoria" class="form-label">Nombre Categoría</label>
                      <input type="text" class="form-control" id="nombre_cat" name="nombre_cat">
                    </div>
                  </td>
                  <input type="hidden" id="doc_hidden" name="id_categoria" >
                </tr>
                <tr>
                  <td colspan="2" class="text-center">
                    <button type="button" class="btn btn-primary" id="btnmodificar">Modificar</button>
                    <a href="../categorias_adm.php" class="btn btn-secondary">Cancelar</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </form>

</body>
</html>
<!-- Jquery -->
<script src="../../../public/js/jquery.js"></script>
<!-- SweetAlert js -->
<script src="../../../public/js/sweetalert.min.js"></script>
<!-- Js personalizado -->
<script src="../../../public/js/categorias.js"></script>
</body>
</html>
