<?php
/* @var $this ContactDetailsController */
/* @var $model ContactDetails */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'contact-details-form',
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
            <?php echo $form->labelEx($model, 'company_name'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'company_name', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'company_name'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">
            <?php echo $form->labelEx($model, 'telephone'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'telephone', array('size' => 20, 'maxlength' => 20, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'telephone'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">
            <?php echo $form->labelEx($model, 'mobile1'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'mobile1', array('size' => 15, 'maxlength' => 15, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'mobile1'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">
            <?php echo $form->labelEx($model, 'mobile2'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'mobile2', array('size' => 15, 'maxlength' => 15, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'mobile2'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">
            <?php echo $form->labelEx($model, 'fax'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'fax', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'fax'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">
            <?php echo $form->labelEx($model, 'email1'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'email1', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'email1'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label">
            <?php echo $form->labelEx($model, 'email2'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'email2', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'email2'); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">
            <?php echo $form->labelEx($model, 'map_link'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'map_link', array('size' => 60, 'maxlength' => 500, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'map_link'); ?>
        </div>
    </div>



    <!--</div>-->
    <div class="box-footer">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->