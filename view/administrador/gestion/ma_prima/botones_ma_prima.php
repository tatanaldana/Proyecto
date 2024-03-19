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

            
            var doc_materia_pri = checkbox.getAttribute('data-doc-prima');
            console.log("Valor data-doc-prima: " + doc_materia_pri);

           
            var editLink = document.getElementById('editButton');
            editLink.href = "../gestion/ma_prima/editar_ma_prima.php?doc_materia_pri=" + doc_materia_pri;

            var deleteLink = document.getElementById('deleteButton');
            deleteLink.href = "../gestion/ma_prima/eliminar_ma_prima.php?doc_materia_pri=" + doc_materia_pri;

            var viewLink = document.getElementById('viewButton');
            viewLink.href = "../gestion/ma_prima/visualizar_ma_prima.php?doc_materia_pri=" + doc_materia_pri;

           

        } else {
            lastChecked = null;
            addButton.style.display = 'inline-block';
            editButton.style.display = 'none';
            deleteButton.style.display = 'none';
            viewButton.style.display= 'none';
        }
    }
</script>
