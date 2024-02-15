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
                <h1 class="auth-title">Login Guru</h1>
                <p class="auth-subtitle mb-5">Aplikasi Rekam Poin Pelanggaran Siswa</p>

                <?php 
                    if ($this->session->userdata('pesan_aktifitas') == 't') { 
                        echo '<div class="alert alert-danger">periksa kembali username dan password anda</div>';
                        $this->session->set_userdata('pesan_aktifitas', '');
                    } elseif ($this->session->userdata('pesan_aktifitas') == 'ta') { 
                        echo '<div class="alert alert-danger">status akun anda sedang dinonaktifkan</div>';
                        $this->session->set_userdata('pesan_aktifitas', '');
                    }
                ?>

                            
                <form action="">
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
                    <button type="button" class="btn btn-primary btn-block btn-lg shadow-lg" onclick="login()">Log in</button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p><a class="font-bold" href="<?=base_url()?>login/" class="btn btn-block btn-danger">Login sbg admin</a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">

            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
function login(){
    var localuser = document.getElementById("username").value;
    var localpw = document.getElementById("password").value;

    if(localuser=='' && localpw=='' ){
        alert("anda harus memasukkan username dan password");
    } else{
        $.ajax({
            url: '<?php echo base_url(); ?>login_guru/verification',
            type: 'POST',
            data: {username:localuser,password:localpw},
            success: function(response){
                localStorage.setItem("username", localuser);
                localStorage.setItem("password", localpw);
                window.location.href = "<?php echo base_url();?>/dashboard_guru/";  
            },
            error: function () {
                alert("anda harus memasukkan username dan password");
            },
        })
    }
    
}
</script>
</body>
</html>