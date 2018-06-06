<?php
if(isset($_POST["del"])){
if(isset($_POST["eliminar"])){
$iduserel=$_POST["eliminar"];
foreach($iduserel as $iduserelim){
$sql2="delete from grupo where idgrupo ='$iduserelim'";
$conn->query($sql2);
header('Location: indexa.php?pg=vergrup.php');
}
}else{
echo "<tr><td  colspan=8><div class='alert alert-warning alert-dismissible fade show'>
<button type='button' class='close' data-dismiss='alert'>&times;</button>
<strong>dvertencia!</strong> Seleccione Una Grupo a Eliminar.
</td></tr></div>";
  }
	}
?>
 <meta charset="Utf-8">
<div class="table-responsive table-hover">
    <table class="table table-full"><form method="post">
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
<tr class="thead-dark">
<th colspan="8"><h2>Grupos</h2></th>
</tr>
<tr class="thead-light">
<th colspan="5"><input class="form-control" id="myInput" type="text" placeholder="Buscar.."></th>
</tr>
  <tr><td  colspan=8><div class='alert alert-warning alert-dismissible fade show'>
      <button type='button' class='close' data-dismiss='alert'>&times;</button>
      <strong>¡Advertencia!</strong> Para eliminar primero deve eliminar las Reservasiones tienen El mismo grupo y los Repotes de Fallo.
    </td></tr></div>
  </tr>
<tr>
<tr class="thead-dark">
<th>Del?</th>
<th>Grupo</th>
<th>Seccion</th>
<th> </th>
</tr>
<?php
$sql="SELECT *
	FROM
	grupo
	order by grupo, seccion";
    $results=$conn->query($sql);
    while($fila=$results->fetch_assoc()){
	echo "<tbody id='myTable'>";
    echo "<tr>";
    echo "<td><input type=checkbox name=eliminar[] value='$fila[idgrupo]' /></td>";
    echo "<td>$fila[grupo] </td>";
    echo "<td>$fila[seccion] </td>";
    echo "<td><a class='btn btn-warning' href='indexa.php?pg=modgrup.php&idgrupo=$fila[idgrupo]'>";
    echo "Mod</a></td>";
    }
?>
</tr>
</tbody>
<tr>
<td colspan="7"><input type="submit" name="del" class="btn btn-info" value="Eliminar Grupo Seleccionados" /></td>
</tr>
<tr>
</tr>
</table>
</form>
