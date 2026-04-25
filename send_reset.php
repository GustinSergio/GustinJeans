<?php
session_start();
include("conexion.php");

if (isset($_POST['reset'])) {
    $email = trim($_POST['email']);

    if (!empty($email)) {
        // Verificar si el correo existe en gustinjeans_bd
        $sql = "SELECT * FROM gustinjeans_bd WHERE correo = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            // Generar token único
            $token = bin2hex(random_bytes(50));

            // Guardar token en la BD
            $update = "UPDATE gustinjeans_bd SET reset_token = ? WHERE correo = ?";
            $stmt2 = $conexion->prepare($update);
            $stmt2->bind_param("ss", $token, $email);
            $stmt2->execute();

            // Enlace de recuperación
            $link = "http://localhost/GUSTINJEANS/reset_password.php?token=" . $token;

            // Aquí normalmente se enviaría un correo con $link
            // Por ahora mostramos el enlace en pantalla para pruebas
            header("Location: forgot_password.php?msg=Enlace de recuperación: $link");
            exit();
        } else {
            header("Location: forgot_password.php?msg=Correo no registrado");
            exit();
        }
    } else {
        header("Location: forgot_password.php?msg=Debes ingresar tu correo");
        exit();
    }
}

$conexion->close();
?>


