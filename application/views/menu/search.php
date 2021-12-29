<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
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
	</style>
</head>
<body>

<div class="container">
	<div class="pt-5 mt-5">
		<h3>Menu "<?php echo $search ?>"</h3>
	</div>
	<div class="row pt-4">
		<?php foreach ($menus as $menu) { ?>
			<div class="col-4 ps-2 pe-2 pb-4">
				<div class="card">
					<div class="img-wrapper">
						<img src="<?php echo base_url() . 'assets/images/menu/' . $menu->image ?>" class="card-img-top" alt="...">
				</div>
				<div class="card-body d-flex">
					<div class="pe-3">
						<h5 class="card-title"><?php echo $menu->name ?></h5>
						<p class="card-text">Rp<?php echo $menu->price ?></p>
					</div>
					<a href="<?php echo base_url('cart/add/' . $menu->id) ?>" class="btn btn-warning choose-button">Pilih</a>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
</div>
