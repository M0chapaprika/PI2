<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DETECTOR DE ALCOHOL EN EL CUERPO</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
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

    <!-- Botón hamburguesa -->
    <div class="menu-toggle">
        <div></div>
        <div></div>
        <div></div>
    </div>

    <!-- Contenedor principal -->
    <div class="container">
        <div class="logo-container">
            <img src="assets/images/logo.png" alt="Logo">
            <h1>DETECTOR DE ALCOHOL EN EL CUERPO</h1>
        </div>

        <!-- Formulario de búsqueda -->
        <div class="login-form">
            <h2>DAC</h2>
            <form id="formBuscar" action="datospersonales.php" method="GET" onsubmit="return validarFormulario()">
                <label for="matricula">Matrícula:</label>
                <input type="number" id="matricula" name="matricula" placeholder="Ingresa tu matrícula" onkeyup="buscar()" autocomplete="off" required>
                <div class="results" id="results"></div>
                <button type="submit">Buscar</button>
            </form>
            <div id="mensaje" style="color:red; display:none;">Por favor, selecciona una matrícula válida.</div>
        </div>
    </div>

    <script>
        function buscar() {
            const input = document.getElementById('matricula');
            const resultsDiv = document.getElementById('results');
            const query = input.value.trim();

            if (query.length > 0) {
                const xhr = new XMLHttpRequest();
                xhr.open("GET", "buscar.php?query=" + query, true);
                xhr.onload = function () {
                    if (this.status === 200) {
                        resultsDiv.innerHTML = this.responseText;
                        resultsDiv.style.display = "block"; // Mostrar sugerencias
                    }
                };
                xhr.send();
            } else {
                resultsDiv.style.display = "none"; // Ocultar resultados si no hay texto
            }
        }

        function seleccionarMatricula(matricula) {
            document.getElementById('matricula').value = matricula;
            document.getElementById('results').style.display = "none"; // Ocultar la lista después de seleccionar
        }

        function validarFormulario() {
            const matriculaInput = document.getElementById('matricula').value.trim();
            const mensaje = document.getElementById('mensaje');

            if (matriculaInput === "" || isNaN(matriculaInput)) {
                mensaje.style.display = "block"; // Mostrar mensaje de error
                return false; // No enviar formulario
            }

            mensaje.style.display = "none";
            return true;
        }
    </script>
</body>
</html>
