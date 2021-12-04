<?php
include("conexion.php");
$con=conectar();

$id=$_GET['id'];

$sql="DELETE FROM productos WHERE idProducto='$id'";
$query=mysqli_query($con, $sql);

    if($query){
        Header("location:bodega.php");
    }else{
        echo "error";
    }
?>