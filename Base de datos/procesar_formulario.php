<?php
// Datos de la conexión
$servidor = "localhost";
$usuario = "root"; // Cambia si tienes configurado otro usuario
$password = ""; // Cambia si tienes contraseña
$basedatos = "Base de datos GessenApp";

// Crear conexión
$conn = new mysqli($servidor, $usuario, $password, $basedatos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$email = $_POST['email'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$genero = $_POST['Género'];
$telefono = $_POST['telefono'];
$ciudad = $_POST['lugar-nacimiento'];
$enfermedad = $_POST['enfermedad'];
$dieta = $_POST['dieta'];

// Insertar datos en la base de datos
$sql = "INSERT INTO formulario (email, nombre, apellido, genero, telefono, ciudad, enfermedad, dieta)
        VALUES ('$email', '$nombre', '$apellido', '$genero', '$telefono', '$ciudad', '$enfermedad', '$dieta')";

if ($conn->query($sql) === TRUE) {
    // Redirigir a la página siguiente si la inserción es exitosa
    header("Location: ../Pag_main2.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
