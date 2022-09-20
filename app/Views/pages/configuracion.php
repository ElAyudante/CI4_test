<?php
/*
$bd_host = "localhost";
$bd_usuario = "root";
$bd_password = "root";
$bd_base = "logopedas";
*/
header("Content-Type: text/html;charset=utf-8");
$bd_host = "localhost";
$bd_usuario = "root";
$bd_password = "root";
$bd_base = "logopedas";

$con = mysqli_connect($bd_host, $bd_usuario, $bd_password, $bd_base);
mysqli_select_db($con, $bd_base);
mysqli_query($con,"SET NAMES 'utf8'");



?>
