<?php
/* @var $this MaterTaxRatesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mater Tax Rates',
);

$this->menu=array(
	array('label'=>'Create MaterTaxRates', 'url'=>array('create')),
	array('label'=>'Manage MaterTaxRates', 'url'=>array('admin')),
);
?>

<h1>Mater Tax Rates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
