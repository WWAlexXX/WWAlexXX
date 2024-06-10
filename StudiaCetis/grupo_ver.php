<?php 
include("conexion.php");
include("grupo_tabla.php");
$pagina = $_GET['pag'];
$id 	= $_GET['categoria'];

$querybuscar = mysqli_query($conn, "SELECT * FROM categoria_productos WHERE id = '$id'");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
	$catid	= $mostrar['id'];
	$catnom = $mostrar['nombre'];
}
?>
<html>
<body>
<div class="caja_popup2">
<form class="contenedor_popup" method="POST">
<table>
<tr><th colspan="2">Ver grupo</th></tr>
<tr> 
<td><b>Id:</b></td>
<td><?php echo $catid;?></td>
</tr>
			
<tr> 
<td><b>Grupo: </b></td>
<td><?php echo $catnom;?></td>
</tr>
<tr>
				
<td colspan="2">
<?php echo "<a class='BotonesTeam' href=\"grupo_tabla.php?pag=$pagina\">Regresar</a>";?>
</td>
</tr>
</table>
</form>
</div>
</body>
</html>