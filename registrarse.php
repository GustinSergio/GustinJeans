<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - Gustin Jeans</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<form method="post" action="guardar_usuario.php" class="form">

    <h2>Crear Cuenta</h2>

    <input type="text" name="nombre" placeholder="Nombre Completo" required>

    <input type="email" name="correo" placeholder="Correo electrónico" required>

    <input type="tel" name="telefono" placeholder="Número de contacto" required>

    <input type="password" name="password" placeholder="Contraseña" required>

    <button type="submit">Registrarse</button>

    <p>¿Ya tienes cuenta? <a href="index.php">Iniciar sesión</a></p>

</form>

</body>
</html>