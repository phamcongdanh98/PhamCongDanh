<?php
    include 'top.php';
?>
<div class="danhsach">
    <div class="container">
        <div class="item">
            <div class="title">
                <h2>Truyện đã tìm</h2>
                <hr>
            </div>
            <div class="row">
                <?php
                $sql = "SELECT * FROM truyen,loaitruyen WHERE truyen.IDLOAI=loaitruyen.IDLOAI AND truyen.IDLOAI='".$_GET['id']."'";
                $result = $conn->query($sql);
                if ($result && $result->num_rows > 0) {               
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class=col-lg-2 col-md-3 col-sm-4>
                                <div class=truyen>
                                    <a href=detail.php?id=".$row['IDTRUYEN'].">
                                    <div class=resize>
                                        <img src=".$row['ANH']." alt=img2>
                                    </div>
                                    <div class=content> 
                                        </a>
                                        <h3><a href=detail.php?id=".$row['IDTRUYEN'].">".$row['TIEUDE']."</a></h3>
                                    </div>
                                </div>
                            </div>";
                    }
                } else
                    echo '<h3 class=datim>không có truyện đã tìm</h3>' . $conn->error;
                $conn->close();
                ?>
        </div>
    </div>
    </div>
<?php
    include 'footer.php';
?>
</body>