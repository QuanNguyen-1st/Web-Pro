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
					<h1>Quản lý Giỏ hàng</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php?page=admin&controller=layouts&action=index">Home</a></li>
						<li class="breadcrumb-item active">Quản lý Giỏ hàng</li>
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
							<table id="tab-cart" class="table table-bordered table-striped" style="margin-top:6px;">
								<thead>
									<tr class="text-center">
										<th scope="col">STT</th>
										<th scope="col">ID Người dùng</th>
										<th scope="col">ID Sản phẩm</th>
										<th scope="col">Kích cỡ</th>
										<th scope="col">Hình ảnh</th>
										<th scope="col">Số lượng</th>
										<th scope="col">Tình trạng</th>
										<th scope="col">Ngày mua</th>
										<th scope="col">Coupon</th>
										<th scope="col">Thao tác</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										foreach($carts as $cart) {
											$index = 1;
											echo'
											<tr>
												<td>'.$index++.'</td>
												<td>'.$cart->user_id.'</td>
												<td>'.$cart->product_id.'</td>
												<td>'.$cart->size.'</td>
												<td style="width:100px;">'.($cart->img ? "<img src=\"$cart->img\" alt=\"\" style=\"width:100%;\">" : "Không có").'</td>
												<td>'.$cart->amount.'</td>
												<td>'.($cart->purchase == 0 ? "Chưa mua" : "Đã mua").'</td>
												<td>'.($cart->datePurchase ? $cart->datePurchase : "Chưa mua").'</td>
												<td>'.$cart->coupon_id.'</td>
												<td style="width:80px;">
												<button class="btn-delete btn btn-danger btn-xs" style="margin-right: 15px" data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa" data-bs-id="'.$cart->id.'"><i style="font-size:17px;" class="fas fa-trash"></i></button>
												</td>
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

							<div class="modal fade" id="delCartModal" tabindex="-1" role="dialog" aria-labelledby="delCartModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Xóa</h5><button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										
                                        <form id="form-delete-student" action="index.php?page=admin&controller=carts&action=delete" enctype="multipart/form-data" method="post">
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

<script src="public/js/admin/cart/script.js"></script>
</body>
</html>