<section class="banner">
    <div id="large-header" class="large-header " style="height: 124px; background: url(<?= Yii::app()->baseUrl; ?>/images/img_inn.jpg)">
        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">Check <span class="redish"> Out </span></h1>
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


<section class="cart-main">
    <div class="container">
        <div class="row">
            <div class="heading">

            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="left-my_acnt">


                        <?php  echo $this->renderPartial('_checkout_left_section');?>
                        
                        
                        
                        
                        

                        <div class="clearfix"></div>
                    </div>


                </div>

                <div class="col-md-3">
                    <?php // echo $this->renderPartial('_checkout_right_content', array('total_amt' => $total_amt,'carts' => $carts)) ?>


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





















