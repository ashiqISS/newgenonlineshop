
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo Yii::app()->name; ?></title>                                                                                                                                                                                                                                                                                                             
        <!-- Tell the browser to be responsive to screen width -->
        <!--<link rel="stylesheet" href="<?php // echo Yii::app()->baseUrl;         ?>/css/admin.css">-->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->

        <!-- Font Awesome -->

        <link rel="icon" href="<?php echo Yii::app()->baseUrl; ?>/images/fav.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/images/fav.ico" type="image/x-icon" />
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/admin-themes/dist/css/skins/skin-laksyah.min.css">

        <!-- Bootstrap 3.3.5 -->                                                                    
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/admin-themes/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/admin-themes/dist/css/skins/_all-skins.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/admin-themes/plugins/iCheck/flat/blue.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/admin-themes/plugins/morris/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/admin-themes/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/admin-themes/plugins/datepicker/datepicker3.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/admin-themes/plugins/daterangepicker/daterangepicker-bs3.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/admin-themes/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

        <!-- Slimscroll -->
        <script src="<?php echo Yii::app()->baseUrl ?>/admin-themes/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo Yii::app()->baseUrl ?>/admin-themes/plugins/fastclick/fastclick.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo Yii::app()->baseUrl ?>/admin-themes/dist/js/app.min.js"></script>
        <script>
            var baseurl = "<?php print Yii::app()->request->baseUrl . "/admin.php/"; ?>";
            var basepath = "<?php print Yii::app()->basePath; ?>";
        </script>
        <style>
            .errorMessage{
                color: #b94a48;
            }
        </style>

    </head>



    <body class="hold-transition skin-laksyah sidebar-mini fixed">
        <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">

                <!-- Logo -->

                <a href="#" class="logo">
                    <!--Newgen Shop-->
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/admin/logo_inside.png" />
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><img src="http://www.intersmartsolutions.com/dev2/newgen-html/images/admin/logo_inside.png" /></span>
                    <!--logo for regular state and mobile devices--> 
                    <span class="logo-lg"><img src="<?php echo Yii::app()->baseUrl; ?>/images/logo_small.png" /></span>

                </a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="notifications-menu">

                                <a class="header_info"> Logged in as admin</a>

                            </li>
                            <li class="notifications-menu">

                                <a class="header_info"> <?php echo date("l, F j, Y", strtotime(date('Y-m-d'))); ?></a>

                            </li>
                            <li class=" messages-menu">
                                <a href="<?php echo Yii::app()->baseUrl; ?>/admin.php/site/logOut" class="header_info"style="color: #F7931E;"><i class="fa fa-sign-out"></i> Logout</a>

                            </li>


                        </ul>
                    </div>


                </nav>



            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">

                    <?php
                    $actionId = Yii::app()->controller->id;
                    switch ($actionId) {
                        case "adminUser":
                            $action1 = "active";
                            $actionn1 = "active";
                            break;
                        case "adminPost":
                            $action2 = "active";
                            $actionn1 = "active";
                            break;
                        case "buyerDetails":
                            $action3 = "active";
                            $actionn2 = "active";
                            break;
                        case "merchantDetails":
                            $action4 = "active";
                            $actionn2 = "active";
                            break;
                        case "productCategory":
                            $action5 = "active";
                            $actionn3 = "active";
                            break;
                        case "products":
                            $action6 = "active";
                            $actionn3 = "active";
                            break;
                        case "currency":
                            $action7 = "active";
                            $actionn4 = "active";
                            break;
                        case "masterShippingTypes":
                            $action8 = "active";
                            $actionn4 = "active";
                            break;
                        case "shippingCharges":
                            $action9 = "active";
                            $actionn4 = "active";
                            break;
                        case "weightClass":
                            $action10 = "active";
                            $actionn4 = "active";
                            break;
                        case "userAddress":
                            $action11 = "active";
                            $actionn4 = "active";
                            break;
                        case "countries":
                            $action12 = "active";
                            $actionn4 = "active";
                            break;
                        case "districts":
                            $action13 = "active";
                            $actionn4 = "active";
                            break;
                        case "states":
                            $action14 = "active";
                            $actionn4 = "active";
                            break;
                        case "order":
                            $action15 = "active";
                            $actionn5 = "active";
                            break;
                        case "orderStatus":
                            $action16 = "active";
                            $actionn5 = "active";
                            break;
                        case "orderProducts":
                            $action17 = "active";
                            $actionn5 = "active";
                            break;
                        case "orderHistory":
                            $action18 = "active";
                            $actionn5 = "active";
                            break;
                        case "masterBrands":
                            $action19 = "active";
                            $actionn4 = "active";
                            break;

                        case "site":
                            if (Yii::app()->controller->action->id == "home") {
                                $action18 = "active";
                            }

                            break;
                        default:
                            $action18 = "active";
                            break;
                    }
                    ?>
                    <ul class="sidebar-menu">

                        <li class="<?php echo $action18 ?>">
                            <a href="<?php echo Yii::app()->baseUrl ?>/admin.php/site/home">
                                <i class="fa fa-dashboard"></i><span> Dash Board</span>
                            </a>
                        </li>
                        <?php if (isset(Yii::app()->session['post']['admin']) && Yii::app()->session['post']['admin'] == 1) { ?>
                            <li class="<?php echo $actionn1 ?> treeview">
                                <a href="#"><i class="fa fa-user-secret"></i> <span>Admin</span> <i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li class="<?php echo $action1 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/settings/AdminUser/admin"><i class="fa fa-circle-o"></i> Admin User</a></li>
                                    <li class="<?php echo $action2 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/settings/AdminPost/admin"><i class="fa fa-circle-o"></i> Admin Post</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <li class="<?php echo $actionn2 ?> treeview">
                            <a href="#"><i class="fa fa-users"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li class="<?php echo $action3 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/users/BuyerDetails/admin"><i class="fa fa-circle-o"></i> Buyer</a></li>
                                <li class="<?php echo $action4 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/users/MerchantDetails/admin"><i class="fa fa-circle-o"></i> Merchant</a></li>
                            </ul>
                        </li>
                        <?php if (isset(Yii::app()->session['post']['products']) && Yii::app()->session['post']['products'] == 1) { ?>
                            <li class="<?php echo $actionn3 ?> treeview">
                                <a href="#"><i class="fa fa-bars"></i> <span>Products</span> <i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li class="<?php echo $action5 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/products/ProductCategory/admin"><i class="fa fa-circle-o"></i> Product Category</a></li>
                                    <li class="<?php echo $action6 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/products/Products/admin"><i class="fa fa-circle-o"></i> All Products</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if (isset(Yii::app()->session['post']['products']) && Yii::app()->session['post']['products'] == 1) { ?>
                            <li class="<?php echo $actionn5 ?> treeview">
                                <a href="#"><i class="fa fa-bars"></i> <span>Orders</span> <i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li class="<?php echo $action15 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/products/Order/admin"><i class="fa fa-circle-o"></i>Order</a></li>
                                    <li class="<?php echo $action16 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/products/OrderStatus/admin"><i class="fa fa-circle-o"></i> Order status</a></li>
                                    <li class="<?php echo $action17 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/products/OrderProducts/admin"><i class="fa fa-circle-o"></i> Order Products</a></li>
                                    <li class="<?php echo $action18 ?>"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/products/OrderHistory/admin"><i class="fa fa-circle-o"></i> Order History</a></li>


                                </ul>
                            </li>
                        <?php } ?>
                        <?php if (isset(Yii::app()->session['post']['masters']) && Yii::app()->session['post']['masters'] == 1) { ?>
                            <li class="<?php echo $actionn4 ?> treeview">
                                <a href="#"><i class="fa fa-database"></i> <span>Masters</span> <i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li class="<?php echo $action7 ?> treeview"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/masters/Currency/admin"><i class="fa fa-circle-o"></i>Currency</a></li>
                                    <li class="<?php echo $action8 ?> treeview"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/masters/MasterShippingTypes/admin"><i class="fa fa-circle-o"></i>Shipping Types</a></li>
                                    <li class="<?php echo $action9 ?> treeview"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/masters/shippingCharges/admin"><i class="fa fa-circle-o"></i>Shipping Charges</a></li>
                                    <li class="<?php echo $action10 ?> treeview"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/masters/WeightClass/admin"><i class="fa fa-circle-o"></i> Weight Class</a></li>
                                    <li class="<?php echo $action11 ?> treeview"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/users/UserAddress/admin"><i class="fa fa-circle-o"></i> User Address</a></li>
                                    <li class="<?php echo $action12 ?> treeview"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/masters/Countries/admin"><i class="fa fa-circle-o"></i> Countries</a></li>
                                    <li class="<?php echo $action13 ?> treeview"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/masters/Districts/admin"><i class="fa fa-circle-o"></i> Districts</a></li>
                                    <li class="<?php echo $action14 ?> treeview"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/masters/States/admin"><i class="fa fa-circle-o"></i> States</a></li>
                                    <li class="<?php echo $action19 ?> treeview"><a href="<?php echo Yii::app()->baseUrl ?>/admin.php/brands-admin"><i class="fa fa-circle-o"></i> Brands</a></li>
                                </ul>
                            </li>                         

                        <?php } ?>

                    </ul><!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->

                <?php echo $content; ?>

            </div><!-- /.content-wrapper -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->

                <!-- Default to the left -->
                <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">Intersmart Solutions</a>.</strong> All rights reserved.
            </footer>

        </div><!-- ./wrapper -->

    </body>
</html>
