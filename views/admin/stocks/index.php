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
					<h1>Quản lý Số lượng</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php?page=admin&controller=layouts&action=index">Home</a></li>
						<li class="breadcrumb-item"><a href="index.php?page=admin&controller=products&action=index">Quản lý Sản phẩm</a></li>
						<li class="breadcrumb-item active">Số lượng</li>
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
						<button class="btn" style="background-color: #088178; color: white" type="button" data-bs-toggle="modal" data-bs-target="#addStockModal">Thêm mới</button>
							<!-- Table Here -->
							<table id="tab-stock" class="table table-bordered table-striped" style="margin-top:6px;">
								<thead>
									<tr class="text-center">
										<th scope="col">STT</th>
										<th scope="col">ID Sản phẩm</th>
										<th scope="col">Kích cỡ</th>
										<th scope="col">Số lượng</th>
										<th scope="col">Hình ảnh</th>
										<th scope="col">Thao tác</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									foreach($stocks as $stock) {
										$index = 1;
										echo'
										<tr>
											<td>'.$index++.'</td>
											<td>'.$stock->product_id.'</td>
											<td>'.$stock->size.'</td>
											<td>'.$stock->stock_num.'</td>
											<td style="width:150px;">'.($stock->img ? "<img src=\"$stock->img\" alt=\"\" style=\"width:100%;\">" : "Không có").'</td>
											<td>
											<button class="btn-edit btn btn-primary btn-xs" style="margin-right: 5px" data-bs-toggle="tooltip" data-bs-placement="top" title="Chỉnh sửa" data-bs-id="'.$stock->id.'" data-bs-img="'.$stock->img.'" data-bs-product_id="'.$stock->product_id.'" data-bs-size="'.$stock->size.'" data-bs-stock_num="'.$stock->stock_num.'"> <i style="font-size:17px;" class="fas fa-edit" ></i></button>
											<button class="btn-delete btn btn-danger btn-xs" style="margin-right: 5px" data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa" data-bs-id="'.$stock->id.'" data-bs-img="'.$stock->img.'"><i style="font-size:17px;" class="fas fa-trash"></i></button>
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
							
							<div class="modal fade" id="addStockModal" tabindex="-1" role="dialog" aria-labelledby="addStockModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Thêm mới sản phẩm</h5><button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form id="form-add-student" action="index.php?page=admin&controller=stocks&action=add" enctype="multipart/form-data" method="post">
                                            <div class="modal-body">
												<div class="form-group"><label>Tên sản phẩm</label>
													<select class="form-control" id="select-name" name="product_id" placeholder="Chọn sản phẩm">
														<?php 
														foreach ($products as $product) {
															echo'<option value="'.$product->id.'">'.$product->name.'</option>';
														}
														?>
													</select>
												</div>
                                                <div class="form-group"><label>Kích thước</label> 
													<select class="form-control" name="size" placeholder="Chọn kích thước">
														<option value="1">Small</option>
														<option value="2">Large</option>
														<option value="3">XL</option>
														<option value="4">XXL</option>
													</select>
												</div>
                                                <div class="form-group"><label>Số lượng</label><input class="form-control" type="number" placeholder="Số lượng" name="stock_num" /></div>
                                                
												<div class="form-group">
													<label>Hình ảnh</label>&nbsp
													<input type="file" name="fileToUpload" id="fileToUpload" />
												</div>
											</div>
                                            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Đóng</button><button class="btn btn-primary" type="submit">Thêm mới</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>

							<div class="modal fade" id="editStockModal" tabindex="-1" role="dialog" aria-labelledby="editStockModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Thêm mới sản phẩm</h5><button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form id="form-edit-student" action="index.php?page=admin&controller=stocks&action=edit" enctype="multipart/form-data" method="post">
                                            <div class="modal-body">
												<input type="hidden" name="id" />
												<div class="form-group"><label>Tên sản phẩm</label>
													<select class="form-control" name="product_id" placeholder="Chọn sản phẩm">
														<?php 
														foreach ($products as $product) {
															echo'<option value="'.$product->id.'">'.$product->name.'</option>';
														}
														?>
													</select>
												</div>
                                                <div class="form-group"><label>Kích thước</label> 
													<select class="form-control" name="size" placeholder="Chọn kích thước">
														<option value="1">Small</option>
														<option value="2">Large</option>
														<option value="3">XL</option>
														<option value="4">XXL</option>
													</select>
												</div>
                                                <div class="form-group"><label>Số lượng</label><input class="form-control" type="number" placeholder="Số lượng" name="stock_num" /></div>
                                                <div class="form-group"><label>Hình ảnh hiện tại</label><input class="form-control" type="text" name="img" readonly/></div>
												<div class="form-group">
													<label>Hình ảnh mới</label>&nbsp
													<input type="file" name="fileToUpload" id="fileToUpload" />
												</div>
											</div>
                                            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Đóng</button><button class="btn btn-primary" type="submit">Chỉnh sửa</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>

							<div class="modal fade" id="delStockModal" tabindex="-1" role="dialog" aria-labelledby="delStockModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Xóa</h5><button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										
                                        <form id="form-delete-student" action="index.php?page=admin&controller=stocks&action=delete" enctype="multipart/form-data" method="post">
												<div class="modal-body">
													<input type="hidden" name="id" />
													<input class="form-control" type="hidden" name="img" readonly/>
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

<script src="public/js/admin/stock/script.js"></script>
</body>
</html>