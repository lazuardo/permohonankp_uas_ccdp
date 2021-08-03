<?php
// session_start();
// if (isset($_SESSION["is_logged_admin"])) {
//     header("Location: admin.php");
// }
// if (isset($_SESSION["is_logged"])) {
//     header("Location: dashboard.php");
// }
require('template/header.php');

?>



<div class="login-box">
    <div class="card-body login-card-body mb-3 bg-cyan">
        <center>
            <img src="<?= $this->url_assets();?>AdminLTE-master/dist/img/unikom/logo_unikom.png" width="70" height="70" alt="Card image">
            <br>
            <b>PERMOHONAN KERJA PRAKTEK TEKNIK INFORMATIKA</br>
        </center>
        <!-- /.login-logo -->
    </div>
    <div class="card-body login-card-body">
        <p class="login-box-msg text-md">Masukkan NIM serta Password Anda</p>

        <form action="<?= $this->base_url('Auth/progressLogin');?>" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Username" name="username" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
                <!-- /.col -->
            </div>
        </form>

    </div>
    <!-- /.login-card-body -->
</div>
</div>
<?php
require('template/footer.php') ?>