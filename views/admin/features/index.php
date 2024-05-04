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
					<h1>Quản lý Feature</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php?page=admin&controller=layouts&action=index">Home</a></li>
						<li class="breadcrumb-item"><a href="index.php?page=admin&controller=products&action=index">Quản lý sản phẩm</a></li>
						<li class="breadcrumb-item active">Feature</li>
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
						<button class="btn" style="background-color: #088178; color: white" type="button" data-bs-toggle="modal" data-bs-target="#addFeatureModal">Thêm mới</button>
							<!-- Table Here -->
							<table id="tab-feature" class="table table-bordered table-striped" style="margin-top:6px;">
								<thead>
									<tr class="text-center">
										<th scope="col">STT</th>
										<th scope="col">Tiêu đề</th>
										<th scope="col">Ngày tạo</th>
										<th scope="col">Thao tác</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($features as $feature) {
										$index = 1;
										echo'
										<tr>
											<td>'.$index++.'</td>
											<td>'.$feature->title.'</td>
											<td>'.$feature->createAt.'</td>
											<td>
												<button class="btn-edit btn btn-primary btn-xs" style="margin-right: 5px" data-bs-toggle="tooltip" data-bs-placement="top" title="Chỉnh sửa" data-bs-id="'.$feature->id.'" data-bs-title="'.$feature->title.'"> <i style="font-size:17px;" class="fas fa-edit" ></i></button>
												<button class="btn-delete btn btn-danger btn-xs" style="margin-right: 5px" data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa" data-bs-id="'.$feature->id.'"><i style="font-size:17px;" class="fas fa-trash"></i></button>
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

							<div class="modal fade" id="addFeatureModal" tabindex="-1" role="dialog" aria-labelledby="addFeatureModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Thêm mới Feature</h5><button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form id="form-add-student" action="index.php?page=admin&controller=features&action=add" enctype="multipart/form-data" method="post">
                                            <div class="modal-body">
                                                <div class="form-group"><label>Tiêu đề</label><input class="form-control" type="text" placeholder="Tiêu đề" name="title" /></div>

											</div>
                                            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Đóng</button><button class="btn btn-primary" type="submit">Thêm mới</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>

							<div class="modal fade" id="editFeatureModal" tabindex="-1" role="dialog" aria-labelledby="editFeatureModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Thay đổi</h5><button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form id="form-edit-student" action="index.php?page=admin&controller=features&action=edit" enctype="multipart/form-data" method="post">
                                            <div class="modal-body">
												<input type="hidden" name="id" />
                                                <div class="form-group"><label>Tiêu đề</label><input class="form-control" type="text" placeholder="Tiêu đề" name="title" /></div>

											</div>
                                            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Đóng</button><button class="btn btn-primary" type="submit">Chỉnh sửa</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>

							<div class="modal fade" id="delFeatureModal" tabindex="-1" role="dialog" aria-labelledby="delFeatureModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Xóa</h5><button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										
                                        <form id="form-delete-student" action="index.php?page=admin&controller=features&action=delete" enctype="multipart/form-data" method="post">
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

<script src="public/js/admin/feature/script.js"></script>
</body>
</html>