<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Userss'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'Update Users', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Users', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>

<h1>View Users #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_type',
		'email',
		'phone_number',
		'password',
		'activation_link',
		'verification_code',
		'user_status',
		'bad_attempts',
		'last_login',
		'DOC',
		'DOU',
		'CB',
		'UB',
		'field1',
	),
)); ?>
