var lastChecked = null;

    function toggleButtons(checkbox) {

        var editButton = document.getElementById('editButton');
        var viewButton = document.getElementById('viewButton')

        if (lastChecked && lastChecked !== checkbox) {
            lastChecked.checked = false;
        }

        if (checkbox.checked) {
            lastChecked = checkbox;

            editButton.style.display = 'inline-block';
            viewButton.style.display='inline-block';

            // Obtener el valor data-doc-usuario del checkbox seleccionado

        } else {

            editButton.style.display = 'none';
            viewButton.style.display= 'none';
        }
    }
