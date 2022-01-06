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
	<link rel="stylesheet" href="../css/detail.css">
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
	<main>
	<div class="container mt-5">
           <div class="row">
            <div class="col-md-8">
			<?php 
						/* in ra thẻ li */
				require('./ketnoi.php');
				$a = $_GET['MaTin'];
				$sql = "SELECT * FROM tintuc where MaTin= $a";
					if($result = mysqli_query($link,$sql)){
						$detail=mysqli_fetch_array($result);
						do{
							echo '				
								<div class="title">
									<a href="./list.php?MaTin='.$detail['MaTin'].'" class="title-link">'.$detail['TieuDe'].'</a>
								</div>
								<div class="tacgia">
									<span>'.$detail['TacGia'].'</span>
									<span>'.$detail['NgayViet'].'</span>
								</div>
								<div class="MoTa">
									'.$detail['MoTaTin'].'
								</div>		
								<div class="NoiDung">
									'.$detail['NoiDung'].'
								</div>				
									';
						}while($detail=mysqli_fetch_assoc($result));
					}else{
						echo '<h2>lỗi</h2>';
					}
						
			?>
               
            </div>
            <div class="col-md-4">
                <h4 class="content">tin mới</h4>
                <ul class="menu">
				<?php 
						/* in ra thẻ li */
						require('./ketnoi.php');
						$sql = "SELECT * FROM tintuc group by MaTin desc limit 1,5";
						if($result = mysqli_query($link,$sql)){
							$detail=mysqli_fetch_array($result);
									do{
										echo '
										<li class="menu-item mb-2">
											<a href="./detail.php?MaTin='.$detail['MaTin'].'" class="menu-link">
												<div class="link-img" >
													<img src="../img/'.$detail['anh'].'" alt="">
												</div>
												<div class="ml-2 menu-item-right">
													<div class="title">
													'.$detail['TieuDe'].'
													</div>
													<div class="tacgia">
													'.$detail['TacGia'].'
													</div>
												</div>
											</a>
										</li>
											';
									}while($detail=mysqli_fetch_assoc($result));
						}else{
							echo '<h2>lỗi</h2>';
						}
						
						?>
                </ul>
            </div>
           </div>
        </div>
	</main>
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