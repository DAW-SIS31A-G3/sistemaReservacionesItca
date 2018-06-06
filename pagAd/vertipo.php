<?php
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
 <meta charset="Utf-8">
<div class="table-responsive table-hover">
    <table class="table table-full"><form method="post">
		<tr>
			<td colspan="8"><h2>Tabla De Usuarios</h2></td>
		</tr>
		<tr>
			<th>Busqueda Filtrada</th>
			<td>
				<input class="form-control mr-sm-2" type="text" name="clave" placeholder="Ingrese Datos">
			</td>
			<td><button class="btn btn-success" name="buscar" type="submit">Buscar</button></td>
		</tr><tr class="thead-dark">
			<th>¿Del? </th>
			<th>Id</th>
			<th>Departamento</th>
			<th> </th>
		</tr>
     <?php
	 if(isset($_POST["buscar"])){
		 $clave = $_POST["clave"];
		 $sqlf="SELECT *
				FROM
				tipous
				where deptos like '%$clave%'";
     $resultsf=$conn->query($sqlf);
	 $rows = $resultsf->num_rows;
	 if($rows <= 0){
		 echo "<tr><td  colspan=8><div class='alert alert-danger alert-dismissible fade show'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button><center>
        <strong>¡Hay $rows filas! No Se Encontaron Departamentos con ese Nombre.</strong></center>
      </td></tr></div>";
	 }
	 else{
     while($filaf=$resultsf->fetch_assoc()){
           echo "<tr>";
           echo "<td><input type=checkbox name=eliminar[] value='$fila[iddep]'></td>";
           echo "<td>$filaf[iddep] </td>";
           echo "<td>$filaf[deptos] </td>";
           echo "<td><a class='btn btn-warning' href='?pg=motipo.php&iddep=$fila[iddep]'>";
           echo "Mod</a></td>";
         }
	 }
	 }else{
     $sql="SELECT *
				FROM
				departamento";
     $results=$conn->query($sql);
     while($fila=$results->fetch_assoc()){
           echo "<tr>";
           echo "<td><input type=checkbox name=eliminar[] value='$fila[iddep]'></td>";
           echo "<td>$fila[iddep] </td>";
           echo "<td>$fila[deptos] </td>";
           echo "<td><a class='btn btn-warning' href='?pg=modtipo.php&iddep=$fila[iddep]'>";
           echo "Mod</a></td>";
         }
	 }
         ?>
     </tr>
     <tr>
       <td colspan="7"><input type="submit" name="del" class="btn btn-info" value="Eliminar Departamentos Seleccionados" /></td>
     </tr>
     <tr>
  <?php
    if(isset($_POST["del"])){
      if(isset($_POST["eliminar"])){
      $iduserel=$_POST["eliminar"];
      foreach($iduserel as $iduserelim){
        $sql2="delete from departamento where iddep ='$iduserelim'";
        $conn->query($sql2);
      }
    }else{
    echo "<tr><td  colspan=8><div class='alert alert-warning alert-dismissible fade show'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <strong>¡Advertencia!</strong> Seleccione Un Tipo a Eliminar.
      </td></tr></div>";
  }
}
    ?>
     </tr>
     </table>

   </form>
