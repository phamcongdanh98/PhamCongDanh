<?php
	$conn = new mysqli('localhost','root','','webtruyen');
	mysqli_query($conn,'SET NAMES UTF8');
	// Check connection
	if(!$conn){
        die("Kết nối thất bại". mysqli_connect_error($conn));
	}
	$sql = "insert into dangnhap values('".$_POST['id']."','".$_POST['pass']."')";
	$result = $conn->query($sql);
	header('location: http://localhost/truyen2/admin/login.php');
?>