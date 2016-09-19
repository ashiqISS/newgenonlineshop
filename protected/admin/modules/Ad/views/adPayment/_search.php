<?php
/* @var $this AdPaymentController */
/* @var $model AdPayment */
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
		<?php echo $form->label($model,'position'); ?>
		<?php echo $form->textField($model,'position',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vendor_name'); ?>
		<?php echo $form->textField($model,'vendor_name',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sort_order'); ?>
		<?php echo $form->textField($model,'sort_order',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'display_from'); ?>
		<?php echo $form->textField($model,'display_from',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'display_to'); ?>
		<?php echo $form->textField($model,'display_to',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payment_status'); ?>
		<?php echo $form->textField($model,'payment_status',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cb'); ?>
		<?php echo $form->textField($model,'cb',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'doc'); ?>
		<?php echo $form->textField($model,'doc',array('class' => 'form-control')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->