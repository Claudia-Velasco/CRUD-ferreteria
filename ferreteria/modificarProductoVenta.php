<?php
include("conexion.php");
$con=conectar();

$id=$_POST["idProducto"];
$cantidad=$_POST["cantidad"]; 
$existencia = mysqli_query($con, "SELECT * FROM productos where idProducto='$id'");
$mostrar=mysqli_fetch_array( $existencia);
$producto=$mostrar['producto'];
$costo=$mostrar['costo'];
$sub=$costo*$cantidad; 

$sql="UPDATE detallev SET idProducto='$id' , producto='$producto', cantidad='$cantidad', subtotal='$sub' WHERE idProducto='$id' ";
$query=mysqli_query($con, $sql); 

if($query){
    header("location: ventas.php");
}else{
    echo "error";
}
?>
