<?php
    include 'top.php';
?>

<section class="main-content on">
<div class="story-see-content">
    <div class="box">
        <div id="path" class="path-top">
            <ol class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
            </ol>                   
        </div>
        <h1 class="detail-title">
        <?php
            $sql1 = "SELECT * FROM CHUONG,TRUYEN WHERE IDCHUONG=".$_GET['chuong']." AND CHUONG.IDTRUYEN=TRUYEN.IDTRUYEN";
            if ($result1 = mysqli_query($connect, $sql1)) {
                while ($row1 = mysqli_fetch_array($result1)) {
                    echo"<a href=#>".$row1['TIEUDE']."</a> 
                    ".$row1['TENCHUONG'];
                }
            } else
                //Hiện thông báo khi không thành công
                echo 'Không thành công. Lỗi' . mysqli_error($connect);
            //ngắt kết nối
           ?>
        </h1>
    </div>
    <div style="background-color: #FFF; padding: 10px; margin-bottom: 20px;">
        <style>#M222918ScriptRootC186438 {min-height: 300px;}</style>
    </div>
</div>
<!-- Composite Start -->
<?php
    $sql = "SELECT * FROM ANH WHERE IDCHUONG=".$_GET['chuong'];
    if ($result = mysqli_query($connect, $sql)) {
        echo"<div id=M222918ScriptRootC186438 style=min-height:auto !important;>";
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