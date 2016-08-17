<?php
/* @var $this ProductsController */
/* @var $model Products */
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
		<?php echo $form->label($model,'category_id'); ?>
		<?php echo $form->textField($model,'category_id',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product_name'); ?>
		<?php echo $form->textField($model,'product_name',array('size'=>60,'maxlength'=>225,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product_code'); ?>
		<?php echo $form->textField($model,'product_code',array('size'=>60,'maxlength'=>225,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'brand_id'); ?>
		<?php echo $form->textField($model,'brand_id',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'merchant_id'); ?>
		<?php echo $form->textField($model,'merchant_id',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'merchant_type'); ?>
		<?php echo $form->textField($model,'merchant_type',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50 , 'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'main_image'); ?>
		<?php echo $form->textField($model,'main_image',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gallery_images'); ?>
		<?php echo $form->textField($model,'gallery_images',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hover_image'); ?>
		<?php echo $form->textField($model,'hover_image',array('size'=>60,'maxlength'=>150,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'canonical_name'); ?>
		<?php echo $form->textField($model,'canonical_name',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'meta_title'); ?>
		<?php echo $form->textField($model,'meta_title',array('size'=>60,'maxlength'=>225,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'meta_description'); ?>
		<?php echo $form->textArea($model,'meta_description',array('rows'=>6, 'cols'=>50 , 'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'meta_keywords'); ?>
		<?php echo $form->textField($model,'meta_keywords',array('size'=>60,'maxlength'=>225,'class' => 'form-control')); ?>
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
		<?php echo $form->label($model,'display_category_name'); ?>
		<?php echo $form->textField($model,'display_category_name',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wholesale_price'); ?>
		<?php echo $form->textField($model,'wholesale_price',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_discount_available'); ?>
		<?php echo $form->textField($model,'is_discount_available',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'discount'); ?>
		<?php echo $form->textField($model,'discount',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'discount_type'); ?>
		<?php echo $form->textField($model,'discount_type',array('size'=>60,'maxlength'=>225,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'discount_rate'); ?>
		<?php echo $form->textField($model,'discount_rate',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'quantity'); ?>
		<?php echo $form->textField($model,'quantity',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'requires_shipping'); ?>
		<?php echo $form->textField($model,'requires_shipping',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enquiry_sale'); ?>
		<?php echo $form->textField($model,'enquiry_sale',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'new_from'); ?>
		<?php echo $form->textField($model,'new_from',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'new_to'); ?>
		<?php echo $form->textField($model,'new_to',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sale_from'); ?>
		<?php echo $form->textField($model,'sale_from',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sale_to'); ?>
		<?php echo $form->textField($model,'sale_to',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'special_price_from'); ?>
		<?php echo $form->textField($model,'special_price_from',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'special_price_to'); ?>
		<?php echo $form->textField($model,'special_price_to',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tax'); ?>
		<?php echo $form->textField($model,'tax',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gift_option'); ?>
		<?php echo $form->textField($model,'gift_option',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'stock_availability'); ?>
		<?php echo $form->textField($model,'stock_availability',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'video_link'); ?>
		<?php echo $form->textField($model,'video_link',array('size'=>60,'maxlength'=>225,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'video'); ?>
		<?php echo $form->textField($model,'video',array('size'=>60,'maxlength'=>150,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'weight'); ?>
		<?php echo $form->textField($model,'weight',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'weight_class'); ?>
		<?php echo $form->textField($model,'weight_class',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>60,'maxlength'=>225,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'exchange'); ?>
		<?php echo $form->textField($model,'exchange',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'search_tag'); ?>
		<?php echo $form->textField($model,'search_tag',array('size'=>60,'maxlength'=>225,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'related_products'); ?>
		<?php echo $form->textField($model,'related_products',array('size'=>60,'maxlength'=>225,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_cod_available'); ?>
		<?php echo $form->textField($model,'is_cod_available',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_available'); ?>
		<?php echo $form->textField($model,'is_available',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_featured'); ?>
		<?php echo $form->textField($model,'is_featured',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_admin_approved'); ?>
		<?php echo $form->textField($model,'is_admin_approved',array('class' => 'form-control')); ?>
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