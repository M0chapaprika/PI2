<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENCUESTA</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
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

    <div class="container">
        <!-- Lado izquierdo: Datos personales -->
        <div class="user-data">
            <h2>Encuesta de Satisfacción</h2>
            <form id="encuestaForm" action="guardar_encuesta.php" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required><br><br>

                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required><br><br>

                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" readonly>

                <script>
                    document.getElementById("fecha").value = new Date().toISOString().split('T')[0];
                </script><br>

                <label>¿Cómo calificas nuestro servicio? (1-5)</label><br>
                <select name="satisfaccion" required>
                    <option value="1">1 - Muy Malo</option>
                    <option value="2">2 - Malo</option>
                    <option value="3">3 - Regular</option>
                    <option value="4">4 - Bueno</option>
                    <option value="5">5 - Excelente</option>
                </select><br><br>

                <label for="comentario">Comentarios:</label><br>
                <textarea id="comentario" name="comentario" rows="4" cols="50"></textarea><br><br>

                <input type="submit" value="Enviar Encuesta">
            </form>
            <br>
        </div>
    </div>

    <script>
            // Enviar formulario sin recargar la página
            $("#encuestaForm").submit(function(event) {
                event.preventDefault(); 
                $.ajax({
                    url: "guardar_encuesta.php",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.trim() === "success") {
                            alert("Encuesta enviada con éxito");
                            $("#encuestaForm")[0].reset(); 
                            cargarRespuestas(); 
                        } else {
                            alert("Error al enviar la encuesta");
                        }
                    }
                });
            });
    </script>
</body>
</html>
