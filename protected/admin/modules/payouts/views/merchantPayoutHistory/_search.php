<?php
/* @var $this MerchantPayoutHistoryController */
/* @var $model MerchantPayoutHistory */
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
		<?php echo $form->label($model,'merchant_id'); ?>
		<?php echo $form->textField($model,'merchant_id',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'available_balance'); ?>
		<?php echo $form->textField($model,'available_balance',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'requested_amount'); ?>
		<?php echo $form->textField($model,'requested_amount',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payment_account'); ?>
		<?php echo $form->textField($model,'payment_account',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('class' => 'form-control')); ?>
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