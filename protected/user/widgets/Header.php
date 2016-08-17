<?php

class Header extends CWidget {

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
                <div class="pre-loder">
                    <div class="loding"> </div>
                </div> <!-- end of pre-loder -->
                <header class="cf visible-xs visible-sm">
                </header>
                <section class="faq hidden-xs">    
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">  
                                <a class="faqs" href="#">FAQ'S<i class="fa infos fa-exclamation-circle"></i></a>
                            </div>

                        </div>
                    </div>
                </section>



                <section class="main-logo">    
                    <div class="container bods">
                        <div class="row">
                            <div class="col-md-4 col-xs-6">
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>">
                                    <img class="zee" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png">
                                </a>
                            </div>
                            <div class="col-md-4 col-xs-6 hidden-xs">
                                <div id="custom-search-input">
                                    <div class="input-group col-md-12">
                                        <input type="text" class="form-control input-lg" placeholder="Search" />
                                        <span class="input-group-btn">
                                            <button class="btn btn-info btn-lg" type="button">
                                                <i class="glyphicon glyphicon-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <ul class="list-inline list-unstyled">
                                    <li><a class="mycart" href="#">Mycart<img class="shop" src="<?php echo Yii::app()->request->baseUrl; ?>/images/shop.png"></a></li>        
                                    <?php
                                    $text = 'Sign In';
                                    $state = 'login';
                                    if (Yii::app()->user->hasState('user_id')) {
                                        $text = 'Sign Out';
                                        $state = 'logout';
                                    }
                                    ?>
                                    <li><a href="<?php echo Yii::app()->request->baseUrl . '/user.php/' . $state; ?>"><?php echo $text; ?></a></li>
                                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/user-registration">Register</a></li>
                                    <div class="dropdown">
                                        <button class="btn btn-primary cat dropdown-toggle" type="button" data-toggle="dropdown">
                                            <?php if (isset(Yii::app()->session['currency'])) { ?>
                                                <i class="fa currency_symbol"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/currency/<?php echo Yii::app()->session['currency']['id']; ?>.<?php echo Yii::app()->session['currency']['image']; ?>" width="16" height="11" alt=""/>
                                                </i> <?php echo Yii::app()->session['currency']['currency_code']; ?>
                                            <?php } else { ?>
                                                <i class="fa currency_symbol"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/india-home.jpg" width="16" height="11" alt=""/></i> INR
                                            <?php } ?>
                                        </button>
                                        <ul class="dropdown-menu categories">
                                            <?php
                                            $currencies = Currency::model()->findAll();

                                            foreach ($currencies as $currency) {
                                                ?>
                                                <li>
                                                    <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Site/CurrencyChange/id/<?= $currency->id; ?>" class="currency" code="<?= $currency->id; ?>">
                                                        <i class="fa currency_symbol"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/currency/<?= $currency->id; ?>.<?= $currency->image; ?>" width="16" height="11" alt=""/></i><?= $currency->currency_code; ?></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </ul>
                            </div>

                        </div>
                    </div>
                </section>

                <div id="static_cnt" class="">      
                    <section class="main-head">    
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7 col-sm-4 hidden-xs">
                                    <div class="dropdown">
                                        <button class="btn btn-primary cat dropdown-toggle" type="button" data-toggle="dropdown"><img class="bars" src="<?php echo Yii::app()->request->baseUrl; ?>/images/bars.png">Categories
                                        </button>
                                        <ul class="dropdown-menu categories">
                                                    <?php
                                                    $menus = ProductCategory::model()->findAllByAttributes(array(), array('condition' => 'header_visibility = 1 and id=parent order by sort_order'));
                                                    foreach ($menus as $menu) {
                                                            ?>

                                                            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/product/category/name/<?php echo $menu->canonical_name; ?>"><?php echo $menu->category_name; ?></a></li>
                                                            <?php
                                                    }
                                                    ?>

                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-5 col-sm-8">
                                    <nav class="navbar navbar-inverse hidden-xs">
                                        <div class="nop">
                                            <!--    <div class="navbar-header">
                                                  <a class="navbar-brand" href="#">WebSiteName</a>
                                                </div>-->
                                            <ul class="nav navbar-nav">
                                                <li class="active"><a href="#">Home</a></li>
                                                <li><a href="#">About Us</a></li> 
                                                <li><a href="#">Products</a></li> 
                                                <li><a href="#">Offers & Deals</a></li> 



                                            </ul>
                                        </div>
                                    </nav>
                                </div>


                                <div class="navigation hidden-sm hidden-md hidden-lg">
                                    <nav>
                                        <a href="javascript:void(0)" class="smobitrigger ion-navicon-round"><span><i class="fa fa-align-justify"></i></span></a>
                                        <ul class="mobimenu">

                                            <div id="cssmenu">
                                                <ul>
                                                    <li> <div id="custom-search-input">
                                                            <div class="input-group col-md-12">
                                                                <input type="text" class="form-control input-lg" placeholder="Search" />
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-info btn-lg" type="button">
                                                                        <i class="glyphicon glyphicon-search"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div></li>
                                                    <li><a href="index.html"><span>Home</span></a></li>
                                                    <li><a href="#"><span>About Us</span></a></li>
                                                    <li><a href="#"><span>Products</span></a></li>

                                                    <li><a href="#"><span>Offers & Deals</span></a></li>

                                                    <li class="has-sub"><a href="#"><span>categories</span></a>
                                                        <ul>
                                                            <li><a href="#"><span>Sub</span></a></li>
                                                            <li><a href="#"><span>Sub</span></a></li>
                                                            <li><a href="#"><span>Sub</span></a></li>
                                                            <li><a href="#"><span>Sub</span></a></li>

                                                        </ul>
                                                    </li>
                                                    <li class="has-sub"><a href="#"><span>categories</span></a>
                                                        <ul>
                                                            <li><a href="#"><span>Sub</span></a></li>
                                                            <li><a href="#"><span>Sub</span></a></li>
                                                            <li><a href="#"><span>Sub</span></a></li>
                                                            <li><a href="#"><span>Sub</span></a></li>

                                                        </ul>
                                                    </li>
                                                    <li><a href="#"><span>categories</span></a></li>
                                                    <li><a href="#"><span>categories</span></a></li>

                                                    <li><a href="#"><span>faqs</span></a></li>




                                                </ul>
                                            </div>

                                        </ul>
                                    </nav>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>  

                <?php
            }

        }
        