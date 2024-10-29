<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title; ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="/stisla/dist/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/stisla/dist/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="/stisla/dist/assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="/stisla/dist/assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="/stisla/dist/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/stisla/dist/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="/stisla/dist/assets/css/style.css">
    <link rel="stylesheet" href="/stisla/dist/assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>

    <script src="https://kit.fontawesome.com/a5295f2408.js" crossorigin="anonymous"></script>
    <!-- /END GA -->
</head>

<body class="bg-light">
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-center" style="font-weight: bold;">LOGIN</h4>
                                <hr>
                                <?php if (session()->getFlashdata('success')) : ?>
                                    <div class="alert alert-success">
                                        <?php echo session()->getFlashdata('success'); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (session()->getFlashdata('error')) : ?>
                                    <div class="alert alert-danger">
                                        <?php echo session()->getFlashdata('error'); ?>
                                    </div>
                                <?php endif; ?>

                                <?= validation_list_errors() ?>

                                <?= form_open('login'); ?>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary">Login</button>
                                </div>
                                <?= form_close(); ?>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="/stisla/dist/assets/modules/jquery.min.js"></script>
    <script src="/stisla/dist/assets/modules/popper.js"></script>
    <script src="/stisla/dist/assets/modules/tooltip.js"></script>
    <script src="/stisla/dist/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="/stisla/dist/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="/stisla/dist/assets/modules/moment.min.js"></script>
    <script src="/stisla/dist/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="/stisla/dist/assets/modules/jquery.sparkline.min.js"></script>
    <script src="/stisla/dist/assets/modules/chart.min.js"></script>
    <script src="/stisla/dist/assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
    <script src="/stisla/dist/assets/modules/summernote/summernote-bs4.js"></script>
    <script src="/stisla/dist/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <script src="https://kit.fontawesome.com/a5295f2408.js" crossorigin="anonymous"></script>

    <!-- Page Specific JS File -->
    <script src="/stisla/dist/assets/js/page/index.js"></script>

    <!-- Template JS File -->
    <script src="/stisla/dist/assets/js/scripts.js"></script>
    <script src="/stisla/dist/assets/js/custom.js"></script>
</body>

</html>