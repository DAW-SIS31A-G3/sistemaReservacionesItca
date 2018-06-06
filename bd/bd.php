<?php
$server = 'localhost';
$user = 'root';
$password ='';
$DB = 'bdequipoav';
$conn = new mysqli($server,$user,$password,$DB);
if ($conn->connect_error)
{
    die('Conexion fallida: '.$conn ->connect_error);
}
?>
