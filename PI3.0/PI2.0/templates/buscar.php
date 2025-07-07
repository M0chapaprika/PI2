<?php
include 'conexion.php'; // Archivo para conectar con la base de datos

if (isset($_GET['query'])) {
    $query = trim($_GET['query']); // Eliminar espacios en blanco

    // Asegurar que la consulta tenga al menos un carácter antes de ejecutarla
    if (!empty($query)) {
        // Consulta SQL con INNER JOIN para obtener información de estudiantes y personas
        $sql = "
            SELECT 
                estudiantes.idEstudiante, 
                estudiantes.Matricula,  
                personas.Nombre,
                personas.APaterno,
                personas.AMaterno
            FROM estudiantes
            INNER JOIN personas ON estudiantes.idPersona = personas.idPersona
            WHERE estudiantes.Matricula LIKE ? 
            LIMIT 5"; // Limitar los resultados para mejorar rendimiento

        $stmt = $conn->prepare($sql);
        $param = $query . "%"; // Buscar coincidencias que comiencen con el texto ingresado
        $stmt->bind_param("s", $param);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p onclick='seleccionarMatricula(\"" . htmlspecialchars($row['Matricula']) . "\")' class='result-item'>" 
                    . htmlspecialchars($row['Matricula']) . " - " 
                    . htmlspecialchars($row['Nombre']) . " " 
                    . htmlspecialchars($row['APaterno']) . " " 
                    . htmlspecialchars($row['AMaterno']) . 
                    "</p>";
            }
        } else {
            echo "<p class='no-result'>No se encontraron resultados</p>";
        }

        $stmt->close();
    }
}
?>
