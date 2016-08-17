<style>

    .form_error{
        color: red;
    }
</style>

<div class="clearfix"></div>

<div class="container login">
    <div class="row">


        <div class="col-md-12 pickle-space" >
            <div class="row">
                <h1>Register</h1>
                <div class="col-md-6 col-md-offset-3 forward">
                    <div class="row">
                        <div class="form">

                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'buyer-details-form',
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
                            <div class="form-inline">
                                <div class="form-group" style="padding-bottom: 14px;">
                                    <?php echo $form->labelEx($model, 'first_name'); ?>
                                    <?php echo $form->textField($model, 'first_name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'first_name', array('class' => 'form_error')); ?>
                                </div>

                                <div class="form-group" style="padding-bottom: 14px;">
                                    <?php echo $form->labelEx($model, 'last_name'); ?>
                                    <?php echo $form->textField($model, 'last_name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'last_name', array('class' => 'form_error')); ?>
                                </div>

                                <div class="form-group" style="padding-bottom: 14px;">
                                    <?php echo $form->labelEx($model, 'dob'); ?>
                                    <?php
                                    $from = date('Y') - 80;
                                    $to = date('Y') + 20;
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
                                    <?php echo $form->error($model, 'dob', array('class' => 'form_error')); ?>
                                </div>

                                <div class="form-group" style="padding-bottom: 14px;">
                                    <?php echo $form->labelEx($model, 'gender'); ?>
                                    <?php
                                    echo $form->radioButtonList($model, 'gender', array('0' => "Male", '1' => "Fe-male"), array('labelOptions' => array('style' => 'display:inline'), 'separator' => '',), array('options' => array($model->gender => array('selected' => true))));
                                    ?>
                                    <?php echo $form->error($model, 'gender', array('class' => 'form_error')); ?>
                                </div>

                                <div class="form-group" style="padding-bottom: 14px;">
                                    <?php echo $form->labelEx($model, 'email'); ?>
                                    <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'email', array('class' => 'form_error')); ?>
                                </div>

                                <div class="form-group" style="padding-bottom: 14px;">
                                    <?php echo $form->labelEx($model, 'phone_no_1'); ?>
                                    <?php echo $form->textField($model, 'phone_no_1', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'phone_no_1', array('class' => 'form_error')); ?>
                                </div>

                                <div class="form-group" style="padding-bottom: 14px;">
                                    <?php echo $form->labelEx($model, 'phone_no_2'); ?>
                                    <?php echo $form->textField($model, 'phone_no_2', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'phone_no_2', array('class' => 'form_error')); ?>
                                </div>

                                <div class="form-group" style="padding-bottom: 14px;">
                                    <?php echo $form->labelEx($model, 'password'); ?>
                                    <?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'password', array('class' => 'form_error')); ?>
                                </div>

                                <div class="form-group" style="padding-bottom: 14px;">
                                    <?php echo $form->labelEx($model, 'confirm'); ?>
                                    <?php echo $form->textField($model, 'confirm', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'confirm', array('class' => 'form_error')); ?>
                                </div>

                                <div class="form-group" style="padding-bottom: 14px;">
                                    <?php echo $form->labelEx($model, 'newsletter'); ?>
                                    <?php echo $form->dropDownList($model, 'newsletter', array('1' => "Yes", '0' => "No"), array('class' => 'form-contact-2')); ?>
                                    <?php echo $form->error($model, 'newsletter', array('class' => 'form_error')); ?>
                                </div>


                            </div>
                            <div class="form-group btns">
                                <label>&nbsp;</label><br/>
                                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'submit_btn button_up', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
                            </div>

                            <?php $this->endWidget(); ?>

                        </div><!-- form -->

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<script>
        $('#UserDetails_password').keyup(function () {
            validate(e = '');

        });
        $('#confirm').keyup(function () {
            Check(e = '');
        });
        function validate(e) {
            var password = $('#UserDetails_password').val();
            var pattern = /^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/;
            if (pattern.test(password)) {
                $('#password_error').html("");
            } else {
                $('#password_error').html(" Password should contain atleast 6 characters, an uppercase and lowercase");
                if (e != '') {
                    e.preventDefault();
                }
            }
        }
        function Check(e) {
            var pass = $('#UserDetails_password').val();
            var confirm = $('#confirm').val();
            if (pass != '' && confirm != '') {

                if (pass != confirm) {
                    $('#passwrd_error').html(" Password doesn't match");
                    if (e != '') {
                        e.preventDefault();
                    }
                } else {
                    $('#passwrd_error').html("");
                }
            } else {
                $('#passwrd_error').html("");
            }
        }


