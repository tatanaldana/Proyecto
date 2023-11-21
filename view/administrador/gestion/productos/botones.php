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

            // Obtener el valor data-doc-usuario del checkbox seleccionado
            var idproducto = checkbox.getAttribute('data-doc-producto');
            console.log("Valor data-doc-producto: " + idproducto);

            // Agregar el valor de docUsuario a los enlaces de edición y eliminación
            var editLink = document.getElementById('editButton');
            editLink.href = "../gestion/productos/editar_prod.php?idproducto=" + idproducto;

            var deleteLink = document.getElementById('deleteButton');
            deleteLink.href = "../gestion/productos/eliminar_prod.php?idproducto=" + idproducto;

            var viewLink = document.getElementById('viewButton');
            viewLink.href = "../gestion/productos/visualizar_prod.php?idproducto=" + idproducto;

           

        } else {
            lastChecked = null;
            addButton.style.display = 'inline-block';
            editButton.style.display = 'none';
            deleteButton.style.display = 'none';
            viewButton.style.display= 'none';
        }
    }
</script>
