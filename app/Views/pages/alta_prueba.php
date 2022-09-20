<?php 
$bd_host = "localhost";
$bd_usuario = "root";
$bd_password = "root";
$bd_base = "logopedas";
$db_table_name = "colegiados";

$db_connection = mysql_connect($db_host, $db_user, $db_password);

if(!$db_connection) {
    die('No se ha podido conectar a la base de datos.');
}
$subs_name = utf8_decode($_POST['']);

?>
