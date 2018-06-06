<?php
if(isset($_POST["del"])){
  if(isset($_POST["eliminar"])){
  $codigoel=$_POST["eliminar"];
  foreach($codigoel as $codelim){
  $sql3="delete from equipoav where idequipo ='$codelim'";
  $conn->query($sql3);
  header('Location: indexa.php?pg=vereq.php');
}

}else{
echo "<tr><td  colspan=10><div class='alert alert-warning alert-dismissible fade show'>
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    <strong>¡Advertencia!</strong> Seleccione Un Equipo Av a Eliminar.
  </td></tr></div>";
}
}
  ?>
<?php
 require_once('nav.php');
 $id = $_SESSION['id'];
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
<form method="post">
<table class="table">
  <tr class="thead-dark">
    <th colspan="10"><h2>Equipo Audio Visual</h2></th>
  </tr>
</tr>
<tr class="thead-light">
<th colspan="6"><input class="form-control" id="myInput" type="text" placeholder="Buscar.."></th>
<th colspan="4"> </th>
</tr>
</tr>
  <tr><td  colspan=8><div class='alert alert-warning alert-dismissible fade show'>
      <button type='button' class='close' data-dismiss='alert'>&times;</button>
      <strong>¡Advertencia!</strong> Para eliminar primero deve eliminar las Reservasiones tienen El mismo Equipo y los Repotes de Fallo.
    </td></tr></div>
  </tr>
  <tr class="thead-dark">
    <th>¿Del? </th>
    <th>Equipo</th>
    <th>Marca</th>
    <th>Modelo</th>
    <th># De Serie</th>
    <th style="width: 200px;">Fecha Ingreso</th>
    <th>Estado</th>
    <th>Caracteristicas</th>
    <th>Departamento</th>
    <th> </th>
  </tr>

<?php
$sql2="SELECT
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
ORDER BY
    equipoav.marcaeq";
$results=$conn->query($sql2);
while($fila=$results->fetch_assoc()){
      echo "<tbody id='myTable'>";
      echo "<tr>";
      echo "<td><input type=checkbox name=eliminar[] value='$fila[idequipo]'></td>";
      echo "<td>$fila[equipo] </td>";
      echo "<td>$fila[marca] </td>";
      echo "<td>$fila[modelo] </td>";
      echo "<td>$fila[numerodeserie] </td>";
      echo "<td>$fila[fechaingreso] </td>";
      echo "<td>$fila[estado] </td>";
      echo "<td>$fila[caracteristicas] </td>";
      echo "<td>$fila[deptos] </td>";
      echo "<td><a class='btn btn-warning' href='indexa.php?pg=modeq.php&idequipo=$fila[idequipo]'>";
      echo "Mod</a></td>";
    }
?>
<tr>
</tbody>
<td colspan="7">
<input type="submit" name="del" class="btn btn-info" value="Eliminar Equipos Seleccionados" />
<td>
</tr>
</table>
</form>
