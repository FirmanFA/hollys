<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- Additional CSS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">
	<!-- fontawesome -->
	<link rel="stylesheet" href="<?php echo base_url('assets/fontawesome-free-5.15.4-web/css/all.css') ?>">
	<script src="https://unpkg.com/feather-icons"></script>

	<title><?php echo $title ?></title>
</head>

<body>
	<!-- header -->
	<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-warning">
		<div class="container">
			<!-- logo perusahaan -->
			<a class="navbar-brand" href="<?php echo base_url().'users' ?>">
				<img src="<?php echo base_url('assets/images/logo.png') ?>" alt="">
			</a>
			<!-- end logo perusahaan -->
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<!-- kotak pencarian -->
			<form class="d-flex ms-auto my-4 my-lg-0" method="post" action="<?php echo base_url('menu/search') ?>">
				<input name="search" class="form-control search-box me-3" type="search" placeholder="Cari Menu..." aria-label="Search">
				<button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
			</form>
			<!-- end kotak pencarian -->

			<!-- menu header -->
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">

				
					<!-- Cart -->
					<li class="nav-item me-5 position-relative">
						<a class="cart" aria-current="page" href="<?php echo base_url() . 'cart' ?>">
							<i data-feather="shopping-cart"></i>
							<span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
								<span class="visually-hidden">New alerts</span>
							</span>
						</a>
					</li>
					<!-- profil user -->
					<li class="nav-item me-3">
						<a class="btn btn-sm btn-light" aria-current="page" href="<?php echo base_url().'users/profile' ?>"><i class="fas fa-user"></i></a>
					</li>
					<!-- keluar/logout -->
					<li class="nav-item me-3">
						<a class="btn btn-sm btn-light" aria-current="page" href="<?php echo base_url().'auth/logout' ?>"><i class="fas fa-sign-out-alt"></i></a>
					</li>
				</ul>
			</div>
			<!-- end menu header -->
		</div>
	</nav>
	<!-- end header -->
