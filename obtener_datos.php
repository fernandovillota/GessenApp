<?php
session_start();
header('Content-Type: application/json');

$nombre = null;
$nombre = null;
$correo = null;
$genero = null;
$telefono = null;
$enfermedad = null;


if (isset($_SESSION['usuario_id'])) {
    $conexion = new mysqli("localhost", "root", "", "gessenapp");

    if (!$conexion->connect_error) {
        $stmt = $conexion->prepare("SELECT nombre FROM clientes WHERE usuario_id = ?");
        $stmt->bind_param("i", $_SESSION['usuario_id']);
        $stmt->execute();
        $stmt->bind_result($nombre);
        $stmt->fetch();
        $stmt->close();
        $conexion->close();
    }
}

// Respuesta final con el nombre o "Invitado"
echo json_encode(['nombre' => $nombre ?? 'Invitado']);

// $stmt = $conexion->prepare("SELECT apellido FROM clientes WHERE usuario_id = ?");
// $stmt = $conexion->prepare("SELECT genero FROM clientes WHERE usuario_id = ?");
// $stmt = $conexion->prepare("SELECT telefono FROM clientes WHERE usuario_id = ?");

// echo json_encode(['nombre' => $nombre ?? 'Invitado']);
// echo json_encode(['apellido' => $nombre ?? 'Invitado']);
// echo json_encode(['genero' => $nombre ?? 'No especificada']);
// echo json_encode(['telefono' => $nombre ?? 'No especificada']);
