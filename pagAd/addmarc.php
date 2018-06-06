<?php
 require_once('nav.php');
 ?>
 <div class="table-responsive table-hover">
    <table class="table table-full"><form method="post">
		<tr class="thead-dark">
			<th colspan="2"><h2>Tabla De Marcas</h2></th>
		</tr>
		<tr>
			<th>Marca</th>
			<td><input type="text" name="marca" class="form-control"/>
		</tr>
		<tr>
			<th>Modelo</th>
			<td><input type="text" name="modelo" class="form-control"/>
		</tr>
		</tr>
		  <tr>
    <td colspan="4"><center><button name="add" class="btn btn-info">Agregar Marcas</button></center></td>
  </tr>
</form>
<?php
if(isset($_POST["add"])){
      $marca=$_POST["marca"];
      $modelo=$_POST["modelo"];
      $sql="INSERT INTO marca VALUES ('null','$modelo','$marca')";
      $conn->query($sql);
    echo "
    <tr>
      <td colspan='4'>  <div class='alert alert-success alert-dismissible fade show'>
          <button type='button' class='close' data-dismiss='alert'>&times;</button>
          <strong>Listo!</strong> La Marca se Agrego <a href='indexa.php?pg=vermarc.php'>Ver MArcas</a>.
        </div></td>
    </tr>
    ";
}
?>
