<?php
	session_start();
	$conn = new mysqli('localhost','root','','webtruyen');
	mysqli_query($conn,'SET NAMES UTF8');
	if(isset($_POST['btn']))
	{
		if($_POST['id'] == 'admin' && $_POST['pass'] == 'admin')
		{
			$_SESSION['id'] = $_POST['id'];
			header('Location: http://localhost/truyen2/admin/admin-top.php');	
		}
		else{
			$sql = "select count(*) as TonTai from dangnhap where USERNAM='".$_POST['id']."' and PASSWORD='".$_POST['pass']."'";
			$result = $conn->query($sql);
			$i = 0;
			if ($result && $result->num_rows > 0){
			    while($row = $result->fetch_assoc()){
			    	$i = $row['TonTai'];
			    }
			}
			if($i == 1)
			{
				$_SESSION['id'] = $_POST['id'];
				header('Location: http://localhost/truyen2/index.php');
			}
			else
			{
				echo "Sai tên đăng nhập hoặc mật khẩu";
				header('Location: http://localhost/truyen2/admin/login.php');
			}
		}
	}
?>