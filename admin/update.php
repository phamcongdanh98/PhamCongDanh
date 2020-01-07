<?php
	$conn = new mysqli('localhost','root','','webtruyen');
	mysqli_query($conn,'SET NAMES UTF8');
	// Check connection
	if(!$conn){
        die("Kết nối thất bại". mysqli_connect_error($conn));
	}
	$sql = $_POST['query'];
	$result = $conn->query($sql);
	if(!$result)
		echo "BI LOI";
	else
		echo "Đã chỉnh sửa";
?>