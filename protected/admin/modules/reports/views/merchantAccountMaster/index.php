<?php
/* @var $this MerchantAccountMasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Merchant Account Masters',
);

$this->menu=array(
	array('label'=>'Create MerchantAccountMaster', 'url'=>array('create')),
	array('label'=>'Manage MerchantAccountMaster', 'url'=>array('admin')),
);
?>

<h1>Merchant Account Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
