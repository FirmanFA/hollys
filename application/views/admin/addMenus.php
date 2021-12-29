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
    
    <ul class="navi">
        <li><a href="<?php echo base_url('admin/menus'); ?>">Menus</a></li>
        <li><a href="<?php echo base_url('admin/menus/addMenus'); ?>">Tambah Data Menu</a></li>
    </ul>
    <br><br>

    <h3>Tambah Data Mahasiswa</h3>

    <form action="<?php echo base_url('admin/menus/addMenusFunc'); ?>" method="post">
        <!-- id : <br><input type="number" name="id" id="id" required><br><br> -->
        name : <br><input type="text" name="name" id="name" required><br><br>
        type : <br>
        <input type="radio" name="type" id="type-1" value="foods" required>foods <br>
        <input type="radio" name="type" id="type-2" value="drinks">drinks <br>
        <input type="radio" name="type" id="type-3" value="snacks">snacks <br>
        <br><br>
        price : <br><input type="number" name="price" id="price" required><br><br>
        image : <br><input type="text" name="image" id="image" required><br><br>
        created_at : <br><input type="date" name="created_at" id="created_at" required><br><br>
        <button type="submit">submit</button>
    </form>
    
</body>
</html>