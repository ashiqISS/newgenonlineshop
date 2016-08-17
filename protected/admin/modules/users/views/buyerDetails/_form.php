<?php
/* @var $this BuyerDetailsController */
/* @var $model BuyerDetails */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'buyer-reg-form',
        'htmlOptions' => array('class' => 'form-horizontal'),
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary(array($model, $user_model)); ?>
    <br/>

    <div class="form-group">
        <div class="col-sm-2 control-label"> 
            <?php echo $form->labelEx($model, 'first_name'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'first_name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'first_name'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label"> 
            <?php echo $form->labelEx($model, 'last_name'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'last_name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'last_name'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label"> 
            <?php echo $form->labelEx($model, 'dob'); ?>
        </div>
        <div class="col-sm-10">
            <?php
            $from = date('Y') - 80;
            $to = date('Y') - 16;
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'dob',
                'value' => 'dob',
                'options' => array(
                    'dateFormat' => 'dd-mm-yy',
                    'changeYear' => true, // can change year
                    'changeMonth' => true, // can change month
                    'yearRange' => $from . ':' . $to, // range of year
                    'showButtonPanel' => true, // show button panel
                ),
                'htmlOptions' => array(
                    'size' => '10', // textField size
                    'maxlength' => '10', // textField maxlength
                    'class' => 'form-control',
                    'placeholder' => 'Date Of Birth',
                ),
            ));
            ?>
            <?php echo $form->error($model, 'dob'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label"> 
            <?php echo $form->labelEx($model, 'gender'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->dropDownList($model, 'gender', array('male' => "male", 'female' => "fe-male"), array('empty' => 'Select Gender', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'gender'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($user_model, 'email', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
            <?php echo $form->textField($user_model, 'email', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($user_model, 'email'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($user_model, 'phone_number', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
            <?php echo $form->textField($user_model, 'phone_number', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($user_model, 'phone_number'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label"> 
            <?php echo $form->labelEx($model, 'phone_no_2'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'phone_no_2', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'phone_no_2'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($user_model, 'password', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
            <?php echo $form->passwordField($user_model, 'password', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
            <?php echo $form->error($user_model, 'password'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($user_model, 'confirm_password', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
            <?php echo $form->passwordField($user_model, 'confirm_password', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
            <?php echo $form->error($user_model, 'confirm_password'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label"> 
            <?php echo $form->labelEx($model, 'newsletter'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->dropDownList($model, 'newsletter', array('1' => "Enabled", '0' => "Disabled"), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'newsletter'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'wallet_amt', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'wallet_amt', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'wallet_amt'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($user_model, 'user_status', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
            <?php echo $form->dropDownList($user_model, 'user_status', array('3' => "Enabled", '4' => "Disabled"), array('class' => 'form-control')); ?>
            <?php echo $form->error($user_model, 'user_status'); ?>
        </div>
    </div>

    <div class="box-footer">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->