<?php
	session_start();
	unset($_SESSION['cart']);
	unset($_SESSION['cEmail']);
	header('location: signin.php');
?>
