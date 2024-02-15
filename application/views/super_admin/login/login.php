<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Epoint</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/auth.css">
</head>
<body>
<div id="auth">
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href=""><img src="<?php echo base_url();?>assets/logo.png" alt="Logo"></a>
                </div>
                <h1 class="auth-title">Login Admin</h1>
                <p class="auth-subtitle mb-5">Aplikasi Rekam Poin Pelanggaran Siswa</p>

                <?php if($this->session->userdata('pesan_aktifitas')=='t') { ?>
                    <div class="alert alert-danger">
                        periksa kembali username dan password anda
                    </div>
                <?php $this->session->set_userdata('pesan_aktifitas',''); } ?>

                            
                <form action="<?php echo base_url(); ?>login/verification" method="POST">
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-xl" id="username" placeholder="Username" name="username">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-xl" id="password" placeholder="Password" name="password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg">Log in</button>
                </form>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">

            </div>
        </div>
    </div>
</div>
</body>
</html>