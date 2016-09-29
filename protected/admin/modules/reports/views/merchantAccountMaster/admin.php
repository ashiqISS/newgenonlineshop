<?php
/* @var $this MerchantAccountMasterController */
/* @var $model MerchantAccountMaster */
?>

<section class="content-header">
    <h1>
        Merchant Accounts    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">MerchantAccountMaster</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="col-xs-12 form-page" style="margin-top: .5em;">
        <div class="box">

            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'merchant-account-master-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    'id',
//		'merchant_id',
                    array('name' => 'merchant_id',
                        'value' => function($data) {
                            $name = MerchantDetails::getMerchantname($data->merchant_id);
                            return $name;
                        },
                    ),
                    'available_balance',
                    'DOC',
                    'DOU',
//            array(
//            'header' => '<font color="#61625D">Edit</font>',
//            'htmlOptions' => array('nowrap' => 'nowrap'),
//            'class' => 'booster.widgets.TbButtonColumn',
//            'template' => '{update}',
//            ),
//            array(
//            'header' => '<font color="#61625D">Delete</font>',
//            'htmlOptions' => array('nowrap' => 'nowrap'),
//            'class' => 'booster.widgets.TbButtonColumn',
//            'template' => '{delete}',
//            ),
//            array(
//            'header' => '<font color="#61625D">View</font>',
//            'htmlOptions' => array('nowrap' => 'nowrap'),
//            'class' => 'booster.widgets.TbButtonColumn',
//            'template' => '{view}',
//            ),
                ),
            ));
            ?>
        </div>

    </div>


</div>
</section>

