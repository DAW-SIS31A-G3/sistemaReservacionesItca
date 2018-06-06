<?php
 require_once('nav.php');
 ?>
 <div class="table-responsive table-hover">
    <table class="table table-full"><form method="post">
		<tr class="thead-dark">
			<th colspan="2"><h2>Tabla De Departamentos</h2></th>
		</tr>
		<tr>
			<th>Tipo De Usuario</th>
			<td><input type="text" name="tipo" class="form-control"/>
		</tr>
		  <tr>
    <td colspan="4"><center><button name="add" class="btn btn-info">Agregar Usuarios</buton></center></td>
  </tr>
</form>
<?php
if(isset($_POST["add"])){
      $tipo=$_POST["tipo"];
      $sql="INSERT INTO tipous VALUES ('null','$tipo')";
      $conn->query($sql);
    echo "
    <tr>
      <td colspan='4'>  <div class='alert alert-success alert-dismissible fade show'>
          <button type='button' class='close' data-dismiss='alert'>&times;</button>
          <strong>Listo!</strong> El Tipo de Usuario se Agrego <a href='vertipo.php'>Ver Tipos de Usuarios</a>.
        </div></td>
    </tr>
    ";
}
?>
