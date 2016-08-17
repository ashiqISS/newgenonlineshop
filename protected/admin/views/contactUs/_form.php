<?php
/* @var $this ContactUsController */
/* @var $model ContactUs */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-us-form',
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
                    <?php echo $form->labelEx($model,'name'); ?>
                    <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
                    <?php echo $form->error($model,'name'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'email'); ?>
                    <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>225,'class' => 'form-control')); ?>
                    <?php echo $form->error($model,'email'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'phone'); ?>
                    <?php echo $form->textField($model,'phone',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'phone'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'comment'); ?>
                    <?php echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>50 , 'class' => 'form-control')); ?>
                    <?php echo $form->error($model,'comment'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'date'); ?>
                    <?php echo $form->textField($model,'date',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'date'); ?>
                </div>

                    </div>
    <div class="form-group btns">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->