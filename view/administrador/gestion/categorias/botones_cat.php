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

      
    } else {
        lastChecked = null;
        addButton.style.display = 'inline-block';
        editButton.style.display = 'none';
        deleteButton.style.display = 'none';
        viewButton.style.display = 'none';
    }
}


</script>




