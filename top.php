
<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    $connect = mysqli_connect('localhost', 'root', '', 'webtruyen');
    //Kiểm tra kết nối
    if (!$connect) {
        die('kết nối không thành công ' . mysqli_connect_error());
    }
        $sql = "SELECT * FROM loaitruyen";
        $result = $connect->query($sql);
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Truyện Online</title>
</head>
<body>
    <div class="header">       
        <div class="container">
            <div class="row ">
                <div class="col-sm-2">
                    <div class="logo">
                        <a href="#"><img src="./anh/logo1.png" alt="img22"></a>
                    </div>
                </div>
                <div class="col-sm-7">
                    <form id="tim" method="get" action="search.php">
                        <div class="input-group">
                            <input type="seach" name="search" class="form-control" placeholder="Tìm truyện...">
                        </div>
                        <button></button>
                    </form>
                </div>
                <div class="col-sm-3 login">
                <?php 
                if(isset($_SESSION['id']))
                {
                 ?>
                 <a href="#"><?php echo $_SESSION['id']; ?></a>
                 <a href="./admin/logout.php">/Đăng xuất</a>
                <?php
                    }
                    else{
                ?>
                <a href="./admin/login.php">Đăng nhập</a>
                <?php
                }
                ?>
                </div>
            </div>
        </div> 
    </div>
    <div class="menutop">
    <div class="container">
            <nav>
                <ul>
                    <li><a href="index.php">Trang Chủ</a></li>
                    <li><a href="truyenmoi.php">Truyện Mới</a></li>
                    <li><a href="index.php">Thể Loại</a>
                    <ul>
                        <div class="row">
                        <?php
                            if ($result && $result->num_rows > 0) {
                            // nếu có thì tiến hành lặp để in ra dữ liệu           
                                while ($row = $result->fetch_assoc()) { 
                                    echo "<div class='col-md-3'>
                                            <li style='padding: 8px 15px'>
                                                <a href=loaitruyen.php?id=".$row['IDLOAI'].">".$row['TENLOAI']."</a>
                                            </li>
                                        </div>";
                                }
                            }
                        ?>
                       </div>
                    </ul>
                    </li>
                    <li><a href="admin/admin-top.php">Trang Admin</a></li>

                </ul>
            </nav>
    </div>
    </div>
<?php
        $conn = new mysqli('localhost','root','','webtruyen');
        mysqli_query($conn,'SET NAMES UTF8');
        // Check connection
        if(!$conn){
            die("Kết nối thất bại". mysqli_connect_error($conn));
        }
?>

