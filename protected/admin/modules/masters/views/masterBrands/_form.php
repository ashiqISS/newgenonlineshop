<?php
/* @var $this MasterBrandsController */
/* @var $model MasterBrands */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'master-brands-form',
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
            <?php echo $form->labelEx($model, 'brand_name'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'brand_name', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'brand_name'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label"> 
            <?php echo $form->labelEx($model, 'category_id'); ?>
        </div>
        <div class="col-sm-10">
            <?php
            if (!$model->isNewRecord) {
                if (!empty($model->category_id)) {
                    $ids = explode(',', $model->category_id);
                    $selected = array();
                    foreach ($ids as $id) {
                        $selected[$id] = array('selected' => true);
                    }
                }
            }
            ?>
            <?php echo $form->hiddenField($model, 'category_id'); ?>

            <?php
            $this->widget('application.admin.components.CatSelect', array(
                'type' => 'category',
                'field_val' => $model->category_id,
                'category_tag_id' => 'MasterBrands_category_id', /* id of hidden field */
                'form_id' => 'master-brands-form',
            ));
            ?>

            <?php echo $form->error($model, 'category_id'); ?>

        </div>

    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label"> 
            <?php echo $form->labelEx($model, 'logo'); ?>
        </div>
        <div class="col-sm-10">

            <?php echo $form->fileField($model, 'logo', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php
            if ($model->logo != '' && $model->id != "") {
                echo '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/products/brands/' . $model->id . '.' . $model->logo . '" />';
            }
            ?>
            
            <?php echo $form->error($model, 'logo'); ?>
        </div>
    </div>



    <!--</div>-->
    <div class="box-footer">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->