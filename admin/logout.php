<?php
session_start();
if(isset($_SESSION['id']))
{
	unset($_SESSION['id']);
	header('Location: http://localhost/truyen2/admin/login.php');
}
?>