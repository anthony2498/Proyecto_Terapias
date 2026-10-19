<?php
//Activar el control de errores

error_reporting(E_ALL);
ini_set('display_errors', 1);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//Informacion de conexion
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$database = 'Terapias_Alternativas';
$port = 3306;

//Conexion a la base de datos
$mysqli = new mysqli($host, $user, $pass, $database, $port);

//Verificamos la conexion
$mysqli->set_charset('utf8mb4');
?>