<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style.css') ?>">
    <title>Tambah Data</title>
</head>
<body>
	<ul class="sidenav">
		<li><a href="<?php echo base_url('admin/Superadmin'); ?>">Admin</a></li>
		<li><a href="<?php echo base_url('admin/Superadmin/addAdmin'); ?>">Tambah Data Admin</a></li>
	</ul>
	<br><br>

    <h3>Tambah Data Order</h3>

    <form action="<?php echo base_url('admin/Superadmin/addAdminFunc'); ?>" method="post">
        <!-- id : <br><input type="number" name="id" id="id" required><br><br> -->
        namadepan : <br><input type="text" name="namadepan" id="namadepan" required><br><br>
        namabelakang : <br><input type="text" name="namabelakang" id="namabelakang"><br><br>
        email : <br><input type="email" name="email" id="email" required><br><br>
        image : <br><input type="text" name="image" id="image" value="default.jpg" required><br><br>
        password : <br><input type="password" name="password" id="password" required><br><br>
        nohp : <br><input type="text" name="nohp" id="nohp" required><br><br>
        alamat : <br><input type="text" name="alamat" id="alamat" required><br><br>
        <button type="submit">submit</button>
    </form>
    
</body>
</html>