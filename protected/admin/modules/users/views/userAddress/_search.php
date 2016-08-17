<?php
/* @var $this UserAddressController */
/* @var $model UserAddress */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'userid'); ?>
		<?php echo $form->textField($model,'userid',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'company'); ?>
		<?php echo $form->textField($model,'company',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_number'); ?>
		<?php echo $form->textField($model,'contact_number',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address_1'); ?>
		<?php echo $form->textArea($model,'address_1',array('rows'=>6, 'cols'=>50 , 'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address_2'); ?>
		<?php echo $form->textArea($model,'address_2',array('rows'=>6, 'cols'=>50 , 'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'postcode'); ?>
		<?php echo $form->textField($model,'postcode',array('size'=>60,'maxlength'=>111,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'country'); ?>
		<?php echo $form->textField($model,'country',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>60,'maxlength'=>111,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'default_billing_address'); ?>
		<?php echo $form->textField($model,'default_billing_address',array('size'=>60,'maxlength'=>111,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'default_shipping_address'); ?>
		<?php echo $form->textField($model,'default_shipping_address',array('size'=>60,'maxlength'=>111,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CB'); ?>
		<?php echo $form->textField($model,'CB',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UB'); ?>
		<?php echo $form->textField($model,'UB',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DOC'); ?>
		<?php echo $form->textField($model,'DOC',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DOU'); ?>
		<?php echo $form->textField($model,'DOU',array('class' => 'form-control')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->