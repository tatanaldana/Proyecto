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
            viewButton.style.display='inline-block';

            
            var id_cat = checkbox.getAttribute('data-doc-categorias');
            console.log("Valor data-doc-categorias: " + id_cat);

            var editLink = document.getElementById('editButton');
            editLink.href = "../gestion/categorias/editar_cat.php?id_cat=" + id_cat;

            var deleteLink = document.getElementById('deleteButton');
            deleteLink.href = "../gestion/categorias/eliminar_cat.php?id_cat=" + id_cat;

            var viewLink = document.getElementById('viewButton');
            viewLink.href = "../gestion/categorias/visualizar_cat.php?id_cat=" + id_cat;

        } else {
            lastChecked = null;
            addButton.style.display = 'inline-block';
            editButton.style.display = 'none';
            deleteButton.style.display = 'none';
            viewButton.style.display= 'none';
        }
    }
</script>




