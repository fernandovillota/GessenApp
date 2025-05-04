function mostrarSeccion(id) {
  const secciones = ['seguridad', 'datos', 'permisos'];

  secciones.forEach(seccionId => {
    const seccion = document.getElementById(seccionId);
    if (seccion) {
      seccion.style.display = (seccionId === id) ? 'block' : 'none';
    }
  });

  // También cierra el menú desplegable si está visible
  const menu = document.getElementById("configMenu");
  if (menu && menu.style.display === "block") {
    menu.style.display = "none";
  }
}

function toggleMenu() {
  const menu = document.getElementById("configMenu");
  if (menu) {
    menu.style.display = (menu.style.display === "block") ? "none" : "block";
  }
}
