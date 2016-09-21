<?php
/* @var $this MasterTaxClassController */
/* @var $model MasterTaxClass */

$this->breadcrumbs=array(
	'Master Tax Classes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterTaxClass', 'url'=>array('index')),
	array('label'=>'Create MasterTaxClass', 'url'=>array('create')),
	array('label'=>'Update MasterTaxClass', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterTaxClass', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterTaxClass', 'url'=>array('admin')),
);
?>

<h1>View MasterTaxClass #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tax_class_name',
		'tax_rate',
		'doc',
		'dou',
		'cb',
		'ub',
		'status',
	),
)); ?>
