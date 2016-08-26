<style>
    label
    {
        font-weight: 100;
    }
</style>
<section class="banner">

    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">


        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">My <span class="redish">Account </span></h1>

        </div>

    </div>


</section>

<div class="clearfix"></div>
<section class="facial services">
    <div class="container">



        <div class="heading">


            your personal details

        </div>


        <div class="row">
            <div class="col-md-9">

                <div class="left-content">
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


                        <?php // echo $form->errorSummary(array($model, $user_model)); ?>
                        <br/>

                        <div class="form-group required mrg">

                            <div class="col-sm-12">
                                <div class="col-sm-6">

                                    <?php echo $form->labelEx($model, 'first_name'); ?>

                                    <?php echo $form->textField($model, 'first_name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'first_name',array('class'=>'red')); ?>
                                </div>
                                <div class="col-sm-6">

                                    <?php echo $form->labelEx($model, 'last_name'); ?>

                                    <?php echo $form->textField($model, 'last_name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'last_name',array('class'=>'red')); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group required mrg">

                            <div class="col-sm-12">
                                <div class="col-sm-6">  <br>
                                    <?php echo $form->labelEx($model, 'dob'); ?>

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
                                    <?php echo $form->error($model, 'dob',array('class'=>'red')); ?>
                                </div>


                                <div class="col-sm-6">  <br>
                                    <?php echo $form->labelEx($model, 'gender'); ?>

                                    <?php echo $form->dropDownList($model, 'gender', array('male' => "male", 'female' => "fe-male"), array('empty' => 'Select Gender', 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'gender',array('class'=>'red')); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group required mrg">

                            <div class="col-sm-12">
                                <div class="col-sm-6"><br>

                                    <?php echo $form->labelEx($user_model, 'email'); ?>

                                    <?php echo $form->textField($user_model, 'email', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($user_model, 'email',array('class'=>'red')); ?>
                                </div>


                                <div class="col-sm-6"><br>
                                    <?php echo $form->labelEx($user_model, 'phone_number'); ?>

                                    <?php echo $form->textField($user_model, 'phone_number', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($user_model, 'phone_number',array('class'=>'red')); ?>
                                </div>
                            </div>
                        </div>


                        <div class="form-group required mrg">

                            <div class="col-sm-12">
                                <div class="col-sm-6"><br>
                                    <?php echo $form->labelEx($model, 'phone_no_2'); ?>

                                    <?php echo $form->textField($model, 'phone_no_2', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'phone_no_2',array('class'=>'red')); ?>
                                </div>




                                <div class="col-sm-6">
                                    <br>
                                    <?php echo $form->labelEx($model, 'newsletter'); ?>

                                    <?php echo $form->dropDownList($model, 'newsletter', array('1' => "Enabled", '0' => "Disabled"), array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'newsletter',array('class'=>'red')); ?>
                                </div>
                            </div>
                        </div>


                        </fieldset>
<br>
                        <div class="col-sm-12">

                            <div class="buttons clearfix">
                                <div class="pull-left bt_pdg">
                                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-default btn-sm bt_up2 ')); ?>
                                    <!--<button type="submit" >SUBMIT</button>-->
                                </div>

                            </div>

                        </div>


                        <?php $this->endWidget(); ?>

                    </div><!-- form -->







                    <div class="clearfix"></div>
                </div>

            </div>

            <div class="col-md-3 sidebar ">

                <ul>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/my-account" > <i class="fa fa-user fa-2x" aria-hidden="true"></i> <span>My Account</span></a></li>
                    <li ><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/edit-profile" class="act "> <i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i> <span>Edit profile</span></a></li>
                    <li ><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/change-password"> <i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i> <span>Change Password</span></a></li>
                    <li  ><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/my-orders"> <i class="fa fa-truck  fa-2x" aria-hidden="true"></i> <span>My orders</span></a></li>
                    <li ><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/address-book" > <i class="fa fa-book  fa-2x" aria-hidden="true"></i> <span>Address book</span></a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/my-wishlist"> <i class="fa fa-heart  fa-2x" aria-hidden="true"></i><span>Wish List</span></a></li>

                </ul>

            </div>
        </div>














    </div>
</section> <!-- end of facial -->




<!-- end of container -->

<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>