<?php 
include("conexion.php");
include("alumnos_tabla.php");
$pagina = $_GET['pag'];
$id = $_GET['id'];

$querybuscar = mysqli_query($conn, "SELECT pro.id,pro.nombre,descripcion,precio,cat.nombre as categoria 
FROM productos pro, categoria_productos cat where pro.categoria_id=cat.id and pro.id = '$id'");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
	$proid 	= $mostrar['id'];
	$pronom	= $mostrar['nombre'];
	$prodes	= $mostrar['descripcion'];
	$propre	= $mostrar['precio'];
	$procat	= $mostrar['categoria'];
}
?>
<html>
<body>
<div class="caja_popup2">
<form class="contenedor_popup" method="POST">
<table>
<tr><th colspan="2">Ver Alumno</th></tr>
<tr> 
<td><b>Id:</b></td>
<td><?php echo $proid;?></td>
</tr>		
<tr> 
<td><b>Nombre: </b></td>
<td><?php echo $pronom;?></td>
</tr>
<tr> 
<td><b>Dirección: </b></td>
<td><?php echo $prodes;?></td>
</tr>
<tr> 
<td><b>Telefono: </b></td>
<td><?php echo $propre;?></td>
</tr>
<tr> 
<td><b>Grupo: </b></td>
<td><?php echo $procat;?></td>
</tr>

<tr>
				
<td colspan="2">
<?php echo "<a class='BotonesTeam' href=\"alumnos_tabla.php?pag=$pagina\">Regresar</a>";?>
</td>
</tr>
</table>
</form>
</div>
</body>
</html>