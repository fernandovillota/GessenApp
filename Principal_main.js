function mostrarContenido(id) {
    // Oculta todos los contenidos
    var contenidos = document.getElementsByClassName('contenido');
    for (var i = 0; i < contenidos.length; i++) {
        contenidos[i].style.display = 'none';
    }
    // Muestra el contenido correspondiente al ID proporcionado
    document.getElementById(id).style.display = 'block';
}