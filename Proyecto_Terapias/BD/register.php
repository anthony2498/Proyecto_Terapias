<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once("database.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['name'] ?? '');
    $apellido = trim($_POST['last_name'] ?? '');
    $correo = trim($_POST['email'] ?? '');
    $clave = trim($_POST['register_password'] ?? '');
    $confirmacion = trim($_POST['register_password_confirm'] ?? '');

    if ($nombre === '' || $apellido === '' || $correo === '' || $clave === '' || $confirmacion === '') {
        $_SESSION['mensaje'] = "Todos los campos son obligatorios";
        $_SESSION['tipo_mensaje'] = "danger";
        header("Location: ../Views/login.php");
        exit();
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['mensaje'] = "Correo invalido";
        $_SESSION['tipo_mensaje'] = "danger";
        header("Location: ../Views/login.php");
        exit();
    }

    if ($clave !== $confirmacion) {
        $_SESSION['mensaje'] = "Las contraseñas no coinciden";
        $_SESSION['tipo_mensaje'] = "danger";
        header("Location: ../Views/login.php");
        exit();
    }

    $sqlRol = "SELECT ID_Rol FROM Roles WHERE Nombre = 'Recepcionista' LIMIT 1";
    $stmtRol = $mysqli->prepare($sqlRol);
    $stmtRol->execute();
    $resultadoRol = $stmtRol->get_result();

    if ($resultadoRol->num_rows !== 1) {
        $_SESSION['mensaje'] = "No existe el rol Recepcionista en la base de datos";
        $_SESSION['tipo_mensaje'] = "danger";
        header("Location: ../Views/login.php");
        exit();
    }

    $rol = $resultadoRol->fetch_assoc();
    $idRol = $rol['ID_Rol'];

    $sqlValidar = "SELECT ID_Usuario FROM Usuarios WHERE Email = ?";
    $stmtValidar = $mysqli->prepare($sqlValidar);
    $stmtValidar->bind_param("s", $correo);
    $stmtValidar->execute();
    $resultadoValidar = $stmtValidar->get_result();

    if ($resultadoValidar->num_rows > 0) {
        $_SESSION['mensaje'] = "El correo ya esta registrado";
        $_SESSION['tipo_mensaje'] = "warning";
        header("Location: ../Views/login.php");
        exit();
    }

    $clave_hash = password_hash($clave, PASSWORD_DEFAULT);

    $sql = "INSERT INTO Usuarios (ID_Rol, Nombre, Apellido, Email, Password, Estado)
            VALUES (?, ?, ?, ?, ?, 'Activo')";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("issss", $idRol, $nombre, $apellido, $correo, $clave_hash);
    $stmt->execute();

    $_SESSION['mensaje'] = "Usuario creado correctamente";
    $_SESSION['tipo_mensaje'] = "success";

    $stmtRol->close();
    $stmtValidar->close();
    $stmt->close();
    $mysqli->close();

    header("Location: ../Views/login.php");
    exit();
} else {
    header("Location: ../Views/login.php");
    exit();
}
?>