<head><title>Sửa tin tức</title></head>
<script src="./ckeditor/ckeditor.js"></script>
<?php
require("ketnoi.php");
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_GET['MaTin'])){
		$matin=$_GET['MaTin'];
		}

	if(isset($_POST['sua'])){
		$tieude= $_POST['tieude'];
		$noidung= $_POST['editor1'];
		$tacgia= $_POST['tacgia'];
		$ngayviet= date('Y-m-d');
		$maloaitin= $_POST['maloaitin'];
		$motatin= $_POST['motatin'];
		$hinhanh= $_POST['hinhanh'];
		
		if($tieude !="" && $noidung !="" && $tacgia !=""&& $ngayviet !=""&& $maloaitin !=""){
			$sql="UPDATE tintuc SET TieuDe='$tieude', NoiDung='$noidung', TacGia='$tacgia', NgayViet='$ngayviet',
			MaLoaiTin='$maloaitin',MoTaTin='$motatin',anh='$hinhanh' where MaTin = '$matin'"; 
			$ketqua=mysqli_query($link,$sql);
			header("location: themsuaxoa.php");
		}
	}
}
?>
<?php
	$matin=$_GET['MaTin'];
	$sql ="SELECT *FROM tintuc where MaTin = '$matin'";
	$ketqua = mysqli_query($link,$sql) ;
	$hang = mysqli_fetch_array($ketqua);

?>

<form method="POST" action = "">
Tiêu đề:&emsp;&emsp;&emsp; 	<input type="text" name = "tieude"value ="<?php echo $hang['TieuDe'];?>"><br><br>
Tác giả:&emsp;&emsp;&emsp;	<input type="text" name = "tacgia"value ="<?php echo $hang['TacGia'];?>"><br><br>
Tên loại:&ensp;&emsp;&emsp;	<input type="text" name = "maloaitin"value ="<?php echo $hang['MaLoaiTin'];?>"><br><br>
Mô tả tin:&ensp;&emsp;&emsp;	<input type="text" name = "motatin"value ="<?php echo $hang['MoTaTin'];?>"><br><br>
hình ảnh :&ensp;&emsp;&emsp;	<input type="text" name = "hinhanh"value ="<?php echo $hang['anh'];?>"><br><br>
Nội dung:&nbsp;&emsp;&emsp;	
				<textarea name="editor1" id="editor1" rows="10" cols="80">
					<?php echo $hang['NoiDung'];?>
                </textarea>
                <script>
                    CKEDITOR.replace('editor1');
                </script>
            <br><br>	
&emsp;&emsp;&emsp;			<input type="submit" name ="sua" value="Lưu lại">
</form>