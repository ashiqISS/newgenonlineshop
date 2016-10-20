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
                    echo 'Hi ' . MerchantDetails::getMerchantname($id) . ',<br>';
                    echo $userdetails->email . '<br>';
                    echo MerchantDetails::getShopname($id) . '<br>';
                    ?>
                </div>
                <div class="col-md-6">

                </div>

            </div>       
            <hr>
            <div class="row">
                <h2>Recent Orders</h2>
            </div>
            <?php echo $this->renderPartial('_my_orders', array('sale' => $sale)); ?>
        </div>

    </div>
</div>
</section> <!-- end of facial -->

<!-- end of container -->

<!-- end of container -->
<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>