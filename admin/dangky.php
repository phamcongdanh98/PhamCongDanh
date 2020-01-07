<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/admin.css">
	<script src="../js/jquery-1.12.0.min.js"></script>
		<script type="text/javascript">
		function check() {
			var id = document.forms["dangky"]["id"].value;
			var pass = document.forms["dangky"]["pass"].value;
			var pass2 = document.forms["dangky"]["pass2"].value;
			if((id == "") || (pass == "") || (pass2 == "")){
				alert("Bạn phải nhập đầy đủ.");
				return false;
			}
			if(pass != pass2){
				alert("Mật khẩu không khớp.");
				return false;
			}
		}
		function check1(){
			var id = document.forms["dangky"]["id"].value;
			alert(id);
			return false;
		}
	</script>
</head>
<body>
	<div class="login">
		<div class="wrap">
			<form class="login-form" action="taotk.php" method="POST" name="dangky" onsubmit="return check();">
				<h3>Tạo Tài Khoản</h3>
				<input class="inputid" type="text" name="id" placeholder="Tên Đăng Nhập">
				<input class="inputid" type="password" name="pass" placeholder="Mật Khẩu">
				<input class="inputid" type="password" name="pass2" placeholder="Nhập lại mật khẩu">
				<div class="login-btn">
					<input class="btn" type="submit" name="btn" value="Đồng Ý">
				</div>
				<div class="create">
					<a class="txt" href="login.php">Đăng nhập</a>  /  
					<a class="txt" href="../index.php">Về Trang Chủ</a>
				</div>
			</form>
		</div>
	</div>
</body>
</html>