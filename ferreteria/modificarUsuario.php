<?php
include("conexion.php");
$con=conectar();
$idUsuario=$_POST["idUsuario"];
$nombreUsuario=$_POST["nombreUsuario"];
$nombre=$_POST["nombre"];
$apePaterno=$_POST["apePaterno"];
$apeMaterno=$_POST["apeMaterno"];
$genero=$_POST["genero"];
$telefono=$_POST["telefono"];
$contraseña=$_POST["contraseña"];
$idArea=$_POST["idArea"];

$sql="UPDATE usuario SET nombreUsuario='$nombreUsuario' , nombre='$nombre', apePaterno='$apePaterno', apeMaterno='$apeMaterno', genero='$genero' , telefono='$telefono', contraseña='$contraseña', idArea='$idArea' WHERE idUsuario='$idUsuario' ";


$query=mysqli_query($con, $sql);
if($query){
    header("location: usuarios.php");
}else{
    echo "error";
}
?>
