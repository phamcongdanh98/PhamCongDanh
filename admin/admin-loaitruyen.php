<?php
	session_start();
	$conn = new mysqli('localhost','root','','webtruyen');
    mysqli_query($conn,'SET NAMES UTF8');
    $sql = "SELECT * FROM loaitruyen";
    $result = $conn->query($sql);
    if($_SESSION['id'] != 'admin')
    {
    	header('Location: http://localhost/truyen2/admin/login.php');
    }
?>
<head>
	<meta charset="utf-8">
	<title>Truyện Online</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/admin.css">
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
		}
	</style>
</head>
<body>
	<div class="vertical-menu">
		<h5>Menu</h5>
		<ul>
			<li><a style="" href="admin-top.php" class="active">Truyện</a></li>
		    <li><a href="admin-loaitruyen.php" class="active">Thể Loại Truyện</a></li>
		    <li><a href="admin-taikhoan.php" class="active">Tài Khoản</a></li>
		    <li><a href="logout.php" class="active">Đăng Xuất</a></li>
		    <li><a href="../index.php" class="active">Quay về trang index</a></li>
		</ul>
	</div>
	<div class="main">
		<h2>Danh sách thể loại</h2>
		<a href="admin-them-loaitruyen.php"><button>Thêm thể loại mới</button> </a>
			<table class="value">
				<tr>
					<th>Mã Thể Loại</th>
					<th>Tên Thể Loại</th>
					<th>Edit</th>
				</tr>
				<?php
	            if ($result && $result->num_rows > 0){
	              while($row = $result->fetch_assoc()){
	          	?>
	          	<tr>
	          		<td><?php echo $row['IDLOAI']; ?></td>
	          		<td><?php echo $row['TENLOAI']; ?></td>
	          		<td><a href="admin-sua-loaitruyen.php?id=<?php echo $row['IDLOAI']; ?>">Sửa</a></td>
	          	</tr>
	          	<?php
			          	}
			      	}
	          	?>
			</table>
	</div>
</body>