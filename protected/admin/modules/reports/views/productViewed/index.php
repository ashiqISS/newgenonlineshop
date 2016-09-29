<?php
/* @var $this ProductViewedController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Vieweds',
);

$this->menu=array(
	array('label'=>'Create ProductViewed', 'url'=>array('create')),
	array('label'=>'Manage ProductViewed', 'url'=>array('admin')),
);
?>

<h1>Product Vieweds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
