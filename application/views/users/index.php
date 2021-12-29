<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Additional CSS -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/style.css' ?>">

  <title><?php echo $title ?></title>
</head>

<body>

  <div id="carouselExampleSlidesOnly" class="carousel slide pt-5 mt-2" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?php echo base_url() . 'assets/images/hollys.png' ?>" class="d-block w-100" alt="...">
      </div>
    </div>
  </div>
	<div class="image-wrapper">
		<img src="<?php echo base_url() . 'assets/images/eat&happy.png' ?>" class="d-block w-100" alt="...">
	</div>
  
  <!-- kategori makanan -->
  <div class="container mt-4">
    <div class="judul-kategori" style="background-color: #ffca2c; padding: 5px 10px;">
      <h5 class="text-center" style="margin-top: 5px;">KATEGORI</h5>
    </div>
  </div>

  <div class="container mt-4">
    <div class="row">
      <!-- Makanan -->
      <div class="col-md-4">
        <div class="card text-center" style="width: 18rem;">
          <img src="<?php echo base_url() . 'assets/images/menu/makanan6.jpg' ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Makanan</h5>
            <p class="card-text">Terdapat bermacam menu makanan di Holly's.</p>
            <a href="<?php echo base_url('menu') ?>" class="btn btn-outline-warning d-grid"><i class="fas fa-utensils"> Lihat Makanan</i></a>
          </div>
        </div>
      </div>
      <!-- Minuman -->
      <div class="col-md-4">
        <div class="card text-center" style="width: 18rem;">
          <img src="<?php echo base_url() . 'assets/images/menu/minuman6.jpeg' ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Minuman</h5>
            <p class="card-text">Terdapat bermacam menu minuman di Holly's.</p>
            <a href="<?php echo base_url('menu') ?>" class="btn btn-outline-warning d-grid"><i class="fas fa-wine-glass"> Lihat Minuman</i></a>
          </div>
        </div>
      </div>
      <!-- Camilan -->
      <div class="col-md-4">
        <div class="card text-center" style="width: 18rem;">
          <img src="<?php echo base_url() . 'assets/images/menu/camilan2.jpg' ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Camilan</h5>
            <p class="card-text">Terdapat bermacam camilan di Holly's</p>
            <a href="<?php echo base_url('menu') ?>" class="btn btn-outline-warning d-grid"><i class="fas fa-hamburger"> Lihat Camilan</i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
