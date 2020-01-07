<?php
	session_start();
	$conn = new mysqli('localhost','root','','webtruyen');
    mysqli_query($conn,'SET NAMES UTF8');
    $sql = "SELECT * FROM dangnhap WHERE USERNAM='".$_GET['id']."'";
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
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/admin.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates&display=swap" rel="stylesheet">
	<script src="../js/jquery-1.12.0.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#btn').click(function(){
				console.log("thành công");
				var username = $('#id').val();
				$.ajax({
					url: 'admin-xoa.php',
					type: 'POST',
					data: {username:username},
					success:function(d){
						alert(d);
						window.location="admin-user.php";
					},
					error:function(){
						alert("Bị lỗi");
					}
				})
			})
		})
	</script>
	<style type="text/css">
		input[type=button]{
			background: #000033;
			color: #fff;
			width: 150px;
			height: 60px;
			margin-top: 30px;
			margin-left: 9.5%;
			border-radius: 15px 15px;
			-moz-border-radius: 15px 15px; /*Firefox*/
			-webkit-border-radius: 15px 15px;  /*Chrome và Safary*/
		}
		button:hover{
			background: #0033ff;
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
		<h2 style="margin-bottom: 50px;"> Xóa Tài Khoản</h2>
		<div class="wrapper">
			<?php
				if ($result && $result->num_rows > 0){
	              while($row = $result->fetch_assoc()){
			?>
			<div class="info">
				<h6 style="float: left; margin-right:10px;">Tên Đăng Nhập:</h6>
				<input id="id" style="float: left; margin-right:80px; width: 100px;" type="text" value="<?php echo $row['USERNAM']; ?> " readonly>
				<h6 style="float: left; margin-right:10px">Mật Khẩu:</h6>
				<input id="pass" style="float: left; margin-right: 80px;" value="<?php echo $row['PASSWORD']; ?> "  type="text" readonly>
			</div>
			<?php
				}
			}
			?>
			<input id="btn" type="button" name="" value="Xóa">
			<a href="admin-user.php"><input id="btn" type="button" name="" value="Hủy"></a>
		</div>
	</div>
</body>