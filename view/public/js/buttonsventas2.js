var lastChecked = null;

function toggleButtons(checkbox) {
    var viewButton3 = document.getElementById('viewButton3')

    if (lastChecked && lastChecked !== checkbox) {
        lastChecked.checked = false;
    }

    if (checkbox.checked) {
        lastChecked = checkbox;

        viewButton3.style.display='inline-block';

    } else {
        lastChecked = null;
        viewButton3.style.display= 'none';
    }
}