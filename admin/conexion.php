<?php


$conexion = mysqli_connect(
    $host = "localhost",
    $username = "root",
    $password = "",
    $database = "appbox"
  
);
$conexion->set_charset("utf8");
if (!$conexion){
    die("Conexión caida con la BD" . mysqli_connect_error());
}

error_reporting(0);