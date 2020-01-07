<?php
    include 'top.php';
?>

<section class="container">
<div class="story-see-content">
    <div class="box5">
        <h1 class="detail-title">
        <?php
            $sql1 = "SELECT * FROM CHUONG,TRUYEN WHERE IDCHUONG=".$_GET['chuong']." AND CHUONG.IDTRUYEN=TRUYEN.IDTRUYEN";
            if ($result1 = mysqli_query($connect, $sql1)) {
                while ($row1 = mysqli_fetch_array($result1)) {
                    echo"<a href=detail.php?id=".$row1['IDTRUYEN'].">".$row1['TIEUDE']."</a> 
                    ".$row1['TENCHUONG'];
                }
            } else
                //Hiện thông báo khi không thành công
                echo 'Không thành công. Lỗi' . mysqli_error($connect);
            //ngắt kết nối
           ?>
        </h1>
    </div>
</div>
<!-- Composite Start -->
<?php
    $sql = "SELECT * FROM ANH WHERE IDCHUONG=".$_GET['chuong'];
    if ($result = mysqli_query($connect, $sql)) {
        echo"<div id=anh_doc style=min-height:auto !important;>";
        while ($row = mysqli_fetch_array($result)) {
            echo"<img class=lazy src=".$row['ANH']." data-original=".$row['ANH']." alt= ><br>";
        }
    } else
        //Hiện thông báo khi không thành công
        echo 'Không thành công. Lỗi' . mysqli_error($connect);
    //ngắt kết nối
    mysqli_close($connect);

?>
</section>
<?php
    include 'footer.php';
?>

</body>