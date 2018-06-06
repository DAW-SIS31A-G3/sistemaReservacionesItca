<?php
	if(isset($_POST["dev"])){
		if(isset($_POST["devo"])){
		$iddetalle = $_POST["devo"];
		foreach($iddetalle as $iddetalleel){
		$sqlDev = "UPDATE detalle set estadores = 'devuelto' where iddetalle = $iddetalleel";
		$conn->query($sqlDev);
		}
	}else{
	echo "<tr><td  colspan=8><div class='alert alert-warning alert-dismissible fade show'>
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    <strong>¡Advertencia!</strong> Seleccione Una Reservasion Para Devolver.
    </td></tr></div>";
	}
}elseif (isset($_POST["del"])) {
  $iddetalle = $_POST["devo"];
  foreach($iddetalle as $iddetalleel){
  $sqldel = "DELETE FROM detalle where iddetalle = $iddetalleel";
  $conn->query($sqldel);
  header('Location indexa.php?pg=misprestamos.php');
}
}
?>
<?php
 require_once('nav.php');
 $id = $_SESSION['id_us'];
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
    <table class="table"><form method="post" name="f1">
		<tr class="thead-dark">
			<th colspan="40"><center><h4>Mis Prestamos Activos</h4></th>
		</tr>
    <tr class="thead-light">
<th colspan="7"><input class="form-control" id="myInput" type="text" placeholder="Buscar.."></th>
<th colspan="7"></th>
  </tr>
		<tr class="thead-dark">
			<th>Devolver</th>
			<th>Id<br>Reservasion</th>
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
      <th> </th>
		</tr>
     <?php
     $sql="SELECT
    iddetalle,
	reservate,
    nombre,
    apellido,
    equipo,
    marcaeq,
	local,
    horai,
    horaf,
    fecha,
    grupo,
    ciclo,
    materia,
    estadores
FROM
    detalle
INNER JOIN equipoav ON equipoav.idequipo = detalle.equipores
INNER JOIN usuario ON usuario.iduser = detalle.reservate
INNER JOIN grupo on grupo.idgrupo = detalle.grupores
INNER JOIN local ON local.idlocal = detalle.localres
INNER JOIN materia ON materia.idmat = detalle.materiares
where estadores = 'activo' and reservate = '$id'";
     $results=$conn->query($sql);
     while($fila=$results->fetch_assoc()){
       echo "<tbody id='myTable'>";
           echo "<tr>";
           echo "<td><input type=checkbox name=devo[] value='$fila[iddetalle]'></td>";
           echo "<td>$fila[iddetalle] </td>";
           echo "<td>$fila[nombre] $fila[apellido] </td>";
           echo "<td>$fila[equipo] </td>";
           echo "<td>$fila[marcaeq]</td>";
           echo "<td>$fila[local] </td>";
           echo "<td>$fila[horai] </td>";
           echo "<td>$fila[horaf] </td>";
           echo "<td>$fila[fecha] </td>";
           echo "<td>$fila[grupo] </td>";
           echo "<td>$fila[ciclo] </td>";
           echo "<td>$fila[materia] </td>";
           echo "<td>$fila[estadores] </td>";
           echo "<td><center><a class='btn btn-danger' href='indexu.php?pg=repote.php&iddetalle=$fila[iddetalle]'>Reportar Falla</td>";
         }
         ?>
     </tr>
     </tr>
     <tbody>
	 <tr>
     <th colspan=2><a href="javascript:seleccionar_todo()" class="btn btn-link">Marcar todos</a></th><th>
     <a href="javascript:deseleccionar_todo()" class="btn btn-link">Desmarcar</a>  </th>
	 <td colspan="3"><input type="submit" name="del" class="btn btn-warning" value='Cancelar Reservasion' /></td>
	 <td><input type=submit class='btn btn-info' name='dev' value='Devolver' /></td>
	 </tr>
     </table>
	 <script>
     function seleccionar_todo(){
        for (i=0;i<document.f1.elements.length;i++)
           if(document.f1.elements[i].type == "checkbox")
              document.f1.elements[i].checked=1
     }
     function deseleccionar_todo(){
        for (i=0;i<document.f1.elements.length;i++)
           if(document.f1.elements[i].type == "checkbox")
              document.f1.elements[i].checked=0
     }
     </script>
   </form>
