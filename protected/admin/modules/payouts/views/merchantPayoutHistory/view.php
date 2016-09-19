<?php
/* @var $this MerchantPayoutHistoryController */
/* @var $model MerchantPayoutHistory */

$this->breadcrumbs=array(
	'Merchant Payout Histories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MerchantPayoutHistory', 'url'=>array('index')),
	array('label'=>'Create MerchantPayoutHistory', 'url'=>array('create')),
	array('label'=>'Update MerchantPayoutHistory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MerchantPayoutHistory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MerchantPayoutHistory', 'url'=>array('admin')),
);
?>

<h1>View MerchantPayoutHistory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'merchant_id',
		'available_balance',
		'requested_amount',
		'payment_account',
		'status',
		'DOC',
		'DOU',
	),
)); ?>
