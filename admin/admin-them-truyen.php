<?php
	$conn = new mysqli('localhost','root','','webtruyen');
    mysqli_query($conn,'SET NAMES UTF8');
    $sql1 = "select * from loaitruyen";
    $result1 = $conn->query($sql1);
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
				var id = $('#id').val();
				var tentruyen = $('#tentruyen').val();
				var tacgia = $('#tacgia').val();
				var anh = $('#anh').val();
				var loaitruyen = $('#loaitruyen').val();
				var noidung = $('#noidung').val();
				var mota = $('#mota').val();
				var query = "insert into truyen values('"+id+"','"+loaitruyen+"','"+tentruyen+"','"+mota+"','"+noidung+"','"+anh+"','"+tacgia+"')";
				var kiemtra = "select count(*) as TonTai from truyen where IDTRUYEN = '"+id+"'";
				$.ajax({
					url: 'insert.php',
					type: 'POST',
					data: {query:query,kiemtra:kiemtra},
					success:function(d){
						alert(d);
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
		<h2 style="margin-bottom: 50px;"> Thêm Phim Mới</h2>
		<div class="wrapper">
			<div class="info">
				<h6 style="float: left; margin-right:10px;">ID Truyện</h6>
				<input id="id" style="float: left; margin-right:80px; width: 100px;" type="text" name="">
				<h6 style="float: left; margin-right:10px">Tên Truyện</h6>
				<input id="tentruyen" style="float: left; margin-right: 80px;" type="text" name="">
				<h6 style="float:left ;margin-right: 10px;">Tác Giả</h6>
				<input id="tacgia" style="float: left;" type="text" name="">
			</div>
			<div class="img">
				<h6 style="float: left; margin-right: 10px;">Ảnh:</h6>
				<input id="anh"  style="float: left; margin-right: 10px;" type="text" name="">
				<img style="float: left; width: 60px; height: 80px;" src="">
			</div>
			<div class="select">
				<h6 style="float: left; margin-right: 10px;">Loại Truyện:</h6>
				<select id="loaitruyen" style="float: left; margin-right: 80px;">
					<?php
					if ($result1 && $result1->num_rows > 0){
	              		while($row1 = $result1->fetch_assoc()){
	              			if($row1['IDLOAI'] == $row['IDLOAI'])
	              				echo "<option value='".$row1['IDLOAI']."' selected>".$row1['TENLOAI']."</option>";
	              			else 
	              				echo "<option value='".$row1['IDLOAI']."'>".$row1['TENLOAI']."</option>";
	              		}
	              	}
					?>
				</select>
				<h6 style="float: left; margin-right: 10px;">Tình Trạng:</h6>
				<select id="mota" style="margin-right: 10px;">
					<option value="Hoàn thành">Hoàn thành</option>
					<option value="Chưa hoàn thành">Chưa hoàn thành</option>
				</select>
			</div> 
			<div>
				<h6 style="margin-left: 10%">Nội Dung: </h6>
				<textarea id="noidung" style="width: 50%; height: 30%; overflow: scroll; margin-left: 10%"></textarea>
			</div>
			<input id="btn" type="button" name="" value="Thêm">
		</div>
		
		
	</div>
</body>