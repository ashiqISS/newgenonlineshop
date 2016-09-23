<?php
/* @var $this CouponsController */
/* @var $model Coupons */

$this->breadcrumbs=array(
	'Coupons'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Coupons', 'url'=>array('index')),
	array('label'=>'Create Coupons', 'url'=>array('create')),
	array('label'=>'Update Coupons', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Coupons', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Coupons', 'url'=>array('admin')),
);
?>

<h1>View Coupons #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'cash_limit',
		'gift_card_amount',
		'code',
		'gift_card_id',
		'starting_date',
		'expiry_date',
		'discount',
		'discount_type',
		'unique',
		'type',
		'status',
		'DOC',
		'DOU',
		'session_id',
		'product_id',
	),
)); ?>
