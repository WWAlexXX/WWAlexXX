<?php 
include('conexion.php');
include("grupo_tabla.php");

$pagina = $_GET['pag'];
?>
<html>
<head>    
<title>Grupos</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="caja_popup2"> 
<form class="contenedor_popup" method="POST">
<table>
<tr><th colspan="2" >Agregar Grupo</th></tr>
<tr> 
<td>Grupo</td>
<td><input type="text" name="txtnom" autocomplete="off" class="CajaTexto"></td>
</tr>
<tr> 	
<td colspan="2" >
<?php echo "<a class='BotonesTeam' href=\"grupo_tabla.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
<input class='BotonesTeam' type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar este grupo?');">
</td>
</tr>
</table>
</form>
 </div>
</body>
</html>
<?php

if(isset($_POST['btnregistrar']))
{   
	$vainom 	= $_POST['txtnom'];

	$queryadd	= mysqli_query($conn, "INSERT INTO categoria_productos(nombre) VALUES('$vainom')");
	
 	if(!$queryadd)
	{
		 echo "<script>alert('Id duplicado, intenta otra vez');</script>";
		 
	}else
	{
		echo "<script>window.location= 'grupo_tabla.php?pag=1' </script>";
	}
}
?>
