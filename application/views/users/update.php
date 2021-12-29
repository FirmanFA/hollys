<div class="container" style="margin-top: 90px;">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <h4 class="alert alert-warning">Update Profil Saya</h4>

      <?php echo form_open_multipart('users/update'); ?>

      <!-- edit nama depan -->
      <div class="form-group row mt-5 mb-2">
        <label class="col-sm-3 control-label text-right" for="namadepan">Nama Depan</label>
        <div class="col-sm-9">
          <input type="text" name="namadepan" id="namadepan" class="form-control" value="<?php echo $users['namadepan']; ?>">
          <!-- error jika tidak memasukkan nama depan -->
          <?php echo form_error('namadepan', '<small class="text-danger">', '</small>'); ?>
        </div>
      </div>

      <!-- edit nama belakang -->
      <div class="form-group row mb-2">
        <label class="col-sm-3 control-label text-right" for="namabelakang">Nama Belakang</label>
        <div class="col-sm-9">
          <input type="text" name="namabelakang" id="namabelakang" class="form-control" value="<?php echo $users['namabelakang']; ?>">
          <!-- error jika tidak memasukkan nama belakang -->
          <?php echo form_error('namabelakang', '<small class="text-danger">', '</small>'); ?>
        </div>
      </div>
      <!-- edit email (disabled) -->
      <div class="form-group row mb-2">
        <label class="col-sm-3 control-label text-right" for="email">Email</label>
        <div class="col-sm-9">
          <input type="email" name="email" id="email" class="form-control" value="<?php echo $users['email']; ?>" readonly disabled>
        </div>
      </div>
      <!-- edit no. hp -->
      <div class="form-group row mb-2">
        <label class="col-sm-3 control-label text-right" for="nohp">No. HP</label>
        <div class="col-sm-9">
          <input type="text" name="nohp" id="nohp" class="form-control" value="<?php echo $users['nohp']; ?>">
          <!-- error jika tidak memasukkan no hp -->
          <?php echo form_error('nohp', '<small class="text-danger">', '</small>'); ?>
        </div>
      </div>
      <!-- edit alamat -->
      <div class="form-group row mb-2">
        <label class="col-sm-3 control-label text-right" for="alamat">Alamat</label>
        <div class="col-sm-9">
          <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $users['alamat']; ?>">
          <!-- error jika tidak memasukkan alamat -->
          <?php echo form_error('alamat', '<small class="text-danger">', '</small>'); ?>
        </div>
      </div>
      <!-- edit gambar profil -->
      <div class="form-group row mb-2">
        <div class="col-sm-3">Gambar</div>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-sm-9">
              <img src="<?php echo base_url('assets/images/profile/') . $users['image']; ?>" class="rounded">
            </div>
            <div class="mt-3">
              <input class="form-control" type="file" id="image" name="image">
            </div>
          </div>
        </div>
      </div>

      <!-- save button -->
      <div class="form-group row mt-5">
        <button type="submit" name="submit" class="btn btn-warning btn-lg" >
          <i class="fa fa-save"></i>
          Simpan
        </button>
      </div>

      </form>

    </div>
  </div>
</div>