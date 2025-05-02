<?php
session_start();

// Conexión
$conexion = new mysqli("localhost", "root", "", "gessenapp");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Datos del formulario
$email = $_POST['email'];
$password = $_POST['password'];

// Buscar usuario por correo
$stmt = $conexion->prepare("SELECT id_u, contraseña FROM usuarios WHERE correo = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 0) {
    echo "<script>
        alert('❌ El correo no está registrado. ¿Deseas crear una cuenta?');
        window.location.href = '../Iniciar_Regristro.html';
    </script>";
    exit();
}

$stmt->bind_result($usuario_id, $password_hash);
$stmt->fetch();

// Verificar contraseña
if (!password_verify($password, $password_hash)) {
    echo "<script>
        alert('❌ La contraseña no es correcta.');
        window.location.href = '../Iniciar_Regristro.html';
    </script>";
    exit();
}

// Guardar sesión
$_SESSION['usuario_id'] = $usuario_id;

// Verificar si el usuario ya tiene datos en la tabla clientes
$check = $conexion->prepare("SELECT id FROM clientes WHERE usuario_id = ?");
$check->bind_param("i", $usuario_id);
$check->execute();
$check->store_result();

// Redirigir según si tiene datos o no
if ($check->num_rows > 0) {
    echo "<script>
        alert('✅ Bienvenido.');
        window.location.href = '../Pag_main2.html';
    </script>";
} else {
    echo "<script>
        alert('🔎 Necesitamos algunos datos adicionales.');
        window.location.href = '../Formulario.html';
    </script>";
}

$check->close();
$stmt->close();
$conexion->close();
exit();
?>