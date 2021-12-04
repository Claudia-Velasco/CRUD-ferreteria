<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" href="estilos/estilosB.css">
    <title>Producto</title>
    
</head>
	<div class="xml">
		<h1>XML</h1>
    <?php
		include("sesion.php");
		$query="SELECT * FROM productos";
		$result = filterRecord($query);

		function filterRecord($query)
		{
			include("sesion.php");
			$filter_result = mysqli_query($con, $query);
			return $filter_result;
		}

		$result = filterRecord($query);
		$cadena= mysql_XML($result);
		echo $cadena;

		function mysql_XML($resultado)
		{
			// creamos el documento XML		
			//header ("Content-type: text/xml");
			$contenido = '&lt; informacion &gt;<br>';
			
			while ($row = mysqli_fetch_array($resultado)) {
				$contenido.="&lt;productos&gt;"; 
				$contenido.="&lt;idProducto&gt;".$row['idProducto']."&lt;/idProducto&gt;";
				$contenido.="&lt;producto&gt;".$row['producto']."&lt;/producto&gt;";
				$contenido.="&lt;marca&gt;".$row['marca'] ."&lt;/marca&gt;";
				$contenido.="&lt;proveedor&gt;".$row['proveedor']."&lt;/proveedor&gt;";
				$contenido.="&lt;cantidad&gt;".$row['cantidad']."&lt;/cantidad&gt;";
				$contenido.="&lt;costo&gt;".$row['costo']."&lt;/costo&gt;";
				$contenido.="&lt;/productos&gt;<br>";	
			}

			$contenido.='&lt; /informacion &gt;';
			return $contenido;
		}
		?>
	</div> <br>
	<form class="salir2"><input type="button" value="Página anterior"  class="btn-salir" onClick="history.go(-1);"></form>

</body>
</html> 