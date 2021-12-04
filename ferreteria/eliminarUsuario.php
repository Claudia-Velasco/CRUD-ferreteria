<?php
include("conexion.php");
$con=conectar();

$id=$_GET['id'];

$sql="DELETE FROM usuario WHERE idUsuario='$id'";
$query=mysqli_query($con, $sql);

    if($query){
        Header("location:usuarios.php");
    }else{
        echo "error";
    }
?>