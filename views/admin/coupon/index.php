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
						<button class="btn" style="background-color: #088178; color: white" type="button" data-bs-toggle="modal" data-bs-target="#addCouponModal">Thêm mới</button>
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
									<?php 
									foreach ($coupons as $coupon) {
										$index = 1;
										echo'
										<tr class="text-center">
											<td>'.$index++.'</td>
											<td>'.$coupon->stock.'</td>
											<td>'.$coupon->coupon_num.'</td>
											<td>'.$coupon->discount.'%</td>
											<td>'.$coupon->createAt.'</td>
											<td>'.$coupon->expireAt.'</td>
											<td>
											<button class="btn-edit btn btn-primary btn-xs" style="margin-right: 5px" data-bs-toggle="tooltip" data-bs-placement="top" title="Chỉnh sửa" data-bs-id="'.$coupon->coupon_num.'" data-bs-stock="'.$coupon->stock.'"  data-bs-discount="'.$coupon->discount.'"  data-bs-expireAt="'.$coupon->expireAt.'"> <i style="font-size:17px;" class="fas fa-edit" ></i></button>
											<button class="btn-delete btn btn-danger btn-xs" style="margin-right: 5px" data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa" data-bs-id="'.$coupon->coupon_num.'"><i style="font-size:17px;" class="fas fa-trash"></i></button>
											</th>
										</tr>
										
										';
									}
									?>
								</tbody>
								<!-- <tfoot>
									<tr class="text-center">
										<th></th>
									</tr>
								</tfoot> -->
							</table>
							<!-- Or Modal Here -->

							<div class="modal fade" id="addCouponModal" tabindex="-1" role="dialog" aria-labelledby="addCouponModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Thêm mới Coupon</h5><button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form id="form-add-student" action="index.php?page=admin&controller=coupons&action=add" enctype="multipart/form-data" method="post">
                                            <div class="modal-body">
												<div class="form-group"><label>Số lượng</label><input class="form-control" type="number" placeholder="Số lượng" name="stock" /></div>
                                                <div class="form-group"><label>Giảm giá</label><input class="form-control" type="number" placeholder="Giảm giá" name="discount" max="100"/></div>
                                                <div class="form-group"><label>Ngày hết hạn</label><input class="form-control" type="date" name="expireDate" placeholder=""/></div>
												
											</div>
                                            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Đóng</button><button class="btn btn-primary" type="submit">Thêm mới</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>

							<div class="modal fade" id="editCouponModal" tabindex="-1" role="dialog" aria-labelledby="editCouponModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Thêm mới Coupon</h5><button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form id="form-add-student" action="index.php?page=admin&controller=coupons&action=edit" enctype="multipart/form-data" method="post">
                                            <div class="modal-body">
											<input type="hidden" name="id" />
												<div class="form-group"><label>Số lượng</label><input class="form-control" type="number" placeholder="Số lượng" name="stock" /></div>
                                                <div class="form-group"><label>Giảm giá</label><input class="form-control" type="number" placeholder="Giảm giá" name="discount" max="100"/></div>
                                                <div class="form-group"><label>Ngày hết hạn</label><input class="form-control" type="date" name="expireAt" placeholder=""/></div>
												
											</div>
                                            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Đóng</button><button class="btn btn-primary" type="submit">Chỉnh sửa</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>

							<div class="modal fade" id="delCouponModal" tabindex="-1" role="dialog" aria-labelledby="delCouponModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Xóa</h5><button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										
                                        <form id="form-delete-student" action="index.php?page=admin&controller=coupons&action=delete" enctype="multipart/form-data" method="post">
												<div class="modal-body">
													<input type="hidden" name="id" />
													<p>Bạn đã chắc chắn?</p>
                                                </div>	
                                            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Đóng</button>
											<button class="btn btn-danger" type="submit">Xóa</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>

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