<?php

// Archivo de configuración con la conexión a la db (diansa)

$host = "localhost";
$user = "root";
$pass = "";
$db = "db_diansa";

$conn = new mysqli($host, $user, $pass, $db) or die("Error al conectar a la db" . mysqli_error($link));