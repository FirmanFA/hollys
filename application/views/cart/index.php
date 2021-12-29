<div class="pt-5 mt-4">
	<div class="cart-wrapper">
		<div class="container">
			<!-- code -->
			<div class="cart-header">
				<a href="<?php echo base_url('menu') ?>" class="back">
					<i class="fas fa-arrow-left"></i>
				</a>
				<h5>Pesanan Saya</h5>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="sub-header mt-4">
			<p class="total-item">Semua(<?php echo count($dataOrders) ?>)</p>
		</div>
	</div>
	<hr>

	<?php if ($dataOrders) { ?>
	<div class="container mt-3">
		<?php foreach ($dataOrders as $data) { ?>
			<div class="cart-body mt-4">
				<div class="cart-img-wrapper">
					<img src="<?php echo base_url() . 'assets/images/menu/' . $data->image ?>" alt="">
				</div>

				<div class="cart-detail">
					<h5><?php echo $data->name ?></h5>
					<p>Rp <?php echo $data->price ?></p>
					<p><?php echo $data->qty ?></p>
				</div>

				<div class="button-delete">
					<a href="<?php echo base_url('cart/delete/' . $data->id) ?>" class="btn btn-danger">Delete</a>
				</div>
			</div>
		<?php } ?>
	</div>
  <?php } else { ?>
		<div class="card-body mt-4">
			<h5 class="text-center">Anda belum melakukan pemesanan</h5>
		</div>
	<?php } ?>

	<div class="container mb-2">
		<hr class="mt-5">
		<div class="cart-footer">
			<?php foreach ($order as $row) { ?>
				<h5>Total: Rp<?php echo $row->sub_total ?></h5>
				<a href="<?php echo base_url('cart/checkout/' . $row->id) ?>" class="button-checkout">Checkout</a>
			<?php } ?>
		</div>
	</div>
</div>
