<style>
    .services {
        background-color: #fff;
        overflow: hidden;
        padding-bottom: 40px;
        padding-top: 20px;
    }
    .table > thead > tr > th {
        text-align: left;
    }
</style>
<section class="banner">
    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">
        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">Merchant <span class="redish">Dashboard </span></h1>
        </div>
    </div>
</section>

<div class="clearfix"></div>

<section class="facial services">
    <div class="container">
        <div class="heading">
            DashBoard
        </div>

        <div class="left-content">
            <div class="row">
                <div class="col-md-6">
                    <?php
                    $id = Yii::app()->user->getState('merchant_id');
                    echo 'Hi ' . MerchantDetails::getFullname($id) . ',<br>';
                    echo $userdetails->email . '<br>';
                    echo MerchantDetails::getShopname($id) . '<br>';
                    ?>
                </div>
                <div class="col-md-6">

                </div>

            </div>       

            <div class="row">
                <h2>Recent Orders</h2>
                <?php if (!empty($sale)) { ?>
                    <div class="table-responsive ord_a">
                        <table class="table ac">
                            <thead class="thead-inverse ">
                                <tr>
                                    <th>Order id</th>
                                    <th>Product Name </th>
                                    <th> Ordered date	</th>
                                    <th>Total price</th>
                                    <th> Status</th>
                                    <th>View details</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($sale as $sales) {
                                    $order_id = Order::model()->findByPk($sales->order_id);
                                    $products_name = Products::model()->findByAttributes(array('id' => $sales->product_id));
                                    ?>
                                    <tr>
                                        <td>#<?= $sales->order_id; ?></td>
                                        <td><?= $products_name->product_name; ?></td>
                                        <td><?= date('d - m - Y', strtotime($order_id->order_date)); ?></td>
                                        <td><?= $products_name->price; ?></td>                                           
                                        <td><?php
                                            if ($order_id->status == 0) {
                                                echo 'Not Placed';
                                            } elseif ($order_id->status == 1) {
                                                echo 'Not Delivered';
                                            } elseif ($order_id->status == 2) {
                                                echo 'Success';
                                            } elseif ($order_id->status == 3) {
                                                echo 'Failed';
                                            } else {
                                                echo 'Error';
                                            }
                                            ?></td>
                                        <td><?php echo CHtml::link('<i class="fa fa-eye"  style="max-width:15%;font-size: 19px;
    color: #000;"></i>', array('Myaccount/OrderViewDetail', 'id' => CHtml::encode($sales->id))); ?></td>

                                    </tr>

                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                <?php } ?>

            </div>
        </div>

    </div>
</div>
</section> <!-- end of facial -->

<section class="facial services">
    <div class="container">
        <div class="row">

        </div>
    </div>
</section> <!-- end of facial -->

<!-- end of container -->

<!-- end of container -->
<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>