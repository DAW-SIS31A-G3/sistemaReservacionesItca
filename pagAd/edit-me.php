<?php
 require_once('nav.php');
 $id = $_SESSION['id'];
 $sqlCons = "SELECT iduser, nombre, apellido, pass, nivel FROM usuario where iduser = '$id'";
 $results=$conn->query($sql);
 $fila=$results->fetch_assoc();
 ?>

<table class="table table-hover table-full">
<form method="post">
  <tr class="thead-dark">
    <th colspan="2"><h1>Mis Credenciales</h1></th>
  </tr>
  <tr>
    <th>Id de Usuario</th>
    <td ><input readonly="readonly" type="text" VALUE="<?php echo "$fila[iduser]";  ?>" class="form-control" name="iduser" placeholder="Id de Usuario" required/></td>
  </tr>
  <tr>
    <th>Nombre</th>
    <td><input type="text" VALUE="<?php echo "$fila[nombre]";  ?>"  class="form-control" name="nombre" placeholder="Nombre" required/></td>
  </tr>
  <tr>
    <th>Apellido</th>
    <td><input type="text" VALUE="<?php echo "$fila[apellido]";  ?>"  class="form-control" name="apellido" placeholder="Apellido" required/></td>
  </tr>
  <tr>
    <th>Contraseña</th>
    <td><input type="text" VALUE="<?php echo "$fila[pass]";  ?>"  class="form-control" name="pass" placeholder="Contraseña" required/></td>
  </tr>
  <tr>
      <td><center><button name="modme" class="btn btn-primary">Guardar</buton></center></td>
  </tr>
</form>
<?php
if(isset($_POST["modme"])){
      $iduser=$_POST["iduser"];
      $nombre=$_POST["nombre"];
      $apellido=$_POST["apellido"];
      $pass=$_POST["pass"];
      $sql="UPDATE usuario
            set iduser='$iduser', nombre='$nombre', apellido='$apellido', pass='$pass'
            where iduser='$id'";
      $conn->query($sql);
		    echo "
    <tr>
      <td colspan='4'>  <div class='alert alert-success alert-dismissible fade show'>
          <button type='button' class='close' data-dismiss='alert'>&times;</button>
          <strong>¡Listo!</strong> Tus Credenciales se actualizaron <a href='indexa.php?pg=verusers.php'>Ver Usuarios</a>.
        </div></td>
    </tr>
    ";
}
?>
</table>
</div>
