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

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
    <div class="auth-content">
        <div class="card">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <img src="<?= base_url(); ?>assets/images/kip-k.png" alt="" class="img-fluid mb-4 w-50">
                        <h4 class="mb f-w-400">Halaman Login</h4><b>Administrator</b><br><br>
                        <?= $this->session->flashdata('pesan'); ?>
                        <form method="POST" action="">
                            <div class="form-group mb-3">
                                <input type="text" class="form-control pl-3" id="Email" placeholder="Email" name="email" autocomplete="off" value="admin@gmail.com">
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" class="form-control pl-3" id="Password" placeholder="Password" name="password" value="12345">
                            </div>
                            <button class="btn btn-block btn-secondary mb-1">Login</button>
                            
                            <p class="mt-3 mb-0 text-muted"><a href="<?= base_url(); ?>" class="f-w-400">Login Peserta</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="<?= base_url('assets/js/vendor-all.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/ripple.js'); ?>"></script>
</body>

</html>