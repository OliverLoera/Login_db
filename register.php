<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>

    <h2>Formulario de Registro</h2>

    <form action="registration.php" method="post">
        <div>
            <label>Usuario:</label><br>
            <input type="text" name="username" required>
        </div>

        <div>
            <label>Correo:</label><br>
            <input type="text" name="email" required>
        </div>

        <div>
            <label>Contraseña:</label><br>
            <input type="password" name="password" required>
        </div>

        <button type="submit" name="register">Registrar</button>
    </form>

</body>
</html>

