<?php
include('conexion.php');
include("barra_lateral.php");
?>
<html>
<title>Tabla alumnos</title>
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

$sqlusu = mysqli_query($conn, "SELECT pro.id,pro.nombre,descripcion,precio,cat.nombre as categoria 
FROM productos pro, categoria_productos cat where pro.categoria_id=cat.id and pro.nombre like '".$buscar."%'");

}
else
{
	$sqlusu = mysqli_query($conn, "SELECT pro.id,pro.nombre,descripcion,precio,cat.nombre as categoria 
	FROM productos pro, categoria_productos cat where pro.categoria_id=cat.id ORDER BY pro.id ASC LIMIT " . (($pagina - 1) * $filasmax)  . "," . $filasmax);
}
 
    $resultadoMaximo = mysqli_query($conn, "SELECT count(*) as num_productos FROM productos");
 
    $maxusutabla = mysqli_fetch_assoc($resultadoMaximo)['num_productos'];
	
    ?>
	<div class="ContenedorTabla">
	<form method="POST">
	<h1>Lista de alumnos</h1>
	
	<div class="ContBuscar">
	<div style="float: left;">
	<a href="alumnos_tabla.php" class="BotonesTeam">Inicio</a>
	<input class="BotonesTeam" type="submit" value="Buscar" name="btnbuscar">
	<input class="CajaTextoBuscar" type="text" name="txtbuscar"  placeholder="Ingresar nombre del alumno" autocomplete="off" >
	</div>
	<div style="float:right;">
	<?php echo "<a class='BotonesTeam5' href=\"alumnos_registrar.php?pag=$pagina\">Agregar Alumno</a>";?>
	</div>
	</div>
			</form>
    <table>
			<tr>
			<th>Id</th>
			<th>Nombre</th>
            <th>Dirección</th>
			<th>Telefono</th>
			<th>Grupo</th>
			<th>Acción</th>
			</tr>
 
        <?php
 
        while ($mostrar = mysqli_fetch_assoc($sqlusu)) 
		{
			
            echo "<tr>";
            echo "<td>".$mostrar['id']."</td>";
			echo "<td>".$mostrar['nombre']."</td>";
			echo "<td>".$mostrar['descripcion']."</td>";
			echo "<td>".$mostrar['precio']."</td>";
			echo "<td>".$mostrar['categoria']."</td>";
            echo "<td style='width:24%'>
			<a class='BotonesTeam1' href=\"alumnos_ver.php?id=$mostrar[id]&pag=$pagina\">&#x1F50D;</a> 
			<a class='BotonesTeam2' href=\"alumnos_modificar.php?id=$mostrar[id]&pag=$pagina\">&#128397;</a> 
			<a class='BotonesTeam3' href=\"alumnos_eliminar.php?id=$mostrar[id]&pag=$pagina\" onClick=\"return confirm('¿Estás seguro de eliminar a el alumno $mostrar[nombre]?')\">&#10006;</a>
			</td>";  
			
        }
 
        ?>
    </table>
	<div style='text-align:right'>
	<br>
	<?php echo "Total de alumnos: ".$maxusutabla;?>
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
<a class="BotonesTeam4" href="alumnos_tabla.php?pag=<?php echo $_GET['pag'] - 1; ?>">Anterior</a>
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
<a class="BotonesTeam4" href="alumnos_tabla.php?pag=<?php echo $_GET['pag'] + 1; ?>">Siguiente</a>
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
<a class="BotonesTeam4" href="alumnos_tabla.php?pag=2">Siguiente</a>
<?php
}
?>
</div>
</div>
</body>
</html>