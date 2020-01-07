<?php
	session_start();
	$conn = new mysqli('localhost','root','','webtruyen');
    mysqli_query($conn,'SET NAMES UTF8');
    $sql = "select * from truyen where IDTRUYEN = '".$_GET['id']."'";
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
				var id = $('#id').val();
				$.ajax({
					url: 'admin-xoa.php',
					type: 'POST',
					data: {id:id},
					success:function(d){
						alert(d);
						window.location="admin-top.php";
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
		<h2 style="margin-bottom: 50px;">Xóa Truyện</h2>
		<div class="wrapper">
			<?php
				if ($result && $result->num_rows > 0){
	              while($row = $result->fetch_assoc()){
			?>
			<div class="info">
				<h6 style="float: left; margin-right:10px;">ID Truyện:</h6>
				<input id="id" style="float: left; margin-right:80px; width: 100px; margin-left: 5px;" type="text" value="<?php echo $row['IDTRUYEN']; ?> " readonly>
				<h6 style="float: left; margin-right:10px">Tên Truyện:</h6>
				<input id="name" style="float: left; margin-right: 80px;" type="text" value="<?php echo $row['TIEUDE']; ?>" readonly>
				<h6 style="float:left ;margin-right: 10px;">Tác Giả:</h6>
				<input id="tg" style="float: left;" type="text" value="<?php echo $row['TACGIA']; ?> " readonly>
			</div>
			<div class="img">
				<h6 style="float: left; margin-right: 10px;">Ảnh:</h6>
				<input id="image"  style="float: left; margin-left: 53px;" type="text" value="<?php echo $row['ANH']; ?> " readonly>
			</div>
			<div class="select">
				<h6 style="float: left; margin-right: 10px;">Tình Trạng:</h6>
				<select id="mota" style="margin-right: 10px;" readonly>
					<?php
						if($row['MOTA'] == "Hoàn thành")
	              				echo "<option value='Hoàn thành' selected>Hoàn thành</option>
	              						<option value='Chưa hoàn thành'>Chưa hoàn thành</option>";
	              			else 
	              				echo "<option value='Hoàn thành'>Hoàn thành</option>
	              					<option value='Chưa hoàn thành' selected>Chưa hoàn thành</option>";
					?>
				</select>
			</div>
			<div>
				<h6 style="margin-left: 10%">Nội Dung: </h6>
				<textarea id="review" style="width: 70%; height: 35%; overflow: auto; margin-left: 14%" readonly=""><?php echo $row['NOIDUNG']; ?></textarea>
			</div>
			<?php
				}
			}
			?>
			<input id="btn" type="button" name="" value="Xóa">
			<a href="admin-top.php"><input style="background: red;" type="button" name="" value="Hủy"></a>
		</div>
		
		
	</div>
</body>
