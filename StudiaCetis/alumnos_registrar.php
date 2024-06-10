<?php 
include("conexion.php");
include("alumnos_tabla.php");
$pagina = $_GET['pag'];
?>
<html>
<body>
<div class="caja_popup2">
<form class="contenedor_popup" method="POST">
<table>
<tr><th colspan="2">Agregar alumno</th></tr>	
<tr> 
<td><b>Nombre: </b></td>
<td><input type="text" name="txtnom" autocomplete="off" class="CajaTexto"></td>
</tr>
<tr> 
<td><b>Dirección: </b></td>
<td><input type="text" name="txtdes" autocomplete="off" class="CajaTexto"></td>
</tr>
<tr> 
<td><b>Telefono: </b></td>
<td><input type="number" name="txtpre" autocomplete="off" class="CajaTexto" step="any"></td>
</tr>
<tr> 
<td><b>Grupo: </b></td>
<td>
<select name="txtcat" class='CajaTexto'>
<tr>
<td><b>fotografia: </b></td>
<td><imput type="file" name="vai_archivo"></td>

<?php
		
$qrcategoria = mysqli_query($conn, "SELECT * FROM categoria_productos ");
while($mostrarcat = mysqli_fetch_array($qrcategoria)) 
{ 
echo '<option value="'.$mostrarcat['id'].'">' .$mostrarcat['nombre']. '</option>';
}
?>  
</select>
</td>
</tr>

<tr>
				
<td colspan="2" >
<?php echo "<a class='BotonesTeam' href=\"alumnos_tabla.php?pag=$pagina\">Cancelar</a>";?>&nbsp;
<input class='BotonesTeam' type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar este alumno ?');">
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
	$pronom 	= $_POST['txtnom'];
    $prodes 	= $_POST['txtdes'];
	$propre 	= $_POST['txtpre'];
	$procat 	= $_POST['txtcat'];
   
	mysqli_query($conn, "INSERT INTO productos(nombre,descripcion,precio,categoria_id) VALUES('$pronom','$prodes','$propre','$procat')");
	
	echo "<script> alert('Alumno registrado con exito: $pronom'); window.location='alumnos_tabla.php' </script>";
}
?>