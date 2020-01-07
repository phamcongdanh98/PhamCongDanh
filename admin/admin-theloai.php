<?php
	$conn = new mysqli('localhost','root','','webtruyen');
    mysqli_query($conn,'SET NAMES UTF8');
    $sql = "SELECT * FROM loaitruyen";
    $result = $conn->query($sql);
?>
<head>
	<meta charset="utf-8">
	<title>Thế giới truyện</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css"> -->
	<link rel="stylesheet" href="../css/admin.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates&display=swap" rel="stylesheet">
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
		<h2>Danh sách thể loại</h2>
		<a href="admin-add-theloai.php"><button>Thêm thể loại mới</button> </a>
			<table class="value">
				<tr>
					<th>Mã Thể Loại</th>
					<th>Tên Thể Loại</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php
	            if ($result && $result->num_rows > 0){
	              while($row = $result->fetch_assoc()){
	          	?>
	          	<tr>
	          		<td><?php echo $row['MaTL']; ?></td>
	          		<td><?php echo $row['TenTL']; ?></td>
	          		<td><a href="admin-edit-theloai.php?id=<?php echo $row['MaTL']; ?>"><img src="./Image/pencil-edit-button.png" /></a></td>
	          		<td><a href="#"><img src="./Image/rubbish-bin.png" /></a></td>
	          	</tr>
	          	<?php
			          	}
			      	}
	          	?>
			</table>
	</div>
</body>