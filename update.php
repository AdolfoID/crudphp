<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $puesto = $_POST['puesto'];
        $fecha_contratacion = $_POST['fecha_contratacion'];

        $sql = "UPDATE empleados SET nombre='$nombre', email='$email', telefono='$telefono', puesto='$puesto', fecha_contratacion='$fecha_contratacion' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "<script>
                    alert('Empleado actualizado correctamente');
                    window.location.href = 'read.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error al actualizar: " . $conn->error . "');
                    window.location.href = 'read.php';
                  </script>";
        }
    } else {
        $sql = "SELECT * FROM empleados WHERE id=$id";
        $result = $conn->query($sql);
        $empleado = $result->fetch_assoc();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Empleado</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Actualizar Empleado</h1>
        
        <form method="POST" action="update.php?id=<?php echo $id; ?>" class="form-container">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo $empleado['nombre']; ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo $empleado['email']; ?>" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" id="telefono" value="<?php echo $empleado['telefono']; ?>">
            </div>

            <div class="form-group">
                <label for="puesto">Puesto:</label>
                <input type="text" name="puesto" id="puesto" value="<?php echo $empleado['puesto']; ?>">
            </div>

            <div class="form-group">
                <label for="fecha_contratacion">Fecha de Contratación:</label>
                <input type="date" name="fecha_contratacion" id="fecha_contratacion" value="<?php echo $empleado['fecha_contratacion']; ?>">
            </div>

            <button type="submit" class="submit-btn">Actualizar Empleado</button>
        </form>

        <a href="read.php" class="button">Regresar a la Lista</a>
    </div>
</body>
</html>
