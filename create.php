<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $puesto = $_POST['puesto'];
    $fecha_contratacion = $_POST['fecha_contratacion'];

    $sql = "INSERT INTO empleados (nombre, email, telefono, puesto, fecha_contratacion) 
            VALUES ('$nombre', '$email', '$telefono', '$puesto', '$fecha_contratacion')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
        alert('Empleado ingresado correctamente');
        window.location.href = 'read.php';
      </script>";
    } else {
        echo "<p class='error-msg'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Empleado</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Agregar Nuevo Empleado</h1>
        
        <form method="POST" action="create.php" class="form-container">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" placeholder="Ingresa el nombre" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="ejemplo@correo.com" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" id="telefono" placeholder="0000-0000">
            </div>

            <div class="form-group">
                <label for="puesto">Puesto:</label>
                <input type="text" name="puesto" id="puesto" placeholder="Cargo del empleado">
            </div>

            <div class="form-group">
                <label for="fecha_contratacion">Fecha de Contratación:</label>
                <input type="date" name="fecha_contratacion" id="fecha_contratacion">
            </div>

            <button type="submit" class="submit-btn">Agregar Empleado</button>
        </form>

        <a href="index.html" class="button">Regresar al Inicio</a>
    </div>
</body>
</html>
