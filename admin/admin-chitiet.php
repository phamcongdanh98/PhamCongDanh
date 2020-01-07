<?php
	session_start();
	$conn = new mysqli('localhost','root','','webtruyen');
    mysqli_query($conn,'SET NAMES UTF8');
    $sql = "SELECT * FROM CHUONG WHERE IDTRUYEN ='".$_GET['id']."'";
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
		<h2>Danh Sách Chương</h2>
		<a href="admin-them-chuong.php?id=<?php echo $_GET['id']; ?>"><button>Thêm Chương Mới</button> </a>
			<table class="value">
				<tr>
					<th>ID Chương</th>
					<th>Tên Chương</th>
					<th>ID Truyện</th>
					<th>Sửa</th>
					<th>Xóa</th>
				</tr>
				<?php
	            if ($result && $result->num_rows > 0){
	              while($row = $result->fetch_assoc()){
	          	?>
	          	<tr>
	          		<td><?php echo $row['IDCHUONG']; ?></td>
	          		<td><a href="admin-chitiet-anhtrang.php?id=<?php echo $row['IDCHUONG']; ?>"><?php echo $row['TENCHUONG']; ?></a></td>
	          		<td><?php echo $row['IDTRUYEN']; ?></td>
	          		<td><a href="admin-sua-chuong.php?id=<?php echo $row['IDCHUONG']; ?>">Sửa</a></td>
	          		<td><a href="admin-xoa-chuong.php?id=<?php echo $row['IDCHUONG']; ?>">Xóa</a></td>
	          	</tr>
	          	<?php
			          	}
			      	}
	          	?>
			</table>
	</div>
</body>