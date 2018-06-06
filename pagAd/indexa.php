<?php
  require_once('nav.php');
  if(isset($_GET["pg"])){
    include($_GET["pg"]);
  }else{
  echo"<div class='flex-sm-row'>
     ITCA-FEPADE
     <h5>Administrador</h5>
   </div>
";
 }
 ?>