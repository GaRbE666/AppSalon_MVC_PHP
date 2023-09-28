document.addEventListener('DOMContentLoaded', function(){
    iniciarApp();
})

function iniciarApp(){
    buscarPorFecha();
}

function buscarPorFecha(){
    const fechaInput = document.querySelector('#fecha');
    fechaInput.addEventListener('input', function (e){

        const fechaSeleccionada = e.target.value;
        //Mandamos la fecha por url
        window.location = `?fecha=${fechaSeleccionada}`;

    })
}