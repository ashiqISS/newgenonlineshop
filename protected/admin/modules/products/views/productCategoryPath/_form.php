<?php
/* @var $this ProductCategoryPathController */
/* @var $model ProductCategoryPath */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-category-path-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <br/>
    <div class="form-inline">
                        <div class="form-group">
                    <?php echo $form->labelEx($model,'category'); ?>
                    <?php echo $form->textField($model,'category',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'category'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'parent'); ?>
                    <?php echo $form->textField($model,'parent',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'parent'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'level'); ?>
                    <?php echo $form->textField($model,'level',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'level'); ?>
                </div>

                    </div>
    <div class="form-group btns">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->