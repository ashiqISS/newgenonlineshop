           
<style>
    .div-4 {
        width: 100%;
    }
</style>
<section class="banner">
    <div id="large-header" class="large-header " style="height: 124px; background: url(<?= Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">
        <div class="banner_txt">
            <div id="large-header2" class="large-header " style="height: 124px; background: url(<?= Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">
                <div class="banner_txt">
                    <h1 class="animated fadeInLeft m2">My <span class="redish">Orders </span></h1>
                </div>
            </div>
            <h1 class="animated fadeInLeft m2">&nbsp;</h1>
        </div>
    </div>
</section>

<div class="clearfix"></div>



<section class="order-history">
    <div class="container">
        <div class="heading">

            My orders

        </div>

        <div class="row">
            <div class="col-md-9">

                <div class="left-my_acnt">



                    <?php
                    if (empty($orders)) {
                        ?> 

                        <h4 class="fournotfour" style="padding: 2em;">You have not made any orders!</h4>
                    <?php } else {
                        ?>

                        <div class="panel-body sis">



                            <div class="div-main hidden-xs">
                                <div class="div-11">
                                    <h3>Product</h3>
                                </div>
                                <div class="div-2">
                                    <h3>Date</h3>
                                </div>
                                <div class="div-3" style="padding-left: 35px;">
                                    <h3>Status</h3>
                                </div>
                            </div>

                            <?php
//                        print_r($orders);
                            foreach ($orders as $order) {
//                            echo '<br><br>'.$order->id.'<br><br>';
                                $orderHistory = OrderHistory::model()->findByAttributes(array('order_id' => $order->id));
                                $orderProducts = OrderProducts::model()->findAllByAttributes(array('order_id' => $order->id));
                                foreach ($orderProducts as $orderProduct) {
//                                echo $orderProduct->product_id.',';
                                    $product = Products::model()->findByPk($orderProduct->product_id);
                                    ?>       
                                    <div class="div-main">
                                        <div class="div-4">
                                            <div class="parttt-1" style="padding: 1em;">
                                                <!--main_image-->
                                                <?php
                                                $folder = Yii::app()->Upload->folderName(0, 1000, $orderProduct->product_id);
                                                ?>
                                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Product/Detail/name/<?php echo $product->canonical_name; ?>">
                                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php echo $folder; ?>/<?php echo $product->id; ?>/small.<?php echo $product->main_image; ?>" class="img-responsive crt mid" align="absmiddle" style="max-height:300px; max-width:200px;display: block;">
                                                </a>
                                                <!--<img class="catz" src="<?= Yii::app()->request->baseUrl; ?>/images/cart.jpg">-->
                                            </div>
                                            <div class="parttt-2">
                                                <h1><?= $product->product_name; ?></h1>
                                                <h2>Qty : <?= $orderProduct->quantity; ?></h2>
                                                <h2>
                                                    <?= Yii::app()->Currency->convert($orderProduct->quantity); ?>
                                                </h2>
                                            </div>

                                            <div class="parttt-3">
                                                <h3>
                                                    <!--June 12, 2017--> 
                                                    <?php
                                                    $date = $orderHistory->date;
                                                    echo date_format( new DateTime($date), 'd/m/y');
                                                    ?>
                                                </h3>
                                            </div>
                                            <div class="parttt-4">
                                                <h3><?= $orderHistory->order_status_comment ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>

                    <?php }
                    ?>


                    <div class="clearfix"></div>
                </div>

            </div>

            <div class="col-md-3 sidebar ">

                <ul>

                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/my-account" > <i class="fa fa-user fa-2x" aria-hidden="true"></i> <span>My Account</span></a></li>
                    <li ><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/edit-profile"> <i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i> <span>Edit profile</span></a></li>
                    <li ><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/change-password"> <i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i> <span>Change Password</span></a></li>
                    <li  ><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/my-orders" class="act "> <i class="fa fa-truck  fa-2x" aria-hidden="true"></i> <span>My orders</span></a></li>
                    <li ><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/address-book" > <i class="fa fa-book  fa-2x" aria-hidden="true"></i> <span>Address book</span></a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/my-wishlist"> <i class="fa fa-heart  fa-2x" aria-hidden="true"></i><span>Wish List</span></a></li>

                </ul>

            </div>
        </div>














    </div>
</section> <!-- end of facial -->




<!-- end of container -->






<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>