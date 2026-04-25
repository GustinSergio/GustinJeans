<?php
session_start();
include("conexion.php");

if(isset($_POST['login'])){
    $correo   = trim($_POST['correo']);
    $password = $_POST['password'];

    if(!empty($correo) && !empty($password)){
        // Buscar usuario en gustinjeans_bd
        $sql = "SELECT * FROM gustinjeans_bd WHERE correo = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if($resultado->num_rows > 0){
            $usuario = $resultado->fetch_assoc();

            // Verificar contraseña encriptada
            if(password_verify($password, $usuario['password'])){
                $_SESSION['user'] = $usuario['nombre'];

                // Guardar último login en la tabla gustinjeans_bd usando el correo del formulario
                $sqlUpdate = "UPDATE gustinjeans_bd SET ultimo_login = NOW() WHERE correo = ?";
                $stmtUpdate = $conexion->prepare($sqlUpdate);
                $stmtUpdate->bind_param("s", $correo);
                $stmtUpdate->execute();
                $stmtUpdate->close();

                // Insertar registro en la tabla sesiones
                $sqlSesion = "INSERT INTO sesiones (correo, fecha_inicio) VALUES (?, NOW())";
                $stmtSesion = $conexion->prepare($sqlSesion);
                $stmtSesion->bind_param("s", $correo);
                $stmtSesion->execute();
                $stmtSesion->close();

                header("Location: tienda.php");
                exit();
            } else {
                header("Location: index.php?error=contraseña");
                exit();
            }
        } else {
            header("Location: index.php?error=correo");
            exit();
        }

        $stmt->close();
    } else {
        header("Location: index.php?error=campos");
        exit();
    }
}

$conexion->close();
?>







