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

            
            var id_ma_prima = checkbox.getAttribute('data-doc-prima');
            console.log("Valor data-doc-prima: " + id_ma_prima);

           
            var editLink = document.getElementById('editButton');
            editLink.href = "../gestion/ma_prima/editar_ma_prima.php?id_ma_prima=" + id_ma_prima;

            var deleteLink = document.getElementById('deleteButton');
            deleteLink.href = "../gestion/ma_prima/eliminar_ma_prima.php?id_ma_prima=" + id_ma_prima;

            var viewLink = document.getElementById('viewButton');
            viewLink.href = "../gestion/ma_prima/visualizar_ma_prima.php?id_ma_prima=" + id_ma_prima;

           

        } else {
            lastChecked = null;
            addButton.style.display = 'inline-block';
            editButton.style.display = 'none';
            deleteButton.style.display = 'none';
            viewButton.style.display= 'none';
        }
    }
</script>
