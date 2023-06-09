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
<body>
<!-- [ signin-img ] start -->
<div class="auth-wrapper align-items-stretch aut-bg-img">
    <div class="flex-grow-1">
        <div class="d-md-flex align-items-center auth-side-img">
            <div class="col-sm-10 auth-content w-auto">
                <center>
                    <img src="<?= base_url('assets/images/auth/kip-kuliah.png'); ?>" alt="img" class="img-fluid animation-toggle animated" data-animate="pulse" width="350px">
                </center>
                <h4 class="text-white font-weight-normal">
                    Halo Selamat Datang Peserta KIP-Kuliah! <br /> <br />

                    Silahkan lengkapi berkas pendaftaran KIP-Kuliah dengan lengkap.
                </h4>
            </div>
        </div>
        <div class="auth-side-form">
            <div class=" auth-content">
                <center>
                    <img src="<?= base_url('assets/images/kip-k.png'); ?>" alt="img" class="img-fluid animation-toggle animated" data-animate="pulse" style="margin-top: -50px;">
                    <br /> 
                    <h3 class="text-secondary mt-4">Login KIP Kuliah</h3>
                    <h5 class="text-secondary mb-4">STIKI Malang</h5>
                </center>
                <?= $this->session->flashdata('pesan'); ?>
                <form action="" method="post">
                    <div class="form-group mb-3">
                        <label class="" for="Email">Alamat email</label>
                        <input type="text" class="form-control" id="Email" placeholder="" name="email" autocomplete="off" value="191111039@mhs.stiki.ac.id">
                    </div>
                    <div class="form-group mb-4">
                        <label class="" for="Password">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="Password" placeholder="" name="password" value="12345">
                            <div class="input-group-prepend">
                              <div class="input-group-text eye" id="eye1"><i class="feather icon-eye"></i></div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-block btn-secondary mb-4 py-2">Masuk</button>
                </form>
                <div class="text-center">
                    <!-- <p class="mb-2 mt-4 text-muted">Lupa password? <a href="auth-reset-password-img-side.html" class="f-w-400">Reset</a></p> -->
                    <p class="mb-0 text-muted">Belum punya akun? <a href="<?= base_url('daftar'); ?>" class="f-w-400">Daftar</a></p>
                    <p class="mb-0 text-muted"><a href="<?= base_url('admin'); ?>" class="f-w-400">Login Administrator</a></p>
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
    });
</script>


</html>