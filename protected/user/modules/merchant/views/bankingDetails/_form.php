

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'banking-details-form',
        'htmlOptions' => array('class' => 'form-horizontal'),
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php // echo $form->errorSummary($model); ?>
    <br/>
    <!--<div class="form-inline">-->

    <div class="form-group">
        <div class="col-sm-2 control-label"> 
            <label>Account Type</label>
            <?php // echo $form->labelEx($model,'account_type');  ?>
        </div>
        <div class="col-sm-10">
            <?php
            if ($model->account_type != '') {
                
            } else {
                $model->account_type = 1;
            }

            echo $form->radioButtonList($model, 'account_type', array('1' => 'New Paypal Account', '2' => 'New Bank Account'), array('name' => 'account_type', 'onchange' => 'accountTypeChange(this.value)', 'separator' => '&nbsp', 'style' => 'margin-left: 40px;'));
            ?>
            <?php // echo $form->textField($model,'account_type',array('class' => 'form-control'));  ?>
            <?php echo $form->error($model, 'account_type'); ?>
        </div>
    </div>
    <div class="bankDetails" style="color: red">
        <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model, 'account_holder_name'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model, 'account_holder_name', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'account_holder_name'); ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model, 'account_number'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model, 'account_number', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'account_number'); ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model, 'bank_name'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model, 'bank_name', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'bank_name'); ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model, 'ifsc'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model, 'ifsc', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'ifsc'); ?>
            </div>
        </div>
    </div>
    <div class="paypalDetails">

        <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model, 'paypal_id'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model, 'paypal_id', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'paypal_id'); ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model, 'email'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model, 'email', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'email'); ?>
            </div>
        </div>
    </div>


    <!--</div>-->
    <div class="box-footer">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->