<?php
    // khởi tạo kết nối
$connect = mysqli_connect('localhost', 'root', '', 'webtruyen');
//Kiểm tra kết nối
if (!$connect) {
    die('kết nối không thành công ' . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="./css/style1.css"> -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/view.css" />
    <link rel="stylesheet" href="./css/view1.css" />
    <title>Truyện Tranh</title>
</head>
<body>
    <div class="header">       
        <div class="container">
            <div class="row ">
                <div class="col-sm-2 le">
                    <div class="logo">
                        <a href="#"><img src="./anh/logo1.png" alt="áda"></a>
                    </div>
                </div>
                <div class="col-sm-7 le">
                    <form method="get" action="tim-truyen/">
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control" placeholder="Tìm truyện...">
                        </div>
                        <button></button>
                    </form>
                </div>
                <div class="col-sm-3 le login">
                <a href="#" class="item control btn btn-default mt-15 mb-15">Đăng Nhập/Đăng ký</a>
                </div>
            </div>
        </div> 
    </div>
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container" id="danh">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="#">Trang Chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Thể Loại</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Truyện Tranh</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Chủ Đề</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Thông Tin</a>
                </li>
        	</div>
               </ul>
           </div>
        </div>
</nav>
