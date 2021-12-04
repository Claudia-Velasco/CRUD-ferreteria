<?php
include("conexion.php");
$conn=conectar();
$sql="SELECT * FROM detallev";
$query=mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <link rel="stylesheet" href="estilos/estilosVenta.css">
</head>
<body>
    <h1>Ventas</h1> <?=date('d/m/Y');?> <br>
    <?php
        $NC= mysqli_query($conn,"SELECT MAX(idVenta) As idVenta FROM venta");
        $folio_ultimo=mysqli_fetch_row($NC);
        $caja=($folio_ultimo[0]+1);
        echo "Venta número: " .$caja;
    ?>
    <br>
        <form  action="ventProdRegistro.php" method="POST" class="modificarV">
            <div ALIGN="center" >
            <div > <br>
                Código:
                <input type="number" name="codigo" class="cuadro" placeholder="Id Producto"  pattern="[0-9]+">
                Cantidad :
                <input type="number" name="cantidad" class="cuadro"  placeholder="Cantidad"  min="1" max="100" pattern="[0-9]+">
                <br> <br>
            
            </div >
            <input type="submit" id="bEnviar" name="agregar" class="btn-modificar" value="Agregar">
            </div> <br>
         </form>
        <div class="lateral" >
                <h3>Productos</h3>
                <br>
                <table >
                    <thead class="table">
                        <tr>
                            <th>Id</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Costo</th>
                            <th>Subtotal</th>    
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        
                            while($row=mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <th><?php echo $row['idProducto']?></th>
                            <th><?php echo $row['producto']?></th>
                            <th><?php echo $row['cantidad']?></th>
                            <th><?php echo $row['costo']?></th>
                            <th><?php echo $row['subtotal']?></th>
                            <th><a href="actualizarProdRegistro.php?id=<?php echo $row['idProducto']?>" class="btn-editar";><img src="imagenes/editar.jpg"  class="icono-tamaño"></a> </th>
                            <th><a href="eliminarProdRegistro.php?id=<?php echo $row['idProducto']?>" class="btn-eliminar"><img src="imagenes/eliminar.png"  class="icono-tamaño"></a> </th>
                            <th></th>
                        </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table >
            </div>

    <br><br>
    <form action="ventValidar.php" class="actualizar"> 
    <?php //Calcular el subtotal "$stotal"
        $stotal = 0; // total declarado antes del bucle
        $q=mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($q))
            {
            $stotal = $stotal +$row['subtotal']; // Sumar variable $stotal + resultado de la consulta
            }
        echo "Subtotal:  ".$stotal; // Se imprime $stotal y se realiza la suma
    ?>
    <br>
    <?php //Calcular la cantidad  
    $q=mysqli_query($conn, $sql);
    $Cant=0;
    while ($row = mysqli_fetch_array($q))
        {
            $Cant=$Cant+$row['cantidad'];
        }
    echo "Cantidad de productos:  ".$Cant; 
    ?>
    <br>
    <?php //Calcular el iva $iva
        $iva= 0.16;
        echo "Iva: ".($iva*100)."%";
    ?>
    <br>
    <?php //Calcular el total a pagar $Total
        $Total=($stotal*0.16)+$stotal;
        echo "Total: ".$Total;
    ?>
    <br><br>
        <input type="submit"  name="registrar" class="btn-registar" value="Registrar">
    </form>   
    </div> 
    <form class="salir"><input type="button" value="Salir"  class="btn-salir" onclick="location.href='login.html'"></form>

</body>
</html>