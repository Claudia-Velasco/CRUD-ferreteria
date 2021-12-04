<?php 
$usuario=$_POST['usuario'];
$contraseña=$_POST['password'];
session_start();
$_SESSION['usuario']=$usuario;
include("conexion.php");
$conn=conectar();

$consulta="SELECT * FROM usuario where nombreUsuario='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conn,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['idArea']==1){ //administrador
    header("location:admin.php");

}else
if($filas['idArea']==2){ //ventas
header("location:ventas.php");
}
else
if($filas['idArea']==3){ //bodega
header("location:bodega.php");
}
else{
    ?>
   
	  echo '<script> alert("Error"); window.history.go(-1); </script>';
    
    
    <?php
	
}
mysqli_free_result($resultado);
mysqli_close($conexion);