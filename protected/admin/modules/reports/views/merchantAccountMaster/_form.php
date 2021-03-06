<?php
/* @var $this MerchantAccountMasterController */
/* @var $model MerchantAccountMaster */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'merchant-account-master-form',
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
                <?php echo $form->labelEx($model,'merchant_id'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'merchant_id',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'merchant_id'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'available_balance'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'available_balance',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'available_balance'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'DOC'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'DOC',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'DOC'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'DOU'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'DOU',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'DOU'); ?>
            </div>
        </div>

            <!--</div>-->
    <div class="box-footer">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->