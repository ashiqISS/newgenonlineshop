<?php
/* @var $this MerchantPayoutHistoryController */
/* @var $model MerchantPayoutHistory */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'merchant-payout-history-form',
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
                <?php echo $form->labelEx($model,'requested_amount'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'requested_amount',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'requested_amount'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'payment_account'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'payment_account',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'payment_account'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'status'); ?>
            </div>
            <div class="col-sm-10">
                <!--1-requested, 2-hold, 3-processing, 4-paid, 5 -rejected-->
                  <?php echo $form->dropDownList($model, 'status', array('' => "---Set Status---", '1' => "New Request", '2' => "Hold", '3' => "Processing", '4' => "Paid", '5' => "Rejected"), array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'status'); ?>
            </div>
        </div>
    
               <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'transaction_reference'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'transaction_reference',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'transaction_reference'); ?>
            </div>
        </div>
    
               <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'comment'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textArea($model,'comment',array('class' => 'form-control','rows'=>5)); ?>
                <?php echo $form->error($model,'comment'); ?>
            </div>
        </div>

      
            <!--</div>-->
    <div class="box-footer">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->