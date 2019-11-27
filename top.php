<?php
    // khởi tạo kết nối
$connect = mysqli_connect('localhost', 'root', '', 'WebTruyen');
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
    <meta http-equiv="X-UA-CompatibleN" content="ie=edge">
    <title>Doc Truyen</title>
    <link rel="stylesheet"  href="style1.css">
    <link rel="stylesheet" href="view.css" />
</head>
<body>
        <div id="top">
        </div>
        <div id="menu">
            <ul>
                <li><a href="#">Trang chu</a></li>
                <li><a href="#">The loai</a></li>
                <li><a href="#">Thong Tin</a></li>

            </ul> 
        </div>

        