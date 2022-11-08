<?php
/*
include ("./conexion.php");
*/
$conexion = mysqli_connect ("localhost","root", "", "appbox");


$nombre=$_POST['nombre'];
$definicion=$_POST['definicion'];
$para_que_sirve=$_POST['para_que_sirve'];
$url1=$_POST['url1'];
$manual1=$_POST['manual1'];
$requisitos=$_POST['requisitos'];
$Tecnologia=$_POST['Tecnologia'];


$sql="INSERT INTO datos1 (nombre_aplicativo, definicion, para_que_sirve, url1, manual1,requisitos,Tecnologia ) VALUES ('$nombre','$definicion','$para_que_sirve','$url1','$manual1','$requisitos','$Tecnologia')";
$sql_resultado=mysqli_query($conexion, $sql);

if($sql_resultado){  
    Header("Location: editar.php");
    
}
else {
    Header("Location: editar.php");
}
       
/*
$sql="INSERT INTO  datoas1( nombre_aplicativo,definicion,para_que_sirve, url , manual,requisitos, Tecnologia) 
VALUES('$nombre_aplicativo','$definicion','$para_que_sirve', '$url','$manual','$requisitos','$Tecnologia')";
$query= mysqli_query($conexion,$sql);


else {
} */
?> 