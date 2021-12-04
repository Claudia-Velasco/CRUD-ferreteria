<?php
include("conexion.php");
$conn=conectar();
$sql="SELECT * FROM productos";
$query=mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" href="estilos/estilosB.css">
    <!--JQUERY-->
    <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
    <title>Producto</title>
    
</head>
<body>
    <div>
        <h1>Bodega</h1>
        
        <form class="salir2"><input type="button" value="XML"  class="btn-salir" onClick="location.href='xml.php'"></form> <br>
    </div>
    <div class="container ">
        <div class="row">
            <div class="insercion">
                <h2>Registrar producto</h2>
                <form  action="registrarProductos.php" method="POST">
                    <input type="text" class="cuadro" id="itproducto" name="producto" placeholder="Producto">
                    <div id="mensaje1" class="errores">Falta el nombre del producto </div>
                    <input type="text" class="cuadro" id="itmarca" name="marca" placeholder="Marca">
                    <div id="mensaje2" class="errores">Falta la marca</div>
                    <input type="text" class="cuadro" id="itproveedor" name="proveedor" placeholder="Proveerdor">
                    <div id="mensaje3" class="errores">Falta el proveedor</div>
                    <input type="text" class="cuadro" id="itcantidad" name="cantidad" placeholder="Cantidad">
                    <div id="mensaje4" class="errores">Faltan datos, solo números</div>
                    <input type="text" class="cuadro" id="itcosto" name="costo" placeholder="Costo">
                    <div id="mensaje5" class="errores">Faltan datos, solo números</div>
                    
                    <br> <br>
                    <input type="submit" id="bEnviar" class="btn-registrar">
                    
                </form>
            </div>
            <div class="espacio"></div>
            <div class="lateral" >
                <h2>Productos</h2>
                <br>
                <table >
                    <thead class="table">
                        <tr>
                            <th>Id</th>
                            <th>Producto</th>
                            <th>Marca</th>
                            <th>Proveedor</th>
                            <th>Cantidad</th>
                            <th>Costo</th>    
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        
                            while($row=mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <th><?php echo $row['idProducto']?></th>
                            <th><?php echo $row['producto']?></th>
                            <th><?php echo $row['marca']?></th>
                            <th><?php echo $row['proveedor']?></th>
                            <th><?php echo $row['cantidad']?></th>
                            <th><?php echo $row['costo']?></th>
                            <th><a href="actualizarProducto.php?id=<?php echo $row['idProducto']?>" class="btn-editar";><img src="imagenes/editar.jpg"  class="icono-tamaño"></a> </th>
                            <th><a href="eliminarProducto.php?id=<?php echo $row['idProducto']?>" class="btn-eliminar"><img src="imagenes/eliminar.png"  class="icono-tamaño"></a> </th>
                            <th></th>
                        </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                    </table >
                    </div> 
            </div>
        </div>
    </div><form class="salir"><input type="button" value="Página anterior"  class="btn-salir" onClick="history.go(-1);"></form>
    
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

