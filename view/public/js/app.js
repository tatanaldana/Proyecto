document.addEventListener('DOMContentLoaded', function(){
    
    eventListener()
});

function eventListener(){
    const desplegar = document.querySelector('.menu');

    desplegar.addEventListener('click', desplegado);
};

function desplegado(){
    const rutas = document.querySelector('.desplegue')

    if(rutas.classList.contains('mostrar')){
        rutas.classList.remove ('mostrar'); 
    }else{
        // toggle
        rutas.classList.add('mostrar');
    }
};

document.addEventListener('DOMContentLoaded', function(){
    
    mostrarDatosPerfil()
    
    }
);

function mostrarDatosPerfil(){
    const datosPerfil = document.querySelector('.expandirDatosPersonales');
    const datosContacto = document.querySelector('.expandirDatosContacto');
    const datosSeguridad = document.querySelector('.expandirDatosSeguridad');

    if (datosPerfil){
        datosPerfil.addEventListener('click', expandirDatosPersonales);
    }
    
    if(datosContacto){

        datosContacto.addEventListener('click', expandirDatosContacto);
    }
    if(datosSeguridad){

        datosSeguridad.addEventListener('click', expandirDatosSeguridad);
    }

};



function expandirDatosPersonales(){
    const datosCliente = document.querySelector('.datosPersonales')

    if(datosCliente.classList.contains('mostrar-datos')){
        datosCliente.classList.remove ('mostrar-datos'); 
    }else{
        // toggle
        datosCliente.classList.add('mostrar-datos');
    }

};

function expandirDatosContacto(){
    const datosCliente = document.querySelector('.datosContacto')

    if(datosCliente.classList.contains('mostrar-datos')){
        datosCliente.classList.remove ('mostrar-datos'); 
    }else{
        // toggle
        datosCliente.classList.add('mostrar-datos');
    }

};
function expandirDatosSeguridad(){
    const datosCliente = document.querySelector('.datosSeguridad')

    if(datosCliente.classList.contains('mostrar-datos')){
        datosCliente.classList.remove ('mostrar-datos'); 
    }else{
        // toggle
        datosCliente.classList.add('mostrar-datos');
    }

};

function mostrarBuscador() {
    const desplegarlupa = document.querySelector('.buscarlupa');
    desplegarlupa.addEventListener('click', expandirbuscador);
}

function expandirbuscador() {
    console.log("prueba prueba");
    const buscador = document.querySelector('.mostrar-buscador');

    if (buscador.classList.contains('mostrarinfo')) {
        buscador.classList.remove('mostrarinfo');
    } else {
        buscador.classList.add('mostrarinfo');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    mostrarBuscador(); // Llama a mostrarBuscador en lugar de expandirbuscador
});
// function eventListener(){
//     const configurar = document.querySelector('.mostrar-config');

//     configurar.addEventListener('click', configuracion);
// };

// function configuracion(){
//     const config = document.querySelector('.configuracion')

//     if(config.classList.contains('mostrar-c')){
//         config.classList.remove ('mostrar-c'); 
//     }else{
//         // toggle
//         config.classList.add('mostrar-c');
//     }
// };

console.log('Hola mundo')