<?php
	session_start();
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
	<script type="text/javascript">
		$(document).ready(function(){
			$('#btn').click(function(){
				console.log("thành công");
				var id = $('#id').val();
				var pass = $('#pass').val();
				var query = "insert into dangnhap values('"+id+"','"+pass+"')";
				var kiemtra = "select count(*) as TonTai from dangnhap where USERNAM= '"+id+"'";
				$.ajax({
					url: 'insert.php',
					type: 'POST',
					data: {query:query,kiemtra:kiemtra},
					success:function(d){
						alert(d);
						window.location="admin-taikhoan.php";
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
		<h2 style="margin-bottom: 50px;"> Thêm Tài Khoản Mới</h2>
		<div class="wrapper">
			<div class="info">
				<h6 style="float: left; margin-right:10px;">Tên Đăng Nhập:</h6>
				<input id="id" style="float: left; margin-right:80px; width: 100px;" type="text">
				<h6 style="float: left; margin-right:10px">Mật Khẩu:</h6>
				<input id="pass" style="float: left; margin-right: 80px;" type="text" >
			</div>
			<input id="btn" type="button" name="" value="Thêm">
		</div>
	</div>
</body>