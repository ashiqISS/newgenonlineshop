<style>
    .table > thead > tr > th
    {
        text-align: left;
    }

    .button1 {
        background:url('<?php echo Yii::app()->request->baseUrl . "/images/print.png"; ?>');
        cursor:pointer;

    }
</style>


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
            Most Purchased
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-9 his">

                <div class="left-my_acnt">
                    <div style="padding: 2em;">
                        <?php echo $this->renderPartial('_reports_sub_menu'); ?>
                    </div>

                    <div class="panel-body sis">
                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'purchased-viewed-grid',
                            'dataProvider' => $model->MostPurchasedProducts(),
                            'filter' => $model,
                            'columns' => array(
                                array(
                                    'name' => 'product_id',
                                    'value' => function($data) {
                                            $product_det = Products::model()->findByPk($data->product_id);
                                            return $product_det->product_name;
                                    },
                                    'type' => 'raw'
                                ),
                                array(
                                    'name' => 'product_id',
                                    'header' => 'Product Code',
                                    'value' => function($data) {
                                            $product_det = Products::model()->findByPk($data->product_id);
                                            return $product_det->product_code;
                                    },
                                    'type' => 'raw'
                                ),
                                'value_occurrence'
//                                array(
//                                    'name' => 'product_id',
//                                    'header' => 'No.Of Viewers',
//                                    'value' => function($data) {
//                                            $product_count = ProductViewed::model()->findAll(array('condition' => 'product_id = ' . $data->product_id));
//                                            return count($product_count);
//                                    },
//                                            'type' => 'raw'
//                                        ),
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