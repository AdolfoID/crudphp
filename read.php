<?php
include 'db.php';

$sql = "SELECT * FROM empleados";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empleados</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Empleados</h1>

        <?php
        if ($result->num_rows > 0) {
        ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Puesto</th>
                    <th>Fecha de Contratación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['telefono']; ?></td>
                        <td><?php echo $row['puesto']; ?></td>
                        <td><?php echo $row['fecha_contratacion']; ?></td>
                        <td>
                            <a href="update.php?id=<?php echo $row['id']; ?>" class="edit-btn">Editar</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('¿Estás seguro de eliminar este empleado?')">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php
        } else {
            echo "<p>No hay empleados registrados.</p>";
        }
        ?>

        <a href="index.html" class="button">Regresar al Inicio</a>
    </div>
</body>
</html>
