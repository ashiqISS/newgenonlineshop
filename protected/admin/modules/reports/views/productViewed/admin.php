<?php
/* @var $this ProductViewedController */
/* @var $model ProductViewed */
?>

<section class="content-header">
        <h1>
                Product Viewed    </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">Product Viewed</li>
        </ol>
</section>

<!-- Main content -->
<section class="content">
        <!--<a href="<?php echo Yii::app()->request->baseurl . '/reports/productViewed/create'; ?>" class='btn  btn-laksyah'>Add New ProductViewed</a>-->
        <div class="col-xs-12 form-page" style="margin-top: .5em;">
                <div class="box">

                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'product-viewed-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
//            		'id',
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
                                array(
                                    'name' => 'product_id',
                                    'header' => 'No.Of Viewers',
                                    'value' => function($data) {
                                            $product_count = ProductViewed::model()->findAll(array('condition' => 'product_id = ' . $data->product_id));
                                            return count($product_count);
                                    },
                                            'type' => 'raw'
                                        ),
//                                        'user_id',
//                                        'date',
//		'feild',
//                                        array(
//                                            'header' => '<font color="#61625D">Edit</font>',
//                                            'htmlOptions' => array('nowrap' => 'nowrap'),
//                                            'class' => 'booster.widgets.TbButtonColumn',
//                                            'template' => '{update}',
//                                        ),
//                                        array(
//                                            'header' => '<font color="#61625D">Delete</font>',
//                                            'htmlOptions' => array('nowrap' => 'nowrap'),
//                                            'class' => 'booster.widgets.TbButtonColumn',
//                                            'template' => '{delete}',
//                                        ),
//                                        array(
//                                            'header' => '<font color="#61625D">View</font>',
//                                            'htmlOptions' => array('nowrap' => 'nowrap'),
//                                            'class' => 'booster.widgets.TbButtonColumn',
//                                            'template' => '{view}',
//                                        ),
                                    ),
                                ));
                                ?>
                </div>

        </div>


</div>
</section>

