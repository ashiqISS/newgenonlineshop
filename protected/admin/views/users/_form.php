<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
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
                <?php echo $form->labelEx($model,'user_type'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'user_type',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'user_type'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'email'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>320,'class' => 'form-control')); ?>
                <?php echo $form->error($model,'email'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'phone_number'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'phone_number',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'phone_number'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'password'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->passwordField($model,'password',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'password'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'activation_link'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'activation_link',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'activation_link'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'verification_code'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'verification_code',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'verification_code'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'user_status'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'user_status',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'user_status'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'bad_attempts'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'bad_attempts',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'bad_attempts'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'last_login'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'last_login',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'last_login'); ?>
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
                <?php echo $form->labelEx($model,'field1'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'field1',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'field1'); ?>
            </div>
        </div>

            <!--</div>-->
    <div class="box-footer">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->