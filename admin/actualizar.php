

<?php

$conexion = mysqli_connect ("localhost","root", "", "appbox");

$id_datos =$_POST['id_datos'];
$nombre=$_POST['nombre'];
$definicion=$_POST['definicion'];
$para_que_sirve=$_POST['para_que_sirve'];
$url1=$_POST['url1'];
$manual1=$_POST['manual1'];
$requisitos=$_POST['requisitos'];
$Tecnologia=$_POST['Tecnologia'];
$clave=$_POST['clave'];



if($clave=="TG*2021e")
{

$sql="UPDATE  datos1    SET  nombre_aplicativo='$nombre', definicion='$definicion', para_que_sirve='$para_que_sirve',
url1='$url1',manual1='$manual1',requisitos='$requisitos',Tecnologia='$Tecnologia' where id_datos='$id_datos'";
$sql_resultado=mysqli_query($conexion, $sql);

//echo $query;
}
if($sql_resultado){
header("Location:editar.php");  
}
else
{
 
header("Location:editar.php");     
}



?>






















