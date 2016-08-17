
<div class="clearfix"></div>



<section class="facial services">
    <div class="container">
        <div class="row">



            <!-- end of left -->

            <div class="left col col-md-12 col-sm-12 col-xs-12 ab_rgt">

                <div class="thnk">
                    <h2>Account Activated</h2>
                    <?php echo "Hi $model->fullname"; ?>
                    <!--<br><br> You will be redirected to our payment gateway to complete the registration by paying the membership fee.-->
                    <!--Click below to continue-->
                    Your account has activated. <a href="<?php echo Yii::app()->baseUrl ?>/user.php/login">Please login to continue..</a>

                </div>
            </div></div>
    </div>
</section> <!-- end of facial -->


<!-- end of container -->



<div class="banner"> 
    <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/layer.jpg" alt="">
    <h2>Turning your visions into realities<br><span class="wis">Top Event managers</span></h2>
    <div class="bottoms">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h4>Prominence <span class="events">event managements</span></h4>
            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </h3>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <a href="#" class="lakshmi" tabindex="0">View More Details</a>
        </div>
    </div>
</div>


<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>