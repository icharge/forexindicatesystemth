<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
        <meta name="keywords" content="Forex Indicator System Thailand" />
        <meta name="description" content="Forex Indicator System Thailand">
        <meta name="author" content="ForexIndicator">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
        <title><?= $fulltitle ?></title>

        <?php
        foreach ($stylesheets as $stylesheet) {
            css_asset($stylesheet);
        }
        ?>
        <?php
        foreach ($javascripts as $javascript) {
            js_asset($javascript);
        }
        ?>

        <!-- Favicon -->
        <link rel="shortcut icon" href="<?= asset_url() ?>/img/favicon.ico">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body class="external-page sb-l-c sb-r-c">

        <!-- Start: Main -->
        <div id="main" class="animated fadeIn">

            <!-- Start: Content -->
            <section id="content_wrapper">

                <!-- begin canvas animation bg -->
                <div id="canvas-wrapper">
                    <canvas id="demo-canvas"></canvas>
                </div>

                <!-- Begin: Content -->
                <section id="content">

                    <div class="admin-form theme-info" id="login1">

                        <div class="row mb15 table-layout">

                            <div class="col-xs-6 va-m pln">
                                <!-- <a href="" class="active">Forex Indicator System Thailand</a> -->
                            </div>

                            <div class="col-xs-6 text-right va-b pr5">
                                <div class="login-links">
                                    <?= anchor('Auth/login', 'Login', 'class="active" title="Login"') ?>
                                    <!-- <span class="text-white"> | </span>
                                    <?= anchor('Auth/register', 'Register', 'title="Register"') ?>-->
                                </div>

                            </div>

                        </div>

                        <div class="panel panel-info mt10 br-n">

                            <div class="panel-heading heading-border bg-white">
                                <span class="panel-title hidden-xs"><i class="fa fa-sign-in"></i>Forex Indicator System</span>
                                <span class="panel-title hidden-sm hidden-md hidden-lg"><i class="fa fa-sign-in"></i>Forex Indicator</span>
                            </div>

                            <!-- end .form-header section -->

                            <?= $content ?>
                            
                            <!-- end .form-body section -->
                            <div class="panel-footer clearfix p10 ph15">
                                <?php if(isset($registerpage)) { ?>
                                <button onclick="document.getElementById('regform').submit();" class="button btn-primary mr10 pull-right">ลงทะเบียน</button>
                                <?php } else { ?>
                                <a href="<?= site_url('Auth/logout') ?>" class="button btn-primary mr10 pull-right">Logout</a>
                                <?php } ?>
                            </div>
                            <!-- end .form-footer section -->

                        </div>
                    </div>

                </section>
                <!-- End: Content -->

            </section>
            <!-- End: Content-Wrapper -->

        </div>
        <!-- End: Main -->

        <!-- BEGIN: PAGE SCRIPTS -->

        <!-- Google Map API -->
        <!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script> -->

        <!-- Page Javascript -->
        <script type="text/javascript">
            jQuery(document).ready(function () {

                "use strict";

                // Init Theme Core      
                Core.init();

                // Init Demo JS
                Demo.init();

                // Init CanvasBG and pass target starting location
                CanvasBG.init({
                    Loc: {
                        x: window.innerWidth / 2,
                        y: window.innerHeight / 3.3
                    },
                });


            });
        </script>

        <!-- END: PAGE SCRIPTS -->

    </body>

</html>