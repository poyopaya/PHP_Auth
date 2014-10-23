<?php
session_start();
if (!isset($_SESSION['authorized']) || !$_SESSION['authorized']) {
	$_SESSION['referrer'] = $_SERVER['SCRIPT_NAME'];
    header('Location: /authorize/login.php');
}
?>