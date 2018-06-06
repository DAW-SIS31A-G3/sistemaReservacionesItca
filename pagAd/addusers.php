<?php
 require_once('nav.php');

 ?>

<table class="table table-hover table-full">
<form method="post">
  <tr class="thead-dark">
    <th colspan="2" style="text-align: center">Agregar Docentes</tr>
  </tr>
  <tr>
    <th>Id de Usuario</th>
    <td ><input type="text" class="form-control" name="iduser" placeholder="El Id será permanente" required/></td>
  </tr>
  <tr>
    <th>Nombre</th>
    <td><input type="text" class="form-control" name="nombre" placeholder="Nombre" required/></td>
  </tr>
  <tr>
    <th>Apellido</th>
    <td><input type="text" class="form-control" name="apellido" placeholder="Apellido" required/></td>
  </tr>
  <tr>
    <th>Contraseña</th>
    <td><input type="text" class="form-control" name="pass" placeholder="Contraseña" required/></td>
  </tr>
  <tr>
    <th>Departamento</th>
    <td ><select class="form-control special-full" name="departamento">
      <?php
              $sql2="SELECT * from departamento";
              $results2=$conn->query($sql2);
              while($fila2=$results2->fetch_assoc()){
                echo "
                <option value='$fila2[iddep]'>$fila2[deptos]</option>
                ";
              }
       ?>
                    </select>
    </td>
  </tr
  <tr>
    <th>Nivel<br />De Acceso</th>
    <td ><select class="form-control special-full" name="tipo">
      <?php
              $sql1="SELECT * from tipous";
              $results=$conn->query($sql1);
              while($fila=$results->fetch_assoc()){
                echo "
                <option value='$fila[idtipo]'>$fila[tipos]</option>
                ";
              }
       ?>
                    </select>
    </td>
  </tr>
  <tr>
    <td colspan="4"><center><button name="add" class="btn btn-info">Agregar Usuarios</buton></center></td>
  </tr>
</form>
<?php
if(isset($_POST["add"])){
      $iduser=$_POST["iduser"];
      $nombre=$_POST["nombre"];
      $apellido=$_POST["apellido"];
      $pass=$_POST["pass"];
      $departamento=$_POST["departamento"];
      $tipo=$_POST["tipo"];
      $sql="INSERT INTO usuario VALUES ('$iduser','$nombre','$apellido','$pass','$departamento', '$tipo')";
      $conn->query($sql);
    echo "
    <tr>
      <td colspan='4'>  <div class='alert alert-success alert-dismissible fade show'>
          <button type='button' class='close' data-dismiss='alert'>&times;</button>
          <strong>Listo!</strong> El Usuario se Agrego <a href='verusers.php'>Ver Usuarios</a>.
        </div></td>
    </tr>
    ";
}
?>
</table>
</div>
