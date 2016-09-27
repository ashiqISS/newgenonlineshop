<?php
/* @var $this FaqController */
/* @var $model Faq */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'faq-form',
        'htmlOptions' => array('class' => 'form-horizontal'),
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <br/>
    <!--<div class="form-inline">-->



    <div class="form-group">
        <div class="col-sm-2 control-label">
            <?php echo $form->labelEx($model, 'question'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'question', array('size' => 60, 'maxlength' => 500, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'question'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">
            <?php echo $form->labelEx($model, 'answer'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->textArea($model, 'answer', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'answer'); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">
            <?php echo $form->labelEx($model, 'status'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->dropDownList($model, 'status', array('1' => 'Enabled', '2' => 'Disabled'), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'status'); ?>
        </div>
    </div>

    <!--</div>-->
    <div class="box-footer">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->