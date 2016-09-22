<?php
/* @var $this MerchantMessageController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Merchant Messages',
);

$this->menu=array(
	array('label'=>'Create MerchantMessage', 'url'=>array('create')),
	array('label'=>'Manage MerchantMessage', 'url'=>array('admin')),
);
?>

<h1>Merchant Messages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
