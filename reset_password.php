<?php
session_start();
include("conexion.php");

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Verificar si el token existe en gustinjeans_bd
    $sql = "SELECT * FROM gustinjeans_bd WHERE reset_token = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        // Si el formulario fue enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $new_pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // Actualizar contraseña y limpiar token
            $update = "UPDATE gustinjeans_bd SET password = ?, reset_token = NULL WHERE reset_token = ?";
            $stmt2 = $conexion->prepare($update);
            $stmt2->bind_param("ss", $new_pass, $token);
            $stmt2->execute();

            echo "<p>Contraseña actualizada correctamente. <a href='index.php'>Inicia sesión</a></p>";
            exit();
        }
    } else {
        echo "<p>Token inválido o expirado.</p>";
        exit();
    }
} else {
    echo "<p>No se proporcionó token.</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer contraseña - GustinJeans</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-container">
    <form method="POST" autocomplete="off">
        <h2>Restablecer contraseña</h2>

        <div class="input-group">
            <div class="input-container">
                <input type="password" name="password" placeholder="Nueva contraseña" required>
            </div>

            <input type="submit" class="btn" value="Actualizar contraseña">
        </div>
    </form>
</div>

</body>
</html>



