<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>công huy </title>
	<link rel="stylesheet" href="../boostrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/index.css">
	<link rel="stylesheet" href="../css/responsize.css">
</head>

<body>
	<header>
			<div class="header_img">
				<img src="../img/Untitled.png" alt="">
			</div>
			<nav class="navbar navbar-expand-lg navbar-light">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
				  <ul class="navbar-nav mr-auto">
					<li class="nav-item">
					  <a class="nav-link" href="./trangchu.php">trang chủ</a>
					</li>
					<?php 
						/* in ra thẻ li */
						require('./ketnoi.php');
						$sql = "SELECT * FROM loaitin";
						if($result = mysqli_query($link,$sql)){
							$detail=mysqli_fetch_array($result);
									do{
										echo '
											<li class="nav-item">
												<a class="nav-link" href="./list.php?MaLoai='.$detail['MaLoai'].'">'.$detail['TenLoai'].'</a>
											</li>
											';
									}while($detail=mysqli_fetch_assoc($result));
						}else{
							echo '<h2>lỗi</h2>';
						}
						
					?>
					<li class="nav-item">
					  <a class="nav-link" href="./login.php">đăng nhập</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="./dangky.php">đăng ký</a>
					</li>
				  </ul>
				  <form class="form-inline my-2 my-lg-0" action="./timkiem.php" method="post">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="tukhoa">
					<button class="btn my-2 my-sm-0" type="submit">Search</button>
				  </form>
				</div>
			  </nav>
	</header>
	<div class="container">

	
	<?php 
                require('./ketnoi.php');
                if ($_SERVER["REQUEST_METHOD"] == "POST") { //Lấy giá trị POST từ form vừa submit
                    if(isset($_POST["tukhoa"])) { $a = $_POST['tukhoa']; };
                    echo '
                        <div class="Post_Search">
                        <h2>Từ khóa bạn tìm kiếm là: '.$a .' </h2>
                        </div>
                        <div class="row">  
                    ';
                    //Code xử lý, 
                        $sql = "SELECT * FROM tintuc WHERE tieude like '%$a%'";
                    if($result = mysqli_query($link,$sql)){
                        $detail=mysqli_fetch_array($result);
                        if($detail>0){
                                do{
                                    echo '
									<div class="list-item col-md-3 col-6 mt-2">
										<a href="./detail.php?MaTin='.$detail['MaTin'].'" class="list-item-link" >
											<div class="item-img">
												<img src="../img/'.$detail['anh'].'" alt="">
											</div>
											<div class="item-title">
											'.$detail['TieuDe'].'
											</div>
										</a>
									</div>
                                    ';
                                }while($detail=mysqli_fetch_assoc($result));
                            }else{
                                echo '<h2>không tìm thấy từ khóa</h2>';
                            }
                        }else{
                            echo '<h2>không tìm thấy từ khóa</h2>';
                        }
                        echo'</div>';
                    }
        
        ?>
	</div>
	<footer>
		<div class="footer">
			<div class="container pt-2">
				<div class="row">
					<div class="col-md-4 footer-img col-12">
						<img src="../img/Untitled.png" alt="">
					</div>
					<div class="col-md-8 footer-right col-12">
						<h4>về chúng tôi</h4>
						<div>
							Địa chỉ: 319 C16 Lý Thường Kiệt, phường 15, Quận 11, Tp.HCM
						</div>
						<div>
							Hotline: 0963089510
						</div>
						<div>
							Email: Conghuy@gmail.com
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</body>
<script src="../js/jquery.js"></script>
<script src="../boostrap/js/bootstrap.min.js"></script>



</html>