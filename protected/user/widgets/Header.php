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
                        <!--<link href="<?= Yii::app()->request->baseUrl; ?>/images/favicon.png" rel="icon">-->
                <!--<script src="js/jquery.min.js"></script>-->
                <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
                <link href='https://fonts.googleapis.com/css?family=Raleway:800,700,600,300' rel='stylesheet' type='text/css'>
                <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400italic' rel='stylesheet' type='text/css'>
                <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>
                <link href="<?= Yii::app()->request->baseUrl; ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">
                <!--<link href="<?= Yii::app()->request->baseUrl; ?>/flat-icon/flaticon.css" rel="stylesheet">-->
                <link href="<?= Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
                <link href="<?= Yii::app()->request->baseUrl; ?>/css/owl.carousel.css" rel="stylesheet">
                <link href="<?= Yii::app()->request->baseUrl; ?>/css/owl.theme.css" rel="stylesheet">
                <link href="<?= Yii::app()->request->baseUrl; ?>/css/jquery-ui.css" rel="stylesheet">
                <link href="<?= Yii::app()->request->baseUrl; ?>/css/animate.min.css" rel="stylesheet">
                <link href="<?= Yii::app()->request->baseUrl; ?>/css/css3-animation.css" rel="stylesheet">
                <link href="<?= Yii::app()->request->baseUrl; ?>/css/new.css" rel="stylesheet">
                <link href="<?= Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet">
                <link href="<?= Yii::app()->request->baseUrl; ?>/css/responsive.css" rel="stylesheet">
                <link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl; ?>/css/simpleMobileMenu.css" />
                <link href="<?= Yii::app()->request->baseUrl; ?>/css/slick.css" rel="stylesheet">
                <link href="<?= Yii::app()->request->baseUrl; ?>/css/slick-theme.css" rel="stylesheet">
                <link href="<?= Yii::app()->request->baseUrl; ?>/css/contact.css" rel="stylesheet">
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
                                <div class="col-md-11">  
                                    <a class="faqs" href="#">FAQ'S<i class="fa infos fa-exclamation-circle"></i></a>
                                </div>
                                <div class="col-md-1 has_dropdown" style="top: 2px;">  

                                    <div class="dropdown">
                                        <button class="btn btn-primary cat dropdown-toggle" type="button" data-toggle="dropdown">
                                            <?php if (isset(Yii::app()->session['currency'])) { ?>
                                                <i class="fa currency_symbol"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/currency/<?php echo Yii::app()->session['currency']['id']; ?>.<?php echo Yii::app()->session['currency']['image']; ?>" width="16" height="11" alt=""/>
                                                </i> <?php echo Yii::app()->session['currency']['currency_code']; ?>
                                            <?php } else { ?>
                                                <i class="fa currency_symbol"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/india-home.jpg" width="16" height="11" alt=""/></i> INR
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
                                                        <i class="fa currency_symbol"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/currency/<?= $currency->id; ?>.<?= $currency->image; ?>" width="16" height="11" alt=""/></i><?= $currency->currency_code; ?></a>
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
                                <img class="zee" src="<?= Yii::app()->request->baseUrl; ?>/images/logo.png">
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


                                    <li><a class="mycart" href="#"  data-toggle="modal" data-target="#myModal"><img class="shop2" src="<?= Yii::app()->request->baseUrl; ?>/images/wallet2.png">Wallet</a>



                                    </li>
                                    <li><a class="mycart" href="#"><img class="shop2" src="<?= Yii::app()->request->baseUrl; ?>/images/shop.png">Mycart</a></li>

                                    <?php
                                    if (Yii::app()->user->hasState('user_id')) {
                                        ?>
                                        <li class="dropdown">

                                            <button class="btn btn-primary cat dropdown-toggle" type="button" data-toggle="dropdown" style="padding: 0 2px;margin-bottom: none;font-weight: 0;vertical-align: top;">
                                                Hi <?php echo Yii::app()->user->getState('buyer_fname'); ?>
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu categories">
                                                <li><a href=""> Address Book</a></li>
                                                <li><a href=""> Profile</a></li>
                                                <li><a href=""> Change Password</a></li>
                                                <li><a href="<?php echo Yii::app()->request->baseUrl . '/user.php/logout'; ?>">Sign Out</a></li>
                                            </ul>

                                        </li>
                                        <!--<li><a href="#">Settings</a></li>-->
                                        <?php
                                    } else {
                                        ?>
                                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/user-registration">Register</a></li>
                                        <li><a href="<?php echo Yii::app()->request->baseUrl . '/user.php/login'; ?>">Sign In</a></li>
                                    <?php } ?>
                                    <li><a href="<?php echo Yii::app()->request->baseUrl . '/user.php/' . $state; ?>"><?php echo $text; ?></a></li>








                                </ul>

                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <!--<h4 class="modal-title" id="myModalLabel">Modal title</h4>-->
                                            </div>
                                            <div class="modal-body ppp2">

                                                <div class="wallet_upmg">

                                                    <img class="wlt" src="<?= Yii::app()->request->baseUrl; ?>/images/wallet3.png" width="33" height="32" alt=""><span>rs  1</span>Your Wallet Balance</div>

                                                <p>enter amount to be added in wallet</p>

                                                <div class="form-group">

                                                    <input type="email" class="form-new" id="email" placeholder="

                                                           ">
                                                </div>

                                                <button type="button" class="btn btn-primary btn-lg bt_up2" data-toggle="modal" data-target="#myModal">
                                                    Add money to wallet
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
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
                                        <button class="btn btn-primary cat dropdown-toggle" type="button" data-toggle="dropdown"><img class="bars" src="<?= Yii::app()->request->baseUrl; ?>/images/bars.png">Categories
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
        