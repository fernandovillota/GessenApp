<?php
session_start();

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "gessenapp");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recibir datos del formulario
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Se recomienda cifrar la contraseña

// Verificar si el correo ya existe
$stmt = $conexion->prepare("SELECT id_u FROM usuarios WHERE correo = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // El email ya está registrado
    echo "<script>alert('❌ El correo ya está registrado. Intenta con otro.'); window.history.back();</script>";
    exit();
}

$stmt->close();

// Insertar nuevo usuario
$stmt = $conexion->prepare("INSERT INTO usuarios (correo, contraseña) VALUES (?, ?)");
$stmt->bind_param("ss", $email, $password);

if ($stmt->execute()) {
    $id_insertado = $stmt->insert_id;
    $_SESSION['usuario_id'] = $id_insertado;

    // Redirigir al formulario adicional
    header("Location: ../Formulario.html");
    exit();
} else {
    echo "❌ Error al registrar: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>
