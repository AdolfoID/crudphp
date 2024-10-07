<?php
$host = "localhost";
$user = "root";  // usuario predeterminado en la mayoría de instalaciones
$password = "";  // contraseña vacía para XAMPP, en MAMP sería "root"
$database = "empresa";

$conn = new mysqli($host, $user, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
