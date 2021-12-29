 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Menu</h1>
    <a href="<?php echo base_url('admin/menus/addMenus'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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
                        <th>Type</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($queryAllMenus as $row){ ?>
                        <tr>
                            <td><?php echo $row->id ?> <br></td>
                            <td><?php echo $row->name ?> <br></td>
                            <td><?php echo $row->type ?> <br></td>
                            <td><?php echo $row->price ?> <br></td>
                            <td>
                                <img class="img-fluid"
                                    src="<?php echo base_url('assets/images/menu/') . $row->image; ?>"
                                    width="150" height="150">
                            </td>
                            <td><a href="<?php echo base_url('admin/menus/updateMenus'); ?>/<?php echo $row->id ?>" 
                                    class="btn btn-sm btn-primary shadow-sm">
                                    <i class="fas fa-edit fa-sm text-white-50"></i></a>
                                <a href="<?php echo base_url('admin/menus/deleteMenusFunc'); ?>/<?php echo $row->id ?>" 
                                    class="btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-trash fa-sm text-white-50"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->