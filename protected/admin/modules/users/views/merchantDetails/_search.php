<?php
/* @var $this MerchantDetailsController */
/* @var $model MerchantDetails */
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
		<?php echo $form->textField($model,'user_id',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fullname'); ?>
		<?php echo $form->textField($model,'fullname',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product_categories'); ?>
		<?php echo $form->textField($model,'product_categories',array('size'=>60,'maxlength'=>250,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'merchant_type'); ?>
		<?php echo $form->textField($model,'merchant_type',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product_count'); ?>
		<?php echo $form->textField($model,'product_count',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shop_name'); ?>
		<?php echo $form->textField($model,'shop_name',array('size'=>60,'maxlength'=>250,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shop_logo'); ?>
		<?php echo $form->textField($model,'shop_logo',array('size'=>60,'maxlength'=>250,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shop_banner'); ?>
		<?php echo $form->textField($model,'shop_banner',array('size'=>60,'maxlength'=>250,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address'); ?>
		<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50 , 'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pincode'); ?>
		<?php echo $form->textField($model,'pincode',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'locality'); ?>
		<?php echo $form->textField($model,'locality',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'district'); ?>
		<?php echo $form->textField($model,'district',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'country'); ?>
		<?php echo $form->textField($model,'country',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vat_tin'); ?>
		<?php echo $form->textField($model,'vat_tin',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
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

	<div class="row">
		<?php echo $form->label($model,'is_payment_done'); ?>
		<?php echo $form->textField($model,'is_payment_done',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'field2'); ?>
		<?php echo $form->textField($model,'field2',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'field3'); ?>
		<?php echo $form->textField($model,'field3',array('class' => 'form-control')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->