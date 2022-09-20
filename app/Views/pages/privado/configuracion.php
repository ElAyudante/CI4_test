<?php
/*
$bd_host = "localhost";
$bd_usuario = "root";
$bd_password = "root";
$bd_base = "logopedas";
*/
header("Content-Type: text/html;charset=utf-8");
$bd_host = "localhost";
$bd_usuario = "logopedas_2dSG3w";
$bd_password = "jgs93S23Qp";
$bd_base = "logopedas_GwdfRsd";

$con = mysql_connect($bd_host, $bd_usuario, $bd_password);
mysql_select_db($bd_base, $con);
mysql_query("SET NAMES 'utf8'");



?>
