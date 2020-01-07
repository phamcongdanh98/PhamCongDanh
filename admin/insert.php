<?php
	$conn = new mysqli('localhost','root','','webtruyen');
	mysqli_query($conn,'SET NAMES UTF8');
	// Check connection
	if(!$conn){
        die("Kết nối thất bại". mysqli_connect_error($conn));
	}
	$sql1 = $_POST['kiemtra'];
	$result1 = $conn->query($sql1);
	while ($row = $result1->fetch_assoc()) {
		if($row['TonTai'] > 0)
			echo "Thất bại, mã đã tồn tại";
		else{
				$sql = $_POST['query'];
				$result = $conn->query($sql);
				echo "Thành công";		
			}
	}
?>