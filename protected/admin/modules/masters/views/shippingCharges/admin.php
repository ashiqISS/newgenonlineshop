
<section class="content-header">
    <h1>
        Shipping Charges
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Shipping Charges</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/masters/shippingCharges/create'; ?>" class='btn  btn-laksyah'>Add New Shipping Charge</a>
    <div class="col-xs-12 form-page" style="margin-top: .5em;">
        <div class="box">
            <div class="box-body table-responsive no-padding">
                <?php
                $this->widget('booster.widgets.TbGridView', array(
                    'type' => ' bordered condensed hover',
                    'id' => 'shipping-charges-grid',
                    'dataProvider' => $model->search(),
                    'filter' => $model,
                    'columns' => array(
                        'id',
                        'country',
                        'shipping_rate',
                        'doc',
                        'dou',
                        'cb',
                        /*
                          'ub',
                          'status',
                          'sort_order',
                          'zone',
                          'weight',
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
                    ),
                ));
                ?>
            </div>

        </div>


    </div>

</section>


