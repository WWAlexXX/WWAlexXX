<?php
include('conexion.php');
include("barra_lateral.php");
?>
<html>
<title>Grupo</title>
<body>
<div class="ContenedorPrincipal">	
<?php
 
$filasmax = 7;
 
    if (isset($_GET['pag'])) 
	{
        $pagina = $_GET['pag'];
    } else 
	{
        $pagina = 1;
    }
 
 if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];

 $sqlcat = mysqli_query($conn, "SELECT * FROM categoria_productos where nombre = '".$buscar."'");

}
else
{
 $sqlcat = mysqli_query($conn, "SELECT * FROM categoria_productos ORDER BY id ASC LIMIT " . (($pagina - 1) * $filasmax)  . "," . $filasmax);
}
 
    $resultadoMaximo = mysqli_query($conn, "SELECT count(*) as num_categorias FROM categoria_productos");
 
    $maxusutabla = mysqli_fetch_assoc($resultadoMaximo)['num_categorias'];
	
    ?>
	<div class="ContenedorTabla" >
	<form method="POST">
	<h1>Lista de Grupos</h1>
	<div class="ContBuscar">
	<div style="float: left;">
	<a href="grupo_tabla.php" class="BotonesTeam">Inicio</a>
	<input class="BotonesTeam" type="submit" value="Buscar" name="btnbuscar">
	<input class="CajaTextoBuscar" type="text" name="txtbuscar"  placeholder="Ingresar grupo" autocomplete="off" >
	</div>
	<div style="float:right">
	<?php echo "<a class='BotonesTeam5' href=\"grupo_registrar.php?pag=$pagina\">Agregar grupo</a>";?>
	</div>
	</div>
</form>
    <table>
<tr>
<th>Id</th>
<th>Grupo</th>
<th>Acción</th>
</tr>
 
<?php
 
while ($mostrar = mysqli_fetch_assoc($sqlcat)) 
		{
			
echo "<tr>";
echo "<td>".$mostrar['id']."</td>";
echo "<td>".$mostrar['nombre']."</td>"; 
echo "<td style='width:24%'>
<a class='BotonesTeam1' href=\"grupo_ver.php?categoria=$mostrar[id]&pag=$pagina\">&#x1F50D;</a> 
<a class='BotonesTeam2' href=\"grupo_modificar.php?categoria=$mostrar[id]&pag=$pagina\">&#128397;</a> 
<a class='BotonesTeam3' href=\"grupo_eliminar.php?categoria=$mostrar[id]&pag=$pagina\" onClick=\"return confirm('¿Estás seguro de eliminar el grupo? $mostrar[nombre]?')\">&#10006;</a>
</td>";  
}

?>
</table>
<div style='text-align:right'>
<br>
<?php echo "Total de grupos: ".$maxusutabla;?>
</div>
</div>
<div style='text-align:right'>
<br>
</div>
<div style="text-align:center">
<?php
if (isset($_GET['pag'])) {
if ($_GET['pag'] > 1) {
 ?>
<a class="BotonesTeam4" href="grupo_tabla.php?pag=<?php echo $_GET['pag'] - 1; ?>">Anterior</a>
<?php
} 
else 
{
?>
<a class="BotonesTeam4" href="#" style="pointer-events: none">Anterior</a>
<?php
}
?>
 
 <?php
} 
else 
{
?>
<a class="BotonesTeam4" href="#" style="pointer-events: none">Anterior</a>
<?php
}
 
if (isset($_GET['pag'])) {
if ((($pagina) * $filasmax) < $maxusutabla) {
?>
<a class="BotonesTeam4" href="grupo_tabla.php?pag=<?php echo $_GET['pag'] + 1; ?>">Siguiente</a>
<?php
} else {
?>
<a class="BotonesTeam4" href="#" style="pointer-events: none">Siguiente</a>
<?php
}
?>
<?php
} else {
?>
<a class="BotonesTeam4" href="grupo_tabla.php?pag=2">Siguiente</a>
<?php
}
?>
</div>
</div>
</body>
</html>