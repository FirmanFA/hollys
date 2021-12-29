<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style.css') ?>">
	<title>Admin Admin</title>
</head>
<body>
	<!-- keluar/logout -->
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
		<li><a href="<?php echo base_url('admin/Superadmin'); ?>">Admin</a></li>
		<li><a href="<?php echo base_url('admin/Superadmin/addAdmin'); ?>">Tambah Data Admin</a></li>
	</ul>
	<br><br>
	
	<h1>Admin</h1>

	<?php foreach($queryAllAdmin as $row){ ?>
		<div class="menu-item">
			ID		: <?php echo $row->id ?> <br>
			Name 	: <?php echo "$row->namadepan $row->namabelakang"  ?> <br>
			email	: <?php echo $row->email ?> <br>
			Image	: <?php echo $row->image ?> <br>
			password	: <?php echo $row->password ?> <br>
			nohp	: <?php echo $row->nohp ?> <br>
			alamat	: <?php echo $row->alamat ?> <br>
			role_id	: <?php echo $row->role_id ?> <br>
			is_active	: <?php echo $row->is_active ?> <br>
			Created at	: <?php echo $row->created_at ?> <br>
			<br>
			<table>
				<tr>
					<td><a href="<?php echo base_url('admin/Superadmin/updateAdmin'); ?>/<?php echo $row->id ?>">Edit</a></td>
					<td><a href="<?php echo base_url('admin/Superadmin/deleteAdminFunc'); ?>/<?php echo $row->id ?>">Hapus</a></td>
				</tr>
			</table>
		</div>
	<br>
	<?php } ?>
	<br><br>
</body>
</html>