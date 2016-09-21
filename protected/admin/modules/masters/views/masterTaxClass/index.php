<?php
/* @var $this MasterTaxClassController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Tax Classes',
);

$this->menu=array(
	array('label'=>'Create MasterTaxClass', 'url'=>array('create')),
	array('label'=>'Manage MasterTaxClass', 'url'=>array('admin')),
);
?>

<h1>Master Tax Classes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
