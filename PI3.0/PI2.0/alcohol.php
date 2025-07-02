<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Tomar y sanitizar la información de los inputs
    $matricula = mysqli_real_escape_string($conn, $_POST['matricula']);
    $persona = mysqli_real_escape_string($conn, $_POST['persona']);
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $fecha = mysqli_real_escape_string($conn, $_POST['fecha']);
    $medicion = mysqli_real_escape_string($conn, $_POST['medicion']);
    $personal = mysqli_real_escape_string($conn, $_POST['personal']);
    $comentario = mysqli_real_escape_string($conn, $_POST['comentario']);

    // Validación de los datos
    if (empty($matricula) || empty($fecha) || empty($medicion) || empty($personal) || empty($nombre)) {
        echo '<script>
        alert("Por favor, complete todos los campos.");
        window.location.href = "registro.php?matricula=' . htmlspecialchars($matricula) . '";
        </script>';
        exit;
    }

    // Inserción de datos en la base de datos usando una consulta preparada
    $query = "INSERT INTO registros (Fecha, idPersona, idAutorizado, Medicion, Comentario) VALUES (?, ?, ?, ?, ?)";
    
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("siids", $fecha, $persona, $personal, $medicion, $comentario);
        if ($stmt->execute()) {
            echo '<script>
            alert("Registro exitoso");
            window.location.href = "registro.php?matricula=' . htmlspecialchars($matricula) . '";
            </script>';
        } else {
            echo '<script>
            alert("Error al registrar. Intenta nuevamente.");
            window.location.href = "registro.php?matricula=' . htmlspecialchars($matricula) . '";
            </script>';
        }
        $stmt->close();
    } else {
        echo '<script>
        alert("Error en la consulta.");
        window.location.href = "registro.php?matricula=' . htmlspecialchars($matricula) . '";
        </script>';
    }

    // Cerrar conexión
    $conn->close();
}
?>
