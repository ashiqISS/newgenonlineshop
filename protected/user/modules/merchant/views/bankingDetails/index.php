<?php
/* @var $this BankingDetailsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Banking Details',
);

$this->menu=array(
	array('label'=>'Create BankingDetails', 'url'=>array('create')),
	array('label'=>'Manage BankingDetails', 'url'=>array('admin')),
);
?>

<h1>Banking Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
