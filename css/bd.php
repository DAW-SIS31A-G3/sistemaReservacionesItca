<?php
$server = 'localhost';
$user = 'root';
$password ='';
$DB = 'inventario';
$conn = new mysqli($server,$user,$password,$DB);
if ($conn->connect_error)
{
    die('Conexion fallida: '.$conn ->connect_error);
}
?>
