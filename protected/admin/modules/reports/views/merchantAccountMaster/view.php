<?php
/* @var $this MerchantAccountMasterController */
/* @var $model MerchantAccountMaster */

$this->breadcrumbs=array(
	'Merchant Account Masters'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MerchantAccountMaster', 'url'=>array('index')),
	array('label'=>'Create MerchantAccountMaster', 'url'=>array('create')),
	array('label'=>'Update MerchantAccountMaster', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MerchantAccountMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MerchantAccountMaster', 'url'=>array('admin')),
);
?>

<h1>View MerchantAccountMaster #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'merchant_id',
		'available_balance',
		'DOC',
		'DOU',
	),
)); ?>
