function mostrarContenido(id) {
    // Oculta todos los contenidos
    var contenidos = document.getElementsByClassName('contenido');
    for (var i = 0; i < contenidos.length; i++) {
        contenidos[i].style.display = 'none';
    }
    // Muestra el contenido correspondiente al ID proporcionado 
    document.getElementById(id).style.display = 'block';
}
//function filtros(){
//  document.getElementById("vegetariano").style.display="none";
//}

const miCheckbox = document.getElementById('checkveg');

// Función que se ejecuta al cambiar el estado del checkbox
function mostrarEnfermedad(enfermedad) {
    // Ocultar todas las secciones de recetas
    var secciones = document.getElementsByClassName('contenido');
    for (var i = 0; i < secciones.length; i++) {
        secciones[i].style.display = 'none';
    }
    // Mostrar la sección específica según la enfermedad
    var seccion = document.getElementById(enfermedad);
    if (seccion) {
        seccion.style.display = 'block';
    }
}