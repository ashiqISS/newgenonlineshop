<?php
/* @var $this StaticPageController */
/* @var $model StaticPage */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'static-page-form',
        'htmlOptions' => array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal'),
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
            <?php echo $form->labelEx($model, 'category_name'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'category_name', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'category_name'); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">
            <?php echo $form->labelEx($model, 'header_visibility'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->dropDownList($model, 'header_visibility', array('0' => "No", '1' => "Yes"), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'header_visibility'); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2 control-label">
            <?php echo $form->labelEx($model, 'has_page'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->dropDownList($model, 'has_page', array('0' => "No", '1' => "Yes"), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'has_page'); ?>
        </div>
    </div>
    <?php
    if ($model->has_page != '' && $model->has_page == 1) {
            $stat = 'block';
    } else if ($model->has_page != '' && $model->has_page == 0) {
            $stat = 'none';
    } else {
            $stat = 'none';
    }
    ?>
    <div class="hasapge" style="display: <?= $stat; ?>;">
        <div class="form-group">
            <div class="col-sm-2 control-label">
                <?php echo $form->labelEx($model, 'title'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'title'); ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2 control-label">
                <?php echo $form->labelEx($model, 'status'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model, 'status', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'status'); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2 control-label">
                <?php echo $form->labelEx($model, 'canonical_name'); ?>
            </div>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="slug">
                <?php //echo $form->textField($model, 'canonical_name', array('size' => 60, 'maxlength' => 300, 'class' => 'form-control'));  ?>
                <?php echo $form->error($model, 'canonical_name'); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2 control-label">
                <?php echo $form->labelEx($model, 'canonical_name'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model, 'canonical_name', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control', 'readonly' => 'true')); ?>
                <?php echo $form->error($model, 'canonical_name'); ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2 control-label">
                <?php echo $form->labelEx($model, 'small_content'); ?>
            </div>
            <div class="col-sm-10">
                <?php
                $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                    'model' => $model,
                    'attribute' => 'small_content',
                ));
                ?>
                <?php echo $form->error($model, 'small_content');
                ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2 control-label">
                <?php echo $form->labelEx($model, 'big_content'); ?>
            </div>
            <div class="col-sm-10">
                <?php
                $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                    'model' => $model,
                    'attribute' => 'big_content',
                ));
                ?>
                <?php echo $form->error($model, 'big_content'); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2 control-label">
                <?php echo $form->labelEx($model, 'banner'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->fileField($model, 'banner', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'banner'); ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2 control-label">
                <?php echo $form->labelEx($model, 'big_image'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->fileField($model, 'big_image', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'big_image'); ?>
            </div>
        </div>


    </div>

    <!--</div>-->
    <div class="box-footer">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>
    <script>
            $(document).ready(function () {

                $('#StaticPage_has_page').change(function () {
                    if ($(this).val() == 1) {
                        $('.hasapge').show();
                    } else if ($(this).val() == 0) {
                        $('.hasapge').hide();
                    }
                });

                $('#slug').keyup(function () {
                    $('#StaticPage_canonical_name').val(slug($(this).val()));
                });


            });

            var slug = function (str) {
                var $slug = '';
                var trimmed = $.trim(str);
                $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
                        replace(/-+/g, '-').
                        replace(/^-|-$/g, '');
                return $slug.toLowerCase();
            }
    </script>

</div><!-- form -->