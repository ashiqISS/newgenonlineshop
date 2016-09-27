<section class="banner">

    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">


        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">MY <span class="redish">Plans </span></h1>

        </div>

    </div>

</section>

<div class="clearfix"></div>


<section class="facial services">
    <div class="container">



        <div class="heading">


            Plan Details

        </div>


        <div class="form-group">
            <div class="col-md-9">

                <div class="left-content">
<div class="order_detail_content">
                                        <h4>Your Plans Details</h4>
                                        <?php
                                        $this->widget('zii.widgets.CDetailView', array(
                                            'data' => $model,
                                            'attributes' => array(
                                                array('name' => 'Plan Name',
                                                    //'value' => '$data->user->first_name',
                                                    'value' => function($data) {
                                                            return PlanDetails::model()->findByPk($data->plan_id)->plan_name;
                                                    },
                                                    'type' => 'raw',
                                                ),
                                                array('name' => 'Plan Amount',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                                                    'value' => function($data) {

                                                            return Yii::app()->Currency->convert($data->amount);
                                                    },
                                                    'type' => 'raw',
                                                ),
                                                array('name' => 'Plan Creation Date',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                                                    'value' => function($data) {

                                                            return Date('d-M-Y', strtotime($data->doc));
                                                    },
                                                    'type' => 'raw',
                                                ),
                                                array('name' => 'Plan Expiration Date',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                                                    'value' => function($data) {
                                                            $date = date('Y-m-d', strtotime($data->doc));
                                                            return date("d-M-Y", strtotime($date . " +  $data->no_of_days days"));
                                                    },
                                                    'type' => 'raw',
                                                ),
//                                                array('name' => 'Featured Products Allocation',
////                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
//                                                    'value' => function($data) {
//
//                                                            return $data->featured;
//                                                    },
//                                                    'type' => 'raw',
//                                                ),
//                                                array('name' => 'Featured Products Left to Upload',
////                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
//                                                    'value' => function($data) {
//
//                                                            return $data->featured_left;
//                                                    },
//                                                    'type' => 'raw',
//                                                ),
                                                array('name' => 'Products Allocation',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                                                    'value' => function($data) {

                                                            return $data->no_of_product;
                                                    },
                                                    'type' => 'raw',
                                                ),
                                                array('name' => 'Products Left To Upload',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                                                    'value' => function($data) {

                                                            return $data->no_of_product_left;
                                                    },
                                                    'type' => 'raw',
                                                ),
                                                array('name' => 'Ads Allocation',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                                                    'value' => function($data) {

                                                            return $data->no_of_ads;
                                                    },
                                                    'type' => 'raw',
                                                ),
                                                array('name' => 'Ads Left To Upload',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                                                    'value' => function($data) {

                                                            return $data->no_of_ads_left;
                                                    },
                                                    'type' => 'raw',
                                                ),
                                                array('name' => 'Status',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                                                    'value' => function($data) {
                                                            if ($data->status == 1) {
                                                                    return 'Active';
                                                            } else {
                                                                    return 'Plan Expired';
                                                            }
                                                    },
                                                    'type' => 'raw',
                                                ),
                                            ),
                                        ));
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
