<style>
    .cart-b{
        background-color: #c47c65;
        padding-left: 12px;
        padding-right: 10px;
        padding-top: 8px;
        padding-bottom: 9px;
        margin-top: 5%;
        color: #fff;
        font-weight: 400;
        border-radius: 0px;
        display: block;
        font-size: 13px;
        max-width: 157px;
        margin-bottom: 15px;
        text-transform: uppercase;
        border-radius: 4px;
    }
    .slick-prev {
        left: -17px;
        background-image: url(<?= Yii::app()->baseUrl; ?>/images/arrow_left.png);
        width: 19px;
        height: 33px;
    }
    .slick-next {
        background-image: url(<?= Yii::app()->baseUrl; ?>/images/arrow_right.png);
        width: 19px;
        height: 33px;
        display: block;
        right: -15px;
    }
    #laksyah_zoom
    {
        width: 100% ! important;
    }
</style>

<?php
$value = rtrim($product->category_id, ',');
$ids = explode(',', $value);
foreach ($ids as $id) {
    $cat_name = ProductCategory::model()->findByPk($id)->category_name;
}
$folder = Yii::app()->Upload->folderName(0, 1000, $product->id);
?>


<section class="banner">
    <div id="large-header" class="large-header " style="height: 124px; background: url(<?= Yii::app()->baseUrl; ?>/images/img_inn.jpg)">
        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">Product <span class="redish"> detail </span></h1>
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


<section class="details-products">
    <div class="container">
        <div class="row">

            <div style="padding-bottom: 1em;color: #e40689;">
                <div class="breadcrumbs">
                    <?php
                    //$category_name = Yii::app()->request->getParam('name');
                    $url = Yii::app()->request->urlReferrer;
                    $catname = explode("/", $url);
                    $category_name = $catname[8];
                    ?>
                    <?php echo $this->renderPartial('_bread_crumb', array('category_name' => $category_name)); ?><span> > </span><?php echo $product->product_name; ?>
                </div>
            </div>

            <div class="row">

                <div class="col-md-7">
                    <div class="product_thumb">
                        <ul id="gal1">

                            <?php
                           $big = dirname(Yii::app()->request->scriptFile). '/uploads/products/' . $folder . '/' . $product->id . '/gallery/big';
                            $bigg = Yii::app()->request->baseUrl . '/uploads/products/' . $folder . '/' . $product->id . '/gallery/big/';
                            $thu = dirname(Yii::app()->request->scriptFile). '/../uploads/products/' . $folder . '/' . $product->id . '/gallery/small';
                            $thumbs = Yii::app()->request->baseUrl . '/uploads/products/' . $folder . '/' . $product->id . '/gallery/small/';
                            $zoo = dirname(Yii::app()->request->scriptFile). '/../uploads/products/' . $folder . '/' . $product->id . '/gallery/zoom';
                            $zoom = Yii::app()->request->baseUrl . '/uploads/products/' . $folder . '/' . $product->id . '/gallery/zoom/';
                            $file_display = array('jpg', 'jpeg', 'png', 'gif');

                            if (file_exists($big) == false) {
                                
                            } else {
                                $dir_contents = scandir($big);
                                $i = 0;
                                foreach ($dir_contents as $file) {
                                    $file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                    if ($file !== '.' && $file !== '..' && in_array($file_type, $file_display) == true) {
                                        ?>

                                        <li> <a href="#" data-image="<?php echo $bigg . $file; ?>" data-zoom-image="<?php echo $zoom . $file; ?>"> <img src="<?php echo $thumbs . $file; ?>" width="100%" alt=""/> </a> </li>
                                        <?php
                                    }
                                    ?>



                                    <?php
                                }
                                $i++;
                            }
                            ?>

<!--                                                                <li><a href="#" data-image="<?= Yii::app()->request->baseUrl; ?>/images/product_big2.jpg" data-zoom-image="<?= Yii::app()->request->baseUrl; ?>/images/product_lg.jpg"> <img src="<?= Yii::app()->request->baseUrl; ?>/images/product_small.jpg" alt=""/> </a></li>
                                                                <li><a href="#" data-image="<?= Yii::app()->request->baseUrl; ?>/images/product_small.jpg" data-zoom-image="<?= Yii::app()->request->baseUrl; ?>/images/product_big.jpg"> <img src="<?= Yii::app()->request->baseUrl; ?>/images/product_small.jpg" alt=""/> </a></li>
                                                                <li><a href="#" data-image="<?= Yii::app()->request->baseUrl; ?>/images/product_small.jpg" data-zoom-image="<?= Yii::app()->request->baseUrl; ?>/images/product_big2.jpg"> <img src="<?= Yii::app()->request->baseUrl; ?>/images/product_small.jpg" alt=""/> </a></li>
                            -->
                            <?php if (empty($dir_contents)) { ?>
                                <li><a href="#" data-image="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?= $folder ?>/<?= $product->id ?>/big.<?= $product->main_image ?>" data-zoom-image="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?= $folder ?>/<?= $product->id ?>/zoom.<?= $product->main_image ?>"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?= $folder ?>/<?= $product->id ?>/small.<?= $product->main_image ?>" width="100%" alt=""/> </a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php
                    $folder = Yii::app()->Upload->folderName(0, 1000, $product->id);
                    ?>

                    <?php
                    if (!empty($dir_contents)) {

                        foreach ($dir_contents as $file1) {
                            
                        }
                        ?>
                    <div class="product_big_image"> <img src="<?php echo $bigg . $file1; ?>" id="laksyah_zoom" data-zoom-image="<?php echo $zoom . $file1; ?>" style="width: 100%" alt=""/>

                        </div>
                    <?php } else { ?>

                        <div class="product_big_image"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?= $folder ?>/<?= $product->id ?>/big.<?= $product->main_image ?>" id="laksyah_zoom" data-zoom-image="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?= $folder ?>/<?= $product->id ?>/zoom.<?= $product->main_image ?>" style="width: 100%" alt=""/>                          
                        </div>
                    <?php } ?>
                    <div class="mobile_slider">
                        <div class="laksyah_slider">
                            <?php if (file_exists($big) == false) { ?>
                                <div class = "item"> <img src = "<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?= $folder ?>/<?= $product->id ?>/big.<?= $product->main_image ?>" id = "laksyah_zoom" data-zoom-image = "<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?= $folder ?>/<?= $product->id ?>/big.<?= $product->main_image ?>" width="100%"></div>
                                <?php
                            } else {
                                $dir_contents = scandir($big);
                                $i = 0;
                                foreach ($dir_contents as $file) {
                                    $file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                    if ($file !== '.' && $file !== '..' && in_array($file_type, $file_display) == true) {
                                        ?>

                                        <div class="item"> <img src="<?php echo $bigg . $file; ?>"  id="laksyah_zoom" data-zoom-image="<?php echo $zoom . $file; ?>" width="100%"></div>
                                        <?php
                                    }
                                    ?>



                                    <?php
                                }
                                $i++;
                            }
                            ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <script type="text/javascript">
                        function popWindow(url) {
                            var newWindow = window.open(url, "", "width=300, height=200");
                        }
                    </script>
                </div>
                <div class="col-md-5">
                    <?php echo $this->renderPartial('_detailed_right', array('product' => $product)); ?>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="tab_upcmg">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Description </a></li>
                            <li><a data-toggle="tab" href="#menu1">Reviews (0)</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <h3>Menu 1</h3>
                                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                        </div></div>
                </div>    
            </div></div>
    </div>
</section> <!-- end of facial -->
<!-- end of container -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/slick.min.js"></script>
<script>




                        $('.views').slick({
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: true,
                            fade: true,
                            asNavFor: '.slider-nav-thumbnails',
//    prevArrow : '<i id="prev_slide_gallery" class="fa fa-angle-left"></i>',
//    nextArrow : '<i id="next_slide_gallery" class="fa  fa-angle-right"></i>',


                        });

                        $('.slider-nav-thumbnails').slick({
                            slidesToShow: 5,
                            slidesToScroll: 1,
                            asNavFor: '.views',
                            dots: false,
                            //	centerMode: true,
                            focusOnSelect: true,
                            responsive: [
                                {
                                    breakpoint: 650,
                                    settings: {
                                        centerMode: false,
                                        slidesToShow: 4

                                    }

                                },
                                {
                                    breakpoint: 520,
                                    settings: {
                                        centerMode: false,
                                        slidesToShow: 3

                                    }

                                },
                                {
                                    breakpoint: 350,
                                    settings: {
                                        centerMode: false,
                                        slidesToShow: 2

                                    }

                                }

                            ]

                        });


                        //remove active class from all thumbnail slides
                        $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');

                        //set active class to first thumbnail slides
                        $('.slider-nav-thumbnails .slick-slide').eq(0).addClass('slick-active');

                        // On before slide change match active thumbnail to current slide
                        $('.views').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
                            var mySlideNumber = nextSlide;
                            $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');
                            $('.slider-nav-thumbnails .slick-slide').eq(mySlideNumber).addClass('slick-active');
                        });

</script>

<script>

    $(document).ready(function () {

        $('.product-detail').slick({
            slidesToShow: 5,
            autoplay: false,
            autoplaySpeed: 4000,
            slidesToScroll: 1,
            pauseOnHover: false,
            prevArrow: '<i id="prev_slide_3"><img src="<?= Yii::app()->baseUrl; ?>/images/prev.png"></i>',
            nextArrow: '<i id="next_slide_3"><img src="<?= Yii::app()->baseUrl; ?>/images/next.png"></i>',
            responsive: [
                {
                    breakpoint: 1000,
                    settings: {
                        centerMode: false,
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 800,
                    settings: {
                        centerMode: false,
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        centerMode: false,
                        slidesToShow: 1
                    }
                }
            ]
        });


        $(".add_to_cart").click(function () {

            var id = $(this).attr('id');
            addtocart(id);
        });

    });


    function addtocart(id) {
        var canname = $("#cano_name_" + id).val();
        var qty = $(".qty").val();

        $.ajax({
            type: "POST",
            url: baseurl + 'cart/Buynow',
            data: {prod_id: id,cano_name: canname, qty: qty}
        }).done(function (data) {
            if (data == 9) {

//                $('.option_errors').html('<p>Invalid Product.Please try again</p>').show();
            } else {

//                $('.option_errors').html("").hide();
                getcartcount();
                getcarttotal();
                $(".cart_box").show();
                $(".cart_box").html(data);
                $("html, body").animate({scrollTop: 0}, "slow");
            }
            hideLoader();
        });
    }



    function showLoader() {
        $('.over-lay').show();
    }
    function hideLoader() {
        $('.over-lay').hide();
    }
    
    $('.zoomContainer img').css({"width" : ""});

</script>
<script src="<?php echo yii::app()->request->baseUrl; ?>/js/jquery.elevatezoom.js"></script>
<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>






