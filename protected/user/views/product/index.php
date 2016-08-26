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
                <!--                wishlist-->

            </div>
            <div class="row">
                <?php echo $this->renderPartial('_left_menu'); ?>
                <div class="col-md-9">

                    <div class="Category">

                        <div class="row">
<!--                            <div class="col-md-12 ctgry_upcmg">
                                <h1>Lorem <span class="redish">Lispum</span></h1>

                                <img class="img-responsive lis" src="<?= Yii::app()->baseUrl; ?>/images/border.jpg">

                            </div>-->
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

<script>
//$.noConflict();
// Code that uses other library's $ can follow here.
</script>
<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>























