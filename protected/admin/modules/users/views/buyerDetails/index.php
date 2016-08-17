<?php
/* @var $this BuyerDetailsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Buyer Details',
);

$this->menu=array(
	array('label'=>'Create BuyerDetails', 'url'=>array('create')),
	array('label'=>'Manage BuyerDetails', 'url'=>array('admin')),
);
?>

<h1>Buyer Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
