<?php
include 'conexion.php';
session_start();

$matricula = filter_input(INPUT_GET, 'matricula', FILTER_SANITIZE_STRING);

if (!$matricula) {
    echo '<script>
        alert("Por favor selecciona una matrícula válida.");
        window.location.href = "index.php";
    </script>';
    exit();
}

$sql = "SELECT e.idPersona, e.Matricula, r.Medicion, r.Fecha, p.nombre, p.Edad, p.APaterno, p.AMaterno, r.idRegistro, r.idAutorizado
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

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Alcoholímetro</title>
    <link rel="stylesheet" href="assets/css/registeralcohol-style.css">
</head>
<body>
    <!-- Botón hamburguesa -->
    <div class="menu-toggle">
        <div></div>
        <div></div>
        <div></div>
    </div>

    <!-- Menú lateral -->
    <nav class="menu">
        <div class="logo">
            <img src="assets/images/logo.png" alt="Logo">
        </div>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="acerca.php">Acerca de</a></li>
        </ul>
    </nav>

    <!-- Contenedor principal -->
    <div class="container">
        <!-- Datos del estudiante -->
        <div class="user-data">
            <div class="avatar">
                <img src="assets/images/avatar.png" alt="Avatar">
            </div>
            <h2>Datos del Estudiante</h2>
            <p><strong>ID Persona:</strong> <?= htmlspecialchars($row['idPersona']) ?></p>
            <p><strong>Nombre:</strong> <?= htmlspecialchars($row['nombre'] . " " . $row['APaterno'] . " " . $row['AMaterno']) ?></p>
            <p><strong>Edad:</strong> <?= htmlspecialchars($row['Edad']) ?></p>
            <p><strong>Matrícula:</strong> <?= htmlspecialchars($row['Matricula']) ?></p>
        </div>

        <!-- Formulario -->
        <div class="right-side">
            <h2>Registro de Alcoholímetro</h2>
            <form id="formBuscar" action="alcohol.php" method="POST" onsubmit="return confirmSubmit()">
                <input type="hidden" id="persona" name="persona" value="<?= htmlspecialchars($row['idPersona']); ?>">

                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($row['nombre']); ?>" readonly>

                <label for="matricula">Matrícula:</label>
                <input type="text" id="matricula" name="matricula" value="<?= htmlspecialchars($row['Matricula']); ?>" readonly>

                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" readonly>

                <label for="hora">Hora:</label>
                <input type="time" id="hora" name="hora" readonly>

                <label for="personal">Nombre del Operador:</label>
                <select id="personal" name="personal" required>
                    <option value="" disabled selected>Seleccione un operador</option>
                    <?php
                    include 'conexion.php';
                    $sql_operadores = "SELECT autorizados.idAutorizado, personas.Nombre FROM autorizados
                    LEFT JOIN personas ON autorizados.idPersona = personas.idPersona";
                    $result_operadores = $conn->query($sql_operadores);
                    if ($result_operadores->num_rows > 0) {
                        while ($operador = $result_operadores->fetch_assoc()) {
                            echo '<option value="' . htmlspecialchars($operador['idAutorizado']) . '">' . htmlspecialchars($operador['Nombre']) . '</option>';
                        }
                    } else {
                        echo '<option value="">No hay operadores disponibles</option>';
                    }
                    $conn->close();
                    ?>
                </select>

                <label for="medicion">Nivel de Alcohol:</label>
                <select name="medicion" id="medicion" required>
                    <option value="" disabled selected>Seleccione una opción</option>
                </select>

                <label for="comentario">Información Adicional:</label>
                <textarea id="comentario" name="comentario" rows="4" placeholder="Escribe información adicional"></textarea>

                <button type="submit">Registrar</button>
            </form>
        </div>
    </div>

    <script>
        const now = new Date();
        const fecha = now.toISOString().split('T')[0];
        const hora = now.toTimeString().split(':').slice(0, 2).join(':');
        document.getElementById("fecha").value = fecha;
        document.getElementById("hora").value = hora;

        const select = document.getElementById("medicion");
        for (let i = 0.0; i <= 2.50; i += 0.01) {
            const option = document.createElement("option");
            option.value = i.toFixed(2);
            option.textContent = `${i.toFixed(2)} g/L`;
            select.appendChild(option);
        }

        function confirmSubmit() {
            return window.confirm("¿Está seguro de que desea enviar este registro?");
        }

        document.querySelector('.menu-toggle').addEventListener('click', () => {
            document.querySelector('.menu').classList.toggle('active');
        });
    </script>
</body>
</html>
