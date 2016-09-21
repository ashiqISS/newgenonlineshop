<?php
/* @var $this MasterTaxClassController */
/* @var $model MasterTaxClass */
/* @var $form CActiveForm */
?>

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'master-tax-class-form',
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
                        <?php echo $form->labelEx($model, 'tax_class_name'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'tax_class_name', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'tax_class_name'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'tax_rate'); ?>
                </div>
                <div class="col-sm-10">
                        <?php
                        if (!is_array($model->tax_rate)) {
                                $myArray = explode(',', $model->tax_rate);
                        } else {
                                $myArray = $model->tax_rate;
                        }


                        $related_products = array();

                        foreach ($myArray as $value) {
                                $related_products[$value] = array('selected' => 'selected');
                        }
                        ?>

                        <?php echo CHtml::activeDropDownList($model, 'tax_rate', CHtml::listData(MaterTaxRates::model()->findAll(array('condition' => 'status = 1')), 'id', 'tax_name'), array('empty' => '--please select--', 'class' => 'form-control', 'multiple' => true, 'options' => $related_products)); ?>
                        <?php echo $form->error($model, 'tax_rate'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'status'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'status', array('1' => "Enabled", '0' => "Disabled"), array('class' => 'form-control')); ?>
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