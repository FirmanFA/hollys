<form class="form-container register-form" method="post" action="<?php echo base_url('auth/register'); ?>">
    <h3 class="textJudul mb-4"><b>Daftar</b></h3>

    <div class="row">
        <div class="col-md-6">
            <!-- input nama depan -->
            <div class="mb-2">
                <label for="namadepan" class="form-label textForm">Nama Depan</label>
                <input type="text" class="form-control" id="namadepan" name="namadepan" value="<?php echo set_value('namadepan') ?>">
                <!-- error jika tidak mengisi field input nama depan -->
                <?php echo form_error('namadepan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="col-md-6">
            <!-- input nama belakang -->
            <div class="mb-2">
                <label for="namabelakang" class="form-label textForm">Nama Belakang</label>
                <input type="text" class="form-control" id="namabelakang" name="namabelakang" value="<?php echo set_value('namabelakang') ?>">
                <!-- error jika tidak mengisi field input nama belakang -->
                <?php echo form_error('namabelakang', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
    </div>
    <!-- input alamat email -->
    <div class="mb-2">
        <label for="email" class="form-label textForm">Email</label>
        <div class="input-group">
            <div class="input-group-text" id="btnGroupAddon1"><i class="fas fa-envelope-open"></i></div>
            <input type="email" class="form-control" id="email" name="email">
            <!-- error jika memasukkan email yang tidak valid -->
            <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
        </div>
    </div>
    <!-- input kata sandi -->
    <div class="row">
        <div class="col-sm-6">
            <div class="mb-2">
                <label for="password1" class="form-label textForm">Kata Sandi</label>
                <div class="input-group">
                    <div class="input-group-text" id="btnGroupAddon2"><i class="fas fa-lock"></i></div>
                    <input type="password" class="form-control" id="password1" name="password1">
                    <?php echo form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="mb-2">
                <label for="password2" class="form-label textForm">Ulangi Kata Sandi</label>
                <div class="input-group">
                    <div class="input-group-text" id="btnGroupAddon2"><i class="fas fa-lock"></i></div>
                    <input type="password" class="form-control" id="password2" name="password2">
                </div>
            </div>
        </div>
    </div>
    <!-- input no. HP -->
    <div class="row">
        <div class="col-md-4">
            <div class="mb-2">
                <label for="nohp" class="form-label textForm">No. HP</label>
                <div class="input-group">
                    <div class="input-group-text" id="btnGroupAddon3"><i class="fas fa-mobile-alt"></i></div>
                    <input type="text" class="form-control" id="nohp" name="nohp">
                </div>
            </div>
        </div>
        <!-- input alamat rumah -->
        <div class="col-md-8">
            <div class="mb-2">
                <label for="alamat" class="form-label textForm">Alamat</label>
                <div class="input-group">
                    <div class="input-group-text" id="btnGroupAddon4"><i class="fas fa-home"></i></div>
                    <input type="text" class="form-control" id="alamat" name="alamat">
                </div>
            </div>
        </div>
    </div>
    <!-- check box persetujuan layanan -->
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="check" required="required">
        <label class="form-check-label textForm" for="check">Saya menyetujui persyaratan dan ketentuan yang berlaku</label>
    </div>
    <!-- submit button -->
    <div class="d-grid mt-4">
        <button type="submit" class="btn btn-success">Daftar</button>
    </div>
    <div class="login mt-1">
        <span class="textForm">Sudah punya Akun? <a class="textForm textHover" href="<?php echo base_url() . 'auth' ?>">Masuk</a></span>
    </div>
</form>