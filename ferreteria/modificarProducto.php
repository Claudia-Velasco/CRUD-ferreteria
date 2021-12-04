<?php
include("conexion.php");
$con=conectar();
$idProducto=$_POST["idProducto"];
$producto=$_POST["producto"];
$marca=$_POST["marca"];
$proveedor=$_POST["proveedor"];
$cantidad=$_POST["cantidad"];
$costo=$_POST["costo"];

$sql="UPDATE productos SET producto='$producto', marca='$marca', proveedor='$proveedor', cantidad='$cantidad', costo='$costo' WHERE idProducto='$idProducto' ";

$query=mysqli_query($con, $sql);
if($query){
    header("location: bodega.php");
}else{
    echo "error";
}
?>
