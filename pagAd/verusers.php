<?php
 require_once('nav.php');
 ?>
 <div class="table-responsive table-hover">
    <table class="table"><form method="post">
		<tr class="thead-dark">
			<th colspan="8"><h2>Tabla De Usuarios</h2></th>
		</tr>
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
      <tr class="thead-light">
      <th colspan="5"><input class="form-control" id="myInput" type="text" placeholder="Buscar.."></th>
      </tr>
	  </tr>
  <tr><td  colspan=8><div class='alert alert-warning alert-dismissible fade show'>
      <button type='button' class='close' data-dismiss='alert'>&times;</button>
      <strong>¡Advertencia!</strong> Para eliminar primero deve eliminar las Reservasiones y los Repotes de Fallo tienen El mismo Usuario .
    </td></tr></div>
  </tr>
		<tr class="thead-dark">
			<th>¿Del? </th>
			<th>IdUsuario</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Contraseña</th>
			<th>Depto</th>
			<th>Tipo</th>
			<th> </th>
		</tr><?php
$sql="SELECT iduser,  nombre, apellido,  pass, deptos, tipos  FROM usuario
          INNER JOIN departamento ON departamento.iddep = usuario.dep
          INNER JOIN tipous ON tipous.idtipo = usuario.tipo";
     $results=$conn->query($sql);
     while($fila=$results->fetch_assoc()){
           echo "<tr>";
           	echo "<tbody id='myTable'>";
           echo "<td><input type=checkbox name=eliminar[] value='$fila[iduser]'></td>";
           echo "<td>$fila[iduser] </td>";
           echo "<td>$fila[nombre] </td>";
           echo "<td>$fila[apellido] </td>";
           echo "<td>$fila[pass] </td>";
           echo "<td>$fila[deptos] </td>";
           echo "<td>$fila[tipos] </td>";
           echo "<td><a class='btn btn-warning' href='?pg=modus.php&iduser=$fila[iduser]'>";
           echo "Mod</a></td>";
         } ?>
</tbody>
</tr>
     <tr>
       <td colspan="7"><input type="submit" name="del" class="btn btn-info" value="Eliminar Usuarios Seleccionados" /></td>
     </tr>
     <tr>
     </tr>
   </table><?php
   if(isset($_POST["del"])){
   if(isset($_POST["eliminar"])){
   $iduserel=$_POST["eliminar"];
   foreach($iduserel as $iduserelim){
     $sql2="DELETE from usuario where iduser ='$iduserelim'";
     $conn->query($sql2);
     }
   }else{
   echo "<table class='table table-full>'<tr><td  colspan=8><div class='alert alert-warning alert-dismissible fade show'>
       <button type='button' class='close' data-dismiss='alert'>&times;</button>
       <strong>¡Advertencia!</strong> Seleccione Un Usuarios Eliminar.
     </td></tr></div></table>";
   }
   } ?>
   </form>
