<?php
	session_start();
	$conn = new mysqli('localhost','root','','webtruyen');
    mysqli_query($conn,'SET NAMES UTF8');
    $sql = "SELECT * FROM dangnhap";
    $result = $conn->query($sql);
    if($_SESSION['id'] != 'admin')
    {
    	header('Location: http://localhost/truyen2/admin/login.php');
    }
?>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/admin.css">
	<script src="../js/jquery-1.12.0.min.js"></script>
	<style type="text/css">
		th{
			padding: 40px 80px;
			border: 1px solid black;
		  	border-collapse: collapse;
		}
		.main button{
			background: #000033;
			color: #fff;
			width: 150px;
			height: 60px;
			margin-top: 50px;
			margin-left: 12.5%;
			border-radius: 15px 15px;
			-moz-border-radius: 15px 15px; /*Firefox*/
			-webkit-border-radius: 15px 15px;  /*Chrome và Safary*/
		}
	</style>
</head>
<body>
	<div class="vertical-menu">
		<h5>Menu</h5>
		<ul>
			<li><a style="color: #fff;" href="admin-top.php" class="active">Truyện</a></li>
		    <li><a href="admin-loaitruyen.php" class="active">Thể Loại Truyện</a></li>
		    <li><a href="admin-taikhoan.php" class="active">Tài Khoản</a></li>
		    <li><a href="../index.php" class="active">Đăng Xuất</a></li>
		    <li><a href="../index.php" class="active">Quay về trang index</a></li>
		</ul>
	</div>
	<div class="main">
		<h2>Danh sách tài khoản</h2>
		<a href="admin-them-user.php"><button>Thêm tài khoản mới</button> </a>
			<table class="value">
				<tr>
					<th>Tên Đăng Nhập</th>
					<th>Mật Khẩu</th>
					<th>Đổi Mật Khẩu</th>
					<th>Delete</th>
				</tr>
				<?php
	            if ($result && $result->num_rows > 0){
	              while($row = $result->fetch_assoc()){
	          	?>
	          	<tr>
	          		<td><?php echo $row['USERNAM']; ?></td>
	          		<td><?php echo $row['PASSWORD']; ?></td>
	          		<td><a href="admin-edit-user-pass.php?id=<?php echo $row['USERNAM']; ?>"><img src="./Image/pencil-edit-button.png" /></a></td>
	          		<td><a href="admin-xoa-user.php?id=<?php echo $row['USERNAM']; ?>"><img src="./Image/rubbish-bin.png" /></a></td>
	          	</tr>
	          	<?php
			          	}
			      	}
	          	?>
			</table>
	</div>
</body>