<?php
if(isset($_POST["rep"])){
	$idus = $_POST["iduser"];
	$ideq = $_POST["idequipo"];
	$loc = $_POST["idlocal"];
	$gru = $_POST["idgrupo"];
	$rep = $_POST["reporte"];
	$sqlInsert = "INSERT INTO reportefalla (idrep, usuariofall, equipofall, aulafall, grupofall, fallo, estadorep) VALUES  ('null','$idus','$ideq','$loc','$gru','$rep','no visto')";
	$conn->query($sqlInsert);
	header('Location: indexu.php?pg=todoslosprestamos.php');
}
?>
<?php
$iddetalle = $_GET["iddetalle"];
$sql="SELECT iddetalle, reservate, nombre, apellido, equipores, equipo, marcaeq, localres, local, horai, horaf, fecha, grupores, grupo, ciclo, materia, estadores
FROM detalle
INNER JOIN equipoav ON equipoav.idequipo = detalle.equipores
INNER JOIN marca ON marca.idmarca = equipoav.idequipo
INNER JOIN usuario ON usuario.iduser = detalle.reservate
INNER JOIN grupo on grupo.idgrupo = detalle.grupores
INNER JOIN local ON local.idlocal = detalle.localres
INNER JOIN materia ON materia.idmat = detalle.materiares
WHERE iddetalle = '$iddetalle'";
$results=$conn->query($sql);
$fila=$results->fetch_assoc();

$idgrupo = $fila["localres"];
$sqlG = "select * from grupo where idgrupo = '$idgrupo'";
$resultsG=$conn->query($sqlG);
$filaG=$resultsG->fetch_assoc();

$idequipo = $fila["equipores"];
$sqlE = "select idequipo, marcaeq, marca, numerodeserie
from equipoav
inner join marca on marca.idmarca = equipoav.idequipo where idequipo = '$idequipo'";
$resultsE=$conn->query($sqlE);
$filaE=$resultsE->fetch_assoc();
?>
<table class="table table-hover table-full">
<form method="post">
<tr class="thead-dark">
<th colspan=10>Reportae Fallo de Equipo Av</th>
</tr>
<tr><th>Reservante</th>
<td colspan=>
<input type="hidden" name="iduser" value="<?php echo "$fila[reservate]"; ?>" />
<input type="text" class="form-control" readonly="readonly" value="<?php echo "$fila[nombre] $fila[apellido]"; ?>" />
</td>
<td><td>
</tr>
<tr>
<th>Equipo - Marca</th>
<td colspan=3>
<input type="hidden" name="idequipo" value="<?php echo "$fila[equipores]"; ?>" />
<input type="text" class="form-control" readonly="readonly" value="<?php echo "$fila[equipo] - $filaE[marca] $filaE[numerodeserie]"; ?>" />
</tr>
</td>
<tr>
<th>Local</th>
<td>
<input type="hidden" name="idlocal" value="<?php echo "$fila[localres]"; ?>" />
<input type="text" class="form-control" readonly="readonly" value="<?php echo "$fila[local]"; ?>" />
</td>
<th>Grupo</th>
<td>
<input type="hidden" name="idgrupo" value="<?php echo "$fila[grupores]"; ?>" />
<input type="text" class="form-control" readonly="readonly" value="<?php echo "$fila[grupo] $filaG[seccion]"; ?>" />
</td>
</tr>
<tr>
<th>Materia</th>
<td colspan=3>
<input type="hidden" value="<?php echo "$fila[materiares]"; ?>" />
<input type="text" class="form-control" readonly="readonly" value="<?php echo "$fila[materia]"; ?>" />
</td>
</tr>
<tr>
<th>Reporte De Daño</th>
<td colspan=3>
<textarea name="reporte" class="form-control">
</textarea>
</td>
</tr>
<tr>
<th colspan=10><center><input type="submit" name="rep" class="btn btn-info" value="Reportar Fallo" /></th>
</tr>
</form>
</table>
