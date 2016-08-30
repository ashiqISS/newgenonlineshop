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
            <h1 class="animated fadeInLeft m2">My <span class="redish">Account </span></h1>
        </div>
    </div>

</section>

<div class="clearfix"></div>

<section class="beautifull-spa-and-faeture">
    <h2 class="hidden">Feature</h2>
    <div class="container">
        <div class="row">

        </div> <!-- end of row -->
    </div> <!-- end of container -->
</section>

<section class="facial services">
    <div class="container">
        <div class="row">
            <div class="heading">

                your personal details

            </div>

            <div class="row">
                <div class="col-md-9">

                    <div class="left-content">

                        <!--flash message-->
                        <?php if (Yii::app()->user->hasFlash('passwordReset')): ?>
                            <div class="alert alert-info fade in">
                                <?php echo Yii::app()->user->getFlash('passwordReset'); ?>
                            </div><br>
                        <?php endif; ?>

                        <div class="form">

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



                            <?php echo CHtml::submitButton('Submit', array('class' => 'btn continue btn-default delete-btn')); ?>


                            <?php $this->endWidget(); ?>

                        </div><!-- form -->


                        <div class="clearfix"></div>


                    </div>

                </div>

                <div class="col-md-3 sidebar hidden-xs">

                    <ul>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/my-account" > <i class="fa fa-user fa-2x" aria-hidden="true"></i> <span>My Account</span></a></li>
                        <li ><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/edit-profile"> <i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i> <span>Edit profile</span></a></li>
                        <li ><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/change-password"  class="act "> <i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i> <span>Change Password</span></a></li>
                        <li  ><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/my-orders"> <i class="fa fa-truck  fa-2x" aria-hidden="true"></i> <span>My orders</span></a></li>
                        <li ><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/address-book" > <i class="fa fa-book  fa-2x" aria-hidden="true"></i> <span>Address book</span></a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/my-wishlist"> <i class="fa fa-heart  fa-2x" aria-hidden="true"></i><span>Wish List</span></a></li>

                    </ul>

                </div>
            </div>


        </div>
    </div>
</section> <!-- end of facial -->




<!-- end of container -->


<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>