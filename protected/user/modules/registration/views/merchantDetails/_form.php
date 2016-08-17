<?php
/* @var $this MerchantDetailsController */
/* @var $model MerchantDetails */
/* @var $form CActiveForm */
?>



<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'merchant-details-form',
//        'htmlOptions' => array('class' => 'form-horizontal'),
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
        ));
?>


<div class="form-group">
    <?php echo $form->textField($model, 'fullname', array('placeholder' => 'FullName', 'class' => 'form-new')); ?>
    <?php echo $form->error($model, 'fullname',array('class' => 'red')); ?>
</div>

<div class="form-group">
    <?php echo $form->textField($user_model, 'email', array('placeholder' => 'Email', 'class' => 'form-new')); ?>
    <?php echo $form->error($user_model, 'email',array('class' => 'red')); ?>
</div>

<div class="form-group">
    <?php echo $form->textField($user_model, 'phone_number', array('placeholder' => 'Phone Number', 'class' => 'form-new')); ?>
    <?php echo $form->error($user_model, 'phone_number',array('class' => 'red')); ?>
</div>

<div class="form-group">
    <?php echo $form->passwordField($user_model, 'password', array('placeholder' => 'Password', 'class' => 'form-new')); ?>
    <?php echo $form->error($user_model, 'password',array('class' => 'red')); ?>  
</div>

<div class="form-group">

    <?php echo $form->passwordField($user_model, 'confirm_password', array('placeholder' => 'Confirm Password', 'class' => 'form-new')); ?>
    <?php echo $form->error($user_model, 'confirm_password',array('class' => 'red')); ?>

</div>
<div class="form-group">

    <?php
    if (!$model->isNewRecord) {
        if (!empty($model->product_categories)) {
            $ids = explode(',', $model->product_categories);
            $selected = array();
            foreach ($ids as $id) {
                $selected[$id] = array('selected' => true);
            }
        }
    }
    ?>
    <?php echo $form->hiddenField($model, 'product_categories'); ?>

    <?php
    $this->widget('application.user.components.CatSelect', array(
        'type' => 'category',
        'field_val' => $model->product_categories,
        'category_tag_id' => 'MerchantDetails_product_categories', /* id of hidden field */
        'form_id' => 'merchant-details-form',
    ));
    ?>
    <?php echo $form->error($model, 'product_categories',array('class' => 'red')); ?>

</div>

<div class="form-group">

    <?php echo $form->dropDownList($model, 'merchant_type', array('2' => "Wholesale", '1' => "Retail", '0' => "Default"), array('empty' => 'Merchant Type', 'class' => 'form-new')); ?>
    <?php echo $form->error($model, 'merchant_type',array('class' => 'red')); ?>

</div>

<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save', array('class' => "btn btn-default btn-sm bt_up2 ")); ?>
<a href="<?php echo Yii::app()->request->baseUrl?>" class="btn btn-default btn-sm bt_up "> Cancel </a>


<?php $this->endWidget(); ?>

