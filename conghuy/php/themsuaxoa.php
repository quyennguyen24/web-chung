<html>
<head>
<title></title>
</head>
<link rel="stylesheet" href="../css/thesuaxoa.css">
<?php
require("./ketnoi.php");
$luachon = 'SELECT * FROM tintuc';
// Thực hiện câu truy vấn, hàm này truyền hai tham số vào là biến kết nối và câu truy vấn
$ketqua = mysqli_query($link, $luachon) or die (mysqli_error());
//Biến hằng dùng để liệt kê các giá trị của các field ID, hoten, quequan
$hang = mysqli_fetch_assoc($ketqua);
/* Đoạn này có thể dùng để thay thế đoạn báo lỗi truy vấn thay cho cái or die ở trên
if (!$ketqua){
    die ('Câu truy vấn bị sai');
}
*/
//Tạo ra 1 bảng, sau đó cho hiển thị các giá trị của biến hang
?>
<body>
<center><h3>Thêm loại tin </h3></center>
</body>
</html>
<table class="tablebg" border="1" width="1080" align="center" 
cellpadding="1" cellspacing="1">
  <tr>
    <th  class="row1">Mã tin</th>
    <th  class="row1">Tiêu đề</th>
	<th  class="row1">Nội dung</th>
	<th class="row1" >Tác giả</th>
	<th  class="row1">Ngày viết</th>
	<th  class="row1">Tên loại</th>
	<th  class="row1">Mô tả tin</th>
	<th  class="row1">Hình ảnh</th>
	<th class="row1" >Sửa</th>
	<th  class="row1">Xóa</th>
</tr>
  <?php do { ?>
    <tr class="row">
	  <td  class="row1" align="center"><div class="item"><?php echo $hang['MaTin']; ?></div></td>
	  <td  class="row1" align="center"><div class="item"><?php echo $hang['TieuDe']; ?></div></td>
	  <td  class="row1" align="center"><div class="item"><div class="sub-item"><?php echo $hang['NoiDung']; ?></div></div></td>
	  <td  class="row1" align="center"><div class="item"><?php echo $hang['TacGia']; ?></div></td>
	  <td  class="row1" align="center"><div class="item"><?php echo $hang['NgayViet']; ?></div></td>
	  <td  class="row1" align="center"><div class="item"><?php echo $hang['MaLoaiTin']; ?></div></td>
	  <td  class="row1" align="center"><div class="item"><?php echo $hang['MoTaTin']; ?></div></td>
	  <td  class="row1" align="center"><div class="item"><?php echo $hang['anh']; ?></div></td>
	  <td align="center"><a href = "sua.php? MaTin=<?php echo $hang['MaTin'];?>"><font color="gray">Sửa</font></a></td>
	  <td align ="center" ><a href = "xoa.php? MaTin=<?php echo $hang['MaTin'];?>"><font color="gray">Xóa</font></a></td>

    </tr>
    <?php } while ($hang = mysqli_fetch_assoc($ketqua)); ?>
</table>
<br><br>
<center><tr><td><button><a href = "them.php">Thêm tin</a></button></td> </center>
<?php
// Sau khi thực thi xong thì ngắt kết nối database
mysqli_close($link);
?>