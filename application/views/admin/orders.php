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
                            <td><?php echo $row->status ?> <br></td>
                            <td><?php echo $row->created_at ?> <br></td>
                            <td>View Detail Order</td>
							<td><select name="status" id="status">
								<option value="paid">Unpaid</option>
								<option value="paid">Paid</option>
								<option value="paid">Process</option>
								<option value="paid">On The Way</option>
								<option value="paid">Sent</option>
							</select></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->