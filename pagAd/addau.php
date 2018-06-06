<?php
 require_once('nav.php');
 ?>

<table class="table table-hover table-full">
<form method="post">
  <tr class="thead-dark">
    <th colspan="2" style="text-align: center">Agregar Aulas</tr>
  <tr>
    <th>Nombre</th>
    <td><input type="text" class="form-control" name="aula" placeholder="Nombre" required/></td>
  </tr>
  <tr>
    <td colspan="4"><center><button name="add" class="btn btn-info">Agregar Aulas</button></center></td>
  </tr>
</form>
<?php
if(isset($_POST["add"])){
      $aula=$_POST["aula"];
      $sql="INSERT INTO local VALUES ('null','$aula')";
      $conn->query($sql);
    echo "
    <tr>
      <td colspan='4'>  <div class='alert alert-success alert-dismissible fade show'>
          <button type='button' class='close' data-dismiss='alert'>&times;</button>
          <strong>Listo!</strong> El Aula se Agrego <a href='indexa.php?pg=verau.php'>Ver Aulas</a>.
        </div></td>
    </tr>
    ";
}
?>
</table>
</div>
