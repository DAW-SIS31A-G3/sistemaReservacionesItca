<?php
if(isset($_POST["del"])){
  if(isset($_POST["eliminar"])){
  $iduserel=$_POST["eliminar"];
  foreach($iduserel as $iduserelim){
    $sql2="delete from local where idlocal ='$iduserelim'";
    $conn->query($sql2);
    header('Location: indexa.php?pg=verau.php');
  }
}else{
echo "<tr><td  colspan=8><div class='alert alert-warning alert-dismissible fade show'>
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    <strong>¡Advertencia!</strong> Seleccione Una Aula a Eliminar.
  </td></tr></div>";
}
}
?>
<?php
 require_once('nav.php');
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
<th colspan="8"><h2>Aulas</h2></th>
</tr>
<tr class="thead-light">
<th colspan="2"><input class="form-control" id="myInput" type="text" placeholder="Buscar.."></th>
<th></th>
</tr>
<tr>
  <tr><td  colspan=8><div class='alert alert-warning alert-dismissible fade show'>
      <button type='button' class='close' data-dismiss='alert'>&times;</button>
      <strong>¡Advertencia!</strong> Para eliminar primero deve eliminar las Reservasiones tienen la misma Aula y los Repotes de Fallo.
    </td></tr></div>
  </tr>
</table>
<table class="table table-full">
<tr class="thead-dark">
<th>Del?</th>
<th>Aula</th>
<th> </th>
</tr>
<?php
$sql="SELECT *
	FROM
	local order by local";
    $results=$conn->query($sql);
    while($fila=$results->fetch_assoc()){
		echo "<tbody id='myTable'>";
        echo "<tr>";
        echo "<td><input type=checkbox name=eliminar[] value='$fila[idlocal]'></td>";
        echo "<td>$fila[local] </td>";
        echo "<td><a class='btn btn-warning' href='?pg=modau.php&idlocal=$fila[idlocal]'>";
        echo "Mod</a></td>";
    }
?>
     </tr>
	 </tbody>
     <tr>
       <td colspan="7"><input type="submit" name="del" class="btn btn-info" value="Eliminar Aulas Seleccionadas" /></td>
     </tr>
     <tr>

     </tr>
     </table>

   </form>
