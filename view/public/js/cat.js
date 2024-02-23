function enviarFormulario() {
    var nombreCat = $("#nombre_cat").val();

    // Validar campos si es necesario

    $.ajax({
        type: "POST",
        url: "../gestion/categorias/agregar_cat.php",
        data: { nombre_cat: nombreCat },
        success: function (response) {
            console.log(response); 
        },
        error: function () {
            console.error('Error en la solicitud AJAX');
        }
    });
}

$(document).ready(function () {
    $("#registroForm").submit(function (event) {
        event.preventDefault(); 
        enviarFormulario();
    });
});
