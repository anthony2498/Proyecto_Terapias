<?php

session_start();
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['user'] ?? '');
    $pass = trim($_POST['password'] ?? '');

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['mensaje'] = "Correo invalido";
        $_SESSION['tipo_mensaje'] = "danger";
        header("Location: ../Views/login.php");
        exit();
    }

    $sql = "SELECT 
                u.ID_Usuario,
                u.Nombre,
                u.Apellido,
                u.Email,
                u.Password,
                r.Nombre AS Rol
            FROM Usuarios u
            INNER JOIN Roles r ON u.ID_Rol = r.ID_Rol
            WHERE u.Email = ? AND u.Estado = 'Activo'";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        if (password_verify($pass, $usuario['Password'])) {
            $_SESSION['id_usuario'] = $usuario['ID_Usuario'];
            $_SESSION['nombre_usuario'] = $usuario['Nombre'] . " " . $usuario['Apellido'];
            $_SESSION['rol'] = $usuario['Rol'];
            $_SESSION['correo'] = $usuario['Email'];

            header("Location: ../index.php");
            exit();
        } else {
            $_SESSION['mensaje'] = "Contraseña incorrecta";
            $_SESSION['tipo_mensaje'] = "danger";
            header("Location: ../Views/login.php");
            exit();
        }
    } else {
        $_SESSION['mensaje'] = "Correo no registrado";
        $_SESSION['tipo_mensaje'] = "danger";
        header("Location: ../Views/login.php");
        exit();
    }

    $stmt->close();
    $mysqli->close();
}
?>