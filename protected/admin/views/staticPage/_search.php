<?php
/* @var $this StaticPageController */
/* @var $model StaticPage */
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
		<?php echo $form->label($model,'category_name'); ?>
		<?php echo $form->textField($model,'category_name',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parent'); ?>
		<?php echo $form->textField($model,'parent',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'side_menu'); ?>
		<?php echo $form->textField($model,'side_menu',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'header_visibility'); ?>
		<?php echo $form->textField($model,'header_visibility',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sort_order'); ?>
		<?php echo $form->textField($model,'sort_order',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'has_page'); ?>
		<?php echo $form->textField($model,'has_page',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'canonical_name'); ?>
		<?php echo $form->textField($model,'canonical_name',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'link'); ?>
		<?php echo $form->textField($model,'link',array('size'=>60,'maxlength'=>500,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'heading'); ?>
		<?php echo $form->textField($model,'heading',array('size'=>60,'maxlength'=>300,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'small_content'); ?>
		<?php echo $form->textArea($model,'small_content',array('rows'=>6, 'cols'=>50 , 'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'big_content'); ?>
		<?php echo $form->textArea($model,'big_content',array('rows'=>6, 'cols'=>50 , 'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'small_image'); ?>
		<?php echo $form->textField($model,'small_image',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'banner'); ?>
		<?php echo $form->textField($model,'banner',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'big_image'); ?>
		<?php echo $form->textField($model,'big_image',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'field_1'); ?>
		<?php echo $form->textField($model,'field_1',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'field_2'); ?>
		<?php echo $form->textField($model,'field_2',array('size'=>60,'maxlength'=>300,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'field_3'); ?>
		<?php echo $form->textField($model,'field_3',array('size'=>60,'maxlength'=>300,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cb'); ?>
		<?php echo $form->textField($model,'cb',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ub'); ?>
		<?php echo $form->textField($model,'ub',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'doc'); ?>
		<?php echo $form->textField($model,'doc',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dou'); ?>
		<?php echo $form->textField($model,'dou',array('class' => 'form-control')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->