<?php
 require_once('nav.php');
  $idm = $_GET["idmarca"];
 $sqlf ="SELECT * FROM marca
		where idmarca='$idm'";
		$resultsf=$conn->query($sqlf);
$filaf=$resultsf->fetch_assoc()
 ?>
 <div class="table-responsive table-hover">
    <table class="table table-full"><form method="post">
		<tr class="thead-dark">
			<th colspan="2"><h2>Tabla De Marcas</h2></th>
		</tr>
		<tr>
			<th>Marca</th>
			<td><input type="text" value="<?php echo "$filaf[marca]";?>" name="marca" class="form-control"/>
		</tr>
		<tr>
			<th>Modelo</th>
			<td><input type="text" value="<?php echo "$filaf[modelo]";?>" name="modelo" class="form-control"/>
		</tr>
		</tr>
		  <tr>
    <td colspan="4"><center><button name="mod" class="btn btn-warning">Modificar</button></center></td>
  </tr>
</form>
<?php
if(isset($_POST["mod"])){
      $marca=$_POST["marca"];
      $modelo=$_POST["modelo"];
      $sql="UPDATE marca set modelo = '$modelo', marca = '$marca' where idmarca = '$idm'";
      $conn->query($sql);
    echo "
    <tr>
      <td colspan='4'>  <div class='alert alert-success alert-dismissible fade show'>
          <button type='button' class='close' data-dismiss='alert'>&times;</button>
          <strong>¡Listo!</strong> La Marca y el modelo se Modifico <a href='indexa.php?pg=vermarc.php'>Ver MArcas</a>.
        </div></td>
    </tr>
    ";
}
?>
