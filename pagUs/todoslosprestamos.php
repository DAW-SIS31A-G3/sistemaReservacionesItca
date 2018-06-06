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
    <table class="table"><form method="post">
		<tr class="thead-dark">
			<th colspan="40"><h4>Tabla De Usuarios</h4></th>
    </tr>
    <tr class="thead-light">
<th colspan="7"><input class="form-control" id="myInput" type="text" placeholder="Buscar.."></th>
<th colspan="4"></th>
  </tr>
		<tr class="thead-dark">
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
where reservate = '$id'";
     $results=$conn->query($sql);
     while($fila=$results->fetch_assoc()){
          echo "<tbody id='myTable'>";
           echo "<tr>";
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
         }
         ?>
     </tr>
     <tbody>
     </tr>
     </table>

   </form>
