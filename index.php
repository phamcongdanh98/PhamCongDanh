<?php
    include 'top.php';
?>
        
        <div id="wrapper">
            <div id="left">
            <?php
            $sql = "SELECT * FROM TRUYEN";
            if ($result = mysqli_query($connect, $sql)) {
                while ($row = mysqli_fetch_array($result)) {
                    echo"
                    <div id=news>
                        <a href=detail.php?id=".$row['IDTRUYEN'].">
                        <img src=".$row['ANH']." alt=Li's Product Image>
                        </a>
                    
                    <a href=>".$row['TIEUDE']."</a>
                    </div>";
                }
            } else
                //Hiện thông báo khi không thành công
                echo 'Không thành công. Lỗi' . mysqli_error($connect);
            //ngắt kết nối
            mysqli_close($connect);
            ?>
            </div>
            <div id="right">Truyện hot</div>
        </div>
    </body>
</html>