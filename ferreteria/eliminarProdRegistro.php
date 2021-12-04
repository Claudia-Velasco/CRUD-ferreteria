 
<?php
include("conexion.php");
$con=conectar();

$id=$_GET['id'];

$sql="DELETE FROM detallev WHERE idProducto='$id'";
$query=mysqli_query($con, $sql);

    if($query){
        Header("location:ventas.php");
    }else{
        echo "error";
    }
?>