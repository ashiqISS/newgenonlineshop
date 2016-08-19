<?php
/* @var $this BuyerDetailsController */
/* @var $model BuyerDetails */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'buyer-details-form',
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
                <?php echo $form->labelEx($model,'user_id'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'user_id',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'user_id'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'first_name'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
                <?php echo $form->error($model,'first_name'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'last_name'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
                <?php echo $form->error($model,'last_name'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'dob'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'dob',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'dob'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'gender'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'gender',array('size'=>50,'maxlength'=>50,'class' => 'form-control')); ?>
                <?php echo $form->error($model,'gender'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'phone_no_2'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'phone_no_2',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
                <?php echo $form->error($model,'phone_no_2'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'newsletter'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'newsletter',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'newsletter'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'wallet_amt'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'wallet_amt',array('size'=>10,'maxlength'=>10,'class' => 'form-control')); ?>
                <?php echo $form->error($model,'wallet_amt'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'CB'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'CB',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'CB'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'UB'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'UB',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'UB'); ?>
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

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'field2'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'field2',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'field2'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'field3'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'field3',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'field3'); ?>
            </div>
        </div>

            <!--</div>-->
    <div class="box-footer">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->