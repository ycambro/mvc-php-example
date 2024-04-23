<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form action="/login" method="POST">
        <label for="username">Nombre de Usuario:</label>
        <input type="text" name="username" id="username" required><br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required><br>
        <button type="submit">Ingresar</button>
    </form>
    <p>¿No tienes una cuenta? <a href="/register">Regístrate</a></p>
</body>
</html>
