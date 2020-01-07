<?php
	session_start();
	$conn = new mysqli('localhost','root','','webtruyen');
    mysqli_query($conn,'SET NAMES UTF8');
    $sql = "select * from truyen where IDTRUYEN = '".$_GET['id']."'";
    $result = $conn->query($sql);
    $sql1 = "select * from loaitruyen";
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
	<script src="../js/jquery-1.12.0.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#btn').click(function(){
				console.log("thành công");
				var id = $('#id').val();
				var name = $('#name').val();
				var tg = $('#tg').val();
				var img = $('#image').val();
				var review = $('#review').val();
				var loai = $('#loai').val();
				var status = $('#mota').val();
				var query = "update truyen set TIEUDE='"+name+"',TACGIA='"+tg+"',NOIDUNG='"+review+"',ANH='"+img+"',MOTA='"+status+"',IDLOAI="+loai+" where IDTRUYEN="+id;
				$.ajax({
					url: 'update.php',
					type: 'POST',
					data: {query:query},
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
		<h2 style="margin-bottom: 50px;">Sửa Truyện</h2>
		<div class="wrapper">
			<?php
				if ($result && $result->num_rows > 0){
	              while($row = $result->fetch_assoc()){
			?>
			<div class="info">
				<h6 style="float: left; margin-right:10px;">ID Truyện:</h6>
				<input id="id" style="float: left; margin-right:80px; width: 100px;" type="text" value="<?php echo $row['IDTRUYEN']; ?> " readonly>
				<h6 style="float: left; margin-right:10px">Tên Truyện:</h6>
				<input id="name" style="float: left; margin-right: 80px;" type="text" value="<?php echo $row['TIEUDE']; ?>">
				<h6 style="float:left ;margin-right: 10px;">Tác Giả:</h6>
				<input id="tg" style="float: left;" type="text" value="<?php echo $row['TACGIA']; ?> ">
			</div>
			<div class="img">
				<h6 style="float:left;">Ảnh:</h6>
				<input id="image"  style="float: left; margin-left: 55px;" type="text" value="<?php echo $row['ANH']; ?> ">
			</div>
			<div class="select">
				<h6 style="float: left;">Thể Loại:</h6>
				<select id="loai" style="float: left; margin-left: 18px;">
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
				<h6 style="float: left; margin-left: 93px;">Tình Trạng:</h6>
				<select id="mota" style="margin-left: 9px">
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
				<textarea id="review" style="width: 70%; height: 35%; overflow: auto; margin-left: 14%"><?php echo $row['NOIDUNG']; ?></textarea>
			</div>
			<?php
				}
			}
			?>
			<input id="btn" type="button" name="" value="Luu">
		</div>
		
		
	</div>
</body>