<?php
/* @var $this AdPaymentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ad Payments',
);

$this->menu=array(
	array('label'=>'Create AdPayment', 'url'=>array('create')),
	array('label'=>'Manage AdPayment', 'url'=>array('admin')),
);
?>

<h1>Ad Payments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
