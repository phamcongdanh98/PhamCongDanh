<?php
	session_start();
	$conn = new mysqli('localhost','root','','webtruyen');
    mysqli_query($conn,'SET NAMES UTF8');
    $sql = "select * from chuong where IDCHUONG = '".$_GET['id']."'";
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
				var idchuong = $('#id').val();
				var idtruyen = $('#idtruyen').val();
				$.ajax({
					url: 'admin-xoa.php',
					type: 'POST',
					data: {idchuong:idchuong},
					success:function(d){
						alert(d);
						window.location="admin-chitiet.php?id="+idtruyen;
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
		<h2 style="margin-bottom: 50px;">Xóa Chương</h2>
		<div class="wrapper">
			<?php
				if ($result && $result->num_rows > 0){
	              while($row = $result->fetch_assoc()){
	              	$sql1 = "select * from truyen where IDTRUYEN='".$row['IDTRUYEN']."'";
	             	$result1 = $conn->query($sql1);
					if ($result1 && $result1->num_rows > 0){
		             	while($row1 = $result1->fetch_assoc()){
			?>
			<div class="info">
				<h6 style="float: left; margin-right:10px;">ID CHƯƠNG</h6>
				<input id="id" style="float: left; margin-right:80px; width: 100px;" type="text" value="<?php echo $row['IDCHUONG']; ?> " readonly>
				<h6 style="float: left; margin-right:10px">Tên Chương:</h6>
				<input id="tenchuong" style="float: left; margin-right: 80px;" type="text" value="<?php echo $row['TENCHUONG']; ?>" readonly>
				<h6 style="float: left; margin-right:10px">Tên Truyện</h6>
				<input id="tentruyen" style="float: left; margin-right: 80px;" type="text" value="<?php echo $row1['TIEUDE']; ?>" readonly>
			</div>
			<div class="img">
				<h6 style="float: left; margin-right: 10px;">Truyện</h6>
				<input id="idtruyen" style="float: left; margin-right: 80px;" type="text" value="<?php echo $row1['IDTRUYEN']; ?>" readonly>
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