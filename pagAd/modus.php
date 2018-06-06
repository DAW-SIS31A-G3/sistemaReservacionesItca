<?php
$idu= $_GET["iduser"];
if(isset($_POST["mod"])){
	$iduser=$_POST["id"];
	$nombre=$_POST["nombre"];
	$apellido=$_POST["apellido"];
	$pass=$_POST["pass"];
	$dep=$_POST["departamento"];
	$tipo=$_POST["tipo"];
$sql="UPDATE usuario
			set nombre='$nombre', apellido='$apellido', pass='$pass', dep='$dep', tipo='$tipo'
			where iduser='$idu'";
$conn->query($sql);
header('Location: indexa.php?pg=verusers.php');
}
require_once('nav.php');
$sqlf="SELECT iduser, nombre, apellido, pass, deptos, tipos
FROM usuario
INNER JOIN departamento ON departamento.iddep = usuario.dep
INNER JOIN tipous ON tipous.idtipo = usuario.tipo
where iduser='$idu'";
$resultsf=$conn->query($sqlf);
$filaf=$resultsf->fetch_assoc();
 ?>
<table class="table table-hover table-full">
<form method="post">
<tr class="thead-dark">
<th colspan="2" style="text-align: center">Modificar a<?php echo " $filaf[nombre]";?></tr>
</tr>
<tr>
<th>Id de Usuario</th>
<td ><input type="text" value="<?php echo "$filaf[iduser]"; ?>" class="form-control" name="id" readonly="readonly"/></td>
</tr>
<tr>
<th>Nombre</th>
<td><input type="text" value="<?php echo "$filaf[nombre]"; ?>" class="form-control" name="nombre" placeholder="Nombre" required/></td>
</tr>
<tr>
<th>Apellido</th>
<td><input type="text" value="<?php echo "$filaf[apellido]"; ?>" class="form-control" name="apellido" placeholder="Apellido" required/></td>
</tr>
<tr>
<th>Contraseña</th>
<td><input type="text" class="form-control" value="<?php echo "$filaf[pass]"; ?>" name="pass" placeholder="Contraseña" required/></td>
</tr>
<tr>
<th>Departamento **</th>
<td ><select class="form-control special-full" name="departamento">
<?php
$sql2="SELECT * from departamento";
$results2=$conn->query($sql2);
while($fila2=$results2->fetch_assoc()){
echo "<option value='$fila2[iddep]'>$fila2[deptos]</option>";
}
?>
</select>
</td>
</tr
<tr>
<th>Nivel<br />De Acceso**</th>
<td ><select class="form-control special-full" name="tipo"><?php
$sql1="SELECT * from tipous";
$results1=$conn->query($sql1);
while($fila1=$results1->fetch_assoc()){
echo "<option value='$fila1[idtipo]'>$fila1[tipos]</option>";
}
?>
</select>
</td>
</tr>
<tr>
<td colspan=2><center><button name="mod" class="btn btn-warning">Modificar</button></center></td>
</tr>
</form>
</table>
</div>
