<?php
    session_start();
	$conn = new mysqli('localhost','root','','webtruyen');
    mysqli_query($conn,'SET NAMES UTF8');
    $sql = "select * from chuong where IDCHUONG = '".$_GET['id']."'";
    $result = $conn->query($sql);
    $sql1 = "select * from truyen";
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
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/admin.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates&display=swap" rel="stylesheet">
	<script src="../js/jquery-1.12.0.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#btn').click(function(){
				console.log("thành công");
				var id = $('#id').val();
				var tenchuong = $('#tenchuong').val();
				var idtruyen = $('#idtruyen').val();
				var query = "update chuong set TENCHUONG='"+tenchuong+"',IDTRUYEN='"+idtruyen+"' where IDCHUONG="+id;
				$.ajax({
					url: 'update.php',
					type: 'POST',
					data: {query:query},
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
		<h2 style="margin-bottom: 50px;">Sửa Chương</h2>
		<div class="wrapper">
			<?php
				if ($result && $result->num_rows > 0){
	              while($row = $result->fetch_assoc()){
			?>
			<div class="info">
				<h6 style="float: left; margin-right:10px;">ID Chương</h6>
				<input id="id" style="float: left; margin-right:80px; width: 100px; margin-left: 30px;" type="text" value="<?php echo $row['IDCHUONG']; ?> " readonly>
				<h6 style="float: left; margin-right:10px">Tên Chương</h6>
				<input id="tenchuong" style="float: left; margin-right: 80px;" type="text" value="<?php echo $row['TENCHUONG']; ?>">
			</div>
			<div class="select">
				<h6 style="float: left; margin-right: 10px;">TÊN TRUYỆN</h6>
				<select id="idtruyen" style="float: left; margin-right: 80px;" readonly>
					<?php
					if ($result1 && $result1->num_rows > 0){
	              		while($row1 = $result1->fetch_assoc()){
	              			if($row1['IDTRUYEN'] == $row['IDTRUYEN'])
	              				echo "<option value='".$row1['IDTRUYEN']."' selected>".$row1['TIEUDE']."</option>";
	              		}
	              	}
					?>
				</select>
			</div>
			<?php
				}
			}
			?>
			<input id="btn" type="button" name="" value="Luu">
		</div>
		
		
	</div>
</body>