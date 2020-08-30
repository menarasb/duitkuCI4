<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>Azures BootStrap</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('style'); ?>/azures_pwa/styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('style'); ?>/azures_pwa/styles/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('style'); ?>/azures_pwa/fonts/css/fontawesome-all.min.css">
    <link rel="manifest" href="<?= base_url('style'); ?>/azures_pwa/_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('style'); ?>/azures_pwa/app/icons/icon-192x192.png">
</head>

<body class="theme-light" data-highlight="blue2">

    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>

    <div id="page">

        <div class="page-content pb-0">

            <div class="card preload-img" data-src="<?= base_url('style'); ?>/azures/images/pictures/9.jpg" data-card-height="cover">

                <div class="card-center text-center">
                    <h1 class="fa-4x color-theme font-900">Duitku</h1>
                    <h4 class="font-300 color-highlight">Atur keuangan anda, capai tujuan anda!</h4>

                    <p class="boxed-text-xl pt-4">
                        Selamat Datang di Aplikasi Duitku Beta Version.
                    </p>
                </div>

                <div class="card-bottom mb-5 text-center">
                    <a href="/mobile/login" class="btn btn-l rounded-xs mr-1 bg-green1-light">Already Have Account?</a>
                    <a href="/mobile/register" class="btn btn-l rounded-xs bg-blue2-dark">Register Account</a>
                </div>
                <div class="card-overlay bg-theme opacity-95"></div>
            </div>

        </div>
        <!-- end of page content-->



    </div>


    <script type="text/javascript" src="<?= base_url('style'); ?>/azures_pwa/scripts/jquery.js"></script>
    <script type="text/javascript" src="<?= base_url('style'); ?>/azures_pwa/scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url('style'); ?>/azures_pwa/scripts/custom.js"></script>
</body>