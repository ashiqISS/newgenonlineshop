<section class="banner">

    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">


        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2"> Order <span class="redish">History </span></h1>

        </div>

    </div>

</section>

<div class="clearfix"></div>


<section class="facial services">
    <div class="container">



        <div class="heading">


            View Payout History

        </div>


        <div class="form-group">
            <div class="col-md-9">

                <div class="left-content">



                    <?php
//$id = 12;
//$model = MerchantPayoutHistory::model()->findByPk($id);
                    if (!empty($model)) {

                        $model1 = new MerchantPayoutHistory('search');
                        $model1->request_id = $model->request_id;
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'merchant-payout-history-grid',
                            'dataProvider' => $model1->searchAdmin(),
                            'columns' => array(
                                'id',
                                'request_id',
                                array('name' => 'merchant_id',
                                    'value' => function($data) {
                                        return $data->merchant->fullname . ' - ' . $data->merchant->shop_name;
                                    },
                                ),
                                array('name' => 'status',
                                    'value' => function($data) {
                                        return MerchantPayoutHistory::getStatus($data->status);
                                    },
                                ),
                                array(
                                    'header' => '<font color="#61625D">Date</font>',
                                    'value' => function($data) {
                                        return $data->DOC;
                                    },
                                ),
                            ),
                        ));
                    } else {
                        echo 'No history available';
                    }
                    ?>




                    <div class="clearfix"></div>
                </div>

            </div>

            <div class="col-md-3 sidebar ">

                <ul>
                    <li ><a href="<?php echo CommonUrls::merchant_profile(); ?>"> <i class="fa fa-user fa-2x" aria-hidden="true"></i> <span>Profile</span></a></li>
                    <li><a href="<?php echo CommonUrls::banking(); ?>"> <i class="fa fa-unlock-alt fa-2x" aria-hidden="true"></i></i> <span>Banking Accounts</span></a></li>
                    <li><a href="<?php echo CommonUrls::add_product(); ?>" > <i class="fa fa-cart-arrow-down  fa-2x" aria-hidden="true"></i> <span>Add product</span></a></li>
                    <li><a href="<?php echo CommonUrls::change_password(); ?>"  > <i class="fa fa-unlock-alt fa-2x" aria-hidden="true"></i></i> <span>Change Password</span></a></li>
                    <li><a href="<?php echo CommonUrls::my_products(); ?>"> <i class="fa fa-cube fa-2x" aria-hidden="true"></i> <span>My products</span></a></li>
                    <li><a href="<?php echo CommonUrls::featured(); ?>" > <i class="fa fa-picture-o fa-2x" aria-hidden="true"></i> <span>Featured ads </span></a></li>
                    <li><a href="<?php echo CommonUrls::my_sales(); ?>"> <i class="fa fa-line-chart fa-2x" aria-hidden="true"></i> <span>My Sales</span></a></li>
                    <li><a href="<?php echo CommonUrls::request_pay(); ?>"  class="act "> <i class="fa fa-cc-mastercard fa-2x" aria-hidden="true"></i><span>Payment / Payout</span></a></li>
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

