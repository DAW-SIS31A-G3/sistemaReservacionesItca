<?php
if(isset($_POST["ok"])){
  $fecha = $_POST["fecha"];
  header("Location: generarpdfxfecha.php?pdf=1&fecha=$fecha");
}
require_once('nav.php');
?>
<form method="post">
<div class="table-responsive table-hover">
  <table class="table table-full">
    <tr class="tehead-dark">
      <th><input type="date" class="form-control" name="fecha"  required></th>
      <td colspan="40"><center><input type="submit" name="ok" class="btn btn-danger" value="Generar PDF" /></td>
    </tr>
  </table>
</form>
</div>
