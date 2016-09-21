<style>
        .table > thead > tr > th
        {
                text-align: left;
        }
</style>
<?php date_default_timezone_set('Asia/Kolkata'); ?>

<section class="banner">
        <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">
                <div class="banner_txt">
                        <h1 class="animated fadeInLeft m2">My <span class="redish">sales</span></h1>
                </div>

        </div>

</section>
<div class="clearfix"></div>
<section class="cart-main">
        <div class="container">
                <div class="heading">
                        Selling report
                </div>
                <div class="row">
                        <div class="col-lg-8 col-md-9 his">

                                <div class="left-my_acnt">

                                        <div class="panel-body sis">
                                                <?php
                                                if (empty($sales)) {
                                                        ?>
                                                        <h4 class="fournotfour">You have no completed orders!</h4>
                                                        <?php
                                                } else {
                                                        ?>


                                                        <div class="table-responsive ac_up">
                                                                <table class="table ac">
                                                                        <thead class="thead-inverse ac_bg">
                                                                                <tr>
                                                                                        <th>Sales Id</th>
                                                                                        <th>Product Id</th>
                                                                                        <th>Product Name </th>
                                                                                        <th>Date </th>
                                                                                        <th>Sales	</th>
                                                                                        <th>Total Amount </th>
                                                                                </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                                <?php
                                                                                foreach ($sales as $sale) {
                                                                                        ?>

                                                                                        <tr>
                                                                                                <td><?= $sale->id; ?></td>
                                                                                                <td><?= $sale->product_id; ?></td>
                                                                                                <td><?= Products::model()->findByPk($sale->product_id)->product_name; ?></td>
                                                                                                <td> <?= date("d/m/Y", strtotime($sale->DOC)); ?></td>
                                                                                                <td><?= $sale->quantity; ?></td>
                                                                                                <td><?= Yii::app()->Currency->convert($sale->total_amount); ?></td>
                                                                                        </tr>
                                                                                        <?php
                                                                                }
                                                                                ?>

                                                                        </tbody>
                                                                </table>




                                                        </div>


                                                        <div class="fifty-1">
                                                                <a href="<?php echo Yii::app()->request->baseUrl . '/user.php/merchant/order/PrintSalesReport' ?>" target="_blank"> <span class="prnt"> <img class="fives" src="<?php echo Yii::app()->request->baseUrl; ?>/images/print.png" title="Print"></span></a>
                                                        </div>
                                                        <?php
                                                }
                                                ?>

                                        </div>




                                        <div class="clearfix"></div>
                                </div>

                        </div>

                        <div class="col-md-3 sidebar ">

                                <ul>
                                        <li ><a href="<?php echo CommonUrls::merchant_profile(); ?>"> <i class="fa fa-user fa-2x" aria-hidden="true"></i> <span>Profile</span></a></li>
                                        <li><a href="<?php echo CommonUrls::banking(); ?>"> <i class="fa fa-unlock-alt fa-2x" aria-hidden="true"></i></i> <span>Banking Accounts</span></a></li>
                                        <li><a href="<?php echo CommonUrls::add_product(); ?>" > <i class="fa fa-cart-arrow-down  fa-2x" aria-hidden="true"></i> <span>Add product</span></a></li>
                                        <li><a href="<?php echo CommonUrls::change_password(); ?>"> <i class="fa fa-unlock-alt fa-2x" aria-hidden="true"></i></i> <span>Change Password</span></a></li>
                                        <li><a href="<?php echo CommonUrls::my_products(); ?>"> <i class="fa fa-cube fa-2x" aria-hidden="true"></i> <span>My products</span></a></li>
                                        <li><a href="<?php echo CommonUrls::featured(); ?>"> <i class="fa fa-picture-o fa-2x" aria-hidden="true"></i> <span>Featured ads </span></a></li>
                                        <li><a href="<?php echo CommonUrls::my_sales(); ?>"  class="act "> <i class="fa fa-line-chart fa-2x" aria-hidden="true"></i> <span>My Sales</span></a></li>
                                        <li><a href="<?php echo CommonUrls::request_pay(); ?>"> <i class="fa fa-cc-mastercard fa-2x" aria-hidden="true"></i><span>Payment / Payout</span></a></li>
                                </ul>

                        </div>
                </div>













        </div>
</div>
</section> <!-- end of facial -->




<!-- end of container -->


<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>
