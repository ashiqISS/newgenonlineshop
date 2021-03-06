<style>
    input[type=submit]  {
        float: left;
        background-color: #f06e4b;
        padding: 7px;
        min-width: 80px;
        margin-right: 10px;
        text-align: center;
        color: #FFFFFF;
        border-radius: 5px;
        border: none;
    }
</style>

<section class="banner">

    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">


        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">MY <span class="redish">Account </span></h1>

        </div>

    </div>

</section>

<div class="clearfix"></div>


<section class="facial services">
    <div class="container">



        <div class="heading">


            change password

        </div>


        <div class="form-group">
            <div class="col-md-9">

                <div class="left-content">

                    <!--flash message-->
                    <?php if (Yii::app()->user->hasFlash('passwordReset')): ?>
                            <div class="alert alert-info fade in">
                                <?php echo Yii::app()->user->getFlash('passwordReset'); ?>
                            </div><br>
                    <?php endif; ?>


                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'reset-password-reset_password-form',
                        // Please note: When you enable ajax validation, make sure the corresponding
                        // controller action is handling ajax validation correctly.
                        // See class documentation of CActiveForm for details on this,
                        // you need to use the performAjaxValidation()-method described there.
                        'enableAjaxValidation' => false,
                    ));
                    ?>

                    <?php // echo $form->errorSummary($model); ?>

                    <div class="form-group">
                        <?php echo $form->passwordField($model, 'currentPassword', array('class' => "form-news", 'placeholder' => 'Current Password')); ?>
                        <?php echo $form->error($model, 'currentPassword', array('class' => 'red')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->passwordField($model, 'newPassword', array('class' => "form-news", 'placeholder' => 'New Password')); ?>
                        <?php echo $form->error($model, 'newPassword', array('class' => 'red')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->passwordField($model, 'confirmPassword', array('class' => "form-news", 'placeholder' => 'Confirm Password')); ?>
                        <?php echo $form->error($model, 'confirmPassword', array('class' => 'red')); ?>
                    </div>


                    <div>
                        <?php echo CHtml::submitButton('Submit', array('class' => 'btn continue btn-default delete-btn')); ?>
                    </div>

                    <?php $this->endWidget(); ?>


                    <div class="clearfix"></div>
                </div>

            </div>

     <?php echo $this->renderPartial('_rightMenu'); ?>
        </div>

    </div>
</div>
</section> <!-- end of facial -->




<!-- end of container -->
<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>
