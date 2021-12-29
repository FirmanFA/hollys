<div class="container" style="margin-top: 90px;">
  <div class="row justify-content-center">
    <div class="col-sm-9">
      <h4 class="alert alert-warning">Profil Saya</h4>

      <div class="row">
        <div class="col-sm-9">
          <?php echo $this->session->flashdata('messages'); ?>
        </div>
      </div>

      <form method="post" action="<?php echo base_url('admin/admin/updateProfile'); ?>">
        <p class="text-center">
          <img src="<?php echo base_url('assets/images/profile/') . $users['image']; ?>" class="rounded" alt="...">
        </p>

        <div class="form-group row mb-2">
          <label class="col-sm-3 control-label text-right">Nama Depan</label>
          <div class="col-sm-9">
            <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $users['namadepan']; ?>" readonly disabled>
          </div>
        </div>

        <div class="form-group row mb-2">
          <label class="col-sm-3 control-label text-right">Nama Belakang</label>
          <div class="col-sm-9">
            <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $users['namabelakang']; ?>" readonly disabled>
          </div>
        </div>

        <div class="form-group row mb-2">
          <label class="col-sm-3 control-label text-right">Email</label>
          <div class="col-sm-9">
            <input type="email" name="email" class="form-control" value="<?php echo $users['email']; ?>" readonly disabled>
          </div>
        </div>

        <div class="form-group row mb-2">
          <label class="col-sm-3 control-label text-right">No. HP</label>
          <div class="col-sm-9">
            <input type="text" name="nohp" class="form-control" value="<?php echo $users['nohp']; ?>" readonly disabled>
          </div>
        </div>

        <div class="form-group row mb-2">
          <label class="col-sm-3 control-label text-right">Alamat</label>
          <div class="col-sm-9">
            <input type="text" name="alamat" class="form-control" value="<?php echo $users['alamat']; ?>" readonly disabled>
          </div>
        </div>

        <div class="form-group row mt-5">
          <button type="submit" name="submit" class="btn btn-warning btn-lg">
            <i class="fas fa-user-edit"></i> Edit Profil
          </button>
        </div>
      </form>
    </div>

  </div>
</div>