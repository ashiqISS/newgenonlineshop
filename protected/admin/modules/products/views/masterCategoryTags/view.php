<?php
/* @var $this MasterCategoryTagsController */
/* @var $model MasterCategoryTags */

$this->breadcrumbs=array(
	'Master Category Tags'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterCategoryTags', 'url'=>array('index')),
	array('label'=>'Create MasterCategoryTags', 'url'=>array('create')),
	array('label'=>'Update MasterCategoryTags', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterCategoryTags', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterCategoryTags', 'url'=>array('admin')),
);
?>

<h1>View MasterCategoryTags #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category_tag',
		'CB',
		'UB',
		'DOC',
		'DOU',
	),
)); ?>
