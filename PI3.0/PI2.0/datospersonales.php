<?php
include 'conexion.php';
session_start();

// Validar y sanitizar la matrícula
$matricula = filter_input(INPUT_GET, 'matricula', FILTER_SANITIZE_STRING);

if (!$matricula) {
    echo '<script>
        alert("Por favor selecciona una matrícula válida.");
        window.location.href = "index.php";
    </script>';
    exit();
}

// Consulta para obtener los datos del estudiante y sus registros
$sql = "SELECT e.idPersona, e.Matricula, r.Medicion, r.Fecha, p.nombre, p.Edad, p.APaterno, p.AMaterno
        FROM estudiantes e
        LEFT JOIN registros r ON e.idPersona = r.idPersona
        LEFT JOIN personas p ON r.idPersona = p.idPersona
        WHERE e.Matricula = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $matricula);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo '<script>
        alert("No se encontraron datos para la matrícula seleccionada.");
        window.location.href = "index.php";
    </script>';
    exit();
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del Estudiante</title>
    <link rel="stylesheet" href="assets/css/user-style.css">
</head>
<body>
    <!-- Menú lateral -->
    <div class="menu">
        <div class="logo">
            <img src="assets/images/logo.png" alt="Logo">
        </div>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="acerca.php">Acerca de</a></li>
        </ul>
    </div>

    <!-- Botón hamburguesa -->
    <div class="menu-toggle">
        <div></div>
        <div></div>
        <div></div>
    </div>

    <!-- Contenedor principal -->
    <div class="container">
        <!-- Lado izquierdo: Datos personales -->
        <div class="user-data">
            <div class="avatar">
                <img src="assets/images/avatar.png" alt="Avatar">
            </div>
            <h2>Datos del Estudiante</h2>
            <div>
                <p><strong>ID Persona:</strong> <?= htmlspecialchars($row['idPersona']) ?></p>
                <p><strong>Nombre:</strong> <?= htmlspecialchars($row['nombre']." ". $row['APaterno']." ". $row['AMaterno']) ?></p>
                <p><strong>Edad:</strong> <?= htmlspecialchars($row['Edad']) ?></p>
                <p><strong>Matricula:</strong> <?= htmlspecialchars($row['Matricula']) ?></p>
            </div>
        </div>

        <!-- Lado derecho: Alcoholímetro -->
        <div class="alcoholimetro">
            <a href="registro.php?matricula=<?= htmlspecialchars($matricula) ?>">
                <img src="assets/images/alcoholimetro.png" alt="Alcoholímetro">
                <p>Datos Alcoholímetro <br> (Click para ver)</p>
            </a>
        </div>
    </div>

    <!-- Script para menú hamburguesa -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const menuToggle = document.querySelector('.menu-toggle');
            const menu = document.querySelector('.menu');

            if (menuToggle && menu) {
                menuToggle.addEventListener('click', () => {
                    menu.classList.toggle('active');
                });
            }
        });
    </script>
</body>
</html>
