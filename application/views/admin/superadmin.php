<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data User</h1>
    <a href="<?php echo base_url('admin/Superadmin/addAdmin'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>No Hp</th>
                        <th>Alamat</th>
                        <th>Is Active</th>
                        <th>Role Id</th>
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($queryAllAdmin as $row){ ?>
                        <tr>
                            <td><?php echo $row->id ?> </td>
                            <td><?php echo "$row->namadepan $row->namabelakang"  ?> </td>
                            <td><?php echo $row->email ?> </td>
                            <td><img class="img-fluid"
                                    src="<?php echo base_url('assets/images/profile/') . $row->image; ?>"
                                    width="150" height="150"></td>
                            <td><?php echo $row->nohp ?> </td>
                            <td><?php echo $row->alamat ?> </td>
                            <td><?php echo $row->is_active ?> </td>
                            <td><?php echo $row->role_id ?> </td>
                            <td><a href="<?php echo base_url('admin/Superadmin/updateAdmin'); ?>/<?php echo $row->id ?>" 
                                    class="btn btn-sm btn-primary shadow-sm">
                                    <i class="fas fa-edit fa-sm text-white-50"></i></a>
                                <a href="<?php echo base_url('admin/Superadmin/deleteAdminFunc'); ?>/<?php echo $row->id ?>" 
                                    class="btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-trash fa-sm text-white-50"></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->