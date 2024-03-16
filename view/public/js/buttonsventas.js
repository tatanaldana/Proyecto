var lastChecked = null;

function toggleButtons(checkbox) {
    var addButton2 = document.getElementById('addButton2');
    var deleteButton2 = document.getElementById('deleteButton2');
    var viewButton2 = document.getElementById('viewButton2');

    if (lastChecked && lastChecked !== checkbox) {
        lastChecked.checked = false;
    }

    if (checkbox.checked) {
        lastChecked = checkbox;

        addButton2.style.display = 'inline-block';
        deleteButton2.style.display = 'inline-block';
        viewButton2.style.display='inline-block';


    } else {
        lastChecked = null;
        addButton2.style.display = 'none';
        deleteButton2.style.display = 'none';
        viewButton2.style.display= 'none';

    }
}



deleteButtons.forEach(function(button) {
    button.addEventListener('click', function(event) {
        var confirmDelete = confirm('¿Estás seguro de eliminar este registro?');

        if (!confirmDelete) {
            event.preventDefault(); // Evita que el enlace se ejecute si se cancela la eliminación
        }
    });
});