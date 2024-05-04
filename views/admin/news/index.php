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
					<h1>Quản lý Tin tức</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php?page=admin&controller=layouts&action=index">Home</a></li>
						<li class="breadcrumb-item active">Quản lý Tin tức</li>
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
							<button class="btn" style="background-color: #088178; color: white" type="button" data-bs-toggle="modal" data-bs-target="#addUserModal">Thêm mới</button>
							<!-- Table Here -->
							<table id="tab-news" class="table table-bordered table-striped" style="margin-top:6px;">
								<thead>
									<tr class="text-center">
                                        <th scope="col">STT</th>
                                        <th scope="col">Ngày </th>
                                        <th scope="col">Tiêu đề</th>
                                        <th scope="col">Mô tả</th>
                                        <th scope="col">Nội dung</th>
										<th scope="col">Hình ảnh</th>
                                        <th style="width:150px;" scope="col">Trạng thái</th>
                                        <th style="width:150px;" scope="col">Thao tác</th>
                                    </tr>
								</thead>
								<tbody>
								<?php

									$index = 1;

									foreach ($news as $new) {
										$status = ($new->status) ? 'Hiện' : 'Ẩn';
										$button = ($new->status) ? "<button class=\"btn-hide btn btn-secondary btn-xs\" style=\"margin-right: 5px\" data-bs-id='$new->id' ><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-x-lg\" viewBox=\"0 0 16 16\">
													<path fill-rule=\"evenodd\" d=\"M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z\"/>
													<path fill-rule=\"evenodd\" d=\"M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z\"/>
													</svg></button>" : "<button class=\"btn-hide btn btn-success btn-xs\" style=\"margin-right: 5px\" data-bs-id='$new->id' > <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-check-lg\" viewBox=\"0 0 16 16\">
													<path d=\"M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z\"/>
													</svg></button>";
										echo
										"<tr >
													<td class=\"text-center\">"
											. $index .
											"</td>
													
													<td class=\"text-center\">
													" .  date('h:i - d/m/Y',strtotime($new->date)) . "
													</td>   

													<td>
													" . $new->title . "
													</td    > 
													<td>
													" .  $new->description . "
													</td> 
													<td>
													" . $new->content . "
													</td>   
													<td style=\"width:150px;\">
													" . ($new->img ? "<img src=".$new->img." alt=\"\" style=\"width:100%;\">" : "Không có") . "
													</td>   
													
													<td class=\"text-center\">
													" .  $status . "
													</td>      
													<td style=\"width:150px;\" class=\"text-center\"> " .
													$button . "
													<button class=\"btn-edit btn btn-primary btn-xs\" style=\"margin-right: 5px\" data-bs-id='$new->id'  data-bs-description='$new->description' data-bs-content='$new->content' data-bs-title='$new->title' data-bs-img='$new->img'> <i style=\"font-size:17px;\" class=\"fas fa-edit\" ></i></button>
													<button class=\"btn-delete btn btn-danger btn-xs\" style=\"margin-right: 5px\" data-bs-id='$new->id' data-bs-img='$new->img'><i style=\"font-size:17px;\" class=\"fas fa-trash\"></i></button>
												</td>                                                                                                                                                                                       
												</tr>";
										$index++;
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

							<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModal" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Thêm mới bài viết</h5><button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form id="form-add-student" action="index.php?page=admin&controller=news&action=add" enctype="multipart/form-data" method="post">
                                            <div class="modal-body">
                                                <div class="form-group"> <label>Mô tả</label> <textarea class="form-control" placeholder="Mô tả" name="description" rows="5"></textarea></div>
                                                <div class="form-group"> <label>Nội dung</label> <textarea class="form-control" placeholder="Nội dung" name="content" rows="10"></textarea></div>
                                                <div class="form-group"><label>Tiêu đề</label><input class="form-control" type="text" placeholder="Tiêu đề" name="title" /></div>
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

							<div class="modal fade" id="EditStudentModal" tabindex="-1" role="dialog" aria-labelledby="EditStudentModal" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Chỉnh sửa</h5><button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form action="index.php?page=admin&controller=news&action=edit" enctype="multipart/form-data" method="post">
                                                <div class="modal-body">
                                                    <input class="form-control" type="hidden" placeholder="Name" name="id" />
                                                    <div class="form-group"><label>Tiêu đề </label><input class="form-control" type="text" name="title" /></div>
                                                    <div class="form-group"> <label>Mô tả</label> <textarea class="form-control" name="description" rows="5"></textarea></div>
                                                    <div class="form-group"> <label>Nội dung</label> <textarea class="form-control" name="content" rows="10"></textarea></div>
													<div class="form-group">
														<label>Hình ảnh hiện tại </label>
														<input class="form-control" type="text" name="img" readonly />
													</div>
													<div class="form-group">
														<label>Hình ảnh</label>&nbsp
														<input type="file" name="fileToUpload" id="fileToUpload" />
													</div>
                                                </div>
                                                <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Đóng</button><button class="btn btn-info" type="submit">Chỉnh sửa</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

								<div class="modal fade" id="DeleteStudentModal" tabindex="-1" role="dialog" aria-labelledby="DeleteStudentModal" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Xóa</h5><button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form action="index.php?page=admin&controller=news&action=delete" method="post">
                                                <div class="modal-body"><input type="hidden" name="id" />
												<input type="hidden" name="img" />
                                                    <p>Bạn có chắc chắn xóa bài viết này</p>
                                                </div>
                                                <div class="modal-footer"><button class="btn btn-secondary btn-outline-light" type="button" data-bs-dismiss="modal">Đóng</button><button class="btn btn-danger btn-outline-light" type="submit">Xóa</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

								<div class="modal fade" id="HideStudentModal" tabindex="-1" role="dialog" aria-labelledby="HideStudentModal" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hiện hay ẩn bài viết</h5><button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form action="index.php?page=admin&controller=news&action=hide" method="post">
                                                <div class="modal-body"><input type="hidden" name="id" />
                                                    <p>Bạn đã chắc chắn?</p>
                                                </div>
                                                <div class="modal-footer"><button class="btn btn-secondary btn-outline-light" type="button" data-bs-dismiss="modal">Đóng</button><button class="btn btn-info btn-outline-light" type="submit">Cập nhật</button></div>
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

<script src="public/js/admin/blog/script.js"></script>
</body>
</html>