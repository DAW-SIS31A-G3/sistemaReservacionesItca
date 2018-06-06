<?php
 require_once('nav.php');
 ?>
 <div class="table-responsive table-hover">
    <table class="table table-full"><form method="post">
		<tr class="thead-dark">
			<th colspan="2"><h2>Tabla De Departamentos</h2></th>
		</tr>
		<tr>
			<th>Departamento</th>
			<td><input type="text" name="dep" class="form-control" required/>
		</tr>
		  <tr>
    <td colspan="4"><center><button name="add" class="btn btn-info">Agregar Departamentos</button></center></td>
  </tr>
</form>
<?php
if(isset($_POST["add"])){
      $dep=$_POST["dep"];
      $sql="INSERT INTO departamento VALUES ('null','$dep')";
      $conn->query($sql);
    echo "
    <tr>
      <td colspan='4'>  <div class='alert alert-success alert-dismissible fade show'>
          <button type='button' class='close' data-dismiss='alert'>&times;</button>
          <strong>Listo!</strong> El Departamento se Agrego <a href='indexa.php?pg=verdep.php'>Ver Departamentos</a>.
        </div></td>
    </tr>
    ";
}
?>
