//Menu cambio color al presionar alguna opcion
function changeActiveDiv(activeDivId) {
    // Remover la clase "active" de todos los divs
    var divs = document.querySelectorAll('.menu_nav div','.menu_enfermedades div');
    divs.forEach(function(div) {
        div.classList.remove('active');
    });
    var divs = document.querySelectorAll('.menu_enfermedades div');
    divs.forEach(function(div) {
        div.classList.remove('active');
    });
    // Añadir la clase "active" al div seleccionado
    document.getElementById(activeDivId).classList.add('active');
}
//Mostrar el contenido del menu de navegacion.
function mostrarContenido(id) {
    // Oculta todos los contenidos
    var contenidos = document.getElementsByClassName('contenido_principal');
    for (var i = 0; i < contenidos.length; i++) {
        contenidos[i].style.display = 'none';
    }
    // Muestra el contenido correspondiente al ID proporcionado 
    document.getElementById(id).style.display = 'block';
}
//Mostrar el contenido del menu de Enfermedades
function mostrarEnfermedad(id) {
    // Oculta todos los contenidos
    var contenidos = document.getElementsByClassName('contenido_enfermedad');
    for (var i = 0; i < contenidos.length; i++) {
        contenidos[i].style.display = 'none';
    }
    // Muestra el contenido correspondiente al ID proporcionado 
    document.getElementById(id).style.display = 'block';
}

// Mostrar el modal inicio/registro al hacer scroll hasta cierto punto
window.addEventListener('scroll', function() {
    const scrollPosition = window.scrollY;
    const modal = document.getElementById('loginModal');
    const overlay = document.querySelector('.overlay');
    const content = document.querySelector('.contenido_recetas');

    // Mostrar modal al hacer scroll más de 300px
    if (scrollPosition > 400) {
        modal.style.display = 'block';
        overlay.style.display = 'block';
        content.classList.add('pixelated'); // Aplica la clase que pixelea el fondo
    }
});

// Función para cerrar el modal y quitar el efecto de pixelado
function closeModal() {
    const modal = document.getElementById('loginModal');
    const overlay = document.querySelector('.overlay');
    const content = document.querySelector('.contenido_recetas');
    modal.style.display = 'none';
    overlay.style.display = 'none';
    content.classList.remove('pixelated'); // Remueve la clase que pixelea el fondo
}
// configuracion de perfil
function irASeccionPerfil(seccionId) {
    mostrarContenido('Inicio'); // Muestra el apartado de perfil
    changeActiveDiv('div2');    // Activa visualmente el botón "Perfil"

    setTimeout(function() {
        var seccion = document.getElementById(seccionId);
        if (seccion) {
            seccion.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }, 100); 
}