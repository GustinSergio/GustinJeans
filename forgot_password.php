<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña - GustinJeans</title>

    <!-- ICONOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-container">

    <form method="post" action="send_reset.php" autocomplete="off">

        <h2>Recuperar contraseña</h2>

        <div class="input-group">

            <div class="input-container">
                <input type="email" name="email" placeholder="Ingresa tu correo" required>
                <i class="fa-solid fa-envelope"></i>
            </div>

            <!-- BOTÓN ENVIAR -->
            <input type="submit" name="reset" class="btn" value="Enviar enlace de recuperación">

            <!-- BOTÓN VOLVER AL LOGIN -->
            <a href="index.php" class="btn secondary">Volver al inicio</a>

        </div>

        <div class="bottom-text">
            <p>Recibirás un enlace para restablecer tu contraseña si tu correo está registrado.</p>
        </div>

    </form>

    <?php if(isset($_GET['msg'])): ?>
        <div class="info-message">
            <?php echo htmlspecialchars($_GET['msg']); ?>
        </div>
    <?php endif; ?>

</div>

</body>
</html>
