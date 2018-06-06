<?php
 require_once('nav.php');
 ?>

<table class="table table-hover table-full">
<form method="post">
  <tr class="thead-dark">
    <th colspan="2">Agregar Equipo </th>
  </tr>
  <?php

  if(isset($_POST["add"])){
      $equipo=$_POST["equipo"];
      $marca=$_POST["marca"];
      $numerodeserie=$_POST["numerodeserie"];
      $fechaingreso=$_POST["fechaingreso"];
      $carac=$_POST["carac"];
      $estado=$_POST["estado"];
      $deptos=$_POST["deptos"];
      $sql="INSERT INTO equipoav VALUES ('null','$equipo','$marca','$numerodeserie','$fechaingreso','$estado','$carac','$deptos')";
      $conn->query($sql);
    echo "
    <tr>
      <td colspan='10'>  <div class='alert alert-success alert-dismissible fade show'>
          <button type='button' class='close' data-dismiss='alert'>&times;</button>
          <strong>Listo!</strong> El Equipo Audiovisual se Agrego <a href='indexa.php?pg=vereq.php'>Ver Equipo Av</a>.
        </div></td>
    </tr>
    ";
}
?>
  <tr>
    <th>Tipo<br /> De Equipo</th>
    <td><input type="text" class="form-control" name="equipo" placeholder="Tipo de equipo" required></td>
  </tr>
  <tr>
    <th>Marca - Modelo</th>
    <td>
		<select class="form-control" name="marca">
			<?php
			$sqlC="select * from marca";
			$rs = $conn->query($sqlC);
			while($filaC = $rs->fetch_assoc() ){
				echo "<option value=$filaC[idmarca]> $filaC[marca] - $filaC[modelo]";
			}
			?>
		</select</td>
  </tr>
      <tr>
    <th>Numero De<BR>Serie</th>
    <td><input type="text" class="form-control" name="numerodeserie" placeholder="Numero De Serie" required></td>
  </tr>
      <tr>
    <th>Fecha De<BR>Ingreso</th>
    <td><input type="date" class="form-control" name="fechaingreso"  required></td>
  </tr>
  <tr>
    <th>Estado<br />Del Equipo</th>
    <td><select class="form-control special-full" name="estado">
                      <option>Disponible</option>
                      <option>Dañado</option>
                      <option>En Reparacion</option>
                    </select>
    </td>
  </tr>
    <tr>
    <th>caracteristicas</th>
    <td ><textarea class="form-control" name="carac" required></textarea></td>
  </tr>
  <tr>
    <th>Departamento</th>
    <td>
		<select class="form-control" name="deptos">
			<?php
			$sqlC2="SELECT *
				FROM
				departamento";
			$rs2 = $conn->query($sqlC2);
			while($filaC2 = $rs2->fetch_assoc() ){
				echo "<option value=$filaC2[iddep]> $filaC2[deptos]";
			}
			?>
		</select</td>
  </tr>
  <tr>
    <td colspan="4"><center><input value="Agregar Equipo" name="add" type="submit" class="btn btn-info"></center></td>
  </tr>
</form>

</table>
