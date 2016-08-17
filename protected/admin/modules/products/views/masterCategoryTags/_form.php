<?php
/* @var $this MasterCategoryTagsController */
/* @var $model MasterCategoryTags */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'master-category-tags-form',
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
                    <?php echo $form->labelEx($model,'category_tag'); ?>
                    <?php echo $form->textField($model,'category_tag',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
                    <?php echo $form->error($model,'category_tag'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'CB'); ?>
                    <?php echo $form->textField($model,'CB',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'CB'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'UB'); ?>
                    <?php echo $form->textField($model,'UB',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'UB'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'DOC'); ?>
                    <?php echo $form->textField($model,'DOC',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'DOC'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'DOU'); ?>
                    <?php echo $form->textField($model,'DOU',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'DOU'); ?>
                </div>

                    </div>
    <div class="form-group btns">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->