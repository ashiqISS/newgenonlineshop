<?php

class HeaderMerchant extends CWidget {

    public function run() {
        ?>

        <!DOCTYPE html>
        <html lang="en">

            <!-- Mirrored from victoria-spa.themexriver.com/victoria/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Apr 2016 20:33:15 GMT -->
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">

                <title>Newgen </title>
                <!--        <link href="images/favicon.png" rel="icon">-->
                <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
                <link href='https://fonts.googleapis.com/css?family=Raleway:800,700,600,300' rel='stylesheet' type='text/css'>
                <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400italic' rel='stylesheet' type='text/css'>
                <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>
                <link href="<?php echo Yii::app()->request->baseUrl; ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">
                <!--<link href="<?php echo Yii::app()->request->baseUrl; ?>/flat-icon/flaticon.css" rel="stylesheet">-->
                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/owl.carousel.css" rel="stylesheet">
                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/owl.theme.css" rel="stylesheet">
        <!--                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css" rel="stylesheet">-->
                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/animate.min.css" rel="stylesheet">
                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/css3-animation.css" rel="stylesheet">
                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/new.css" rel="stylesheet">
                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet">
                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/responsive.css" rel="stylesheet">
                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/simpleMobileMenu.css" />
                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/slick.css" rel="stylesheet">
                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/slick-theme.css" rel="stylesheet">
                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/contact.css" rel="stylesheet">
                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom_style.css" rel="stylesheet">
                <link href="<?= Yii::app()->request->baseUrl; ?>/css/menu.css" rel="stylesheet">
                <style>

                    .red {
                        color: #ec1e20; padding-top:5px;font-size: 12px;
                        font-family: 'Roboto', sans-serif;
                    }

                </style>
                <script>
                    var baseurl = "<?php print Yii::app()->request->baseUrl . "/index.php/"; ?>";
                    var basepath = "<?php print Yii::app()->basePath; ?>";
                </script>

            </head>

            <body id="home-1">
                <?php if ($_SERVER['REQUEST_URI'] == Yii::app()->request->baseUrl . '/') { ?>
                    <div class="pre-loder">
                        <div class="loding"> </div>
                    </div> <!-- end of pre-loder -->
                <?php } ?>
                <header class="cf visible-xs visible-sm">
                </header>
                <section class="faq hidden-xs hidden-sm">    
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">  
                                <div class="col-md-11">  
                                    <a class="faqs" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/faq">FAQ'S<i class="fa infos fa-exclamation-circle"></i></a>
                                </div>
                                <div class="col-md-1 has_dropdown" style="top: 2px;">  

                                    <div class="dropdown">
                                        <button class="btn btn-primary cat dropdown-toggle" type="button" data-toggle="dropdown">
                                            <?php if (isset(Yii::app()->session['currency'])) { ?>
                                                <i class="fa currency_symbol">
                                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/currency/<?php echo Yii::app()->session['currency']['id']; ?>.<?php echo Yii::app()->session['currency']['image']; ?>" width="16" height="11" alt="" style="margin-top: -3px;" />
                                                </i> <?php echo Yii::app()->session['currency']['currency_code']; ?>
                                            <?php } else { ?>
                                                <i class="fa currency_symbol"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/india-home.jpg" width="16" height="11" alt="" style="margin-top: -3px;" /></i> INR
                                            <?php } ?>
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu categories">
                                            <?php
                                            $currencies = Currency::model()->findAll();

                                            foreach ($currencies as $currency) {
                                                ?>
                                                <li>
                                                    <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Site/CurrencyChange/id/<?= $currency->id; ?>" class="currency" code="<?= $currency->id; ?>">
                                                        <i class="fa currency_symbol"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/currency/<?= $currency->id; ?>.<?= $currency->image; ?>" width="16" height="11" alt="" style="margin-top: -3px;" /></i> <?= $currency->currency_code; ?></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>                                
                            </div>

                        </div>
                    </div>
                </section>



                <section class="main-logo">    
                    <div class="container bods">
                        <div class="row">
                            <div class="col-md-4 col-xs-6">
                                <a href="<?= Yii::app()->request->baseUrl; ?>">
                                    <img class="zee" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png">
                                </a>
                            </div>
                            <div class="col-md-2 col-xs-6 hidden-xs hidden-sm">
                            </div>
                            <div class="col-md-6">

                                <ul class="list-inline list-unstyled">                                 
                                    <?php
                                    $text = 'Sign In';
                                    $state = 'login';
                                    if (Yii::app()->user->hasState('user_id')) {
                                        $text = 'Sign Out';
                                        $state = 'logout';
                                        ?>
                                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/merchant-dashboard"><?php echo Yii::app()->user->getState('merchant_name'); ?></a></li>
                                        <li><a href="<?php echo Yii::app()->request->baseUrl . '/user.php/orders'; ?>">My Orders</a></li>
                                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/merchant-profile">My Account</a></li>
                                        <?php
                                    }
                                    ?>

                                    <li><a href="<?php echo Yii::app()->request->baseUrl . '/user.php/' . $state; ?>"><?php echo $text; ?></a></li> 

                                    <?php
                                    if (!Yii::app()->user->hasState('user_id')) {
                                        ?>
                                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/user-registration">Register</a></li>
                                    <?php }
                                    ?>

                                </ul>
                            </div>

                        </div>
                    </div>
                </section>

                <?php
            }

        }
        