 <?php
require_once('nav.php');
$id = $_SESSION['id_us'];
$ide=$_GET["idequipo"];
$sqlL = "select * from local";
$resultsL=$conn->query($sqlL);
$sql1="
SELECT
idequipo,
equipo,
marca,
modelo,
numerodeserie,
fechaingreso,
estado,
caracteristicas,
deptos
FROM
equipoav
INNER JOIN marca ON marca.idmarca = equipoav.marcaeq
INNER JOIN departamento ON departamento.iddep = equipoav.departamentos
where idequipo='$ide'";
$results1=$conn->query($sql1);
$fila1=$results1->fetch_assoc();
$sqlU="select * from usuario where iduser = '$id'";
$resultsU=$conn->query($sqlU);
$filaU=$resultsU->fetch_assoc();
 if(isset($_POST["reservar"])){
	$local = $_POST["local"];
	$horai = $_POST["horai"];
	$horaf = $_POST["horaf"];
	$fecha = $_POST["fecha"];
	$grupo = $_POST["grupo"];
	$ciclo = $_POST["ciclo"];
	$reservante = $_POST["iduser"];
	$equipo = $_POST["idequipo"];
	$materia = $_POST["materia"];
	$sqlRes = "INSERT INTO detalle values ('null','$reservante','$equipo','$local','$horai','$horaf','$fecha','$grupo','$ciclo','$materia','activo')";
	$conn->query($sqlRes);
	header('Location: indexu.php?pg=misprestamos.php');
}
 ?>
 <table class="table table-hover table-full">
<form method="post">
  <tr class="thead-dark">
  <th colspan=10>Reservar Equipo Av</th>
  </tr>
  <tr><th>Reservante</th><td colspan=><input type="hidden" name="iduser" value="<?php echo "$filaU[iduser]"; ?>" /><input type="text" class="form-control" readonly="readonly" value="<?php echo "$filaU[nombre] $filaU[apellido]"; ?>" /></td><td> </td></tr>
  <tr><th>Equipo</th><td><input type="hidden" name="idequipo" value="<?php echo "$fila1[idequipo]"; ?>" /><input type="text" class="form-control" readonly="readonly" value="<?php echo "$fila1[equipo] $fila1[marca] - $fila1[modelo]"; ?>" /></td><th>Local</th><td>
  <select name="local" class="form-control">
	<?php
	while($filaL=$resultsL->fetch_assoc()){
		echo "
			<option value='$filaL[idlocal]'>$filaL[local]</option>
	";
	}
	?>
	</select>
	</th></tr>
	<tr><th>Hora</th>
		<td><input class="form-control" type="time" name="horai" required /></td>
		<th>a</th>
		<td><input class="form-control" type="time" name="horaf" required /></td>
	</tr>
		<tr><th>Fecha</th>
		<td><input class="form-control" type="date" name="fecha" required /></td>

	<th>Grupo</th><td>
  <select name="grupo" class="form-control">
	<?php
	$sqlGr = "select * from grupo";
	 $resultsGr=$conn->query($sqlGr);
	while($filaGr=$resultsGr->fetch_assoc()){
		echo "
			<option value='$filaGr[idgrupo]'>$filaGr[grupo] $filaGr[seccion]</option>
	";
	}
	?>
	</select></td></tr>
	 <tr>
		<th>Ciclo</th>
		<td>
			<select name="ciclo" class="form-control">
			<option>I</option>
			<option>II</option>
			<option>III</option>
			<option>IV</option>
			</select>
		</td>
		<th>Materia</th>
		<td>
  <select name="materia" class="form-control">
	<?php
	$sqlM="select * from materia";
	$resultsM = $conn->query($sqlM);
	while($filaM=$resultsM->fetch_assoc()){
		echo "
			<option value='$filaM[idmat]'>$filaM[materia]</option>
	";
	}
	?>
	</select>
	</th></tr>
	<tr>
		<th colspan=10><center><input type="submit" name="reservar" class="btn btn-info" value="Reservar" /></th>
	</tr>
	</form>
</table>
