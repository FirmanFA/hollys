<div class="container">
	<?php foreach ($menu as $row) { ?>
		<form action="<?php echo base_url('cart/create/'.$row->id) ?>" method="post" class="row mt-5 pt-5 h-full">
			<div class="col-4">
				<div class="img-wrapper">
					<img src="<?php echo base_url() . 'assets/images/menu/' . $row->image ?>" class="card-img-top" alt="...">
				</div>
			</div>
			<div class="col-8">
				<h5 class="card-title"><?php echo $row->name ?></h5>
				<p class="card-text">Rp<?php echo $row->price ?></p>
				<form action="<?php echo base_url('cart/post/' . $row->id) ?>" method="post">
					<input type="number" name="qty" placeholder="jumlah" />
				</form>
				<button type="submit" class="btn btn-warning choose-button">Pesan</button>
			</div>
		</form>
		<?php } ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
	feather.replace()
</script>
</body>

</html>
