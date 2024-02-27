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
