<?php
    include 'top.php';
    
?>

<div id="wrapper">
            <div id="left">
            <?php
            $sql = "SELECT * FROM TRUYEN WHERE IDTRUYEN=".$_GET['id'];
            
            if ($result = mysqli_query($connect, $sql)) {
                while ($row = mysqli_fetch_array($result)) {
                    echo"
                    <div id=news>
                        <img src=".$row['ANH']." alt=Li's Product Image>
                    <p href=>".$row['NOIDUNG']."</p>
                    <a href=>".$row['TIEUDE']."</a>
                    </div>
                    <a href=view.php?chuong=1>
                    <button class=btnDTruyen><span>Đọc Truyện</span></button>
                    </a>
            <div class=block02>
            <div class=title>
                <h2 class=story-detail-title>Danh sách chương</h2>
            </div>
            <div class=box>
                <div class=works-chapter-list>";
                }
            } else
                //Hiện thông báo khi không thành công
                echo 'Không thành công. Lỗi' . mysqli_error($connect);
            //ngắt kết nối

        $sql1 = "SELECT * FROM CHUONG WHERE IDTRUYEN =".$_GET['id'];
        
        if ($result1 = mysqli_query($connect, $sql1)) {
            while ($row1 = mysqli_fetch_array($result1)) {
                echo"
                <div class=works-chapter-item row>
                            <div class=col-md-10 col-sm-10 col-xs-8 >
                                <a target=_blank href=view.php?chuong=".$row1['IDCHUONG']."&id=".$_GET['id'].">".$row1['TENCHUONG']."</a>
                            </div>
                </div>";
            }
        } else
            //Hiện thông báo khi không thành công
            echo 'Không thành công. Lỗi' . mysqli_error($connect);

            echo"
                                           
                        </div>
                                    </div>
            </div>
            <div class=block01>
            <div class=noidung style=height: 222.2px;>";
            mysqli_close($connect);
            ?>

        </div>
                   
                </div>
            </div>
        </div>
            </div>
        </div>
    </body>
</html>
