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

// Consulta para obtener los datos del estudiante y sus registros, junto con el nombre de la persona que autorizó
$sql = "SELECT e.idPersona, e.Matricula, r.Medicion, r.Fecha, p.nombre, p.Edad, p.APaterno, p.AMaterno, r.idRegistro, r.idAutorizado, r.Comentario, a.nombre AS nombre_autorizado
        FROM estudiantes e
        LEFT JOIN registros r ON e.idPersona = r.idPersona
        LEFT JOIN personas p ON r.idPersona = p.idPersona
        LEFT JOIN personas a ON r.idAutorizado = a.idPersona
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
    <title>Página de Registro</title>
    <link rel="stylesheet" href="assets/css/register-style.css">
    <style>
        .container {
            max-height: 80vh;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <!-- Menú lateral -->
    <nav class="menu">
        <div class="logo">
            <img src="assets/images/logo.png" alt="Logo">
        </div>
        <ul>
            <li><a href="index.php">Inicio</a></li>
        </ul>
    </nav>

    <!-- Botón hamburguesa -->
    <div class="menu-toggle">
        <div></div>
        <div></div>
        <div></div>
    </div>

    <!-- Contenedor principal -->
    <div class="container">
        <div class="user-data">
            <div class="avatar">
                <img src="assets/images/avatar.png" alt="Avatar">
            </div>
            <h2>Datos del Estudiante</h2>
            <div>
                <p><strong>ID Persona:</strong> <?= htmlspecialchars($row['idPersona']) ?></p>
                <p><strong>Nombre:</strong> <?= htmlspecialchars($row['nombre'] . " " . $row['APaterno'] . " " . $row['AMaterno']) ?></p>
                <p><strong>Edad:</strong> <?= htmlspecialchars($row['Edad']) ?></p>
                <p><strong>Matrícula:</strong> <?= htmlspecialchars($row['Matricula']) ?></p>
            </div>
        </div>

        <!-- Sección de Alcoholímetro -->
        <div class="right-side">
            <div class="title-container">
                <h1>Registro de Alcoholímetro</h1>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>No.registro</th>
                        <th>Fecha</th>
                        <th>Nombre del Autorizador</th>
                        <th>Nivel</th>
                        <th>Información Adicional</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($rew = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($rew['idRegistro']) ?></td>
                                <td><?= htmlspecialchars($rew['Fecha']) ?></td>
                                <td><?= htmlspecialchars($rew['nombre_autorizado']) ?></td>
                                <td style="color: <?= $rew['Medicion'] == 0.0 ? 'green' : ($rew['Medicion'] < 0.5 ? 'yellow' : 'red') ?>;">
                                    <?= htmlspecialchars($rew['Medicion']) ?>
                                </td>
                                <td><?= htmlspecialchars($rew['Comentario']) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" style="text-align: center;">Sin registros</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <div style="text-align: center; margin-top: 20px;">
                <a href="registroalcohol.php?matricula=<?= urlencode($matricula) ?>" class="btn btn-primary" style="padding: 10px 20px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 5px;">Agregar Registro</a>
            </div>
        </div>
    </div>
</body>
</html>
