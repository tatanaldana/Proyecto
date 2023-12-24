<style>
#viewButton{
        display: none;
    }
</style>

<script type="text/javascript">
    var lastChecked = null;

    function toggleButtons(checkbox) {
        var viewButton = document.getElementById('viewButton')

        if (lastChecked && lastChecked !== checkbox) {
            lastChecked.checked = false;
        }

        if (checkbox.checked) {
            lastChecked = checkbox;

            viewButton.style.display='inline-block';

            // Obtener el valor data-doc-usuario del checkbox seleccionado
            var docUsuario = checkbox.getAttribute('data-doc-usuario');
            console.log("Valor data-doc-usuario: " + docUsuario);

            var docUsuario2 = checkbox.getAttribute('data-doc-usuario2');
            console.log("Valor data-doc-usuario2: " + docUsuario2);

            var viewLink = document.getElementById('viewButton');
            viewLink.href = "../crud_ventas/visualizar_venta2.php?doc=" + docUsuario + "&doc_cliente="+docUsuario2;

        } else {
            lastChecked = null;
            viewButton.style.display= 'none';
        }
    }
</script>
