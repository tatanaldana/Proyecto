<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Editar productos</title>
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

  <form id="editar_prod">
    <div class="row d-flex justify-content-center">
      <div class="col-xs-2">
        <div class="card mb-5">
          <div class="card-body d-flex flex-column align-items-center">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Editar Produtos</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                  <div class="mb-3">
                      <label for="idProducto" class="form-label">id producto</label>
                      <input type="number" class="form-control" id="idProducto" name="idproducto">
                    </div>
                    <div class="mb-3">
                      <label for="nombre_pro" class="form-label">nombre producto</label>
                      <input type="text" class="form-control" id="nombre_pro" name="nombre_pro">
                    </div>
                    <div class="mb-3">
                      <label for="detalle" class="form-label">detalle</label>
                      <input type="text" class="form-control" id="detalle" name="detalle">
                    </div>
                    <div class="mb-3">
                      <label for="precio_pro" class="form-label">precio producto</label>
                      <input type="number" class="form-control" id="precio_pro" name="precio_pro">
                    </div>
                    <div class="mb-3">
                      <label for="categorias_idcategoria" class="form-label">id categoria</label>
                      <input type="number" class="form-control" id="categorias_idcategoria" name="categorias_idcategoria">
                    </div>
                    <div class="mb-3">
                      <label for="foto" class="form-label">foto</label>
                      <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                    <div class="mb-3">               
                      <label for="cod" class="form-label">codigo</label>
                      <input type="text" class="form-control" id="cod" name="cod">
                    </div>
                    <div class="mb-3">
                  </td>
                </tr>
                <tr>
                  <input type="hidden" id="doc_hidden" name="idProducto">
                </tr>
                <tr>
                  <td colspan="2" class="text-center">
                    <button type="button" class="btn btn-primary" id="btnmodificar">Modificar</button>
                    <a href="../productos_adm.php" class="btn btn-secondary">Cancelar</a>
                   
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
<script src="../../../public/js/productos.js"></script>
</body>
</html>
