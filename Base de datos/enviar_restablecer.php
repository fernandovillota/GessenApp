<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$conexion = new mysqli("localhost", "root", "", "gessenapp");

$email = $_POST['email'];
$stmt = $conexion->prepare("SELECT id FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($usuario_id);
if (!$stmt->fetch()) {
    echo "<script>alert('El correo no está registrado'); window.location.href='recuperar_contrasena.html';</script>";
    exit();
}
$stmt->close();

$token = bin2hex(random_bytes(32));
$creado_en = date("Y-m-d H:i:s");
$expira = date("Y-m-d H:i:s", strtotime("+1 hour"));

$stmt = $conexion->prepare("INSERT INTO tokens_restablecer (usuario_id, token, creado_en, expiracion) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isss", $usuario_id, $token, $creado_en, $expira);
$stmt->execute();
$stmt->close();

$link = "http://localhost/gessenapp/restablecer_contrasena.html?token=$token";

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'tu-correo@gmail.com';
    $mail->Password   = 'clave-o-app-password';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('tu-correo@gmail.com', 'GessenApp');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'Restablece tu contraseña';
    $mail->Body    = "Haz clic para cambiar tu contraseña:<br><a href='$link'>$link</a>";

    $mail->send();
    echo "<script>alert('📩 Enlace enviado. Revisa tu correo.'); window.location.href='../Iniciar_Regristro.html';</script>";
} catch (Exception $e) {
    echo "No se pudo enviar el correo: {$mail->ErrorInfo}";
}
?>
