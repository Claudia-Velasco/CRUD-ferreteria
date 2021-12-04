<?php
include("conexion.php");
$con=conectar();

$nombreUsuario=$_POST['nombreUsuario'];
$nombre=$_POST['nombre'];
$apePaterno=$_POST['apePaterno'];
$apeMaterno=$_POST['apeMaterno'];
$genero=$_POST['genero'];
$telefono=$_POST['telefono'];
$contraseña=$_POST['contraseña'];
$idArea=$_POST['idArea'];

$sql="INSERT INTO usuario VALUES (null,'$nombreUsuario','$nombre','$apePaterno','$apeMaterno','$genero','$telefono','$contraseña','$idArea')";
$query=mysqli_query($con, $sql);
if($query){
    header("location: usuarios.php");
}else{
    echo "error";
}
?>
