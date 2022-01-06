<?php
require("ketnoi.php");
?>
<?php
	if(isset($_GET["MaTin"])){
		$matin=$_GET["MaTin"];
	}
?>
<?php
	$sql ="DELETE FROM tintuc where MaTin = '$matin'";
	$ketqua = mysqli_query ($link,$sql);
	$sql1 ="DELETE FROM luotxem where MaTin = '$matin'";
	$ketqua = mysqli_query ($link,$sql1);
	header("location: themsuaxoa.php")
?>