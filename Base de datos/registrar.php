<?php
// Configuración de conexión a la base de datos
$servidor = "localhost";
$usuarioBD = "root";
$passwordBD = ""; // Cambiar si es necesario
$basedatos = "Base_de_datos_GessenApp";

$conn = new mysqli($servidor, $usuarioBD, $passwordBD, $basedatos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos del formulario
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Verificar que las contraseñas coincidan
if ($password !== $confirm_password) {
    die("Las contraseñas no coinciden.");
}

// Hashear la contraseña para mayor seguridad
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Insertar usuario en la base de datos
$sql = "INSERT INTO sesion (usuario, email, password) VALUES ('$usuario', '$email', '$passwordHash')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../Formulario.html"); // Redirigir al formulario principal
    exit();
} else {
    echo "Error al registrar usuario: " . $conn->error;
}

$conn->close();
?>
