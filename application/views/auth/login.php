<div class="container">

    <div class="messages mt-2">
        <?php echo $this->session->flashdata('message'); ?>
    </div>

    <form class="form-container login-form" method="post" action="<?php echo base_url('auth'); ?>">
        <!-- judul form -->
        <h3 class="textJudul mb-4"><b>Masuk</b></h3>
        <!-- isi form login -->
        <div class="mb-3">
            <!-- input email pengguna -->
            <label for="email" class="form-label textForm">Email</label>
            <div class="input-group">
                <div class="input-group-text" id="btnGroupAddon1"><i class="fas fa-envelope-open"></i></div>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email') ?>">
                <!-- error jika tidak memasukkan email yang valid -->
                <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>
        <div class="mb-3">
            <!-- input kata sandi -->
            <label for="password" class="form-label textForm">Kata Sandi</label>
            <div class="input-group">
                <div class="input-group-text" id="btnGroupAddon2"><i class="fas fa-lock"></i></div>
                <input type="password" class="form-control" id="password" name="password">
                <!-- error jika tidak memasukkan password yang sesuai saat register -->
                <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>
        <div style="margin-top: -13px" class="text-end">
            <a class="textForm textHover" href="#">Lupa Kata Sandi?</a>
        </div>
        <div class="d-grid mt-5">
            <button type="submit" class="btn login-btn">Masuk</button>
        </div>
        <div class="register">
            <span class="textForm"> Belum punya Akun? <a class="textForm textHover" href="<?php echo base_url() . 'auth/register' ?>">Daftar</a></span>
        </div>
        <!-- end isi form login -->
    </form>
</div>