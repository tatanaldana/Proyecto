<style>
    #editButton, #deleteButton, #viewButton {
        display: none;
    }
</style>

<script type="text/javascript">
    var lastChecked = null;

    function toggleButtons(checkbox) {
    var addButton = document.getElementById('addButton');
    var editButton = document.getElementById('editButton');
    var deleteButton = document.getElementById('deleteButton');
    var viewButton = document.getElementById('viewButton')

    if (lastChecked && lastChecked !== checkbox) {
        lastChecked.checked = false;
    }

    if (checkbox.checked) {
        lastChecked = checkbox;

        addButton.style.display = 'none';
        editButton.style.display = 'inline-block';
        deleteButton.style.display = 'inline-block';
        viewButton.style.display = 'inline-block';

        // Obtener el ID de categoría del checkbox marcado
        var id_categoria = checkbox.getAttribute('data-id_categoria');
        console.log("Valor data-id_categoria: " + id_categoria);

        var editLink = document.getElementById('editButton');
        editLink.href = "../../../administrador/forms/categorias/editarCategoria.php?id_categoria=" + id_categoria;

        var deleteLink = document.getElementById('deleteButton');
        deleteLink.href = "../../../../controller/categorias/eliminarCategorias.php?id_categoria=" + id_categoria;

        var viewLink = document.getElementById('viewButton');
        viewLink.href = "../../../administrador/forms/categorias/form_view.phpCategoria.php?id_categoria=" + id_categoria;

    } else {
        lastChecked = null;
        addButton.style.display = 'inline-block';
        editButton.style.display = 'none';
        deleteButton.style.display = 'none';
        viewButton.style.display = 'none';
    }
}


</script>




