<?php
/* @var $this MasterAdLocationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Ad Locations',
);

$this->menu=array(
	array('label'=>'Create MasterAdLocation', 'url'=>array('create')),
	array('label'=>'Manage MasterAdLocation', 'url'=>array('admin')),
);
?>

<h1>Master Ad Locations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
