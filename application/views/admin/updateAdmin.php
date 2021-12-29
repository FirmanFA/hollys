
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <h3>Ubah Data Admin</h3>

    <?php echo form_open_multipart('admin/Superadmin/updateAdminFunc');?>
        <!-- id : <br><input type="number" name="id" id="id" required><br><br> -->

        <div class="form-group">
            <label for="id">ID</label>
            <input class="form-control" type="number" name="id" id="id" value="<?php echo $queryDetailAdmin->id ?>" readonly>
        </div>
        <div class="form-group">
            <label for="namadepan">Nama Depan</label>
            <input class="form-control" type="text" name="namadepan" id="namadepan" value="<?php echo $queryDetailAdmin->namadepan ?>" required>
        </div>
        <div class="form-group">
            <label for="namabelakang">Nama Belakang</label>
            <input class="form-control" type="text" name="namabelakang" id="namabelakang" value="<?php echo $queryDetailAdmin->namabelakang ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" value="<?php echo $queryDetailAdmin->email ?>" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input class="form-control" type="text" name="image" id="image" value="<?php echo $queryDetailAdmin->image ?>" readonly>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" required>
        </div>
        <div class="form-group">
            <label for="nohp">NoHp</label>
            <input class="form-control" type="text" name="nohp" id="nohp" value="<?php echo $queryDetailAdmin->nohp ?>" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input class="form-control" type="text" name="alamat" id="alamat" value="<?php echo $queryDetailAdmin->alamat ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


    </div>
<!-- /.container-fluid -->