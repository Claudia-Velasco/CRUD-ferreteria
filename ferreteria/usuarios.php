<?php
include("conexion.php");
$conn=conectar();
$sql="SELECT * FROM usuario";
$query=mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <!--CSS-->
    <link rel="stylesheet" href="estilos/estilosAdmin.css">
    <!--JQUERY-->
    <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
</head>
<body>

<div>
        <h1>Usuarios</h1>
    </div>
    <br>
    <div class="container ">
        <div class="row">
            <div class="insertarUser">
                <h2>Registrar usuario</h2> <br>
                <form  action="registrarUsuarios.php" method="POST">
                    <input type="text" class="cuadro" id="itnombreUsuario" name="nombreUsuario" placeholder="Nombre Usuario">
                    <div id="mensaje1" class="errores1">Falta el nombre de usuario</div>
                    <input type="text" class="cuadro" id="itnombre" name="nombre" placeholder="Nombre">
                    <div id="mensaje2" class="errores1">Falta el nombre </div>
                    <input type="text" class="cuadro" id="itapePaterno" name="apePaterno" placeholder="Apellido Paterno">
                    <div id="mensaje3" class="errores1">Falta el apellido paterno</div>
                    <input type="text" class="cuadro" id="itapeMaterno" name="apeMaterno" placeholder="Apellido Materno">
                    <div id="mensaje4" class="errores1">Falta el apellido materno</div>
                    
                    <input type="text" class="cuadro" id="ittelefono" name="telefono" placeholder="Telefono">
                    <div id="mensaje5" class="errores1">Falta el telefono</div>
                    <input type="text" class="cuadro" id="itcontraseña" name="contraseña" placeholder="Contraseña">
                    <div id="mensaje6" class="errores1">Falta la contraseña</div>
                    <br>
                    
                    Genero
                    <select class="cuadro" name="genero">
                        <option value="F">Femenino</option>
                        <option value="M">Masculino</option>
                    </select> <br>
                    Area
                    <select class="cuadro" name="idArea">
                        <option value="1">Administrador</option>
                        <option value="2">Ventas</option>
                        <option value="3">Bodega</option>
                    </select>
                                
                    <br> <br>
                    <input type="submit" id="bEnviar" class="btn-registrar">
                </form>
                
            </div>
            <div class="lateral" >
                <h2>Usuarios</h2>
                <br>
                <table >
                    <thead class="table">
                        <tr>
                            <th>Id</th>
                            <th>Nombre Usuario</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Genero</th>   
                            <th>Telefono</th>
                            <th>Contraseña</th>
                            <th>Area</th> 
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        
                            while($row=mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <th><?php echo $row['idUsuario']?></th>
                            <th><?php echo $row['nombreUsuario']?></th>
                            <th><?php echo $row['nombre']?></th>
                            <th><?php echo $row['apePaterno']?></th>
                            <th><?php echo $row['apeMaterno']?></th>
                            <th><?php echo $row['genero']?></th>
                            <th><?php echo $row['telefono']?></th>
                            <th><?php echo $row['contraseña']?></th>
                            <th><?php if($row['idArea']==1){ //administrador
                                        echo 'Administrador'; } 
                                        else if($row['idArea']==2){ //administrador
                                        echo 'Ventas';}
                                        else if ($row['idArea']==3){ //administrador
                                            echo 'Bodega';}
                            ?></th>
                            <th><a href="actualizarUsuario.php?id=<?php echo $row['idUsuario']?>" class="btn-editar";><img src="imagenes/editar.jpg"  class="icono-tamaño"></a> </th>
                            <th><a href="eliminarUsuario.php?id=<?php echo $row['idUsuario']?>" class="btn-eliminar"><img src="imagenes/eliminar.png"  class="icono-tamaño"></a> </th>
                            
                        </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <form class="salir"><input type="button" value="Página anterior"  class="btn-salir" onClick="history.go(-1);"></form>  
    </div>

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

