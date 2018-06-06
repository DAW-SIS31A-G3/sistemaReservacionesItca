<?php
@session_start();
if (!isset($_SESSION["id_us"])) {
}else{
require '../bd/bd.php';
$id = $_SESSION['id_us'];
}
 ?>
<!DOCTYPE HTML>
<html language="es">
<head>
  <title>ITCA-FEPADE</title>
  <meta charset="Utf-8"/>
<link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="../css/bootstrap-grid.min.css" type="text/css" />
<link rel="icon" type="image/png" href="../img/fav.png" />
</head>
<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
 <!-- Brand -->
 <a class="navbar-brand" href="#"><img src="../img/logo-new-white.png" style="width: 180px;" /></a>
 <button  class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
   <span class="navbar-toggler-icon"></span>
 </button>
 <!-- Links -->
   <div class="collapse navbar-collapse" id="collapsibleNavbar">
 <ul class="navbar-nav">
           <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                 <?php
                 $sql="SELECT *
                       FROM usuario
                       where iduser = '$id'";
                 $results=$conn->query($sql);
                 $fila=$results->fetch_assoc();
                 echo "$fila[nombre] $fila[apellido]";
                  ?>
               </a>
               <div class="dropdown-menu">
                 <form method="get">
                 <button name="close" class="dropdown-item"><img src="../img/session_destroy.png" width="25px"> Cerrar Sesion</button>
                 <?php
                  if (isset($_GET["close"])) {
                    session_destroy();
                    header('Location:../index.php');
                  }
                 ?>
               </form>
                 <a class="dropdown-item" href="edit-me.php"><img src="../img/edit-user-male.png" width="20px"> Editar Credenciales</a>
               </div>
             </li>
   <li class="nav-item">
     <a class="nav-link" href="indexu.php">Inicio</a>
   </li>
   <!-- Dropdown -->
       <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
			Reservasiones
           </a>
           <div class="dropdown-menu">
             <a class="dropdown-item" href="indexu.php?pg=todoslosprestamos.php">Todos Mis Prestamos</a>
             <a class="dropdown-item" href="?pg=misprestamos.php">Reservasiones Activas</a>
           </div>
         </li>
         <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
              Reservar
             </a>
             <div class="dropdown-menu">
			 <a class="dropdown-item" href="indexu.php?pg=vereq.php">Ver Listado De Equipos</a>
             </div>
           </li>
           <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Reportes
               </a>
               <div class="dropdown-menu">
        <a class="dropdown-item" href="indexu.php?pg=verfalla.php">Mis Reportes</a>
               </div>
             </li>
   </ul>
 </div>
 </nav>
  <div class="container-fluid" style="margin-top:70px">
    <script type="text/javascript" src="../js/tether.min.js"></script>
    <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
