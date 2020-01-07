<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/admin.css">
	<script src="../js/jquery-1.12.0.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
				$.ajax({
					url: 'check-login.php',
					type: 'POST',
					cache: false,
					success:function(d){
							// alert();
					},
					error:function(){
						alert("Bị lỗi");
					}
				})
			})
	</script>
</head>
<body>
	<div class="login">
		<div class="wrap">
			<form class="login-form" action="check-login.php" method="POST">
				<h3>Đăng Nhập</h3>
				<input class="inputid" type="text" name="id" placeholder="Tên Đăng Nhập">
				<input class="inputid" type="password" name="pass" placeholder="Mật Khẩu">
				<div class="login-btn">
					<input class="btn" type="submit" name="btn" value="Đăng Nhập">
				</div>
				<div class="create">
					<a class="txt" href="dangky.php">Tạo tài khoản</a>
				</div>
			</form>
		</div>
	</div>
</body>
</html>