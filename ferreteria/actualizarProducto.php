<?php
include("conexion.php");
$con=conectar();
$id=$_GET['id'];
$sql="SELECT * FROM productos WHERE idProducto='$id'";
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
    <link rel="stylesheet" href="estilos/estilosB.css">
    <!--JQUERY-->
    <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
    
    <title>Actualizar </title>
</head>
<body>
    <div>
        <h1>Modificar Producto</h1>
        <form class="salir2"><input type="button" value="Página anterior"  class="btn-salir" onClick="history.go(-1);"></form>

        <form action="modificarProducto.php" method="POST" align="center" class="modificar">
            <input type="hidden" name="idProducto" value="<?php echo $row['idProducto']?>">
            
            <input type="text" name="producto"  id="itproducto"  class="cuadro" placeholder="Producto" value="<?php echo $row['producto']?> "> <br>
            <div id="mensaje1" class="errores">Falta el nombre del producto </div>
            <input type="text" name="marca" id="itmarca"  class="cuadro" placeholder="Marca" value="<?php echo $row['marca']?> ">  <br>
            <div id="mensaje2" class="errores">Falta la marca</div>
            <input type="text" name="proveedor"  id="itproveedor" class="cuadro"  placeholder="Proveerdor" value="<?php echo $row['proveedor']?> "> <br>
            <div id="mensaje3" class="errores">Falta el proveedor</div>
            <input type="text" name="cantidad"  id="itcantidad" class="cuadro" placeholder="Cantidad" value="<?php echo $row['cantidad']?> "> <br>
            <div id="mensaje4" class="errores">Faltan datos, solo números</div>
            <input type="text" name="costo" id="itcosto"  class="cuadro" placeholder="Costo" value="<?php echo $row['costo']?> "> <br> <br>
            <div id="mensaje5" class="errores">Faltan datos, solo números</div>

            <input type="submit" id="bEnviar" class="btn-modificar" value="Actualizar">
           
    </div> </form>  
    
</body>
</html>


<script>
    var expr= /^[0-9 ]+./;
    var num=/[0-9]/;
    $(document).ready(function(){
        $("#bEnviar").click(function(){
            var producto= $("#itproducto").val();
            var marca =$("#itmarca").val();
            var prov =$("#itproveedor").val();
            var cant =$("#itcantidad").val();
            var cost =$("#itcosto").val();
            
            
            if(producto==""){
                $("#mensaje1").fadeIn();
                return false;
	
            }else {
                $("#mensaje1").fadeOut();
                if(marca==""){
                    $("#mensaje2").fadeIn();
                    return false;
                }else{
                    $("#mensaje2").fadeOut();
                    if(prov==""){
                        $("#mensaje3").fadeIn();
                        return false;
                    }else{
                            $("#mensaje3").fadeOut();
                        if(cant==""|| !num.test(cant)){
                            $("#mensaje4").fadeIn();
                            return false;
                        }
                            else{
                                $("#mensaje4").fadeOut();
                            if(cost==""|| !expr.test(cost)){
                                $("#mensaje5").fadeIn();
                                return false;
                            }
                        }
                    }
                }
            }
        });
    });
</script>
