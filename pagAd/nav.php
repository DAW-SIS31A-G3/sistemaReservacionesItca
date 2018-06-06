<?php
if (isset($_GET["close"])) {
session_destroy();
header('Location:../index.php');
}
@session_start();
if (!isset($_SESSION["id"])) {
  header('Location: ../index.php');
}else{
require '../bd/bd.php';
$id = $_SESSION['id'];
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
<a class="navbar-brand" href="#"><img src="../img/logo-new-white.png" style="width: 180px;" /></a>
<button  class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="collapsibleNavbar">
<ul class="navbar-nav">
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"><?php
$sql="SELECT * FROM usuario where iduser = '$id'";
$results=$conn->query($sql);
$fila=$results->fetch_assoc();
echo "$fila[nombre] $fila[apellido]";
?></a>
<div class="dropdown-menu">
<form method="get">
<button name="close" class="dropdown-item"><img src="../img/session_destroy.png" width="25px"> Cerrar Sesion</button>
</form>
<a class="dropdown-item" href="edit-me.php"><img src="../img/edit-user-male.png" width="20px"> Editar Credenciales</a>
</div>
</li>
<li class="nav-item">
<a class="nav-link" href="indexa.php">Inicio</a>
</li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Usuario</a>
<div class="dropdown-menu">
<a class="dropdown-item" href="?pg=addusers.php"><img src="../img/add-user-male.png" width="20px"> Agregar Usuarios</a>
<a class="dropdown-item" href="?pg=verusers.php"><img src="../img/see.png" width="20px"> Ver Usuarios</a>
</div>
</li>
     <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Equipo Av</a>
<div class="dropdown-menu">
<a class="dropdown-item" href="?pg=adeq.php"><img src="../img/laptop1.png" width="30px"> Agregar Equipo Av</a>
<a class="dropdown-item" href="?pg=vereq.php"><img src="../img/av.png" width="30px"> Ver Listados De Equipos</a>
</div>
</li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Agregar Datos</a>
<div class="dropdown-menu">
<a class="dropdown-item" href="?pg=addau.php">Agregar Aulas</a>
<a class="dropdown-item" href="?pg=adddep.php">Agregar Departamentos</a>
<a class="dropdown-item" href="?pg=addgrup.php">Agregar Grupos</a>
<a class="dropdown-item" href="?pg=addmate.php">Agregar Materia</a>
<a class="dropdown-item" href="?pg=addmarc.php">Agregar Marcas</a>
</div>
</li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Ver Datos</a>
<div class="dropdown-menu">
<a class="dropdown-item" href="?pg=verau.php">Ver Aulas</a>
<a class="dropdown-item" href="?pg=verdep.php">Ver Departamentos</a>
<a class="dropdown-item" href="?pg=vergrup.php">Ver Grupos</a>
<a class="dropdown-item" href="?pg=vermat.php">Ver Materia</a>
<a class="dropdown-item" href="?pg=vermarc.php">Ver Marcas</a>
<a class="dropdown-item" href="?pg=verfalla.php">Ver Reportes</a>
</div>
</li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Ver Reservasiones</a>
<div class="dropdown-menu">
<a class="dropdown-item" href="?pg=verrster.php">Ver Pretamos Terminados</a>
<a class="dropdown-item" href="?pg=verres.php">Ver Reservasiones Activas</a>
<a class="dropdown-item" href="?pg=verresall.php">Ver Todas las Reservasiones</a>
<a class="dropdown-item" href="?pg=verrespordia.php">Ver Todas las Reservasiones por dias</a>
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
