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
                                    <!-- <?= anchor('Auth/login', 'Login', 'class="active" title="Login"') ?>
                                    <span class="text-white"> | </span> -->
                                    <?= anchor('Auth/register', 'Register', 'title="Register"') ?>
                                </div>

                            </div>

                        </div>

                        <div class="panel panel-info mt10 br-n">

                            <div class="panel-heading heading-border bg-white">
                                <span class="panel-title hidden-xs"><i class="fa fa-sign-in"></i>Forex Indicator System</span>
                                <span class="panel-title hidden-sm hidden-md hidden-lg"><i class="fa fa-sign-in"></i>Forex Indicator</span>
                            </div>

                            <!-- end .form-header section -->
                            <?php
                            echo form_open(site_url('Auth/dologin'), 'name="login" role="form" method="post"');
                            ?>
                            <div class="panel-body bg-light p30">
                                <div class="row">
                                    <div class="col-sm-7 pr30">

                                        <?php if ($this->session->flashdata('msg')) { ?>
                                            <div class="section row">
                                                <div class="col-md-12">
                                                    <?= $this->session->flashdata('msg') ?>
                                                </div>
                                            </div>

                                        <?php } else { ?>
                                            <div class="section row hidden">
                                                <div class="col-md-4">
                                                    <a href="#" class="button btn-social facebook span-left mr5 btn-block">
                                                        <span><i class="fa fa-facebook"></i>
                                                        </span>Facebook</a>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="#" class="button btn-social twitter span-left mr5 btn-block">
                                                        <span><i class="fa fa-twitter"></i>
                                                        </span>Twitter</a>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="#" class="button btn-social googleplus span-left btn-block">
                                                        <span><i class="fa fa-google-plus"></i>
                                                        </span>Google+</a>
                                                </div>
                                            </div> 
                                        <?php } ?>

                                        <div class="section">
                                            <label for="username" class="field-label text-muted fs18 mb10">Username</label>
                                            <label for="username" class="field prepend-icon">
                                                <input type="text" name="username" id="username" class="gui-input" placeholder="Enter username" autocomplete="forexuser">
                                                <label for="username" class="field-icon"><i class="fa fa-user"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                        <div class="section">
                                            <label for="password" class="field-label text-muted fs18 mb10">Password</label>
                                            <label for="password" class="field prepend-icon">
                                                <input type="password" name="password" id="password" class="gui-input" placeholder="Enter password" autocomplete="forexpass">
                                                <label for="password" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                                <?= form_error('username', '<span class="label label-danger">', '</span>'); ?>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                    </div>
                                    <div class="col-sm-5 br-l br-grey pl30">
                                        <h3 class="mb25"> Forex Indicator System Thailand:</h3>
                                        <p class="mb15">
                                            <span class="fa fa-check text-success pr5"></span> สอนการลงทุนใน Forex ตั้งแต่เริ่มต้น ฟรี !!</p>
                                        <p class="mb15">
                                            <span class="fa fa-check text-success pr5"></span> สอนออนไลน์ ประกาศแจ้งในกลุ่ม</p>
                                        <p class="mb15">
                                            <span class="fa fa-check text-success pr5"></span> สามารถติดตาม วีดีโอบันทึกบทวิเคราะห์</p>
                                        <p class="mb15">
                                            <span class="fa fa-check text-success pr5"></span> แจก indicator พร้อม สอนวิธีการตั้งค่า</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end .form-body section -->
                            <div class="panel-footer clearfix p10 ph15">
                                <button type="submit" class="button btn-primary mr10 pull-right">Login</button>
                                <!--                                <label class="switch block switch-primary pull-left input-align mt10">
                                                                    <input type="checkbox" name="remember" id="remember" checked>
                                                                    <label for="remember" data-on="YES" data-off="NO"></label>
                                                                    <span>Remember me</span>
                                                                </label>-->
                            </div>
                            <!-- end .form-footer section -->
                            </form>
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