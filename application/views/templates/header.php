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
			<a class="navbar-brand" href="<?php echo base_url() ?>">
				<img src="<?php echo base_url('assets/images/logo.png') ?>" alt="">
			</a>
			<!-- end logo perusahaan -->
			<!-- menu header -->
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
					<!-- daftar -->
					<li class="nav-item me-3">
						<a class="btn btn-sm btn-light" aria-current="page" href="<?php echo base_url() . 'auth/register' ?>">Register</a>
					</li>
					<!-- masuk -->
					<li class="nav-item">
						<a class="btn btn-sm btn-light" aria-current="page" href="<?php echo base_url() . 'auth' ?>">Login</a>
					</li>
				</ul>
			</div>
			<!-- end menu header -->
		</div>
	</nav>
	<!-- end header -->
