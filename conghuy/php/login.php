<html>
<head>
<title>Đăng nhập</title>
</head>
<body>
<form method="POST" action=''>
<table><br><br>
Tên đăng nhập:&emsp;&emsp;&emsp;<input type="text" name="ten"  maxlength="20"><br><br>
Mật khẩu:&emsp;&emsp;&emsp;&emsp;&emsp;<input type="password" name="mk"><br><br>
<tr><td><input type="submit" value="Đăng nhập"></td> 
<td><input type="reset" value="Xóa hết"></td></tr>
</table>
</form>
<?php
require("ketnoi.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
	if(isset($_POST['ten'])) $a=$_POST['ten'];
	if(isset($_POST['mk']))  $b=$_POST['mk'];
	$luachon = 'SELECT * FROM user';
	if($ketqua = mysqli_query($link,$luachon)){
		$e = 0;
		while($hang = mysqli_fetch_array($ketqua)){
			if($hang['TenHienThi']==$a && $hang['MatKhau']==$b){
				header("location: ./themsuaxoa.php");
				$e++;
				exit;
			  }
			}
		}
		if($e==0){
			echo("đăng nhập thất bại");
		}
	}else
		echo 'ket noi that bai' . mysqli_error($link);
		mysqli_close($link);

?>

</body>
</html>