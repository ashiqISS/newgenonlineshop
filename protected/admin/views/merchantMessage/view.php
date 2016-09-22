<?php
/* @var $this MerchantMessageController */
/* @var $model MerchantMessage */

$this->breadcrumbs=array(
	'Merchant Messages'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MerchantMessage', 'url'=>array('index')),
	array('label'=>'Create MerchantMessage', 'url'=>array('create')),
	array('label'=>'Update MerchantMessage', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MerchantMessage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MerchantMessage', 'url'=>array('admin')),
);
?>

<h1>View MerchantMessage #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'message',
		'merchant_id',
		'from_to',
		'viewed',
		'doc',
		'status',
	),
)); ?>
