<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
    <h1>Bienvenido, <?= $username ?></h1>
    <div>
        
        <img src="<?= $thumbnail_location ?>" alt="Foto de perfil" style="width: 200px; height: 200px">
    </div>
    <div>
        
        <form action="/upload-thumbnail" method="POST" enctype="multipart/form-data">
            <label for="thumbnail">Cambiar foto de perfil:</label>
            <input type="file" name="thumbnail" id="thumbnail">
            <button type="submit"> Guardar </button>
        </form>
    </div>
    <div>
        
        <h2>Editar Perfil</h2>
        <form action="/update-profile" method="POST">
            <label for="first_name">Nombre:</label> 
            <input type="text" name="first_name" id="first_name" value="<?= $user['first_name'] ?>"><br>
            <label for="last_name">Apellido:</label>
            <input type="text" name="last_name" id="last_name" value="<?= $user['last_name'] ?>"><br>
            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" id="email" value="<?= $user['email'] ?>"><br>
            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
    <div>
        
        <a href="/logout">Cerrar Sesión</a>
    </div>
</body>
</html>
