 <?php
 require_once('nav.php');
 $idau = $_GET["idlocal"];
 $sqlG="select * from local where idlocal = '$idau'";
 $rsG = $conn->query($sqlG);
 $filaG = $rsG->fetch_assoc();
 ?>

<table class="table table-hover table-full">
<form method="post">
  <tr class="thead-dark">
    <th colspan="2" style="text-align: center">Editar Aula <?php echo "$filaG[local]"; ?></tr>
  <tr>
    <th>Aula</th>
    <td><input type="text" class="form-control" value="<?php echo "$filaG[local]"; ?>" name="aula" placeholder="Nombre" required/></td>
  </tr>
  <tr>
    <td colspan="4"><center><button name="mod" class="btn btn-warning">Modificar</button></center></td>
  </tr>
</form>
<?php
if(isset($_POST["mod"])){
      $aula=$_POST["aula"];
      $sql="UPDATE local set local = '$aula' where idlocal = '$idau'";
      $conn->query($sql);
    echo "
    <tr>
      <td colspan='4'>  <div class='alert alert-success alert-dismissible fade show'>
          <button type='button' class='close' data-dismiss='alert'>&times;</button>
          <strong>¡Listo!</strong> El Aula se Modifico <a href='indexa.php?pg=verau.php'>Ver Aulas</a>.
        </div></td>
    </tr>
    ";
}
?>
</table>
</div>
