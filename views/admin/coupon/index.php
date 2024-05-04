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
				<div class="col-sm-6">
					<h1>Quản lý Coupons</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php?page=admin&controller=layouts&action=index">Home</a></li>
						<li class="breadcrumb-item"><a href="index.php?page=admin&controller=products&action=index">Quản lý sản phẩm</a></li>
						<li class="breadcrumb-item active">Coupon</li>
					</ol>
				</div>
			</div>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<!-- Table Here -->
							<table id="tab-coupon" class="table table-bordered table-striped" style="margin-top:6px;">
								<thead>
									<tr class="text-center">
										<th scope="col">STT</th>
										<th scope="col">Số lượng</th>
										<th scope="col">Mã</th>
										<th scope="col">Giảm giá</th>
										<th scope="col">Ngày tạo</th>
										<th scope="col">Ngạy hết hạn</th>
										<th scope="col">Thao tác</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
								<!-- <tfoot>
									<tr class="text-center">
										<th></th>
									</tr>
								</tfoot> -->
							</table>
							<!-- Or Modal Here -->

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- Add Javascripts -->

<?php
require_once('views/admin/footer.php'); ?>

<script src="public/js/admin/coupon/script.js"></script>
</body>
</html>