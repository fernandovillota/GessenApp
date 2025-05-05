  // abre el menú desplegable 
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

  // validacion para que muestre el nombre del usuario
document.addEventListener("DOMContentLoaded", function () {
  fetch("obtener_datos.php")
    .then(response => response.json())
    .then(data => {
      // Nombre en el menú superior
      const nombreMenu = document.getElementById("nombre-usuario");

      // Nombre en la sección "datos personales"
      const nombreDatos = document.getElementById("nombre-usuario-datos");

      if (data.nombre) {
        if (nombreMenu) {
          nombreMenu.textContent = data.nombre;
        }

        if (nombreDatos) {
          nombreDatos.textContent = data.nombre;
        }
      }
    })
    .catch(error => {
      console.error("Error al obtener el nombre del usuario:", error);
    });
});

