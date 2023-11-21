<style>
   #deleteButton, #viewButton,#addButton {
        display: none;
    }
</style>

<script type="text/javascript">
    var lastChecked = null;

    function toggleButtons(checkbox) {
        var addButton = document.getElementById('addButton');
        var deleteButton = document.getElementById('deleteButton');
        var viewButton = document.getElementById('viewButton')

        if (lastChecked && lastChecked !== checkbox) {
            lastChecked.checked = false;
        }

        if (checkbox.checked) {
            lastChecked = checkbox;

            addButton.style.display = 'inline-block';
            deleteButton.style.display = 'inline-block';
            viewButton.style.display='inline-block';

            // Obtener el valor data-doc-usuario del checkbox seleccionado
            var docUsuario = checkbox.getAttribute('data-doc-usuario');
            console.log("Valor data-doc-usuario: " + docUsuario);

            var docUsuario2 = checkbox.getAttribute('data-doc-usuario2');
            console.log("Valor data-doc-usuario2: " + docUsuario2);

            var completeLink = document.getElementById('addButton');
            completeLink.href = "../crud_ventas/actualizar_venta.php?doc=" + docUsuario;
            // Agregar el valor de docUsuario a los enlaces de edición y eliminación

            var deleteLink = document.getElementById('deleteButton');
            deleteLink.href = "../crud_ventas/eliminar_venta.php?doc=" + docUsuario;

            var viewLink = document.getElementById('viewButton');
            viewLink.href = "../crud_ventas/visualizar_venta.php?doc=" + docUsuario + "&doc_cliente="+docUsuario2;

        } else {
            lastChecked = null;
            addButton.style.display = 'none';
            deleteButton.style.display = 'none';
            viewButton.style.display= 'none';
        }
    }
</script>
