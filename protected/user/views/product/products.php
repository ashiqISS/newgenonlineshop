    
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


            wishlist

        </div>


        <div class="row">


            <div class="col-md-3 categ">

                <span class="filter">Filter By</span>
                <div class="category-ui">

                    <span class="da">Category</span>
                    <span class="da-2">Lorem Ipsum is simply</span>
                    <span class="da-3">Lorem Ipsum </span>
                    <span class="da-3">Lorem Ipsum</span>
                    <span class="da-2">Lorem Ipsum is simply</span>
                    <span class="da-3">Lorem Ipsum</span>
                    <span class="da-3">Lorem Ipsum</span>
                </div>

                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel1" aria-expanded="true">
                            <div class="panel-heading headz">

                                <span class="panel-title">
                                    <i class="glyphicon gly glyphicon-minus"></i>  Brands
                                </span>


                            </div>
                        </a>
                        <div id="panel1" class="panel-collapse collapse in" aria-expanded="true">
                            <div class="panel-body">

                                <ul class="list-unstyled">
                                    <li><input type="checkbox" class="chk" name="vehicle" value="Bike">All</li>
                                    <li><input type="checkbox" class="chk" name="vehicle" value="Bike">Visible to all (1000+)</li>
                                    <li><input type="checkbox" class="chk" name="vehicle" value="Bike"> Protected Phot... (392)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#panel2" aria-expanded="false"> <div class="panel-heading headz">

                                <span class="panel-title">
                                    <i class="glyphicon gly glyphicon-plus"></i>  Brands
                                </span>


                            </div>
                        </a>
                        <div id="panel2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <div class="panel-body">
                                <ul class="list-unstyled">
                                    <li><input type="radio" class="rad" name="rec" value="all" checked=""> Within a day (39)</li>
                                    <li><input type="radio" class="rad" name="rec" value="all" checked=""> Within a week (168)</li>
                                    <li><input type="radio" class="rad" name="rec" value="all" checked=""> Within a month (341)</li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="panel panel-default">
                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#panel3" aria-expanded="false"><div class="panel-heading headz">

                                <span class="panel-title">
                                    <i class="glyphicon gly glyphicon-plus"></i>  Brands
                                </span>

                            </div>
                        </a>
                        <div id="panel3" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <div class="panel-body">
                                <ul class="list-unstyled">
                                    <li><input type="radio" class="rad" name="rec" value="all" checked=""> Within a day (39)</li>
                                    <li><input type="radio" class="rad" name="rec" value="all" checked=""> Within a week (168)</li>
                                    <li><input type="radio" class="rad" name="rec" value="all" checked=""> Within a month (341)</li>
                                </ul>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-md-9">

                <div class="Category">

                    <div class="row">
                        <div class="col-md-12 prt_upcmg">

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

                        </div>

                        <?php
                        echo $this->renderPartial('_filter_right_content', array('products' => $products));
                        ?>

                        <?php
                        $this->widget('application.user.extensions.yiinfinite-scroll.YiinfiniteScroller', array(
                            'contentSelector' => '#products',
                            'itemSelector' => 'div.product',
                            'loadingText' => 'Loading...',
                            'donetext' => 'Loading Completed',
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



