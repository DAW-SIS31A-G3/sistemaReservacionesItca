<?php
$idreporte = $_GET["idrep"];
$sql="SELECT
    idrep,
    usuariofall,
    equipofall,
    nombre,
    apellido,
	grupofall,
	aulafall,
    estadorep,
	fallo
FROM
    reportefalla
INNER JOIN usuario ON usuario.iduser = reportefalla.usuariofall
INNER JOIN equipoav ON equipoav.idequipo = reportefalla.equipofall
INNER JOIN local ON local.idlocal = reportefalla.aulafall
where idrep = '$idreporte'";
$results=$conn->query($sql);
$fila=$results->fetch_assoc();
$idequ = $fila["equipofall"];
$sqlE = "select idequipo, equipo, marcaeq, marca, modelo, numerodeserie
from equipoav
inner join marca on marca.idmarca = equipoav.idequipo where idequipo = '$idequ'";
$resultsE=$conn->query($sqlE);
$filaE=$resultsE->fetch_assoc();

$idau = $fila["aulafall"];
$sqlA = "select *
from local
where idlocal = '$idau'";
$resultsA=$conn->query($sqlA);
$filaA=$resultsA->fetch_assoc();

$idG = $fila["grupofall"];
$sqlG = "select *
from grupo
where idgrupo = '$idG'";
$resultsG=$conn->query($sqlG);
$filaG=$resultsG->fetch_assoc();
?>
<?php
  if(isset($_POST["mod"])){
  $idrep = $fila["idrep"];
  $fallo = $_POST["fall"];
  $sqlUp ="UPDATE reportefalla set fallo = '$fallo' where idrep = $idrep";
  $conn->query($sqlUp);
  header('Location: indexu.php?pg=verfalla.php');
  }
  ?>
<div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><?php echo "$fila[nombre] $fila[apellido]"; ?></h4><br>
		  <h6><?php echo "$filaE[equipo] $filaE[marca] $filaE[modelo] 
		  <br /> Local: $filaA[local]
		  <br /> Grupo: $filaG[grupo] $filaG[seccion]"; ?><h6>
        </div>

        <!-- Modal body -->
        <div class="modal-body"><form method="post">
		<textarea name="fall" class="form-control"><?php echo "$fila[fallo]"; ?></textarea>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
		<button type="submit" name="mod" class="btn btn-warning">Modificar</button></form>
        <a href="indexu.php?pg=verfalla.php" class="btn btn-danger">Cerrar</a>
        </div>

      </div>
    </div>
  </div>
