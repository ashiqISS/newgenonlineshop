<?php
/* @var $this MasterAdLocationController */
/* @var $model MasterAdLocation */

$this->breadcrumbs=array(
	'Master Ad Locations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterAdLocation', 'url'=>array('index')),
	array('label'=>'Create MasterAdLocation', 'url'=>array('create')),
	array('label'=>'Update MasterAdLocation', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterAdLocation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterAdLocation', 'url'=>array('admin')),
);
?>

<h1>View MasterAdLocation #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'ad_location',
		'size',
		'status',
		'cb',
		'doc',
	),
)); ?>
