<?php
session_start();
if (!isset($_SESSION["user"])) {
	header("Location: index.php?page=admin&controller=login&action=index");
}
?>

<?php
require_once('views/admin/header.php'); ?>
<!-- Add CSS -->


<?php
require_once('views/admin/content_layouts.php'); ?>
<!-- Content -->
<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-12">
					<h1>Chào mừng đến với khu vực của quản trị viên</h1>
				</div>
			</div>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="invoice p-3 mb-3">
				<div class="row invoice-info">
					<div class="col-sm-6 invoice-col">
						<ul style="list-style: none;" >
							<?php
								if($_SESSION['role'] == 1){
									echo '
									<li class="mt-2">
										<a href="index.php?page=admin&controller=admin&action=index">
											<i class="fas fa-user-graduate"></i>
											Danh sách Admin
										</a>
									</li>
									
									';
								}
							?>
							
							<li class="mt-2">
								<a href="index.php?page=admin&controller=comments&action=index">
									<i class="fas fa-comments"></i>
									Bình luận - Đánh giá
								</a>
							</li>
							<li class="mt-2">
								<a href="index.php?page=admin&controller=user&action=index"> 
									<i class="fas fa-users-cog"></i>
									Liên hệ khách hàng
								</a>
							</li>
						</ul>
					</div>
					<!-- /.col -->
					<div class="col-sm-6 invoice-col">
						<ul style="list-style: none;">
							<li class="mt-2">
								<a href="index.php?page=admin&controller=products&action=index">
									<i class="fas fa-cube"></i>
									Quản lý Sản phẩm
								</a>
							</li>
							
							<li class="mt-2">
								<a href="index.php?page=admin&controller=cart&action=index"> 
									<i class="fas fa-luggage-cart"></i>
									Quản lý giỏ hàng
								</a>
							</li>
							<li class="mt-2">
								<a href="index.php?page=admin&controller=news&action=index">
									<i class="fas fa-newspaper"></i>
									Quản lý tin tức
								</a>
							</li>
							
						</ul>
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</div>
			
		</div><!-- /.container-fluid -->
	</section>
</div>


<!-- Add Javascripts -->

<?php
require_once('views/admin/footer.php'); ?>

</body>
</html>