<?php
	$conn = new mysqli('localhost','root','','webtruyen');
    mysqli_query($conn,'SET NAMES UTF8');
    $sql = "select * from anh where IDANH = '".$_GET['id']."'";
    $result = $conn->query($sql);
?>
<head>
	<meta charset="utf-8">
	<title></title>
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/admin.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates&display=swap" rel="stylesheet">
	<script src="../js/jquery-1.12.0.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#btn').click(function(){
				console.log("thành công");
				var id = $('#id').val();
				var idchuong = $('#idchuong').val();
				var linkanh = $('#linkanh').val();
				var query = "update anh set IDCHUONG='"+idchuong+"',ANH='"+linkanh+"' where IDANH='"+id+"'";
				$.ajax({
					url: 'update.php',
					type: 'POST',
					data: {query:query},
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
		<h2 style="margin-bottom: 50px;"> Chỉnh Sửa Ảnh Trang</h2>
		<div class="wrapper">
			<?php
				if ($result && $result->num_rows > 0){
	              while($row = $result->fetch_assoc()){
			?>
			<div class="info">
				<h6 style="float: left; margin-right:10px;">ID Ảnh</h6>
				<input id="id" style="float: left; margin-right:80px; width: 100px;" type="text" value="<?php echo $row['IDANH']; ?> " readonly>
				<h6 style="float: left; margin-right:10px">ID Chương</h6>
				<input id="idchuong" style="float: left; margin-right: 80px;" type="text" value="<?php echo $row['IDCHUONG']; ?>" readonly>
				<h6 style="float: left; margin-right:10px">Link Ảnh</h6>
				<input id="linkanh" style="float: left; margin-right: 80px;" type="text" value="<?php echo $row['ANH']; ?>">
			</div>
			<?php
				}
			}
			?>
			<input id="btn" type="button" name="" value="Thêm">
		</div>
		
		
	</div>
</body>
