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

    <h3>Update Data Admin</h3>

    <form action="<?php echo base_url('admin/Superadmin/updateAdminFunc'); ?>" method="post">
        id : <br><input type="number" name="id" id="id" value="<?php echo $queryDetailAdmin->id ?>" readonly><br><br>
        namadepan : <br><input type="text" name="namadepan" id="namadepan" value="<?php echo $queryDetailAdmin->namadepan ?>" required><br><br>
        namabelakang : <br><input type="text" name="namabelakang" id="namabelakang" value="<?php echo $queryDetailAdmin->namabelakang ?>"><br><br>
        email : <br><input type="email" name="email" id="email" value="<?php echo $queryDetailAdmin->email ?>" required><br><br>
        image : <br><input type="text" name="image" id="image" value="<?php echo $queryDetailAdmin->image ?>" required><br><br>
        password : <br><input type="password" name="password" id="password" required><br><br>
        nohp : <br><input type="text" name="nohp" id="nohp" value="<?php echo $queryDetailAdmin->nohp ?>" required><br><br>
        alamat : <br><input type="text" name="alamat" id="alamat" value="<?php echo $queryDetailAdmin->alamat ?>" required><br><br>
        <button type="submit">submit</button>
    </form>
    
</body>
</html>