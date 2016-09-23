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
                                            <th>Order Id</th>
                                            <th>Customer Name</th>
                                            <th>Product Name </th>
                                            <th>Amount </th>
                                            <th>date of Order</th>
                                            <th>Quantity </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        foreach ($sales as $sale) {
                                            $order_produ = Order::model()->findByPk($sale->order_id);
                                            $order_products = Products::model()->findByPk($sale->product_id);
                                            $user = BuyerDetails::model()->findByAttributes(array('user_id' => $order_produ->user_id));
                                            ?>

                                            <tr>
                                                <td>ID-<?= $order_produ->id; ?></td>
                                                <td>
                                                    <?php
                                                    if ($order_produ->user_id == '' || $order_produ->user_id == 0) {
                                                        echo 'Unknown';
                                                    } else {
                                                        echo $user->first_name . ' ' . $user->last_name;
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $order_products->product_name; ?></td>
                                                <td> <?= $order_produ->total_amount; ?></td>
                                                <td><?= date('d-m-Y', strtotime($order_produ->order_date)); ?></td>
                                                <td><?= $sale->quantity; ?></td>
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

            <?php echo $this->renderPartial('_rightMenu'); ?>
        </div>













    </div>
</div>
</section> <!-- end of facial -->




<!-- end of container -->


<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>
