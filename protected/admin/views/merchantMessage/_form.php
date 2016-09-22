<?php
/* @var $this MerchantMessageController */
/* @var $model MerchantMessage */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'merchant-message-form',
        'htmlOptions' => array('class' => 'form-horizontal'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <br/>
    <!--<div class="form-inline">-->
            <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'message'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textArea($model,'message',array('rows'=>6, 'cols'=>50 , 'class' => 'form-control')); ?>
                <?php echo $form->error($model,'message'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'merchant_id'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'merchant_id',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'merchant_id'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'from_to'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'from_to',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'from_to'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'viewed'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'viewed',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'viewed'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'doc'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'doc',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'doc'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'status'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'status',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'status'); ?>
            </div>
        </div>

            <!--</div>-->
    <div class="box-footer">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->