<?php
    session_start();
	$conn = new mysqli('localhost','root','','webtruyen');
    mysqli_query($conn,'SET NAMES UTF8');
    $sql = "SELECT * FROM truyen";
    $result = $conn->query($sql);
    $sql1 = "SELECT * FROM loaitruyen ";
    $result1 = $conn->query($sql1);

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
		<h2>Danh Sách Truyện Hiện Tại</h2>
		<a href="admin-them-truyen.php"><button>Thêm Truyện</button> </a>
			<table class="value">
				<tr>
					<th>ID Truyện</th>
					<th>Tên Truyện</th>
					<th>ID Loại</th>
					<th>Mô Tả</th>
					<th>Ảnh Bìa</th>
					<th>Tác Giả</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php
	            if ($result && $result->num_rows > 0){
	              while($row = $result->fetch_assoc()){
	          	?>
	          	<tr>
	          		<td><?php echo $row['IDTRUYEN']; ?></td>
	          		<td><a href="admin-chitiet.php?id=<?php echo $row['IDTRUYEN']; ?>"><?php echo $row['TIEUDE']; ?></a></td>
	          		<td><?php echo $row['IDLOAI']; ?></td>
	          		<td><?php echo $row['MOTA']; ?></td>
	          		<td><?php echo "<img style='width:60px; height:80px; ' src=".$row['ANH']." />"; ?></td>
	          		<td><?php echo $row['TACGIA']; ?></td>
	          		<td><a href="admin-sua-truyen.php?id=<?php echo $row['IDTRUYEN']; ?>">Sửa</a></td>
	          		<td><a href="admin-xoa-truyen.php?id=<?php echo $row['IDTRUYEN']; ?>">Xóa</a></td>
	          	<?php
			          	}
			      	}
	          	?>

	          	</tr>
			</table>
	</div>
</body>
