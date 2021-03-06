# THIẾT KẾ WEBSITE ĐỌC TRUYỆN TRANH ONLINE
[![Platform](https://img.shields.io/badge/platform-PHP-blue
)](https://www.php.net/downloads.php)
[![Laguage](https://img.shields.io/badge/WEB-HTML-green
)](https://www.php.net/downloads.php)
[![Language](https://img.shields.io/badge/Style-CSS-red
)](https://developer.mozilla.org/vi/docs/Web/CSS)
[![DB](https://img.shields.io/badge/DB-MYSQL-information
)](https://www.mysql.com/)

<h2> CHỨC NĂNG CỦA WEBSITE </h2>

- Tìm kiếm truyện theo tên truyện, thể loại
- Đọc truyện online

<h2> MÔ TẢ ĐỀ TÀI </h2>

- Hiện nay nhu cầu giải trí của con người ngày càng được nâng cao, cùng với đó là công nghệ thông tin đươc áp dụng vào nhiều lĩnh vực, các thiết bị như điện thoại hay máy tính dần trở thành công cụ không thể thiếu đối với mỗi người
- Trước việc phải ra tiệm sách để mua sách hay thuê bây giờ chúng ta chỉ cần có điện thoại thông minh có kết nối internet là có thể đọc đươc truyện. Do đó nhóm chúng em chọn đề tài “ Thiết kế website đọc truyện online” giúp chúng ta có thể giải trí sau những giờ làm việc căng 
<h2> MỤC ĐÍCH ĐỀ TÀI</h2>

- Trong bài tập lớn lần này, với mục đích xây dựng hệ thống đọc truyện trực tuyến , nhóm xây dựng môt website đọc truyện online giúp cho mọi người có thể đọc truyện mọi lúc mọi nơi.

<h2> NHIỆM VỤ ĐỀ TÀI</h2>

- Website được lập trình bằng ngôn ngữ PHP và dùng MySQL để quan trị cơ sở dữ liệu với các chức năng thông dụng như đăng nhập, xem truyện, qua chương...

<h2> NỘI DUNG ĐỀ TÀI</h2>

Đồ án được xây dựng gồm 3 phần :
- Lập mô hình nghiệp vụ: xây dựng biểu đồ phân rã chức năng.
- Cơ sở dữ liệu: sơ đồ khối hoạt động, sơ đồ thực thể liên kết, mô tả các bảng quan hệ.
- Triển khai chương trình: thiết kế giao diện cho website.
<h2> CÔNG CỤ PHÁT TRIỂN</h2>

- Giao diện:Sử dụng ngôn ngữ html và các thuộc tính css.
- Giao tiếp đến cơ sở dữ liệu : sử dụng ngôn ngữ php.
<h2> THIẾT KẾ CƠ SỞ DỮ LIỆU</h2>

 * Bảng truyen:
   * IDTRUYEN: id của truyện.
   * TIEUDE: tên của truyện.
   * TACGIA: tác giả của truyện.
   * IDLOAI: id của loại truyện.
   * MOTA: trạng thái hoàn thành hay chưa hoàn thành.
   * NOIDUNG: nội dung chính của truyện.
   * ANH: ảnh bìa chính của truyện.
   
 * Bảng loaitruyen : 
   * IDLOAI: id của loại truyện.
   * TENLOAI: tên của thể loại truyện.
   
 * Bảng chuong :
   * IDCHUONG: id của chương truyện.
   * IDTRUYEN: id của truyện.
   * TENCHUONG: tên của chương truyện.
  
 * Bảng anh :
   * IDANH: id của ảnh từng trang truyện.
   * IDCHUONG: id của chương truyện.
   * ANH: link của ảnh.
    
 * Bảng dangnhap :
   * USERNAM: tên đăng nhập
   * PASSWORD: mật khẩu
   
![Atom](https://github.com/phamcongdanh98/PhamCongDanh/blob/master/anhreadme/database.png)
<h2> HƯỚNG DÃN CÀI ĐẶT</h2>

 ## Bước 1:
 
* Mở xampp.

![Atom](https://github.com/phamcongdanh98/PhamCongDanh/blob/master/anhreadme/xampp.png)

## Bước 2:

* Coppy đưởng dẫn của github

![Atom](https://github.com/phamcongdanh98/PhamCongDanh/blob/master/anhreadme/gitclone.png)

* Clone project về bằng câu lệnh git clone "đường dẫn đã copy"

![Atom](https://github.com/phamcongdanh98/PhamCongDanh/blob/master/anhreadme/clone.png)

## Bước 3:

* Mở trình duyệt và truy cập theo đường dẫn localhost/tenthumuc/index.php"

<h2> Hình Ảnh DEMO</h2>

* Trang chủ:

![Atom](https://github.com/phamcongdanh98/PhamCongDanh/blob/master/anhreadme/trangchu.png)

* Trang chi tiết của truyện vừa bấm vào:

![Atom](https://github.com/phamcongdanh98/PhamCongDanh/blob/master/anhreadme/trangchitiet.png)

* Trang đọc truyện:

![Atom](https://github.com/phamcongdanh98/PhamCongDanh/blob/master/anhreadme/trangdoc.png)

<h2> HƯỚNG PHÁT TRIỂN THÊM CHO ỨNG DỤNG</h2>

- Thêm một số chức năng cho để đáp ứng với yêu cầu của người dùng.
- Cải thiện giao diện đẹp hơn phù hợp với người dùng.
- Nâng cao bảo mật dữ liệu và thông tin người dùng. 

<h2> TÁC GIẢ</h2>

- Phạm Công Danh
- Trần Vĩnh Khang
