<style>
        /* margin-bottom: 33px; */
button.btn.new-btn.btn-default    
{
    width: auto;
    margin-bottom: 0;
}
</style>

<div class="clearfix"></div>



<section class="facial services">
    <div class="container">
        <div class="row">



            <!-- end of left -->

            <div class="left col col-md-12 col-sm-12 col-xs-12 ab_rgt">

                <div class="thnk">

                    <h2>Email Verification Pending</h2>
                    <span style="font-size: 16px;">
                        <br> Hi,<br><br>
                        <p style="font-size: 16px;">
                            Your account is not activated. Please click on the verification/activation link send on to your email : <?php echo $email; ?> and login.
                        </p>
<!--                        <p style="font-size: 16px;">
                        <form action="<?php echo Yii::app()->request->baseUrl; ?>/user.php/site/ResendActivation" method="POST">
                            <input type="hidden" name="email" value="<?php  echo $email?>">
                            Not recieved mail yet ?? &nbsp;&nbsp; <button class="btn new-btn btn-default">Click to resend mail now</button>
                        </form>
                        </p>-->
                        <p style="font-size: 16px;"><br>Thanks, <br>NewGen Team</p>
                    </span>
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