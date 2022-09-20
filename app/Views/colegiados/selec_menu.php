<?php session_start();
$_SESSION["men"]=$_GET["m"];
header("Location: main.php");
?>
