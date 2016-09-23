<?php
/* @var $this CouponsController */
/* @var $model Coupons */
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
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>20,'maxlength'=>20,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cash_limit'); ?>
		<?php echo $form->textField($model,'cash_limit',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gift_card_amount'); ?>
		<?php echo $form->textField($model,'gift_card_amount',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>50,'maxlength'=>50,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gift_card_id'); ?>
		<?php echo $form->textField($model,'gift_card_id',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'starting_date'); ?>
		<?php echo $form->textField($model,'starting_date',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'expiry_date'); ?>
		<?php echo $form->textField($model,'expiry_date',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'discount'); ?>
		<?php echo $form->textField($model,'discount',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'discount_type'); ?>
		<?php echo $form->textField($model,'discount_type',array('size'=>50,'maxlength'=>50,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unique'); ?>
		<?php echo $form->textField($model,'unique',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('class' => 'form-control')); ?>
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

	<div class="row">
		<?php echo $form->label($model,'session_id'); ?>
		<?php echo $form->textField($model,'session_id',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product_id'); ?>
		<?php echo $form->textField($model,'product_id',array('size'=>20,'maxlength'=>20,'class' => 'form-control')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->