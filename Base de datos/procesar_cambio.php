<?php
$conexion = new mysqli("localhost", "root", "", "gessenapp");

$token = $_POST['token'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt = $conexion->prepare("SELECT usuario_id FROM tokens_restablecer WHERE token = ? AND expiracion > NOW()");
$stmt->bind_param("s", $token);
$stmt->execute();
$stmt->bind_result($usuario_id);
if (!$stmt->fetch()) {
    echo "<script>alert('❌ Token inválido o expirado'); window.location.href='recuperar_contrasena.html';</script>";
    exit();
}
$stmt->close();

$stmt = $conexion->prepare("UPDATE usuarios SET password = ? WHERE id = ?");
$stmt->bind_param("si", $password, $usuario_id);
$stmt->execute();

$stmt = $conexion->prepare("DELETE FROM tokens_restablecer WHERE token = ?");
$stmt->bind_param("s", $token);
$stmt->execute();

echo "<script>alert('✅ Contraseña actualizada con éxito'); window.location.href='../Iniciar_Regristro.html';</script>";
?>
