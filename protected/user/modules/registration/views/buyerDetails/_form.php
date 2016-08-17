
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'buyer-details-form',
//        'htmlOptions' => array('class' => 'form-horizontal'),
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
        ));
?>

<?php // echo $form->errorSummary(array($model, $user_model)); ?>


<div class="form-group">

    <?php echo $form->textField($model, 'first_name', array('placeholder' => 'First Name', 'class' => 'form-new')); ?>
    <?php echo $form->error($model, 'first_name', array('class' => 'red')); ?>

</div>

<div class="form-group">

    <?php echo $form->textField($model, 'last_name', array('placeholder' => 'Last Name', 'class' => 'form-new')); ?>
    <?php echo $form->error($model, 'last_name', array('class' => 'red')); ?>

</div>

<div class="form-group">

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
//            'maxDate' => 'today',
        ),
        'htmlOptions' => array(
            'size' => '10', // textField size
            'maxlength' => '10', // textField maxlength
            'class' => 'form-new',
            'placeholder' => 'Date Of Birth',
        ),
    ));
    ?>
    <?php echo $form->error($model, 'dob', array('class' => 'red')); ?>

</div>

<div class="form-group">

    <?php echo $form->dropDownList($model, 'gender', array('Male' => "Male", 'Female' => "Female"), array('empty' => 'Gender', 'class' => 'form-new')); ?>
    <?php echo $form->error($model, 'gender', array('class' => 'red')); ?>

</div>
<div class="form-group">

    <?php echo $form->textField($user_model, 'email', array('placeholder' => 'Email', 'class' => 'form-new')); ?>
    <?php echo $form->error($user_model, 'email', array('class' => 'red')); ?>

</div>

<div class="form-group">

    <?php echo $form->textField($user_model, 'phone_number', array('placeholder' => 'Phone Number 1', 'class' => 'form-new')); ?>
    <?php echo $form->error($user_model, 'phone_number', array('class' => 'red')); ?>

</div>

<div class="form-group">

    <?php echo $form->textField($model, 'phone_no_2', array('placeholder' => 'Phone Number 2', 'class' => 'form-new')); ?>
    <?php echo $form->error($model, 'phone_no_2', array('class' => 'red')); ?>

</div>
<div class="form-group">

    <?php echo $form->passwordField($user_model, 'password', array('placeholder' => 'Password', 'class' => 'form-new')); ?>
    <?php echo $form->error($user_model, 'password', array('class' => 'red')); ?>

</div>

<div class="form-group">

    <?php echo $form->passwordField($user_model, 'confirm_password', array('placeholder' => 'Confirm Password', 'class' => 'form-new')); ?>
    <?php echo $form->error($user_model, 'confirm_password', array('class' => 'red')); ?>

</div>


<div class="checkbox checkbox2">
    <label> 
        <?php echo $form->checkBox($model, 'newsletter'); ?>
        Subscribe Newsletter</label>
    <?php echo $form->error($model, 'newsletter', array('class' => 'red')); ?>
</div>

<div class="checkbox checkbox2">
    <label> 
        <?php echo $form->checkBox($model, 'terms'); ?>
        I agree to the <span>Privacy Policy</span> and <span>T&C</span></label>
    <?php echo $form->error($model, 'terms', array('class' => 'red')); ?>
</div>


<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save', array('class' => 'btn btn-default btn-sm bt_up2')); ?>
<a href="<?php echo Yii::app()->request->baseUrl?>" class="btn btn-default btn-sm bt_up "> Cancel </a>

<?php $this->endWidget(); ?>
