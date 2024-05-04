</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed" style="height: auto;">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button">
						C<i class="fas fa-bars"></i>
					</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a class="nav-link" href="index.php?page=admin&controller=layouts&action=index">Home</a>
				</li>
			</ul>
            <ul class="navbar-nav ml-auto">
				<!-- Navbar Search-->
				<li class="nav-item">
					<a class="nav-link" data-widget="fullscreen" href="#" role="button">
						F<i class="fas fa-expand-arrows-alt"></i>
					</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a class="nav-link" href="index.php?page=admin&controller=login&action=logout">Logout</a>
				</li>
			</ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="index.php?page=admin&controller=layouts&action=index" class="brand-link" >
				<span class="brand-text font-weight-light" style="margin-left: 10px;"><strong>Cana</strong></span>
			</a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<?php
					echo ('
							<div class="info" style="margin:auto;">
								<a href="#" class="d-block style="color:#000000;">
									Xin chào, 
						'
						. $_SESSION["user"] .
						' </a>
							</div>
						');

					?>
					
				</div>
                <nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!--Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
						<?php
							if($_SESSION['role']==1){
								echo '
									<li class="nav-item">
										<a class="nav-link ' . $activeArr['adminActive'] . ' " href="index.php?page=admin&controller=admin&action=index">
											<i class="nav-icon fas fa-user-graduate"> </i>
											<p>Danh sách Admin</p>
										</a>
									</li>
								';
							}
						
						?>
						<li class="nav-item">
							<a class="nav-link <?php echo $activeArr['commentActive']; ?>" href="index.php?page=admin&controller=comments&action=index">
								<i class="nav-icon fas fa-comments"></i>
								<p>Bình luận đánh giá</p>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php echo $activeArr['userActive']; ?>" href="index.php?page=admin&controller=user&action=index">
								<i class="nav-icon fas fa-users-cog"></i>
								<p>Liên hệ khách hàng</p>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php echo $activeArr['productActive']; echo $activeArr['stockActive']; echo $activeArr['featureActive']; ?>" href="index.php?page=admin&controller=products&action=index">
								<i class="nav-icon fas fa-cube"></i>
								<p>Quản lý Sản phẩm
								<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a class="nav-link <?php echo $activeArr['productActive']; ?>" href="index.php?page=admin&controller=products&action=index">
										<i class="far fa-circle nav-icon"></i>
										<p>Quản lý Sản phẩm</p>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link <?php echo $activeArr['stockActive']; ?>" href="index.php?page=admin&controller=stocks&action=index">
										<i class="far fa-circle nav-icon"></i>
										<p>Quản lý Số lượng</p>
									</a>
								</li>
								<li class="nav-item">	
									<a class="nav-link <?php echo $activeArr['featureActive']; ?>" href="index.php?page=admin&controller=features&action=index">
										<i class="far fa-circle nav-icon"></i>
										<p>Quản lý Feature</p>
									</a>
								</li>
								<li class="nav-item">	
									<a class="nav-link <?php echo $activeArr['couponActive']; ?>" href="index.php?page=admin&controller=coupons&action=index">
										<i class="far fa-circle nav-icon"></i>
										<p>Quản lý Coupons</p>
									</a>
								</li>
							</ul>
						</li>
						
						<!-- <li class="nav-item">
							<a class="nav-link" href="index.php?page=admin&controller=stocks&action=index">
								<i class="nav-icon fas fa-sort-amount-up"></i>
								<p>Quản lý Số lượng</p>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php?page=admin&controller=features&action=index">
								<i class="nav-icon fa fa-star"></i>
								<p>Quản lý Feature</p>
							</a>
						</li> -->
						<li class="nav-item">
							<a class="nav-link <?php echo $activeArr['cartActive']; ?>" href="index.php?page=admin&controller=carts&action=index">
								<i class="nav-icon fa fa-luggage-cart"></i>
								<p>Quản lý Giỏ hàng</p>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php echo $activeArr['newsActive']; ?>" href="index.php?page=admin&controller=news&action=index">
								<i class="nav-icon fa fa-file" aria-hidden="true"></i>
								<p>Quản lý tin tức</p>
							</a>
						</li>
						<!-- <li class="nav-item">
							<a class="nav-link" href="index.php?page=admin&controller=company&action=index">
								<i class="nav-icon fa fa-newspaper" aria-hidden="true"></i>
								<p>Danh sách chi nhánh</p>
							</a>
						</li> -->
					</ul>
					<!-- Content Wrapper. Contains page content-->
				</nav>
            </div>
        </aside>