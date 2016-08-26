    
<section class="banner">

    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">


        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">My <span class="redish">Account </span></h1>

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


            <?php             
            echo $this->renderPartial('_left_menu',array('brandsel' => $brandsel,'price' => $price)); ?>

            <div class="col-md-9">

                <div class="Category">

                    <div class="row">
                        <!--                        <div class="col-md-12 prt_upcmg">
                        
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
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>
