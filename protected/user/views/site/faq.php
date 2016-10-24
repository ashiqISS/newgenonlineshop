
<section class="banner">
    <div id="large-header" class="large-header " style="height: 124px; background: url(<?= Yii::app()->baseUrl; ?>/images/img_inn.jpg)">
        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">faq</h1>
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

            <div class="left col col-md-12 col-sm-12 col-xs-12 ct_full ">

                <?php foreach ($faq as $faq) { ?>
                        <h2><?php echo $faq->question; ?></h2>
                        <p class="animated fadeInRight m2"><?php echo $faq->answer; ?>.</p>
                <?php } ?>

            </div>

        </div>
    </div>
</section> <!-- end of facial -->

<!-- end of container -->

<div class="banner">
    <img class="img-responsive" src="<?= Yii::app()->request->baseUrl; ?>/images/layer.jpg" alt="">
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