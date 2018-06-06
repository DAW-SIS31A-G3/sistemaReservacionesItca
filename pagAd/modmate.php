<?php
 require_once('nav.php');
   $idmat = $_GET["idmat"];
 $sqlf ="SELECT * FROM materia
		where idmat='$idmat'";
		$resultsf=$conn->query($sqlf);
$filaf=$resultsf->fetch_assoc()
 ?>
 <div class="table-responsive table-hover">
    <table class="table table-full"><form method="post">
		<tr class="thead-dark">
			<th colspan="2"><h2>Tabla De Materia</h2></th>
		</tr>
		<tr>
			<th>Materia</th>
			<td><input type="text" value="<?php echo "$filaf[materia]" ?>" name="materia" class="form-control" required />
		</tr>
		  <tr>
    <td colspan="4"><center><button name="mod" class="btn btn-info">Modificar</button></center></td>
  </tr>
</form>
<?php
if(isset($_POST["mod"])){
      $materia=$_POST["materia"];
      $sql="UPDATE materia set materia = '$materia' where idmat = '$idmat'";
      $conn->query($sql);
    echo "
    <tr>
      <td colspan='4'>  <div class='alert alert-success alert-dismissible fade show'>
          <button type='button' class='close' data-dismiss='alert'>&times;</button>
          <strong>¡Listo!</strong> La Materia se Modifico <a href='indexa.php?pg=vermat.php'>Ver Materia</a>.
        </div></td>
    </tr>
    ";
}
?> 