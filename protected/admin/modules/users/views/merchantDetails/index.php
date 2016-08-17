<?php
/* @var $this MerchantDetailsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Merchant Details',
);

$this->menu=array(
	array('label'=>'Create MerchantDetails', 'url'=>array('create')),
	array('label'=>'Manage MerchantDetails', 'url'=>array('admin')),
);
?>

<h1>Merchant Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
