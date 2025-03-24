<?php
// Conexión a la base de datos
$servidor = "localhost";
$usuarioBD = "root";
$passwordBD = ""; // Cambia la contraseña si es necesario
$basedatos = "Base_de_datos_GessenApp";

$conn = new mysqli($servidor, $usuarioBD, $passwordBD, $basedatos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$email = $_POST['email'];
$password = $_POST['password'];

// Consultar en la base de datos
$sql = "SELECT * FROM sesion WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();

    // Verificar contraseña
    if (password_verify($password, $usuario['password'])) {
        echo "Inicio de sesión exitoso.";
        header("Location: Pag_main2.html"); // Redirigir a otra página
        exit();
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "No se encontró una cuenta con ese correo.";
}

$conn->close();
?>
