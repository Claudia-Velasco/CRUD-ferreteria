<?php
include("conexion.php");
$con=conectar();
$sql="SELECT * FROM detallev";
$fecha=date("Y-m-d");
$Cant=0;
$q=mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($q))
        {
            $Cant=$Cant+$row['cantidad'];
        }
$stotal = 0; 
$q2=mysqli_query($con, $sql);
    while($row = mysqli_fetch_array($q2))
        {
        $stotal = $stotal +$row['subtotal']; 
        }
        $Total=($stotal*0.16)+$stotal; 
    

$insertar="INSERT INTO venta VALUES (null, '$fecha','$Cant','$Total')";
$query=mysqli_query($con, $insertar);
if($query){
    echo '<script>
    alert("Instertado");
    </script>'; 
    header("location: ventas.php");
    $insert=mysqli_query($con ,"DELETE FROM detallev");
}else{
    echo "error";
}
?>