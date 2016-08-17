<?php
$category_name = Yii::app()->request->getParam('name');
if ($category_name != "") {
        $get_cat_name = ProductCategory::model()->findByAttributes(array('canonical_name' => $category_name));
}
?>

<section class="banner">

    <div id="large-header" class="large-header " style="height: 124px; background: url(<?= Yii::app()->baseUrl; ?>/images/img_inn.jpg)">


        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">My <span class="redish">Account </span></h1>

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
<section class=" services">
    <div class="container">
        <div class="row">
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
                            <div class="col-md-12 ctgry_upcmg">
                                <h1>Lorem <span class="redish">Lispum</span></h1>

                                <img class="img-responsive lis" src="<?= Yii::app()->baseUrl; ?>/images/border.jpg">

                            </div>
                            <?php
                            if (!empty($dataprovider) || $dataProvider != '') {
                                    $this->widget('zii.widgets.CListView', array(
                                        'dataProvider' => $dataProvider,
                                        'itemView' => '_view',
                                        'template' => "{pager}\n{items}\n{pager}",
                                    ));
                            } else {
                                    
                            }
                            ?>

                        </div></div>



                    <div class="clearfix"></div>
                </div>

            </div>


        </div>


    </div>
</div>
</section> <!-- end of facial -->


<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>























