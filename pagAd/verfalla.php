<?php
if(isset($_POST["del"])){
if(isset($_POST["eliminar"])){
$iduserel=$_POST["eliminar"];
foreach($iduserel as $iduserelim){
$sql2="DELETE from reportefalla where idrep ='$iduserelim'";
$conn->query($sql2);
header('Location: indexa.php?pg=verfalla.php');
}
}else{
echo "<tr><td  colspan=8><div class='alert alert-warning alert-dismissible fade show'>
<button type='button' class='close' data-dismiss='alert'>&times;</button>
<strong>dvertencia!</strong> Seleccione Una Grupo a Eliminar.
</td></tr></div>";
  }
}
if(isset($_POST["ver"])){
  $id = $_POST["id"];
    $sqlu = "UPDATE reportefalla
  set estadorep = 'visto'
  where idrep = '$id'";
  $conn->query($sqlu);
header("Location: indexa.php?pg=falla.php&idrep=$id");
}
$sql="SELECT
    idrep,
    usuariofall,
    equipofall,
    nombre,
    apellido,
    equipo
FROM
    reportefalla
INNER JOIN usuario ON usuario.iduser = reportefalla.usuariofall
INNER JOIN equipoav ON equipoav.idequipo = reportefalla.equipofall";
$results=$conn->query($sql);
?>
 <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<div class="table-responsive table-hover">
<table class="table table-full"><form method="post">
<tr class="thead-dark">
<th colspan="8"><h2>Mensajes</h2></th>
</tr>
<tr class="thead-light">
<th colspan="2"><input class="form-control" id="myInput" type="text" placeholder="Buscar.."></th>
<th></th>
</tr>
</table>
<table class="table table-full">
<tr class="thead-dark">
			<th> </th>
			<th>Docente</th>
			<th>Equipo</th>
			<th> </th>
		</tr>
		<tr>
		</tr>
		<tr>
<?php
	while($fila=$results->fetch_assoc()){
		$idequipo = $fila["equipofall"];
		$sqlE = "select idequipo, equipo, marcaeq, marca, modelo, numerodeserie
		from equipoav
		inner join marca on marca.idmarca = equipoav.idequipo where idequipo = '$idequipo'";
		$resultsE=$conn->query($sqlE);
		$filaE=$resultsE->fetch_assoc();
		echo "<tbody id='myTable'>";
    echo "<td><input type='hidden' name='id' value='$fila[idrep]'/>";
		echo "<input type='submit' name='ver' class='btn btn-primary' value='Ver Reporte' /></td>";
		echo "<td>$fila[nombre] $fila[apellido]</td>";
		echo "<td>$filaE[equipo] $filaE[marca] - $filaE[modelo] </td>";
		echo "<td><input type=checkbox name=eliminar[] value='$fila[idrep]'></td>";
	}
?>
</tbody>
<tr>
  <td colspan="7"><input type="submit" name="del" class="btn btn-danger" value="Eliminar Reporte" /></td>
</tr>
</table></form>
</div>
