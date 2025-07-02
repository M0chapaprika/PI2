<?php
include 'conexion.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = trim($_POST['nombre']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $satisfaccion = filter_var($_POST['satisfaccion'], FILTER_VALIDATE_INT);
    $comentario = trim($_POST['comentario']);
    $fecha = trim($_POST['fecha']);

    if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $query = "INSERT INTO encuesta (nombre, email, satisfaccion, comentario, fecha) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssiss", $nombre, $email, $satisfaccion, $comentario, $fecha);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Método no permitido";
}
?>
