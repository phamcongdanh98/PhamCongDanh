<?php
	include 'top.php';
	$sql = "SELECT * FROM truyen WHERE IDTRUYEN = '".$_GET['id']."'";
	$sql1 = "SELECT * FROM chuong WHERE IDTRUYEN = '".$_GET['id']."'";
	$sql2 = "SELECT * FROM chuong WHERE IDTRUYEN = '".$_GET['id']."' ORDER BY TENCHUONG asc LIMIT 1" ;
	$sql3 = "SELECT * FROM chuong WHERE IDTRUYEN = '".$_GET['id']."' ORDER BY TENCHUONG desc LIMIT 1" ;
                //run câu truy vấn
    $result = $conn->query($sql);
    $result1 = $conn->query($sql1);
    $result2 = $conn->query($sql2);
    $result3 = $conn->query($sql3);
    if ($result && $result->num_rows > 0) {
        // nếu có thì tiến hành lặp để in ra dữ liệu           
        while ($row = $result->fetch_assoc()) {
?>
<div class="container">
	<div class="chitiet">
		<div class="item">
			<div class="imgdetail">
				<div class=resize>
				<?php
					echo "<img src=".$row['ANH']." alt=img>";
				?>
			    </div>
			</div>
			<div class="info1">
				<div class="name">
					<?php
						echo "<h1>".$row['TIEUDE']."</h1>";
					?>
				</div>
				<div class="info">
					<div class="row" style="padding: 5px 15px;">
						<h5>Tac Giả : </h5>
						<?php
						echo "<h5><a href=#>".$row['TACGIA']."</a></h5>";
						?>
					</div>
					<div class="row" style="padding: 5px 15px;">
						<h5>Mô Tả : </h5>
						<?php
						echo "<h5><a href=#>".$row['MOTA']."</a></h5>";
						?>
					</div>
					<div class="row" style="padding: 5px 15px;">
						<h5>Thể Loại : </h5>
						<h5><a href="#">Trinh Thám , Bạo Lực</a></h5>
					</div>
					<div class="row" style="padding: 5px 15px;">
						<h5>Trang Thai: </h5>
						<h5><a href="#">Chua Hoang thanh</a></h5>
					</div>
					<div class="row" style="padding: 5px 15px;">
						<?php
						if ($result2 && $result2->num_rows > 0) {
				        // nếu có thì tiến hành lặp để in ra dữ liệu           
				        	while ($row2 = $result2->fetch_assoc()) {
							echo "<a href=view.php?chuong=".$row2['IDCHUONG']." class='btn doc_truyen'>Đọc Chương 1</a>";
							}
						}
						?>
						<?php
						if ($result3 && $result3->num_rows > 0) {
				        // nếu có thì tiến hành lặp để in ra dữ liệu           
				        	while ($row3 = $result3->fetch_assoc()) {
							echo "<a href=view.php?chuong=".$row3['IDCHUONG']." class='btn doc_truyen'>Đọc Chương Cuối</a>";
							}
						}
						?>
					</div>
					<div class="noidungtruyen">
						<h5 style="font-weight: bold;">Nội Dung:</h5>
						<?php
						echo "<p>".$row['NOIDUNG']."<p>";

					}
				}
						?>
					</div>
					<div class="chuongtruyen">
						<h5 style="font-weight: bold;">Chương:</h5>
						<hr>

						<?php
							if ($result1 && $result1->num_rows > 0) {
						        // nếu có thì tiến hành lặp để in ra dữ liệu           
						        while ($row1 = $result1->fetch_assoc()) {
						        	echo "<p><a href=view.php?chuong=".$row1['IDCHUONG'].">".$row1['TENCHUONG']."</a></p>";
						        	echo "<hr>";
						        }
						    }
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
    include 'footer.php';
?>
</body>