<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GustinJeans</title>

    <!-- ICONOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="login-container">

    <form method="post" action="send.php" autocomplete="off">

        <h2>Iniciar Sesión</h2>

        <div class="input-group">

            <div class="input-container">
                <input type="email" name="correo" placeholder="Correo electrónico" required>
                <i class="fa-solid fa-envelope"></i>
            </div>

            <div class="input-container">
                <input type="password" name="password" placeholder="Contraseña" required>
                <i class="fa-solid fa-lock"></i>
            </div>

            <!-- BOTÓN LOGIN -->
            <input type="submit" name="login" class="btn" value="Iniciar sesión">

            <!-- BOTÓN REGISTRARSE -->
            <a href="registrarse.php" class="btn secondary">Crear cuenta</a>

            <!-- ENLACE OLVIDÉ CONTRASEÑA -->
            <a href="forgot_password.php" class="forgot-link">¿Olvidaste tu contraseña?</a>

        </div>

        <div class="bottom-text">
            <a href="#">Términos y condiciones</a>
        </div>

    </form>

    <?php if(isset($_GET['error'])): ?>
        <div class="error-message">
            <?php
            if($_GET['error'] == 'correo'){
                echo "El correo no existe.";
            } elseif($_GET['error'] == 'contraseña'){
                echo "La contraseña es incorrecta.";
            } elseif($_GET['error'] == 'campos'){
                echo "Debes llenar todos los campos.";
            }
            ?>
        </div>
    <?php endif; ?>

</div>

</body>
</html>




