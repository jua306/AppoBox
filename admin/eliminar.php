<?php

$conexion = mysqli_connect ("localhost","root", "", "appbox");


$clave=$_POST['clave'];

$id_datos=$_POST['id_datos'];

if($clave=="TG*2021e")
{
    $query="DELETE FROM datos1 where id_datos='$id_datos';";
    $resultadoc=$conexion->query($query);
}


header("Location:editar.php");  

?>