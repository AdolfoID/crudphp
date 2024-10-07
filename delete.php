<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM empleados WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Mensaje de éxito en una alerta de JavaScript y redirigir a read.php
        echo "<script>
                alert('Empleado eliminado correctamente');
                window.location.href = 'read.php';
              </script>";
    } else {
        // Mensaje de error en una alerta de JavaScript
        echo "<script>
                alert('Error al eliminar empleado: " . $conn->error . "');
                window.location.href = 'read.php';
              </script>";
    }
}
?>
