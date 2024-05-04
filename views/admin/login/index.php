<?php
require_once('views/admin/header.php'); ?>

<body class="hold-transition login-page">
<div class="login-box">
		<h1 class="login-logo"><b style="color: #088178;">Cana</b> - Admin Login</h1>
		<!-- /.login-logo-->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg"> Đăng nhập vào hệ thống </p>
				<?php
					if (isset($err))
					{
						echo '<p class="login-box-msg" style="color: red">' . $err . '</p>';
						unset($err);
					}
				?>
				<form action="index.php?page=admin&controller=login&action=check" method="post">
					<div class="input-group mb-3">
						<input class="form-control" type="text" placeholder="Tài khoản" name="username">
						<div class="input-group-append">
							<div class="input-group-text"><span class="fas fa-user"></span></div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input class="form-control" type="password" placeholder="Mật khẩu" name="password">
						<div class="input-group-append">
							<div class="input-group-text"><span class="fas fa-lock"></span></div>
						</div>
					</div>
					<div class="row">
						<div class="col-7"></div>
						<!-- /.col-->
						<div class="col-5">
							<button class="btn btn-block" style="background-color: #088178; color: white" type="submit">Đăng nhập</button>
						</div>
						<!-- /.col-->
					</div>
				</form>
			</div>
		</div>
	</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="public/plugins/bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
</body>
</html>