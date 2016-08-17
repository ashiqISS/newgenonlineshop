<?php
/* @var $this MasterCategoryTagsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Category Tags',
);

$this->menu=array(
	array('label'=>'Create MasterCategoryTags', 'url'=>array('create')),
	array('label'=>'Manage MasterCategoryTags', 'url'=>array('admin')),
);
?>

<h1>Master Category Tags</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
