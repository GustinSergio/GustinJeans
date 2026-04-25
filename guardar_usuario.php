<?php
session_start();
include("conexion.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre   = trim($_POST['nombre']);
    $correo   = trim($_POST['correo']);
    $telefono = trim($_POST['telefono']);
    $password = $_POST['password'];

    // Encriptar la contraseña
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Insertar usuario
    $sql = "INSERT INTO gustinjeans_bd (nombre, correo, telefono, password, fecha_registro) 
            VALUES (?, ?, ?, ?, NOW())";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssss", $nombre, $correo, $telefono, $password_hash);

    if($stmt->execute()){
        $_SESSION['user'] = $nombre;
        header("Location: tienda.php");
        exit();
    } else {
        echo "Error al registrar: " . $conexion->error;
    }

    $stmt->close();
    $conexion->close();
}
?>

