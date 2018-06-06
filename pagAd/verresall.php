<?php
if(isset($_POST["acep"])){
if(isset($_POST["ace"])){
$iddetalle=$_POST["ace"];
foreach($iddetalle as $iddetalleel){
$sqlDev = "UPDATE detalle set estadores = 'Reservasion Finalizada' where iddetalle = $iddetalleel";
$conn->query($sqlDev);
header('Location: indexa.php?pg=verresall.php');
}

    }else{
    echo "<tr><td  colspan=8><div class='alert alert-warning alert-dismissible fade show'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <strong>¡Advertencia!</strong> Seleccione Una Reservasion a Eliminar.
      </td></tr></div>";
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
    <table class="table"><form method="post" name="f1">
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
     $sql="SELECT iddetalle, nombre, apellido, equipores, equipo, marcaeq, local, horai, horaf, fecha, grupo, seccion, ciclo, materia, estadores FROM detalle INNER JOIN equipoav ON equipoav.idequipo = detalle.equipores INNER JOIN usuario ON usuario.iduser = detalle.reservate INNER JOIN grupo on grupo.idgrupo = detalle.grupores INNER JOIN local ON local.idlocal = detalle.localres INNER JOIN materia ON materia.idmat = detalle.materiares";
     $results=$conn->query($sql);
     while($fila=$results->fetch_assoc()){
		$idequipo = $fila["equipores"];
		$sqlE = "select idequipo, equipo, marcaeq, marca, modelo, numerodeserie from equipoav inner join marca on marca.idmarca = equipoav.idequipo where idequipo = '$idequipo'";
		$resultsE=$conn->query($sqlE);
		$filaE=$resultsE->fetch_assoc();
           echo "<tr>";
           echo "<td><input type='checkbox' name='eliminar[]' value='$fila[iddetalle]'/></td> ";
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
     <th><a href="javascript:seleccionar_todo()" class="btn btn-link">Marcar todos</a></th><th>
     <a href="javascript:deseleccionar_todo()" class="btn btn-link">Desmarcar</a>  </th>
	 <td colspan="2"><center><input type="submit" name="del" class="btn btn-warning" value='Eliminar Reservasiones' /></td>
	 <td colspan="40"><center><a href="generarpdf.php?pdf=1" target="_blank" class="btn btn-danger">Generar PDF</a></td>
	 </tr>
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
