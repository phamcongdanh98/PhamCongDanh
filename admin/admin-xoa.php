<?php
	$conn = new mysqli('localhost','root','','webtruyen');
    mysqli_query($conn,'SET NAMES UTF8');
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql1 = "select * from chuong where IDTRUYEN=".$id;
        $result1 = $conn->query($sql1);
         if ($result1 && $result1->num_rows > 0) {               
                while ($row1 = $result1->fetch_assoc()) {
                    $sql3 ="delete from anh where IDCHUONG='".$row1['IDCHUONG']."'";
                    $result3 = $conn->query($sql3);
                }
            }
        $sql2 = "delete from chuong where IDTRUYEN =".$id;
        $result2 = $conn->query($sql2);        
        $sql = "delete from truyen where IDTRUYEN =".$id;
        $result = $conn->query($sql);
        echo "Xóa thành công";
    }
    if(isset($_POST['idchuong']))
    {   
        $id = $_POST['idchuong'];
        $sql = "delete from anh where IDCHUONG='".$id."'";
        $sql1 = "delete from chuong where IDCHUONG='".$id."'";
        $result = $conn->query($sql);
        $result1 = $conn->query($sql1);
        echo "Xóa thành công";
    }

    if(isset($_POST['idanh'])){
        $id = $_POST['idanh'];
        $sql = "delete from anh where IDANH=".$id."";
        $result = $conn->query($sql);
        echo "Xóa thành công";
    }
    if(isset($_POST['username'])){
        $id = $_POST['username'];
        $sql = "delete from dangnhap where USERNAM='".$id."'";
        $result = $conn->query($sql);
        echo "Xóa thành công";
    }
?>