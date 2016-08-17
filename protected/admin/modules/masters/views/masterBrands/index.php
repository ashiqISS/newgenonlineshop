<?php
/* @var $this MasterBrandsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Brands',
);

$this->menu=array(
	array('label'=>'Create MasterBrands', 'url'=>array('create')),
	array('label'=>'Manage MasterBrands', 'url'=>array('admin')),
);
?>

<h1>Master Brands</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
