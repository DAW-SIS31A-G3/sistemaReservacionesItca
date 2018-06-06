<form method="post"><?php
if(isset($_POST["deva"])){
if(isset($_POST["acc"])){
$iddetalle=$_POST["acc"];
foreach($iddetalle as $iddetalleel){
$sqlDes = "UPDATE detalle set estadores = 'activo' where iddetalle = $iddetalleel";
$conn->query($sqlDes);
header('Location: indexa.php?pg=verrster.php');
}
}
}
if(isset($_POST["va"])){
if(isset($_POST["acc"])){
$iddetalle=$_POST["acc"];
foreach($iddetalle as $iddetalleel){
$sqlDev = "UPDATE detalle set estadores = 'Reservasion Finalizada' where iddetalle = $iddetalleel";
$conn->query($sqlDev);
header('Location: indexa.php?pg=verrster.php');
}
}
}
 require_once('nav.php');
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
    <table class="table">
		<tr class="thead-dark">
      <th> </th>
			<th>Reservante</th>
			<th>Equipo</th>
			<th>Modelo</th>
			<th>Local</th>
			<th>Hora Inicial</th>
			<th>Hora Final</th>
			<th>Fecha</th>
			<th>Grupo</th>
			<th>Ciclo</th>
			<th>Materia</th>
			<th>Estado <br>Reservasiones</th>
		</tr>
     <?php
     $sql="SELECT iddetalle, nombre, apellido, equipores, equipo, marcaeq, local, horai, horaf, fecha, grupo, seccion, ciclo, materia, estadores FROM detalle INNER JOIN equipoav ON equipoav.idequipo = detalle.equipores INNER JOIN usuario ON usuario.iduser = detalle.reservate
     INNER JOIN grupo on grupo.idgrupo = detalle.grupores INNER JOIN local ON local.idlocal = detalle.localres  INNER JOIN materia ON materia.idmat = detalle.materiares where estadores = 'devuelto'";
     $results=$conn->query($sql);
     while($fila=$results->fetch_assoc()){
		$idequipo = $fila["equipores"];
		$sqlE = "SELECT idequipo, equipo, marcaeq, marca, modelo, numerodeserie from equipoav inner join marca on marca.idmarca = equipoav.idequipo where idequipo = '$idequipo'";
		$resultsE=$conn->query($sqlE);
		$filaE=$resultsE->fetch_assoc();
           echo "<tr>";
           echo "<tbody id='myTable'>";
           echo "<td><input type=checkbox name=acc[] value='$fila[iddetalle]'></td>";
           echo "<td>$fila[nombre] $fila[apellido] </td>";
           echo "<td>$fila[equipo] </td>";
           echo "<td>$filaE[marca] $filaE[modelo]</td>";
           echo "<td>$fila[local] </td>";
           echo "<td>$fila[horai] </td>";
           echo "<td>$fila[horaf] </td>";
           echo "<td>$fila[fecha] </td>";
           echo "<td>$fila[grupo] </td>";
           echo "<td>$fila[ciclo] </td>";
           echo "<td>$fila[materia] </td>";
           echo "<td>$fila[estadores] </td>";
         }
         ?>
     </tr>
	 <tr>
   </tbody>
     </form>
<td colspan="2">
  <button type="submit" name="va" class="btn btn-info">Validar Devolucion</button>
</td><td colspan="2">
  <button type="submit" name="deva" class="btn btn-warning">Desvalidar Devolucion</button>
</td>
	 </tr>
     </tr>
     <tr>
