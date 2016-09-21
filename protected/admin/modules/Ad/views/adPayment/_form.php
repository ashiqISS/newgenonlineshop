<?php
/* @var $this AdPaymentController */
/* @var $model AdPayment */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'ad-payment-form',
        'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
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
            <?php echo $form->labelEx($model, 'title'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'title', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'title'); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">
            <?php echo $form->labelEx($model, 'position'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo CHtml::activeDropDownList($model, 'position', CHtml::listData(MasterAdLocation::model()->findAll(), 'id', 'ad_location'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'position'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">
            <?php echo $form->labelEx($model, 'image'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->fileField($model, 'image', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'image'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">
            <?php echo $form->labelEx($model, 'vendor_name'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo CHtml::activeDropDownList($model, 'vendor_name', CHtml::listData(MerchantDetails::model()->findAll(), 'id', 'fullname'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'vendor_name'); ?>
        </div>
    </div>

    <!--    <div class="form-group">
            <div class="col-sm-2 control-label">
    <?php echo $form->labelEx($model, 'sort_order'); ?>
            </div>
            <div class="col-sm-10">
    <?php echo $form->textField($model, 'sort_order', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'sort_order'); ?>
            </div>
        </div>-->

    <div class="form-group">
        <div class="col-sm-2 control-label">
            <?php echo $form->labelEx($model, 'display_from'); ?>
        </div>
        <div class="col-sm-10">

            <?php
            $from = date('Y') - 2;
            $to = date('Y') + 20;
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'display_from',
                'value' => 'display_from',
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
                    'placeholder' => 'display_from',
                ),
            ));
            ?><?php echo $form->error($model, 'display_from'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">
            <?php echo $form->labelEx($model, 'display_to'); ?>
        </div>
        <div class="col-sm-10">
            <?php
            $from = date('Y') - 2;
            $to = date('Y') + 20;
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model,
                'attribute' => 'display_to',
                'value' => 'display_to',
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
                    'placeholder' => 'display_to',
                ),
            ));
            ?><?php echo $form->error($model, 'display_to'); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">
            <?php echo $form->labelEx($model, 'link'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'link', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'link'); ?>
        </div>
    </div>

    <!--    <div class="form-group">
            <div class="col-sm-2 control-label">
    <?php echo $form->labelEx($model, 'payment_status'); ?>
            </div>
            <div class="col-sm-10">
    <?php echo $form->dropDownList($model, 'payment_status', array('1' => "Paid", '0' => "Not Paid"), array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'payment_status'); ?>
            </div>
        </div>-->



    <!--</div>-->
    <div class="box-footer">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->