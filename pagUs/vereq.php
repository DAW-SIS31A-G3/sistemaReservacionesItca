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
<form method="post">
<table class="table">
  <tr class="thead-dark">
    <th colspan="10"><h2>Equipo Audio Visual</h2></th>

  </tr>
  <tr class="thead-light">
  <th colspan="5"><input class="form-control" id="myInput" type="text" placeholder="Buscar.."></th>
  <th colspan="4"> </th>
  </tr>
  <tr class="thead-dark">
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
where estado='disponible'
ORDER BY
    equipoav.marcaeq";
$results=$conn->query($sql2);
while($fila=$results->fetch_assoc()){
  echo "<tbody id='myTable'>";
      echo "<tr>";
      echo "<td>$fila[equipo] </td>";
      echo "<td>$fila[marca] </td>";
      echo "<td>$fila[modelo] </td>";
      echo "<td>$fila[numerodeserie] </td>";
      echo "<td>$fila[fechaingreso] </td>";
      echo "<td>$fila[estado] </td>";
      echo "<td>$fila[caracteristicas] </td>";
      echo "<td>$fila[deptos] </td>";
      echo "<td><a class='btn btn-primary' href='indexu.php?pg=reserva.php&idequipo=$fila[idequipo]'>";
      echo "Reservar</a></td>";
    }
?>
</tr>
</tbody>
</table>
</form>
