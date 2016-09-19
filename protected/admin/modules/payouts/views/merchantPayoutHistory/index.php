<?php
/* @var $this MerchantPayoutHistoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Merchant Payout Histories',
);

$this->menu=array(
	array('label'=>'Create MerchantPayoutHistory', 'url'=>array('create')),
	array('label'=>'Manage MerchantPayoutHistory', 'url'=>array('admin')),
);
?>

<h1>Merchant Payout Histories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
