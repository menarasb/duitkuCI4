<?php $request = \Config\Services::request(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?= $setting->site_name; ?> <?= $setting->sep; ?> <?= $page_title; ?></title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('style'); ?>/cork_top/assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="<?= base_url('style'); ?>/cork_top/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('style'); ?>/cork_top/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <link href="<?= base_url('style'); ?>/cork_top/plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('style'); ?>/cork_top/plugins/plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('style'); ?>/cork_top/plugins/font-icons/fontawesome/css/regular.css" rel="stylesheet">
    <link href="<?= base_url('style'); ?>/cork_top/plugins/font-icons/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="<?= base_url('style'); ?>/cork_top/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('style'); ?>/cork_top/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('style'); ?>/cork_top/plugins/autocomplete/autocomplete.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('style'); ?>/cork_top/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('style'); ?>/cork_top/plugins/table/datatable/dt-global_style.css">
    <?= $this->renderSection('custom_css'); ?>

    <style>
        /*
            The below code is for DEMO purpose --- Use it if you are using this demo otherwise Remove it
        */
        /*.navbar .navbar-item.navbar-dropdown {
            margin-left: auto;
        }*/
        .layout-px-spacing {
            min-height: calc(100vh - 184px) !important;
        }

        /*
            The below code is for DEMO purpose --- Use it if you are using this demo otherwise Remove it
        */
        .page-title {
            float: none;
            margin-top: 0;
            margin-bottom: 0;
            align-self: center;
            padding-right: 15px;
            border-right: 1px solid #bfc9d4;
            margin-right: 15px;
        }

        .page-title h3 {
            margin-bottom: 0;
            font-size: 20px;
        }

        .page-header {
            display: flex;
            padding: 0;
            margin-bottom: 16px;
            margin-top: 30px;
            justify-content: start;
        }

        .breadcrumb-one {
            display: inline-block;
            align-self: center;
        }

        .breadcrumb-one .breadcrumb {
            padding: 0;
            vertical-align: text-bottom;
            margin-bottom: 0;
            background: transparent;
        }

        .breadcrumb-one .breadcrumb-item {
            align-self: center;
        }

        .breadcrumb-one .breadcrumb-item a {
            color: #888ea8;
            vertical-align: text-bottom;
        }

        .breadcrumb-one .breadcrumb-item a svg {
            width: 20px;
            height: 20px;
            vertical-align: sub;
        }

        .breadcrumb-one .breadcrumb-item.active a {
            color: #1b55e2;
        }

        .breadcrumb-one .breadcrumb-item span {
            vertical-align: text-bottom;
        }

        .breadcrumb-one .breadcrumb-item.active {
            color: #1b55e2;
            font-weight: 600;
        }

        .breadcrumb-one .breadcrumb-item+.breadcrumb-item {
            padding: 0px;
        }

        .breadcrumb-one .breadcrumb-item+.breadcrumb-item::before {
            color: #515365;
            font-size: 0;
            content: url('data:image/svg+xml, <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 24 24" fill="none" stroke="%23555" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>');
            vertical-align: text-top;
            padding: 0 6px;
        }


        @media(max-width: 575px) {
            .page-header {
                display: block;
            }

            .page-title {
                margin-bottom: 20px;
                border: none;
                padding-right: 0;
                margin-right: 0;
            }
        }


        /*
            Just for demo purpose ---- Remove it.
        */
        /*<starter kit design>*/
        .widget-one h6 {
            font-size: 20px;
            font-weight: 600;
            letter-spacing: 0px;
            margin-bottom: 22px;
        }

        .widget-one p {
            font-size: 15px;
            margin-bottom: 0;
        }

        /*</starter kit design>*/
    </style>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>

<body class="sidebar-noneoverflow">

    <!--  BEGIN NAVBAR  -->
    <div class="header-container">
        <header class="header navbar navbar-expand-sm">

            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg></a>

            <div class="nav-logo align-self-center">
                <a class="navbar-brand" href="/"><img alt="logo" src="<?= base_url('style'); ?>/cork_top/assets/img/90x90.jpg"> <span class="navbar-brand-name">DuitKu - Beta Version 1.0</span></a>
            </div>

            <ul class="navbar-item flex-row nav-dropdowns ml-auto">
                <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="user-profile-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <img src="<?= base_url('style'); ?>/cork_top/assets/img/90x90.jpg" class="img-fluid" alt="admin-profile">
                            <div class="media-body align-self-center">
                                <h6><span>Hi,</span> Alan</h6>
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="user-profile-dropdown">
                        <div class="">
                            <div class="dropdown-item">
                                <a class="" href="user_profile.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg> My Profile</a>
                            </div>
                            <div class="dropdown-item">
                                <a class="" href="apps_mailbox.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox">
                                        <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
                                        <path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>
                                    </svg> Inbox</a>
                            </div>
                            <div class="dropdown-item">
                                <a class="" href="auth_lockscreen.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg> Lock Screen</a>
                            </div>
                            <div class="dropdown-item">
                                <a class="" href="auth_login.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg> Sign Out</a>
                            </div>
                        </div>
                    </div>

                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN TOPBAR  -->
        <div class="topbar-nav header navbar" role="banner">
            <nav id="topbar">
                <ul class="navbar-nav theme-brand flex-row  text-center">
                    <li class="nav-item theme-logo">
                        <a href="index.html">
                            <img src="<?= base_url('style'); ?>/cork_top/assets/img/90x90.jpg" class="navbar-logo" alt="logo">
                        </a>
                    </li>
                    <li class="nav-item theme-text">
                        <a href="index.html" class="nav-link"> CORK </a>
                    </li>
                </ul>

                <ul class="list-unstyled menu-categories" id="topAccordion">

                    <li class="menu single-menu">
                        <a href="/" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                <span>Dashboard</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </a>
                    </li>


                    <li class="menu single-menu">
                        <a href="/rekening" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                <span>Rekening</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </a>
                    </li>

                    <li class="menu single-menu">
                        <a href="/" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                <span>Tunai</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!--  END TOPBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">


                <!-- CONTENT AREA -->
                <?= $this->renderSection('content'); ?>
                <!-- CONTENT AREA -->

            </div>
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com">DesignReset</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg></p>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?= base_url('style'); ?>/cork_top/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url('style'); ?>/cork_top/bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url('style'); ?>/cork_top/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('style'); ?>/cork_top/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url('style'); ?>/cork_top/assets/js/app.js"></script>
    <script src="<?= base_url('style'); ?>/cork_top/plugins/flatpickr/flatpickr.js"></script>
    <script src="<?= base_url('style'); ?>/cork_top/assets/js/scrollspyNav.js"></script>
    <script type="text/javascript" src="<?= base_url('style'); ?>/cork_top/plugins/DataTables/datatables.min.js"></script>
    <!-- Auto Select Suggestion -->
    <script src="<?= base_url('style'); ?>/cork_top/plugins/autocomplete/jquery.mockjax.js"></script>
    <script src="<?= base_url('style'); ?>/cork_top/plugins/autocomplete/jquery.autocomplete.js"></script>
    <?= $this->renderSection('custom_js'); ?>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="<?= base_url('style'); ?>/cork_top/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <!-- FILE UPLOAD JS -->
    <script src="<?= base_url('style'); ?>/cork_top/plugins/file-upload/file-upload-with-preview.min.js"></script>
    <script>
        //First upload
        var firstUpload = new FileUploadWithPreview('myFirstImage')
        //Second upload
        var secondUpload = new FileUploadWithPreview('mySecondImage')
    </script>
    <script src="<?= base_url('style'); ?>/cork_top/plugins/flatpickr/custom-flatpickr.js"></script>
    <script>
        function previewImg() {
            const file = document.querySelector('#file');
            const fileLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            fileLabel.textContent = file.files[0].name;

            const fileTrx = new FileReader();
            fileTrx.readAsDataURL(file.files[0]);

            fileTrx.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

</html>