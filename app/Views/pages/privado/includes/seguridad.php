<?php

if (!isset($_SESSION['valido'])) {
	session_destroy();
	header("Location: index.php");
} elseif ($_SESSION['valido'] == "false") {
	session_destroy();
	header("Location: index.php");
}

?>
