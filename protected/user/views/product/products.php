<link href="<?= Yii::app()->request->baseUrl; ?>/css/bootstrap-slider.css" rel="stylesheet">    
<style>
    
.slider-handle {
        position: absolute;
        top: 3px !important;
        border-radius: 0 !important;
        width: 14px !important;
        height: 14px !important;
        background-color: #ffffff !important;
        background-image: url(<?= Yii::app()->request->baseUrl; ?>/images/range_slider_pointed.png) !important;
        background-repeat: no-repeat !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff149bdf', endColorstr='#ff0480be', GradientType=0);
        filter: none;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 0px solid transparent;
        cursor: pointer !important;
}

.slider.slider-horizontal .slider-track {
        height: 4px !important;
        width: 100%;
        margin-top: -2px !important;
        top: 50%;
        left: 0;
        /* background-color: red !important; */
}


.slider.slider-horizontal {
        width: 100% !important;
        height: 20px;
}

.slider-track {
        position: absolute;
        cursor: pointer;
        background-image: none !important;

        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fff5f5f5', endColorstr='#fff9f9f9', GradientType=0);
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border-radius: 0 !important;
        background-color: #e87808 !important;
}

.slider .tooltip.top {
        margin-top: -31px !important;
}
.slider-selection {
        position: absolute;
        background-image: none !important;
        background-color: #999 !important;
}
/*price range*/
</style>
<section class="banner">

    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">


        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2"> <span class="redish">Products </span></h1>

        </div>

    </div>


</section>

<div class="clearfix"></div>

<section class=" services">
    <div class="container">

        <div class="heading">


            <!--wishlist-->

        </div>


        <div class="row">


            <?php echo $this->renderPartial('_left_menu', array('brandsel' => $brandsel, 'price' => $price, 'category' => $category, 'cat_details' => $cat_details, 'def_min' => $def_min, 'def_max' => $def_max)); ?>

            <div class="col-md-9">
                <div class="row">
                    <h1 style="text-align: left;margin-bottom: 25px; margin-top: 0px; margin-left: 12px; ">
                        <?php
                        if (!empty($cat_details)) {
                            echo $cat_details->category_name;
                        } else {
                            echo 'All Products';
                        }
                        ?>
                    </h1>
                </div>
                <div class="Category">

                    <div class="row">

                        <!--                                                <div class="col-md-12 prt_upcmg">
                                                
                                                                            <div class="input-group">
                                                                                <div class="input-group-btn search-panel">
                                                                                    <button type="button" class="btn btn-default dropdown-toggle bt_up3" data-toggle="dropdown">
                                                                                        <span id="search_concept">Filter by</span> <span class="caret"></span>
                                                                                    </button>
                                                                                    <ul class="dropdown-menu" role="menu">
                                                                                        <li><a href="#contains">Contains</a></li>
                                                                                        <li><a href="#its_equal">It's equal</a></li>
                                                                                        <li><a href="#greather_than">Greather than ></a></li>
                                                                                        <li><a href="#less_than">Less than < </a></li>
                                                                                        <li class="divider"></li>
                                                                                        <li><a href="#all">Anything</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                                <input type="hidden" name="search_param" value="all" id="search_param">         
                                                                                <input type="text" class="form-control" name="x" placeholder="Search term...">
                                                                                <span class="input-group-btn">
                                                                                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                                                                                </span>
                                                
                                                                            </div>
                                                
                                                                        </div>-->

                        <?php
                        if (empty($products)) {
                            echo $this->renderPartial('_right_content_empty', array('products' => $products));
                        } else {
                            echo $this->renderPartial('_filter_right_content', array('products' => $products));
                        }
                        ?>

                        <?php
                        $this->widget('application.user.extensions.yiinfinite-scroll.YiinfiniteScroller', array(
                            'contentSelector' => '#products',
                            'itemSelector' => 'div.product',
                            'loadingText' => 'Loading...',
                            'donetext' => '',
                            'pages' => $pages,
                        ));
                        ?>     
                        <!-- end of left -->
                    </div>
                </div>



                <div class="clearfix"></div>
            </div>

        </div>


    </div>
</div>
</section> <!-- end of facial -->



<!-- end of container -->


<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap-slider.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>

<script>

        $("#ex16b").slider({
                min: <?php echo $def_min; ?>,
                max: <?php echo $def_max; ?>,
                value: [<?php echo $min; ?>, <?php echo $max; ?>],
                focus: true
        });

        $("#ex16bs").slider({
                min: 1000,
                max: 15000,
                value: [1000, 15000],
                focus: true,
                slide: function (event, ui) {
                        alert();
                }
        });


</script>