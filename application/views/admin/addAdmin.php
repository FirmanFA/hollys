
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <h3>Tambah Data Admin</h3>

    <?php echo form_open_multipart('admin/Superadmin/addAdminFunc');?>
        <!-- id : <br><input type="number" name="id" id="id" required><br><br> -->

        <div class="form-group">
            <label for="namadepan">Nama Depan</label>
            <input class="form-control" type="text" name="namadepan" id="namadepan" required>
        </div>
        <div class="form-group">
            <label for="namabelakang">Nama Belakang</label>
            <input class="form-control" type="text" name="namabelakang" id="namabelakang" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input class="form-control" type="text" name="image" id="image" value="default.jpg" readonly>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" required>
        </div>
        <div class="form-group">
            <label for="nohp">NoHp</label>
            <input class="form-control" type="text" name="nohp" id="nohp" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input class="form-control" type="text" name="alamat" id="alamat" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


    </div>
<!-- /.container-fluid -->