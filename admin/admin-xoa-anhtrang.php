<?php
	session_start();
	$conn = new mysqli('localhost','root','','webtruyen');
    mysqli_query($conn,'SET NAMES UTF8');
    $sql = "select * from anh where IDANH = '".$_GET['id']."'";
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
	<script src="../js/jquery-1.12.0.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#btn').click(function(){
				console.log("thành công");
				var idanh = $('#idanh').val();
				var idchuong = $('#idchuong').val();
				$.ajax({
					url: 'admin-xoa.php',
					type: 'POST',
					data: {idanh:idanh},
					success:function(d){
						alert(d);
						window.location="admin-chitiet-anhtrang.php?id="+idchuong;
					},
					error:function(){
						alert("Bị lỗi");
					}
				})
			})
		})
	</script>
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
		<h2 style="margin-bottom: 50px;">Xóa Ảnh Trang</h2>
		<div class="wrapper">
			<?php
				if ($result && $result->num_rows > 0){
	              while($row = $result->fetch_assoc()){
	              	$sql1 = "select * from chuong where IDCHUONG='".$row['IDCHUONG']."'";
	             	$result1 = $conn->query($sql1);
					if ($result1 && $result1->num_rows > 0){
		             	while($row1 = $result1->fetch_assoc()){
			?>
			<div class="info">
				<h6 style="float: left; margin-right:10px;">ID Ảnh</h6>
				<input id="idanh" style="float: left; margin-right:80px; width: 100px;" type="text" value="<?php echo $row['IDANH']; ?> " readonly>
				<h6 style="float: left; margin-right:10px">Tên Chương:</h6>
				<input id="tenchuong" style="float: left; margin-right: 80px;" type="text" value="<?php echo $row1['TENCHUONG']; ?>" readonly>
				<h6 style="float: left; margin-right:10px">Link Ảnh</h6>
				<input id="linkanh" style="float: left; margin-right: 80px;" type="text" value="<?php echo $row['ANH']; ?>" readonly>
			</div>
			<div class="img">
				<h6 style="float: left; margin-right: 10px;">ID Chương</h6>
				<input id="idchuong" style="float: left; margin-right: 80px;" type="text" value="<?php echo $row1['IDCHUONG']; ?>" readonly>
			</div>
			<?php
				}
			}
				}
			}
			?>
			<input id="btn" type="button" name="" value="Xóa">
			<a href="admin-top.php"><input style="background: red;" type="button" name="" value="Hủy"></a>
		</div>
		
		
	</div>
</body>