

 <!-- Begin Page Content -->
 <div class="container-fluid">
    <h3>Ubah Status Order</h3>

    <form action="<?php echo base_url('admin/Orders/updateOrdersFunc'); ?>" method="post">
        <!-- id : <br><input type="number" name="id" id="id" required><br><br> -->

        <div class="form-group">
            <label for="id">ID</label>
            <input class="form-control" type="number" name="id" id="id" value="<?php echo $queryDetailOrders[0]->id ?>" readonly>
        </div>
        <div class="form-group">
            <label for="status">Order Status</label><br>
            <input type="radio" name="status" id="status-1" value="unpaid" required>unpaid <br>
            <input type="radio" name="status" id="status-2" value="paid">paid <br>
            <input type="radio" name="status" id="status-3" value="canceled">canceled <br>
            <input type="radio" name="status" id="status-4" value="sent">Sent <br>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


    </div>
<!-- /.container-fluid -->
