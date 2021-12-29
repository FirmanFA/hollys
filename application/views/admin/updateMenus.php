<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style.css') ?>">
    <title>Edit Data</title>
</head>
<body>

    <h3>Edit Data Mahasiswa</h3>

    <form action="<?php echo base_url('admin/menus/updateMenusFunc'); ?>" method="post">        
        id : <br><input type="number" name="id" id="id" value="<?php echo $queryDetailMenus->id ?>" readonly><br><br> <!-- readonly karena gak perlu diubah -->
        name : <br><input type="text" name="name" id="name" value="<?php echo $queryDetailMenus->name ?>" required><br><br>
        type : <br>
        <input type="radio" name="type" id="type-1" value="foods" required>foods <br>
        <input type="radio" name="type" id="type-2" value="drinks">drinks <br>
        <input type="radio" name="type" id="type-3" value="snacks">snacks <br>
        <br><br>
        price : <br><input type="number" name="price" id="price" value="<?php echo $queryDetailMenus->price ?>" required><br><br>
        image : <br><input type="text" name="image" id="image" value="<?php echo $queryDetailMenus->image ?>" required><br><br>
        created_at : <br><input type="date" name="created_at" id="created_at" value="<?php echo $queryDetailMenus->created_at ?>" readonly><br><br> 
        updated_at : <br><input type="date" name="updated_at" id="updated_at" value="<?php echo $queryDetailMenus->updated_at ?>" required><br><br>
        <button type="submit">submit</button>
    </form>
    
</body>
</html>