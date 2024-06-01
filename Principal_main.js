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
function manejarCheckbox() {
    if (miCheckbox.checked) {
        document.getElementById("vegetariano").style.display = "none";
        // Acción cuando el checkbox está marcado
        console.log('Checkbox marcado');
        // Aquí puedes llamar a la función que desees ejecutar
        // cuando el checkbox está marcado.
    } else {
        document.getElementById("vegetariano").style.display = "block";
        // Acción cuando el checkbox está desmarcado
    }
}
miCheckbox.addEventListener('change', manejarCheckbox);