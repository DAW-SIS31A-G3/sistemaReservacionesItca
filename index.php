<?php
    require_once('bd/bdPDO.php');
    @session_start();
    if (isset($_POST["ok"])) {
       $usuario = $_POST['userid'];
       $clave=$_POST['pass'];
       $sql="SELECT * FROM usuario
             WHERE iduser='$usuario' and pass='$clave'";
       $records = $conn->prepare($sql);
       $records->execute();
       $results = $records->fetch(PDO::FETCH_ASSOC);
       $cantReg=$records->rowCount();
       if($cantReg>0){
       switch ($results[tipo]){
           case 1 :
              $_SESSION['id'] = $results['iduser'];
              header("Location: pagAd/indexa.php");
           break;
           case 2 :
              $_SESSION['id_us'] = $results['iduser'];
              header("Location: pagUs/indexu.php");
           break;
         }
       }
	   $message= "Ingrese Sus Datos Correctamente";
           echo "<tr><td colspan='2'>
                  <div class='alert alert-danger alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>$message.</strong>
                    </div></td></tr>";
     }
   ?>
 <!DOCTYPE HTML>
 
 <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
 <link rel="stylesheet" href="css/bootstrap-grid.min.css" type="text/css" />
 <link rel="icon" type="image/png" href="img/fav.png" />
 <script type="text/javascript" src="js/tether.min.js"></script>
 <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
 <script type="text/javascript" src="js/popper.min.js"></script>
 <script type="text/javascript" src="js/bootstrap.min.js"></script>
 <form method="post">
<div class="container-fluid" style="margin-top:110px">
  <div class="table-responsive table-hover">
<table class="table table-full table-hover table">
  <tr class="thead-full">
    <th colspan="2"><h1><img src="img/logo-new-white.png" width="20%" alt="ITCA-FEPADE"/> Inicio De Sesion</h1></th>
  </tr>
  <tr>
    <th>ID Usuario</th>
    <td><input type="text" class="form-control" name="userid" placeholder="Id"  required/></td>
  </tr>
  <tr>
    <th>Contraseña</th>
    <td><input type='password' class='form-control' name='pass' placeholder='Contraseña' required/></td>
  </tr>
  <tr>
    <th colspan="2"><center><input type="submit" name="ok" class="btn btn-secondary" value="Iniciar Sesion"/></center></th>
  </tr>
</table>
</div>
</div>
</form>
