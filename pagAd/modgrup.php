<?php
 require_once('nav.php');
 $idgr= $_GET["idgrupo"];
 $sqlf="SELECT * FROM grupo
		where idgrupo='$idgr'";
$resultsf=$conn->query($sqlf);
$filaf=$resultsf->fetch_assoc()
 ?>
 <div class="table-responsive table-hover">
    <table class="table table-full"><form method="post">
		<tr class="thead-dark">
			<th colspan="4"><h2>Tabla De Grupos</h2></th>
		</tr>
		<tr>
			<th>Grupo</th>
			<td><input type="text" value="<?php echo "$filaf[grupo]" ?>" name="grup" class="form-control" required/>
			<th>Seccion ***</th>
			<td><select name="secc" class="form-control">
					<option>A</option>
					<option>B</option>
					<option>Unico</option>
				</select>
		</tr>
		  <tr>
    <td colspan="4"><center><button name="mod" class="btn btn-warning">Modifcar</button></center></td>
  </tr>
</form>
<?php
if(isset($_POST["mod"])){
      $grup=$_POST["grup"];
      $secc=$_POST["secc"];
      $sql="UPDATE grupo set grupo = '$grup', seccion = '$secc' where idgrupo = '$idgr'";
      $conn->query($sql);
    echo "
    <tr>
      <td colspan='4'>  <div class='alert alert-success alert-dismissible fade show'>
          <button type='button' class='close' data-dismiss='alert'>&times;</button>
          <strong>¡Listo!</strong> $filaf[grupo], $filaf[seccion] Fue modificado <a href='indexa.php?pg=vergrup.php'>Ver Grupos</a>.
        </div></td>
    </tr>
    ";
}
?>