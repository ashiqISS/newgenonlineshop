<?php
/* @var $this CouponsController */
/* @var $model Coupons */
?>

<section class="content-header">
        <h1>
                Coupons    </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseurl . '/admin.php/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">Coupons</li>
        </ol>
</section>

<!-- Main content -->
<section class="content">
        <a href="<?php echo Yii::app()->request->baseurl . '/admin.php/products/coupons/create'; ?>" class='btn  btn-laksyah'>Add New Coupons</a>
        <div class="col-xs-12 form-page" style="margin-top: .5em;">
                <div class="box">

                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'coupons-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
                                // 'id',
                                //'user_id',
                                //'cash_limit',
                                //'gift_card_amount',
                                'code',
                                //'gift_card_id',
                                'starting_date',
                                'expiry_date',
                                'discount',
                                /* 'discount_type',
                                  'unique',
                                  'type',
                                  'status',
                                  'DOC',
                                  'DOU',
                                  'session_id',
                                  'product_id',
                                 */
                                array(
                                    'header' => '<font color="#61625D">Edit</font>',
                                    'htmlOptions' => array('nowrap' => 'nowrap'),
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'template' => '{update}',
                                ),
                                array(
                                    'header' => '<font color="#61625D">Delete</font>',
                                    'htmlOptions' => array('nowrap' => 'nowrap'),
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'template' => '{delete}',
                                ),
                                array(
                                    'header' => '<font color="#61625D">View</font>',
                                    'htmlOptions' => array('nowrap' => 'nowrap'),
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'template' => '{view}',
                                ),
                            ),
                        ));
                        ?>
                </div>

        </div>


</div>
</section>

