<section class="content-header">
    <h1>
        ShippingType                <small>Manage</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/masters/MasterShippingTypes/admin'; ?>"><i class="fa fa-dashboard"></i>  Order</a></li>
        <li class="active">Manage</li>
    </ol>
</section>
<section class="content">
    <a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/masters/MasterShippingTypes/create'; ?>" class='btn  btn-laksyah manage'>Add Shipping Types</a>
    <div class="col-sm-12 form-page" style="margin-top: .5em;">

        <div class="box">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'master-shipping-types-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    //'id',
                    'shipping_type',
                    'shipping_rate',
                    'status',
                    //'cb',
                    //'ub',
                    /*
                      'doc',
                      'dou',
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
</section>

