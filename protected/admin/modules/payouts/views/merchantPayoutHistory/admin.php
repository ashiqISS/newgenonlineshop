<?php
/* @var $this MerchantPayoutHistoryController */
/* @var $model MerchantPayoutHistory */
?>

<section class="content-header">
    <h1>
        MerchantPayoutHistory    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseurl.'/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">MerchantPayoutHistory</li>
    </ol>
</section>
<?php 
echo MerchantPayoutHistory::getStatus(1);
?>
<!-- Main content -->
<section class="content">
    <a href="<?php echo Yii::app()->request->baseurl.'/merchantPayoutHistory/create'; ?>" class='btn  btn-laksyah'>Add New MerchantPayoutHistory</a>
    <div class="col-xs-12 form-page" style="margin-top: .5em;">
        <div class="box">

            <?php $this->widget('booster.widgets.TbGridView', array(
            'type' => ' bordered condensed hover',
            'id'=>'merchant-payout-history-grid',
            'dataProvider'=>$model->search(),
            'filter'=>$model,
            'columns'=>array(
            		'id',
		'merchant_id',
		'available_balance',
		'requested_amount',
		'payment_account',
		'status',
		/*
		'DOC',
		'DOU',
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
            )); ?>
        </div>

    </div>


</div>
</section>

