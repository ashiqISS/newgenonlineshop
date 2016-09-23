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

