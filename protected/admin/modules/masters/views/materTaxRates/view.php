<?php
/* @var $this MaterTaxRatesController */
/* @var $model MaterTaxRates */

$this->breadcrumbs=array(
	'Mater Tax Rates'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MaterTaxRates', 'url'=>array('index')),
	array('label'=>'Create MaterTaxRates', 'url'=>array('create')),
	array('label'=>'Update MaterTaxRates', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MaterTaxRates', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MaterTaxRates', 'url'=>array('admin')),
);
?>

<h1>View MaterTaxRates #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tax_name',
		'tax_rate',
		'type',
		'zone',
		'doc',
		'dou',
		'cb',
		'ub',
		'status',
	),
)); ?>
