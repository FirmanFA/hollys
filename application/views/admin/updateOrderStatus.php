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
    <h3>Edit Status Order</h3>
    <!-- <pre>
        <?php print_r($queryDetailOrders) ?>
    </pre> -->

    <form action="<?php echo base_url('admin/Orders/updateOrdersFunc'); ?>" method="post">        
        id : <br><input type="number" name="id" id="id" value="<?php echo $queryDetailOrders[0]->id ?>" readonly><br><br> <!-- readonly karena gak perlu diubah -->
        status : <br>
        <input type="radio" name="status" id="status-1" value="unpaid" required>unpaid <br>
        <input type="radio" name="status" id="status-2" value="paid">paid <br>
        <input type="radio" name="status" id="status-3" value="canceled">canceled <br>
        <br><br>
        <button type="submit">submit</button>
    </form>
    
</body>
</html>