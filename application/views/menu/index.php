<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	<style type="text/css">
		* {
			margin: 0;
			padding: 0;
		}

		h3.text-title {
			font-size: 24px;
			color: black;
			margin-bottom: 20px;
			margin-top: 20px;
			padding-left: 20px;
		}

		.img-wrapper {
			height: 200px;
			width: 100%;
			object-fit: contain;
		}

		img {
			width: 100%;
			height: 100%;
			object-fit: cover;
		}

		.card {
			width: 100%;

		}

		.card-body {
			display: flex;
			justify-content: space-between;
		}

		.active {
			background-color: orange !important;
		}

		.active.title {
			background-color: unset !important;
		}

		.nav-link {
			color: black;
		}

		.nav-link:hover {
			color: white;
			background-color: #ffb800;
		}

		.choose-button {
			margin: auto 0;
		}

		.carousel-image {
			height: 500px;
		}
	</style> 
	<title><?php echo $title ?></title>
</head>

<body>
	<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="assets/images/background/makanan.jpg" class="d-block w-100 carousel-image" alt="...">
			</div>
			<div class="carousel-item">
				<img src="assets/images/background/camilan.jpg" class="d-block w-100 carousel-image" alt="...">
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-3 mt-5 pt-4">
				<div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Foods</button>
					<button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Drinks</button>
					<button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Snacks</button>
				</div>
			</div>
			<div class="col-9 tab-content" id="v-pills-tabContent">
				<div class="tab-pane fade show active title" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
					<h3 class="text-title text-center">SILAHKAN PILIH MENU MAKANAN ANDA</h3>
					<div class="row">
						<?php foreach ($foods as $food) { ?>
							<div class="col-4 ps-2 pe-2 pb-4">
								<div class="card">
									<div class="img-wrapper">
										<img src="<?php echo base_url() . 'assets/images/menu/' . $food->image ?>" class="card-img-top" alt="...">
									</div>
									<div class="card-body d-flex">
										<div class="pe-3">
											<h5 class="card-title"><?php echo $food->name ?></h5>
											<p class="card-text">Rp<?php echo $food->price ?></p>
										</div>
										<a href="<?php echo base_url('cart/add/'.$food->id) ?>" class="btn btn-warning choose-button">Pilih</a>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="tab-pane fade title" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
					<h3 class="text-title text-center">SILAHKAN PILIH MENU MINUMAN ANDA</h3>
					<div class="row">
						<?php foreach ($drinks as $drink) { ?>
							<div class="col-4 ps-2 pe-2 pb-4">
								<div class="card">
									<div class="img-wrapper">
										<img src="<?php echo base_url() . 'assets/images/menu/' . $drink->image ?>" class="card-img-top" alt="...">
									</div>
									<div class="card-body d-flex">
										<div class="pe-3">
											<h5 class="card-title"><?php echo $drink->name ?></h5>
											<p class="card-text">Rp<?php echo $drink->price ?></p>
										</div>
										<a href="<?php echo base_url('cart/add/'.$drink->id) ?>" class="btn btn-warning choose-button">Pilih</a>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="tab-pane fade title" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
					<h3 class="text-title text-center">SILAHKAN PILIH MENU CAMILAN ANDA</h3>
					<div class="row">
						<?php foreach ($snacks as $snack) { ?>
							<div class="col-4 ps-2 pe-2 pb-4">
								<div class="card">
									<div class="img-wrapper">
										<img src="<?php echo base_url() . 'assets/images/menu/' . $snack->image ?>" class="card-img-top" alt="...">
									</div>
									<div class="card-body d-flex">
										<div class="pe-3">
											<h5 class="card-title"><?php echo $snack->name ?></h5>
											<p class="card-text">Rp<?php echo $snack->price ?></p>
										</div>
										<a href="<?php echo base_url('cart/add/'.$snack->id) ?>" class="btn btn-warning choose-button">Pilih</a>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>

			</div>
		</div>
	</div>

	<script>
		feather.replace()
	</script>
</body>

</html>
