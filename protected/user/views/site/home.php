
<style>
    .women{
        max-height: 552px;
    }
</style>
<div class="hero row" id="main-hero">


    <div class="hero-slider">





        <?php
        $criteria = new CDbCriteria;
        $criteria->addCondition('display_from <= "' . date('Y-m-d') . '" ');
        $criteria->addCondition('display_to >= "' . date('Y-m-d') . '" ');
        $top = AdPayment::model()->findAllByAttributes(array('position' => '4', 'admin_approve' => '1', 'status' => 1), $criteria);
        if (!empty($top)) {
                foreach ($top as $tp) {
                        $folder = Yii::app()->Upload->folderName(0, 1000, $tp->id);
                        ?>

                        <div class="row item item-5" style=" background: url(<?= Yii::app()->request->baseUrl . '/uploads/ads/' . $folder . '/' . $tp->id . '/big.' . $tp->image ?>) no-repeat 50% 50%; background-size: cover;">
                            <div class="title">
                                <div>
                                    <span class="playfair">Wedding &amp; Jewellery</span>
                                    <h2>Lorem Ipsum is simply dummy text of simply dummy text </h2>
                                    <p>In you won <span>"secret snactuary"</span></p>
                                </div>
                            </div> <!-- end of title -->
                        </div>
                        <?php
                }
        } else {
                ?>
                <div class="row item item-6">
                    <div class="title">
                        <div>
                            <span class="playfair">Wedding &amp; Jewellery</span>
                            <h2>Lorem Ipsum is simply dummy text of simply dummy text </h2>
                            <p>In you won <span>"secret snactuary"</span></p>
                        </div>
                    </div>  end of title
                </div>

                <div class="row item item-1">
                    <div class="title">
                        <div>
                            <span class="playfair">Wedding &amp; Jewellery</span>

                            <h2>Lorem Ipsum is simply dummy text of simply dummy text</h2>
                            <p>In you won <span>"secret snactuary"</span></p>
                        </div>
                    </div>  end of title
                </div>
                <div class="row item item-2">
                    <div class="title">
                        <div>
                            <span class="playfair">Wedding &amp; Jewellery</span>
                            <h2>Lorem Ipsum is simply dummy text of simply dummy text </h2>
                            <p>In you won <span>"secret snactuary"</span></p>
                        </div>
                    </div>  end of title
                </div>

                <div class="row item item-3">
                    <div class="title">
                        <div>
                            <span class="playfair">Wedding &amp; Jewellery</span>
                            <h2>Lorem Ipsum is simply dummy text of simply dummy text </h2>
                            <p>In you won <span>"secret snactuary"</span></p>
                        </div>
                    </div>  end of title
                </div>
        <?php }
        ?>













    </div> <!-- end of slider -->
    <div class="clearfix"></div>
    <a href="#" class="btn btn-default">Shop Now</a>
</div> <!-- end of hero -->





<section class="groom">

    <div class="container quarter">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 nop">
                <?php
                $criteria = new CDbCriteria;
                $criteria->addCondition('display_from <= "' . date('Y-m-d') . '" ');
                $criteria->addCondition('display_to >= "' . date('Y-m-d') . '" ');
                $top_left = AdPayment::model()->findByAttributes(array('position' => '5', 'admin_approve' => '1', 'status' => 1), $criteria, array('order' => 'id DESC', 'limit' => 2));
                if (!empty($top_left)) {
                        $folder = Yii::app()->Upload->folderName(0, 1000, $top_left->id);
                        ?>
                        <img class="img-responsive v1" src="<?= Yii::app()->baseUrl . '/uploads/ads/' . $folder . '/' . $top_left->id . '/big.' . $top_left->image ?>"/>
                <?php } else { ?>
                        <img class="img-responsive v1" src="<?php echo Yii::app()->request->baseUrl; ?>/images/bgs.png">
                <?php } ?>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 nop lifted rotated">
                <h2>Newgen</h2>
                <h3>For <span class="groom">Groom</span></h3>
                <ul class="list-inline list-unstyled">
                    <li>Lorem ipsum dolor sit amet, consectetur</li>
                    <li>Lorem ipsum dolor sit amet, consectetur</li>
                    <li>Lorem ipsum dolor sit amet, consectetur</li>

                </ul>

                <div class="gallery-updates-overlay hidden-xs">
                    <i class="icon-multiple-image"></i>Discount upto 75%
                </div>
            </div>

            <div class="clearfix visible-sm visible-xs visible-md"></div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 bgs-2 lifted-2 nop">
                <h2>Newgen</h2>
                <h3>For <span class="groom">Bride</span></h3>
                <ul class="list-inline list-unstyled">
                    <li>Lorem ipsum dolor sit amet, consectetur</li>
                    <li>Lorem ipsum dolor sit amet, consectetur</li>
                    <li>Lorem ipsum dolor sit amet, consectetur</li>
                </ul>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 bgs-2 nop">
                <?php
                $criteria = new CDbCriteria;
                $criteria->addCondition('display_from <= "' . date('Y-m-d') . '" ');
                $criteria->addCondition('display_to >= "' . date('Y-m-d') . '" ');
                $top_right = AdPayment::model()->findByAttributes(array('position' => '6', 'admin_approve' => '1', 'status' => 1), $criteria, array('order' => 'id DESC', 'limit' => 2));
                if (!empty($top_right)) {
                        $folder = Yii::app()->Upload->folderName(0, 1000, $top_right->id);
                        ?>
                        <img class="img-responsive v1" src="<?= Yii::app()->baseUrl . '/uploads/ads/' . $folder . '/' . $top_right->id . '/big.' . $top_right->image ?>"/>
                <?php } else { ?>
                        <img class="img-responsive v1" src="<?php echo Yii::app()->request->baseUrl; ?>/images/bgs2.png">
                <?php } ?>
            </div>


        </div>
    </div>
</section>


<div class="clearfix"></div>

<section class="arrivals">

    <div class="container full">
        <div class="row">
            <div class="col-md-6 col-sm-12 nop">
                <div class="new_arrive">
                    <?php
                    $criteria = new CDbCriteria;
                    $criteria->addCondition('display_from <= "' . date('Y-m-d') . '" ');
                    $criteria->addCondition('display_to >= "' . date('Y-m-d') . '" ');
                    $top_left2 = AdPayment::model()->findAllByAttributes(array('position' => '7', 'admin_approve' => '1', 'status' => 1), $criteria);
                    if (!empty($top_left2)) {
                            foreach ($top_left2 as $tpL) {
                                    $folder = Yii::app()->Upload->folderName(0, 1000, $tpL->id);
                                    ?>
                                    <div class="item pos">
                                        <div class="main">
                                            <div class="texted">
                                                <h1>New Arrivals</h1>
                                                <p> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>
                                            </div>
                                            <img class="women img-responsive"  src="<?= Yii::app()->baseUrl . '/uploads/ads/' . $folder . '/' . $tpL->id . '/big.' . $tpL->image ?>" >
                                            <a href="#" class="bt">Shop Now</a>

                                        </div>
                                    </div>
                                    <?php
                            }
                    } else {
                            ?>

                            <div class="item pos">
                                <div class="main">
                                    <div class="texted">
                                        <h1>New Arrivals</h1>
                                        <p> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>
                                    </div>
                                    <img class="women img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/women2.png">
                                    <a href="#" class="bt">Shop Now</a>
                                </div>
                            </div>
                    <?php } ?>


                </div>

            </div>

            <div class="col-md-6 col-sm-12 nop">
                <div class="gold">
                    <?php
                    $criteria = new CDbCriteria;
                    $criteria->addCondition('display_from <= "' . date('Y-m-d') . '" ');
                    $criteria->addCondition('display_to >= "' . date('Y-m-d') . '" ');
                    $top_Right2 = AdPayment::model()->findAllByAttributes(array('position' => '8', 'admin_approve' => '1', 'status' => 1), $criteria);
                    if (!empty($top_Right2)) {
                            foreach ($top_Right2 as $tpL) {
                                    $folder = Yii::app()->Upload->folderName(0, 1000, $tpL->id);
                                    ?>
                                    <div class="item ban">
                                        <div class="main">

                                            <img class="img-responsive golds" src="<?= Yii::app()->baseUrl . '/uploads/ads/' . $folder . '/' . $tpL->id . '/big.' . $tpL->image ?>">
                                            <div class="mid_text">
                                                <h2>Best sellers</h2>
                                                <h3>Forum Novelties Glitter Tiara</h3>
                                            </div>
                                            <a href="#" class="slicks" tabindex="0">Shop Now</a>
                                        </div>
                                    </div>
                                    <?php
                            }
                    } else {
                            ?>

                            <div class="item ban">
                                <div class="main">

                                    <img class="img-responsive golds" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gold2.jpg">
                                    <div class="mid_text">
                                        <h2>Best sellers</h2>
                                        <h3>Forum Novelties Glitter Tiara</h3>
                                    </div>
                                    <a href="#" class="slicks" tabindex="0">Shop Now</a>
                                </div>
                            </div>
                    <?php } ?>


                </div>

            </div>
        </div>
    </div>
</section>











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
            <h1>Lorem <span class="redish">Lispum</span></h1>


            <div class="left col col-md-3 col-sm-3 col-xs-6 fill">
                <div class="wrap-hover-content f1 facial-left-thumbnail thumbnail">
                    <div class="hover-content">
                        <div class="">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/des.png" alt="">
                            <p>Product Name</p>
                        </div>
                    </div>

                </div>
                <!-- min height set for h2.If dont need pls remove it-->
                <h2><a href="#">Lorem ipsum dolor sit amet Lorem ipsum</a></h2>
                <h3>$ 110.00</h3>
            </div> <!-- end of left -->
            <div class="left col col-md-3 col-sm-3 col-xs-6 fill">
                <div class="wrap-hover-content f2 facial-left-thumbnail thumbnail">
                    <div class="hover-content">
                        <div class="">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/des.png" alt="">
                            <p>Product Name</p>
                        </div>
                    </div>
                </div>
                <!--  min height set for h2.If dont need pls remove it-->
                <h2>Lorem ipsum dolor sit amet</h2>
                <h3>$ 110.00</h3>
            </div> <!-- end of left -->

            <div class="left col col-md-3 col-sm-3 col-xs-6 fill">
                <div class="wrap-hover-content f3 facial-left-thumbnail thumbnail">
                    <div class="hover-content">
                        <div class="">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/des.png" alt="">
                            <p>Product Name</p>
                        </div>
                    </div>
                </div>
                <!--   min height set for h2.If dont need pls remove it-->
                <h2><a href="#">Lorem ipsum dolor sit amet Lorem ipsum</a></h2>
                <h3>$ 110.00</h3>
            </div> <!-- end of left -->

            <div class="left col col-md-3 col-sm-3 col-xs-6 fill">
                <div class="wrap-hover-content f4 facial-left-thumbnail thumbnail">
                    <div class="hover-content">
                        <div class="">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/des.png" alt="">
                            <p>Product Name</p>
                        </div>
                    </div>
                </div>
                <!--   min height set for h2.If dont need pls remove it-->
                <h2>Lorem ipsum dolor sit amet</h2>
                <h3>$ 110.00</h3>
            </div> <!-- end of left -->
        </div>
    </div>
</section> <!-- end of facial -->




<!-- end of container -->









<section class="more">

    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <h1>Lorem <span class="redish">Lispum</span></h1>
                <img class="img-responsive lis" src="<?php echo Yii::app()->request->baseUrl; ?>/images/border.jpg">
                <div class="part-1">
                    <div class="item effects">
                        <div class="main">
                            <div class="zoom-img">
                                <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/s1.jpg" class="img-responsive"></a>
                            </div>
                            <h2>Lorem ipsum dolor sit amet</h2>
                            <h3>$ 110.00</h3>

                        </div>
                    </div>
                    <div class="item effects">
                        <div class="main ">
                            <div class="zoom-img">
                                <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/s2.jpg" class="img-responsive"></a>
                            </div>
                            <h2>Lorem ipsum dolor sit amet</h2>
                            <h3>$ 110.00</h3>
                        </div>
                    </div>


                    <div class="item effects">
                        <div class="main ">
                            <div class="zoom-img">
                                <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/s3.jpg" class="img-responsive"></a>
                            </div>
                            <h2>Lorem ipsum dolor sit amet</h2>
                            <h3>$ 110.00</h3>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-md-6">
                <h1>Lorem <span class="redish">Lispum</span></h1>
                <img class="img-responsive lis" src="<?php echo Yii::app()->request->baseUrl; ?>/images/border.jpg">
                <div class="part-2">
                    <div class="item effects">
                        <div class="main ">
                            <div class="zoom-img">
                                <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/s3.jpg" class="img-responsive"></a>
                            </div>
                            <h2>Lorem ipsum dolor sit amet</h2>
                            <h3>$ 110.00</h3>
                        </div>
                    </div>
                    <div class="item effects">
                        <div class="main ">
                            <div class="zoom-img">
                                <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/s1.jpg" class="img-responsive"></a>
                            </div>
                            <h2>Lorem ipsum dolor sit amet</h2>
                            <h3>$ 110.00</h3>
                        </div>
                    </div>


                    <div class="item effects">
                        <div class="main ">
                            <div class="zoom-img">
                                <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/s2.jpg" class="img-responsive"></a>
                            </div>
                            <h2>Lorem ipsum dolor sit amet</h2>
                            <h3>$ 110.00</h3>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

</section>



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



<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.11.3.min.js"></script>

