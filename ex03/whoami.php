<?php
	session_start();

if ($_SESSION['login'] && $_SESSION['passwd'])
	echo $_SESSION['login'];
else
	echo "ERROR\n";
?>
