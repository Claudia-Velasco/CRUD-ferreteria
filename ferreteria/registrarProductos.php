<?php
include("conexion.php");
$con=conectar();

$producto=$_POST['producto'];
$marca=$_POST['marca'];
$proveedor=$_POST['proveedor'];
$cantidad=$_POST['cantidad'];
$costo=$_POST['costo'];

$sql="INSERT INTO productos VALUES (null,'$producto','$marca','$proveedor','$cantidad','$costo')";
$query=mysqli_query($con, $sql);
if($query){
    header("location: bodega.php");
}else{
    echo "error";
}
?>
