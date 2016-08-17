<section class="banner">

    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseurl; ?>/images/img_inn.jpg)">

        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">log<span class="redish">in </span></h1>

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

            <div class="col-md-12 pdg">

                <div class="log_upcmg">

                    <div class="new_form">

                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'login-form',
                            'enableAjaxValidation' => false,
                        ));
                        ?>
                        <div class="form-group">

                            <!--<input type="email" class="form-new" id="email" placeholder="Email :">-->
                            <?php echo $form->textField($model, 'email', array('class' => "form-new", 'placeholder' => 'Email')); ?>
                            <?php echo $form->error($model, 'email', array('class' => ' red')); ?>
                        </div>
                        <div class="form-group">

                            <!--<input type="password" class="form-new" id="pwd" placeholder="Password :">-->
                            <?php echo $form->passwordField($model, 'password', array('class' => "form-new", 'placeholder' => 'Password')); ?>
                            <?php echo $form->error($model, 'password', array('class' => ' red')); ?>
                        </div>

                        <div class="checkbox">
                            <!--<label><input type="checkbox" value="">Remember me</label>-->
                            <label><?php echo $form->checkBox($model, 'rememberMe'); ?> Remember Me</label>
                            <?php echo $form->error($model, 'rememberMe'); ?>
                        </div>

                        <button type="submit" class="btn new-btn btn-default">Sign In</button>

                        <div class="col-md-7 col-sm-5 col-xs-5 padd">
                            <a class="forgot" href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/recover-password">Forgot Password</a>
                        </div>

                        <div class="col-md-5 col-sm-5 col-xs-7 padd">

                            <a class="new" href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/user-registration"> Sign Up Here</a>

                        </div>

                        <?php $this->endWidget(); ?>



                    </div>

                    <div style="clear:both;"></div>
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

