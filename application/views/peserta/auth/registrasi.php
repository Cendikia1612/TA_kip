<!DOCTYPE html>
<html lang="en">

<head>

    <title><?= $judul ?></title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="<?= base_url('assets/images/logo-stiki.png'); ?>" type="image/png">

    <!-- vendor css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
</head>
<style type="text/css">
    .eye {
        cursor: pointer;
    }
</style>

<!-- [ signin-img ] start -->
<div class="auth-wrapper align-items-stretch aut-bg-img">
    <div class="flex-grow-1">
        <div class="d-md-flex align-items-center auth-side-img">
            <div class="col-sm-10 auth-content w-auto">
                <center>
                    <img src="<?= base_url('assets/images/auth/kip-kuliah.png'); ?>" alt="img" class="img-fluid animation-toggle animated" data-animate="pulse" width="350px" >
                </center>
                <!-- <h1 class="text-white mt-1">STIKI Malang</h1> -->
                <h4 class="text-white font-weight-normal">
                    Pendaftaran KIP Kuliah Masih dibuka!  <br /> <br />
                    
                    Segera daftarkan diri kalian dan lengkapi semua persyaratan yang ada.
                </h4>
            </div>
        </div>
        <div class="auth-side-form">
            <div class=" auth-content">
                <center>
                    <img src="<?= base_url('assets/images/kip-k.png'); ?>" alt="img" class="img-fluid animation-toggle animated" data-animate="pulse" style="margin-top: -50px;">
                    <br /> 
                    <!-- <h3 class="mt-3">Daftar KIP Kuliah</h3> -->
                    <h3 class="text-secondary mt-4">Daftar KIP Kuliah</h3>
                    <h5 class="mb-4">STIKI Malang</h5>
                </center>

                <?= $this->session->flashdata('pesan'); ?>

                <?php 
                    $sekarang = date('Y-m-d');
                    if (($sekarang > $pendaftaran->tanggal_mulai_pendaftaran) && ($sekarang < $pendaftaran->tanggal_selesai_pendaftaran)) {
                        ?>

                        <form action="" method="post" id="formSubmit">
                            <div class="form-group mb-3">
                                <label class="" for="Nama">Nama Lengkap</label>
                                <input type="text" class="form-control <?= (form_error('nama_lengkap')) ? 'is-invalid' : ''; ?>" id="Nama" placeholder="" name="nama_lengkap" autocomplete="off" value="<?= set_value('nama_lengkap'); ?>">
                                <div id="notif" class="invalid-feedback"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="" for="Email">Alamat email</label>
                                <input type="text" class="form-control <?= (form_error('email')) ? 'is-invalid' : ''; ?>" id="Email" placeholder="" name="email" autocomplete="off" value="<?= set_value('email'); ?>">
                                <div id="notif-email" class="invalid-feedback"></div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="" for="Password">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="Password" placeholder="" name="password">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text eye" id="eye1"><i class="feather icon-eye"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="" for="Password2">Konfirmasi Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control <?= (form_error('password2')) ? 'is-invalid' : ''; ?>" id="Password2" placeholder="" name="password2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text eye" id="eye2"><i class="feather icon-eye"></i></div>
                                    </div>
                                    <div id="notif-pass" class="invalid-feedback"></div>
                                </div>
                            </div>

                            <button class="btn btn-block btn-secondary mb-4" id="registrasi" name="registrasi">Daftar</button>
                        </form>

                        <?php
                    }else{
                        echo '<div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Mohon maaf</h4>
                                <h5>Pendaftaran KIP Kuliah telah ditutup!</b></h5>
                            </div>';
                        //echo '<div class="alert alert-danger" role="alert">Pendaftaran telah ditutup!</div>';
                    }
                ?>

                
                
                <div class="text-center">
                    <!-- <p class="mb-2 mt-4 text-muted">Lupa password? <a href="auth-reset-password-img-side.html" class="f-w-400">Reset</a></p> -->
                    <p class="mb-0 text-muted">Sudah punya akun? <a href="<?= base_url('login'); ?>" class="f-w-400">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ signin-img ] end -->
</body>
<!-- Required Js -->
<script src="<?= base_url('assets/js/vendor-all.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/ripple.js'); ?>"></script>
<script script>
    $(document).ready(function() {
        $('.animation-toggle').hover(function() {
            var anim = $(this).attr('data-animate');
            $(this).addClass('animated');
            $(this).addClass(anim);
            setTimeout(function() {
                $('.animation-toggle').removeClass(anim);
            }, 3000);
        });

        see_pass1();
        see_pass2();
        valid_name();
        valid_email();
        valid_password1();
        valid_password2();
        valid_empty();

        function see_pass1(){
            $('#eye1').click(function(){
                var x = document.getElementById('Password').type;
                if (x == 'password'){
                    document.getElementById('Password').type = 'text';
                    document.getElementById('eye1').innerHTML = '<i class="feather icon-eye-off"></i>';
                }else{
                    document.getElementById('Password').type = 'password';
                    document.getElementById('eye1').innerHTML = '<i class="feather icon-eye"></i>';
                }
            });
        }

        function see_pass2(){
            $('#eye2').click(function(){
                var y = document.getElementById('Password2').type;
                if (y == 'password'){
                    document.getElementById('Password2').type = 'text';
                    document.getElementById('eye2').innerHTML = '<i class="feather icon-eye-off"></i>';
                }else{
                    document.getElementById('Password2').type = 'password';
                    document.getElementById('eye2').innerHTML = '<i class="feather icon-eye"></i>';
                }
            });
        }
        
        function valid_name(){
            $('#Nama').keyup(function(){
                var nama_lengkap = $('#Nama').val();
                if(nama_lengkap == ''){
                    $('#Nama').addClass('is-invalid');
                    $('#Nama').removeClass('is-valid');
                }else{
                    $('#Nama').addClass('is-valid');
                    $('#Nama').removeClass('is-invalid');
                }
            });
        }

        function valid_email(){
            $('#Email').keyup(function() {
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                var email = $('#Email').val();
                if(email == 0) {
                    $('#notif-email').text('');
                    $('#Email').removeClass('is-invalid');
                    $('#Email').removeClass('is-valid');
                }
                else {
                    $.ajax({
                        url: '<?= base_url('auth/validasi_email'); ?>',
                        type: 'POST',
                        data: 'email='+email,
                        success: function(hasil) {
                            if(hasil > 0) {
                                $('#Email').addClass('is-invalid');
                                $('#Email').removeClass('is-valid');
                            }
                            else {
                                if(!emailReg.test(email)) {
                                    $('#Email').addClass('is-invalid');
                                    $('#Email').removeClass('is-valid');
                                    $('#notif-email').text('Email tidak valid!');
                                }else{
                                    $('#Email').addClass('is-valid');
                                    $('#Email').removeClass('is-invalid');
                                    $('#notif-email').text('');
                                }
                            }
                        }
                    });
                }
            });
        }

        function valid_password1(){
            $('#Password').keyup(function(){
                var pass = $('#Password').val();
                if(pass == ''){
                    $('#Password').addClass('is-invalid');
                    $('#Password').removeClass('is-valid');
                }else{
                    $('#Password').addClass('is-valid');
                    $('#Password').removeClass('is-invalid');
                }
            });
        }

        function valid_password2(){
            $('#Password2').keyup(function(){
                var pass  = $('#Password').val();
                var pass2 = $('#Password2').val();
                if(pass2 == ''){
                    $('#Password2').removeClass('is-valid');
                    $('#Password2').removeClass('is-invalid');
                    $('#notif-pass').text('');
                }else if(pass == pass2){
                    $('#Password2').addClass('is-valid');
                    $('#Password2').removeClass('is-invalid');
                    $('#notif-pass').text('');
                }else{
                    $('#Password2').addClass('is-invalid');
                    $('#Password2').removeClass('is-valid');
                    $('#notif-pass').text('Password tidak sama!');
                }
            });    
        }

        function valid_empty(){
            var errorName = "<?= form_error('nama_lengkap') ?>";
            var errorEmail = "<?= form_error('email') ?>";
            var errorPass = "<?= form_error('password2') ?>";
            if (errorName) {
                $('#notif').text('Nama tidak boleh kosong!');
            }

            if (errorEmail) {
                $('#notif-email').text('Email tidak boleh kosong!');
            }

            if (errorPass) {
                $('#Password').addClass('is-invalid');
                $('#notif-pass').text('Password tidak sama!');
            }
        }
    });
</script>
</html>