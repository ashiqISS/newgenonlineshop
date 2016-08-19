<?php
/* @var $this BuyerDetailsController */
/* @var $model BuyerDetails */

$this->breadcrumbs=array(
	'Buyer Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BuyerDetails', 'url'=>array('index')),
	array('label'=>'Create BuyerDetails', 'url'=>array('create')),
	array('label'=>'Update BuyerDetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BuyerDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BuyerDetails', 'url'=>array('admin')),
);
?>

<h1>View BuyerDetails #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'first_name',
		'last_name',
		'dob',
		'gender',
		'phone_no_2',
		'newsletter',
		'wallet_amt',
		'CB',
		'UB',
		'DOC',
		'DOU',
		'field2',
		'field3',
	),
)); ?>
