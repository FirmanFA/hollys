 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Data Order</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Total Order</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Detail Order</th>
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($queryAllOrders as $row){ ?>
                        <tr>
                            <td><?php echo $row->id ?> <br></td>
                            <td><?php echo $row->namadepan.' '.$row->namabelakang ?> <br></td>
                            <td><?php echo $row->sub_total ?> <br></td>
                            <td><?php echo $row->created_at ?> <br></td>
                            <td><?php echo $row->status ?> <br></td>
                            <td> <a href="<?php echo base_url('admin/orders/detailOrder'); ?>/<?php echo $row->id; ?>">View Detail Order</a></td>
							<td><a href="<?php echo base_url('admin/Orders/updateOrderStatus'); ?>/<?php echo $row->id; ?>" 
                                    class="btn btn-sm btn-primary shadow-sm">
                                    <i class="fas fa-edit fa-sm text-white-50"></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->