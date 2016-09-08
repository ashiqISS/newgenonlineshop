<?php
/* @var $this BankingDetailsController */
/* @var $model BankingDetails */

$this->breadcrumbs=array(
	'Banking Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BankingDetails', 'url'=>array('index')),
	array('label'=>'Create BankingDetails', 'url'=>array('create')),
	array('label'=>'Update BankingDetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BankingDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BankingDetails', 'url'=>array('admin')),
);
?>

<h1>View BankingDetails #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'account_type',
		'account_holder_name',
		'account_number',
		'bank_name',
		'ifsc',
		'paypal_id',
		'email',
		'DOC',
	),
)); ?>
