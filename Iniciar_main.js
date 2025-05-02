document.addEventListener("DOMContentLoaded", function () {
    // Botones y contenedor para cambio de panel
    const signinbtn = document.getElementById("signin");
    const signupbtn = document.getElementById("signup");
    const container = document.querySelector(".container");

    signinbtn?.addEventListener("click", () => {
        container?.classList.remove("right-panel-active");
    });

    signupbtn?.addEventListener("click", () => {
        container?.classList.add("right-panel-active");
    });

    // Formulario de registro
    const form = document.getElementById("registroForm");
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirm_password");
    const mensajeError = document.getElementById("mensajeError");

    if (form && password && confirmPassword && mensajeError) {
        // Validar mientras escribe
        confirmPassword.addEventListener("input", function () {
            if (confirmPassword.value !== password.value) {
                confirmPassword.style.backgroundColor = "#ffdddd";
                mensajeError.style.display = "block";
            } else {
                confirmPassword.style.backgroundColor = "";
                mensajeError.style.display = "none";
            }
        });

        // Validar al enviar el formulario
        form.addEventListener("submit", function (e) {
            if (password.value !== confirmPassword.value) {
                e.preventDefault();
                confirmPassword.style.backgroundColor = "#ffdddd";
                mensajeError.style.display = "block";
                alert("⚠️ Las contraseñas no coinciden.");
            }
        });
    } else {
        console.error("No se encontró el formulario o campos necesarios.");
    }
    const passwordError = document.getElementById("passwordError");

function esPasswordSegura(pass) {
    const tieneLongitud = pass.length >= 6;
    const tieneMayuscula = /[A-Z]/.test(pass);
    const tieneNumero = /\d/.test(pass);
    return tieneLongitud && tieneMayuscula && tieneNumero;
}

// Mostrar error mientras escribe
password.addEventListener("input", function () {
    if (!esPasswordSegura(password.value)) {
        password.style.backgroundColor = "#ffdddd";
        passwordError.style.display = "block";
    } else {
        password.style.backgroundColor = "";
        passwordError.style.display = "none";
    }
});

// Al enviar el formulario
form.addEventListener("submit", function (e) {
    let hayError = false;

    if (!esPasswordSegura(password.value)) {
        password.style.backgroundColor = "#ffdddd";
        passwordError.style.display = "block";
        hayError = true;
    }

    if (password.value !== confirmPassword.value) {
        confirmPassword.style.backgroundColor = "#ffdddd";
        mensajeError.style.display = "block";
        hayError = true;
    }

    if (hayError) {
        e.preventDefault(); // evita el envío
        alert("⚠️ Corrige los errores antes de continuar.");
    }
});

});
