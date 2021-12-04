<?php
include("conexion.php");
$con=conectar();
$id=$_GET['id'];
$sql="SELECT * FROM usuario WHERE idUsuario='$id'";
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
    <link rel="stylesheet" href="estilos/estilosAdmin.css">
    <!--JQUERY-->
    <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
    
    <title>Actualizar </title>
</head>
<body>
    <div>
        <h1>Modificar Usuario</h1>
        <form class="salir"><input type="button" value="Página anterior"  class="btn-salir" onClick="history.go(-1);"></form>

        <form action="modificarUsuario.php" method="POST" align="center" class="modificar">
            <input type="hidden" name="idUsuario" value="<?php echo $row['idUsuario']?>">
            
            <input type="text" name="nombreUsuario"  id="itnombreUsuario"  class="cuadro" placeholder="Nombre Usuario" value="<?php echo $row['nombreUsuario']?> "> <br>
            <div id="mensaje1" class="errores">Falta el nombre de usuario </div>
            <input type="text" name="nombre" id="itnombre"  class="cuadro" placeholder="Nombre" value="<?php echo $row['nombre']?> ">  <br>
            <div id="mensaje2" class="errores">Falta el nombre</div>
            <input type="text" name="apePaterno"  id="itapePaterno" class="cuadro"  placeholder="Apellido Paterno" value="<?php echo $row['apePaterno']?> "> <br>
            <div id="mensaje3" class="errores">Falta el apePaterno</div>
            <input type="text" name="apeMaterno"  id="itapeMaterno" class="cuadro" placeholder="Apellido Materno" value="<?php echo $row['apeMaterno']?> "> <br>
            <div id="mensaje4" class="errores">Faltan datos</div> <br>
            Genero :
            <select class="cuadro" name="genero">
                <option value="F">Femenino</option>
                <option value="M">Masculino</option>
            </select> <br>

            <input type="text" name="telefono" id="ittelefono"  class="cuadro" placeholder="Telefono" value="<?php echo $row['telefono']?> "> <br> <br>
            <div id="mensaje5" class="errores">Faltan datos del telefono</div>
            <input type="text" name="contraseña" id="itcontraseña"  class="cuadro" placeholder="Contraseña" value="<?php echo $row['contraseña']?> "> <br> <br>
            <div id="mensaje6" class="errores">Faltan datos del contraseña</div> 
            
            Area
            <select class="cuadro" name="idArea">
                <option value="1">Administrador</option>
                <option value="2">Ventas</option>
                <option value="3">Bodega</option>
            </select> <br><br>

            <input type="submit" id="bEnviar" class="btn-modificar" value="Actualizar">
            
            </form>
    </div>
    
    <br><br>
    
</body>
</html>


<script>
    var expr= /^[0-9 ]+./;
    var num=/[0-9]/;
    $(document).ready(function(){
        $("#bEnviar").click(function(){
            var nombreUsuario= $("#itnombreUsuario").val();
            var nombre =$("#itnombre").val();
            var apePaterno =$("#itapePaterno").val();
            var apeMaterno =$("#itapeMaterno").val();
            var tel =$("#ittelefono").val();
            var cont =$("#itcontraseña").val();
            
            if( nombreUsuario==""){
                $("#mensaje1").fadeIn();
                return false;
	
            }else {
                $("#mensaje1").fadeOut();
                if(nombre ==""){
                    $("#mensaje2").fadeIn();
                    return false;
                }else{
                    $("#mensaje2").fadeOut();
                    if(apePaterno ==""){
                        $("#mensaje3").fadeIn();
                        return false;
                    }else{
                            $("#mensaje3").fadeOut();
                        if(apeMaterno=="" ){
                            $("#mensaje4").fadeIn();
                            return false;
                        }
                            else{
                                $("#mensaje4").fadeOut();
                            if(tel==""){
                                $("#mensaje5").fadeIn();
                                return false;
                            }else{
                                $("#mensaje5").fadeOut();
                                    if(cont==""){
                                    $("#mensaje6").fadeIn();
                                    return false;
                                }
                            }
                        }
                    }
                }
            }
        });
    });
</script>

