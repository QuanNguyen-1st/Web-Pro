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
					<h1>Danh sách Admin</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php?page=admin&controller=layouts&action=index">Home</a></li>
						<li class="breadcrumb-item active">Danh sách Admin</li>
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
							<button class="btn" style="background-color: #088178; color: white" type="button" data-bs-toggle="modal" data-bs-target="#addAdminModal">Thêm mới</button>
							<!-- Table Here -->
							<table id="tab-admin" class="table table-bordered table-striped" style="margin-top:6px;">
								<thead>
									<tr class="text-center">
										<th>STT</th>
										<th>Tên đăng nhập</th>
										<th>Cập nhật lần cuối</th>
										<th>Thao tác</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$index = 1;
										foreach ($admin as $admin) {
											echo "<tr class='text-center'>";
											echo "<td>" . $index++ . "</td>";
											echo "<td>" . $admin->username . "</td>";
											echo "<td> " . date("h:i:sa-d/m/Y", strtotime($admin->updateAt)) . "</td>";
											echo "<td>
												<btn data-bs-toggle='tooltip' data-bs-placement='top' title='Chỉnh sửa' class='btn-edit btn btn-primary btn-xs' style='margin-right: 5px' data-bs-username='$admin->username' data-bs-password='$admin->password'> <i class='fas fa-edit'></i></btn>
												<btn data-bs-toggle='tooltip' data-bs-placement='top' title='Xóa' class='btn-delete btn btn-danger btn-xs' style='margin-right: 5px' data-bs-username='$admin->username'> <i class='fas fa-trash'></i></btn>
												</td>";
											echo "</tr>";
										}
									?>
								</tbody>
								<!-- <tfoot>
									<tr class="text-center">
										<th>STT</th>
										<th>Tên đăng nhập</th>
										<th>Cập nhật lần cuối</th>
										<th>Thao tác</th>
									</tr>
								</tfoot> -->
							</table>
							<!-- Or Modal Here -->

							<div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-labelledby="addAdminModal" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Thêm mới</h5>
											<button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										</div>
										<form action="index.php?page=admin&controller=admin&action=add" method="post">
											<div class="modal-body">
												<div class="form-group">
													<label>Tên đăng nhập</label>
													<input class="form-control" type="text" placeholder="Tên đăng nhập" name="username" />
												</div>
												<div class="form-group">
													<label>Mật khẩu</label>
													<input class="form-control" type="password" placeholder="Mật khẩu" name="password" />
												</div>
											</div>
											<div class="modal-footer">
												<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Đóng lại</button>
												<button class="btn btn-info" type="submit">Thêm mới</button>
											</div>
										</form>
									</div>
								</div>
							</div>

							<div class="modal fade" id="EditAdminModal" tabindex="-1" role="dialog" aria-labelledby="EditAdminModal" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Chỉnh sửa</h5>
											<button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										</div>
										<form action="index.php?page=admin&controller=admin&action=edit" method="post">
											<div class="modal-body">
												<input type="hidden" name="id" />
												<div class="form-group">
													<label>Username</label>
													<input class="form-control" type="text" placeholder="Username" name="username" readonly />
												</div>
												<div class="form-group">
													<label>New password</label>
													<input class="form-control" type="password" placeholder="Please enter your new password" name="new-password" />
												</div>
											</div>
											<div class="modal-footer">
												<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Đóng lại</button>
												<button class="btn btn-info" type="submit">Cập nhật</button>
											</div>
										</form>
									</div>
								</div>
							</div>

							<div class="modal fade" id="DeleteAdminModal" tabindex="-1" role="dialog" aria-labelledby="DeleteAdminModal" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Xóa</h5>
											<button class="close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										</div>
										<form action="index.php?page=admin&controller=admin&action=delete" method="post">
											<div class="modal-body">
												<input type="hidden" name="username" />
												<p>Bạn chắc chưa ?</p>
											</div>
											<div class="modal-footer">
												<button class="btn btn-secondary btn-outline-light" type="button" data-bs-dismiss="modal">Đóng</button>
												<button class="btn btn-danger btn-outline-light" type="submit">Xác nhận</button>
											</div>
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

<?php
require_once('views/admin/footer.php'); ?>

<script src="public/js/admin/admin/script.js"></script>
</body>
</html>