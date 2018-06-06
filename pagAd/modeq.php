<?php
 $ide = $_GET["idequipo"];
  if(isset($_POST["mod"])){
      $equipo=$_POST["equipo"];
      $marca=$_POST["marca"];
      $numerodeserie=$_POST["numerodeserie"];
      $fechaingreso=$_POST["fechaingreso"];
	    $estado=$_POST["estado"];
      $carac=$_POST["carac"];
      $departamento=$_POST["departamento"];
      $sql5="UPDATE equipoav SET equipo = '$equipo', marcaeq = '$marca',	numerodeserie = '$numerodeserie', fechaingreso = '$fechaingreso', estado = '$estado', caracteristicas = '$carac', departamentos = '$departamento' where idequipo ='$ide'";
      $conn->query($sql5);
      header('Location: indexa.php?pg=vereq.php');
    }
?>
<?php
 require_once('nav.php');
 $sql1="SELECT
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
 where idequipo='$ide'";
 $results1=$conn->query($sql1);
$fila1=$results1->fetch_assoc();
 ?>
<table class="table table-hover table-full">
<form method="post">
  <tr class="thead-dark">
    <th colspan="2">Editar A <?php echo "[$fila1[equipo] - $fila1[marca] $fila1[modelo] - $fila1[deptos]]"; ?> </th>
  </tr>
  <tr>
    <th>Equipo</th>
    <td><input type="text" value="<?php echo "$fila1[equipo]"; ?>" class="form-control" name="equipo" placeholder="Equipo" required></td>
  </tr>
  <tr>
    <th>Marca</th>
    <td><select class="form-control" value="<?php echo "$fila1[deptos]"; ?>" name="marca">
		<?php
		$sql3="select * from marca";
		$results3=$conn->query($sql3);
		while($fila3 = $results3->fetch_assoc()){
			echo "
				<option value='$fila3[idmarca]'>$fila3[marca], $fila3[modelo]</option>
			";
		}
		?>
	</select></td>
  </tr>
  <tr>
    <th># de serie</th>
    <td ><input value="<?php echo "$fila1[numerodeserie]"; ?>" class="form-control" name="numerodeserie" required /></td>
  </tr>
   <tr>
    <th>Fecha de ingreso</th>
    <td ><input class="form-control" value="<?php echo "$fila1[fechaingreso]"; ?>" name="fechaingreso" type="date" /></td>
  </tr>
  <tr>
    <th>Estado<br />Del Equipo</th>
    <td><select value="<?php echo "$fila1[estado]"; ?>" class="form-control special-full" name="estado">
                      <option>Disponible</option>
                      <option>Dañado</option>
                      <option>En Reparacion</option>
                    </select>
    </td>
  </tr>
  <tr>
	<th>Carcateristicas</th>
	<td><textarea name="carac" class="form-control"><?php echo "$fila1[caracteristicas]"; ?> </textarea></td>
  </tr>
  <tr>
  <tr>
	<th>Departemento **</th>
	<td><select class="form-control" value="<?php echo "$fila1[deptos]"; ?>" name="departamento">
		<?php
		$sql2="select * from departamento";
		$results2=$conn->query($sql2);
		while($fila2 = $results2->fetch_assoc()){
			echo "
				<option value='$fila2[iddep]'>$fila2[deptos]</option>
			";
		}
		?>
	</select></td>
  </tr>
    <td colspan="4"><center><input name="mod" type="submit" value="Modificar Equipo" class="btn btn-info"></center></td>
  </tr>
</form>
</table>
