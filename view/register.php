<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>
    <h1>Registro</h1>
    <form action="/register" method="POST">
        <label for="username">Nombre de Usuario:</label>
        <input type="text" name="username" id="username" required><br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required><br>
        <label for="password_confirm">Confirmar Contraseña:</label>
        <input type="password" name="password_confirm" id="password_confirm" required><br>
        <button type="submit">Registrarse</button>
    </form>
    <p>¿Ya tienes una cuenta? <a href="/login">Inicia Sesión</a></p>
</body>
</html>
