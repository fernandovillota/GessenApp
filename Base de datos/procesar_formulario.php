<?php
session_start();

// Verificamos que el usuario esté registrado y tenga ID en la sesión
if (!isset($_SESSION['usuario_id'])) {
    die("⚠️ No tienes acceso a esta página directamente. Inicia sesión o regístrate primero.");
}

$usuario_id = $_SESSION['usuario_id'];

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "gessenapp");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// ✅ Verificar si ya existe un registro en clientes para este usuario
$check = $conexion->prepare("SELECT id FROM clientes WHERE usuario_id = ?");
$check->bind_param("i", $usuario_id);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    // Ya existe un registro
    echo "<script>alert('⚠️ Ya tienes un registro de datos guardado.'); window.location.href = '../pag_main2.html';</script>";
    exit();
}
$check->close();

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$genero = $_POST['Género'];
$telefono = $_POST['telefono'];
$dieta = $_POST['dieta'];

// Buscar el ID de la enfermedad (enfermedad_id)
$stmt = $conexion->prepare("SELECT id FROM enfermedades WHERE nombre = ?");
$stmt->bind_param("s", $dieta);
$stmt->execute();
$stmt->bind_result($enfermedad_id);
$stmt->fetch();
$stmt->close();

// Insertar datos en la tabla clientes
$stmt = $conexion->prepare("INSERT INTO clientes (usuario_id, nombre, apellido, genero, telefono, enfermedad_id) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issssi", $usuario_id, $nombre, $apellido, $genero, $telefono, $enfermedad_id);

if ($stmt->execute()) {
    // Registro exitoso, redirigir al usuario o mostrar mensaje
    echo "<script>alert('✅ Datos guardados exitosamente.'); window.location.href = '../pag_main2.html';</script>";
} else {
    echo "❌ Error al guardar datos: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>
