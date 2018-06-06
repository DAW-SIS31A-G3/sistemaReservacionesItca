<?php
 require_once('nav.php');
 ?>
 <div class="table-responsive table-hover">
    <table class="table table-full"><form method="post">
		<tr class="thead-dark">
			<th colspan="4"><h2>Tabla De Grupos</h2></th>
		</tr>
		<tr>
			<th>Grupo</th>
			<td><input type="text" name="grup" class="form-control"/>
			<th>Seccion</th>
			<td><select name="secc" class="form-control">
					<option>A</option>
					<option>B</option>
					<option>Unico</option>
				</select>
		</tr>
		  <tr>
    <td colspan="4"><center><button name="add" class="btn btn-info">Agregar Grupos</button></center></td>
  </tr>
</form>
<?php
if(isset($_POST["add"])){
      $grup=$_POST["grup"];
      $secc=$_POST["secc"];
      $sql="INSERT INTO grupo VALUES ('null','$grup','$secc')";
      $conn->query($sql);
    echo "
    <tr>
      <td colspan='4'>  <div class='alert alert-success alert-dismissible fade show'>
          <button type='button' class='close' data-dismiss='alert'>&times;</button>
          <strong>Listo!</strong> El Grupo se Agrego <a href='indexa.php?pg=vergrup.php'>Ver Grupos</a>.
        </div></td>
    </tr>
    ";
}
?>
