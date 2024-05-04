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
					<h1>Quản lý sản phẩm</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php?page=admin&controller=layouts&action=index">Home</a></li>
						<li class="breadcrumb-item"><a href="index.php?page=admin&controller=products&action=index">Quản lý sản phẩm</a></li>
						<li class="breadcrumb-item active">Sản phẩm</li>
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
						<button class="btn" style="background-color: #088178; color: white" type="button" data-bs-toggle="modal" data-bs-target="#addProductModal">Thêm mới</button>
							<!-- Table Here -->
							<table id="tab-product" class="table table-bordered table-striped" style="margin-top:6px;">
								<thead>
									<tr class="text-center">
										<th scope="col">STT</th>
										<th scope="col">Tên</th>
										<th scope="col">Mô tả</th>
										<th scope="col">Giá tiền</th>
										<th scope="col">Đánh giá</th>
										<th scope="col">Ngày thêm</th>
										<th scope="col">Nổi bật</th>
										<th scope="col">Hình ảnh</th>
										<th scope="col">Thao tác</th>
									</tr>
								</thead>
								<tbody>
									<?php
										foreach ($products as $product) {
											$index = 1;
											echo'
											<tr>
												<td>'.$index++.'</td>
												<td>'.$product->name.'</td>
												<td style="width:250px;">'.$product->description.'</td>
												<td>$'.$product->price.'</td>
												<td>'.$product->rating.'</td>
												<td>'.$product->date.'</td>
												<td>'.($product->feature_id ? $product->feature_id : "Không có").'</td>
												<td style="width:100px;">'.($product->default_img ? "<img src=\"$product->default_img\" alt=\"\" style=\"width:100%;\"> " : "Không có").'</td>
												<td>
													<button class="btn-edit btn btn-primary btn-xs" style="margin-right: 5px" data-bs-toggle="tooltip" data-bs-placement="top" title="Chỉnh sửa" data-bs-id="'.$product->id.'" data-bs-name="'.$product->name.'" data-bs-description="'.$product->description.'" data-bs-price="'.$product->price.'" data-bs-img="'.$product->default_img.'" data-bs-feature="'.$product->feature_id.'"> <i style="font-size:17px;" class="fas fa-edit" ></i></button>
													<button class="btn-delete btn btn-danger btn-xs" style="margin-right: 5px" data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa" data-bs-id="'.$product->id.'"><i style="font-size:17px;" class="fas fa-trash"></i></button>
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

							<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModal" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Thêm mới sản phẩm</h5><button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form id="form-add-student" action="index.php?page=admin&controller=products&action=add" enctype="multipart/form-data" method="post">
                                            <div class="modal-body">
												<div class="form-group"><label>Tên sản phẩm</label><input class="form-control" type="text" placeholder="Tên sản phẩm" name="name" /></div>
                                                <div class="form-group"> <label>Mô tả</label> <textarea class="form-control" placeholder="Mô tả" name="description" rows="5"></textarea></div>
                                                <div class="form-group"><label>Giá tiền</label><input class="form-control" type="number" placeholder="Gía tiền" name="price" /></div>
                                                
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

							<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModal" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Chỉnh sửa</h5><button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form id="form-edit-student" action="index.php?page=admin&controller=products&action=edit" enctype="multipart/form-data" method="post">
                                            <div class="modal-body">
												<input type="hidden" name="id" />
												<div class="form-group"><label>Tên sản phẩm</label><input class="form-control" type="text" placeholder="Tên sản phẩm" name="name" /></div>
                                                <div class="form-group"> <label>Mô tả</label> <textarea class="form-control" placeholder="Mô tả" name="description" rows="5"></textarea></div>
                                                <div class="form-group"><label>Giá tiền</label><input class="form-control" type="number" placeholder="Gía tiền" name="price" /></div>
                                                <div class="form-group">
												<label>Nổi bật</label>
													<select class="form-control" name="feature_id">
														<?php
															foreach ($features as $feature) {
																echo'<option value="'.$featire->id.'">'.$featire->title.'</option>';
															}
														?>
													</select>
												</div>
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

							<div class="modal fade" id="delProductModal" tabindex="-1" role="dialog" aria-labelledby="delProductModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Xóa</h5><button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										
                                        <form id="form-delete-student" action="index.php?page=admin&controller=products&action=delete" enctype="multipart/form-data" method="post">
												<div class="modal-body"><input type="hidden" name="id" />
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

<script src="public/js/admin/product/script.js"></script>
</body>
</html>