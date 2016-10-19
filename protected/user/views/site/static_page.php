<style>
    .services .f6 {
        background: url(<?= Yii::app()->request->baseUrl; ?>/uploads/static/<?php echo $model->id . '/big_image.' . $model->big_image; ?>) no-repeat 50% 50%;
        background-size: cover;
    </style>

    <section class="banner">
        <?php if ($model->banner) { ?>
            <img src="<?= Yii::app()->request->baseUrl . '/uploads/static/' . $model->id . '/banner.' . $model->banner; ?>">
        <?php
        } else {
            ?>
            <img src="<?= Yii::app()->request->baseUrl; ?>/images/img_inn.jpg">
            <?php
        }
        ?>

        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2"><?php echo $model->title ?></h1>
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
                <?php if ($model->big_image) { ?>
                    <div class="left col col-md-4 col-sm-4 col-xs-6 fill">
                        <div class="wrap-hover-content f6 facial-left-thumbnail thumbnail">
                            <div>
                                <div class="">
                                    <img src="<?= Yii::app()->request->baseUrl; ?>/images/des.png" alt="">
                                   
                                </div>
                            </div>
                        </div>
                    </div> <!-- end of left -->


                    <div class="left col col-md-8 col-sm-8 col-xs-8 ab_rgt">

                        <h2><?php echo $model->title ?></h2>
                        <?php echo $model->big_content ?>

                    </div>
                    <?php
                } else {
                    ?>

                    <div class="left col col-md-12 col-sm-12 col-xs-12 ab_rgt">

                        <h2><?php echo $model->title ?></h2>
                        <?php echo $model->big_content ?>

                    </div>

                <?php } ?>

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

