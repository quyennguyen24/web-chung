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
	<main>
		<div class="container main mt-5">
			<div class="row main-height">
				<div class="col-md-8 main-left">
				<?php 
						/* in ra thẻ li */
						require('./ketnoi.php');
						$sql = "SELECT * FROM tintuc group by MaTin desc limit 1";
						if($result = mysqli_query($link,$sql)){
							$detail=mysqli_fetch_array($result);
									do{
										echo '
										<a href="./detail.php?MaTin='.$detail['MaTin'].'" class="mainLeft-link">
										<img src="../img/'.$detail['anh'].'" alt="">
										<div class="mainLeft-title">
										'.$detail['TieuDe'].'
										</div>
										<div class="mainLeft-MoTa">
										'.$detail['MoTaTin'].'
										</div>
										<button type="button" class="btn btn-danger">Xem Thêm</button>
									</a>
											';
									}while($detail=mysqli_fetch_assoc($result));
						}else{
							echo '<h2>lỗi</h2>';
						}
						
				?>
				</div>
				<div class="col-md-4 main-right hidden">
					<ul class="menu">
					<?php 
						/* in ra thẻ li */
						require('./ketnoi.php');
						$sql = "SELECT * FROM tintuc group by MaTin desc limit 2,5";
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
	<section>
		<div class="container section ">
			<?php 
						/* in ra thẻ li */
				require('./ketnoi.php');
				$sql = "SELECT * FROM loaitin";
				if($result = mysqli_query($link,$sql)){
					$detail=mysqli_fetch_array($result);
						do{
							echo '
							<div class="section-item mt-3">
								<h4>'.$detail['TenLoai'].'</h4>
								<div class="row">
							';
									$a = $detail['MaLoai'];
									$sql2 = "SELECT * FROM tintuc where MaLoaiTin= $a limit 4";
									if($result2 = mysqli_query($link,$sql2)){
										$detail2=mysqli_fetch_array($result2);
											do{
												echo '
												
													<div class="list-item col-md-3 col-6 mt-2">
														<a href="./detail.php?MaTin='.$detail2['MaTin'].'" class="list-item-link" >
															<div class="item-img">
																<img src="../img/'.$detail2['anh'].'" alt="">
															</div>
															<div class="item-title">
															'.$detail2['TieuDe'].'
															</div>
														</a>
													</div>
												
												';
												}while($detail2=mysqli_fetch_assoc($result2));
										}else{
										echo '<h2>lỗi</h2>';
									}

							echo '</div></div>';
						}while($detail=mysqli_fetch_assoc($result));
					}else{
					echo '<h2>lỗi</h2>';
				}
						
			?>
		</div>
	</section>
	
	
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