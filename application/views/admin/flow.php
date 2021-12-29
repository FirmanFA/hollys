<div>
		<a class="logout-button" aria-current="page" href="<?php echo base_url().'auth/logout' ?>"><i class="">logout</i></a>
	</div>
	<br><br><br>

	<ul class="topnav">
		<li><a href="<?php echo base_url('admin/Superadmin') ?>">Manage admin</a></li>
		<li><a href="<?php echo base_url('admin/Menus') ?>">Manage Menus</a></li>
		<li><a href="<?php echo base_url('admin/Orders') ?>">Manage Orders</a></li>
	</ul>
	<ul class="sidenav">
		<li><a href="<?php echo base_url('admin/menus'); ?>">Menus</a></li>
		<li><a href="<?php echo base_url('admin/menus/addMenus'); ?>">Tambah Data Menu</a></li>
	</ul>

	<strong>order details</strong><br>
            <?php foreach ($queryOrderDetail as $row2) { ?>
                <?php  if ($row1->id == $row2->order_id) { ?>
                    id : <?php echo $row2->id ?> <br>
                    order_id : <?php echo $row2->order_id ?> <br>
                    menu_id : <?php echo $row2->menu_id ?> <br>
                    qty : <?php echo $row2->qty ?> <br>
                    price : <?php echo $row2->price ?> <br>
                    Created at	: <?php echo $row2->created_at ?> <br>
                    Updated at	: <?php echo $row2->updated_at ?> <br>
                <?php }?>
            <?php } ?>

			status	: <?php echo $row1->status ?> --- <a href="<?php echo base_url('admin/Orders/updateOrderStatus'); ?>/<?php echo $row1->id; ?>">Update</a><br>