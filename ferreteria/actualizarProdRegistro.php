<?php
include("conexion.php");
$con=conectar();
$id=$_GET['id'];
$sql="SELECT * FROM detallev WHERE idProducto='$id'";
$query=mysqli_query($con, $sql);
$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" href="estilos/estilosVenta.css">
    <!--JQUERY-->
    <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
    
    <title>Actualizar </title>
</head>
<body>
    <div class="actualizarP">
        <h1>Modificar Producto</h1>
       
        <form action="modificarProductoVenta.php" method="POST" align="center" class="actualizar">
            <input type="hidden" name="idProducto" value="<?php echo $row['idProducto']?>">
            
            <input type="text" name="idProducto"  id="itproducto"  class="cuadro" placeholder="Id Producto" value="<?php echo $row['idProducto']?> "> <br>
            <div id="mensaje1" class="errores">Falta el id, Solo números</div>
            <input type="text" name="cantidad" id="itcantidad"  class="cuadro" placeholder="Cantidad" value="<?php echo $row['cantidad']?> ">  <br>
            <div id="mensaje2" class="errores">Falta la cantidad,Solo números</div> 

            <input type="submit" id="bEnviar" class="btn-modificar" value="Actualizar">
    </div>
</body>
</html>


<script>
    var expr= /^[0-9 ]+./;
    var num=/[0-9]/;
    $(document).ready(function(){
        $("#bEnviar").click(function(){
            var producto= $("#itproducto").val();
            var cant =$("#itcantidad").val(); 
            
            
            if(producto==""|| !num.test(producto)){
                $("#mensaje1").fadeIn();
                return false;
	
            }else {
                $("#mensaje1").fadeOut();
                if(cant==""|| !num.test(cant)){
                    $("#mensaje2").fadeIn();
                    return false;
                } 
            }
        });
    });
</script>
