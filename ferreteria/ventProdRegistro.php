<?php
include("conexion.php");
$con=conectar();

$id=$_POST['codigo'];
$cantidad=$_POST['cantidad'];
$existencia = mysqli_query($con, "SELECT * FROM productos where idProducto='$id'");
if (mysqli_num_rows($existencia)>0){
    $verifica_cod = mysqli_query($con, "SELECT * FROM detallev where idProducto='$id'");

    if (mysqli_num_rows($verifica_cod)>0){
        echo '<script>
        alert("Ya existe ese codigo, puedes editar la cantidad ");
        </script>';
        }else{
            $existencia = mysqli_query($con, "SELECT * FROM productos where idProducto='$id'");
            $mostrar=mysqli_fetch_array( $existencia);
            $producto=$mostrar['producto'];
            $costo=$mostrar['costo'];
            $sub=$costo*$cantidad;

            $sql="INSERT INTO detallev VALUES ('$id','$producto','$cantidad','$costo','$sub', null)";
            $query=mysqli_query($con, $sql);
            if($query){
                header("location: ventas.php");
            }else{
                echo "error";
            }
        }
}else{
    echo '<script>
        alert("No existe ese código");
        </script>';
}

?>

