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

                    <div class="col-xs-12">
                        <div class="order_detail_content">
                            <h4>Plan In Details</h4>
                            <?php
                            $this->widget('zii.widgets.CDetailView', array(
                                'data' => $model,
                                'attributes' => array(
                                    array('name' => 'Plan Name',
                                        //'value' => '$data->user->first_name',
                                        'value' => function($data) {
                                            return $data->plan_name;
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
//                                                array('name' => 'Featured Products ',
////                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
//                                                    'value' => function($data) {
//
//                                                            return $data->featured;
//                                                    },
//                                                    'type' => 'raw',
//                                                ),
                                    array('name' => 'Products ',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                                        'value' => function($data) {

                                            return $data->no_of_products;
                                        },
                                        'type' => 'raw',
                                    ),
                                    array('name' => 'Ads ',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                                        'value' => function($data) {

                                            return $data->no_of_ads;
                                        },
                                        'type' => 'raw',
                                    ),
                                    array('name' => 'Status',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                                        'value' => function($data) {
                                            if ($data->status == 1) {
                                                return 'Active';
                                            } else {
                                                return 'Plan Outdated';
                                            }
                                        },
                                        'type' => 'raw',
                                    ),
                                ),
                            ));
                            ?>
                        </div>
                        <br />

                        <div class="btn-place-1">
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'merchant-plans-form',
                                'action' => Yii::app()->request->baseUrl . '/index.php/merchant/merchantDetails/UpgradePlan',
                                // Please note: When you enable ajax validation, make sure the corresponding
                                // controller action is handling ajax validation correctly.
                                // See class documentation of CActiveForm for details on this,
                                // you need to use the performAjaxValidation()-method described there.
                                'enableAjaxValidation' => false,
                            ));
                            ?>
                            <?php echo $form->hiddenField($model, 'id', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control', 'value' => $model->id)); ?>
                            <button type="submit" class="btn btn-primary btn-lg bt_up2">Upgrade Now</button>
                            <?php $this->endWidget(); ?>
                        </div>
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
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
