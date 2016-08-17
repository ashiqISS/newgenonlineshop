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
</style>

<?php
$value = rtrim($product->category_id, ',');
$ids = explode(',', $value);
foreach ($ids as $id) {
        $cat_name = ProductCategory::model()->findByPk($id)->category_name;
}
?>
<section class="banner">

    <div id="large-header" class="large-header " style="height: 124px; background: url(<?= Yii::app()->baseUrl; ?>/images/img_inn.jpg">


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

            <div class="heading">

            </div>

            <div class="row">

                <div class="col-md-4">

                    <!-- MAIN SLIDES -->
                    <div class="views">
                        <figure class="figures"> <img class="img-responsive" src="<?= Yii::app()->baseUrl; ?>/images/d1.jpg" alt="One">
                        </figure>
                        <figure class="figures"> <img class="img-responsive" src="<?= Yii::app()->baseUrl; ?>/images/d2.jpg" alt="One">
                        </figure>
                        <figure class="figures"> <img class="img-responsive" src="<?= Yii::app()->baseUrl; ?>/images/d3.jpg" alt="One">
                        </figure>
                    </div>
                    <!-- THUMBNAILS -->
                    <div class="slider-nav-thumbnails">
                        <div><img class="small_img" src="<?= Yii::app()->baseUrl; ?>/images/d1.jpg" alt="One"></div>
                        <div><img class="small_img" src="<?= Yii::app()->baseUrl; ?>/images/d2.jpg" alt="Two"> </div>
                        <div><img class="small_img" src="<?= Yii::app()->baseUrl; ?>/images/d3.jpg" alt="Three"> </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="dtl_dsrpn">
                        <h1>Lorem Ipsum is simply dummy text</h1>
                        <div class="dtl_inn">
                            <h2><?= $product->product_name; ?></h2>
                            <p><?= $product->description; ?></p>
                            <h3><?= Yii::app()->Currency->convert($product->price); ?></h3>
                            <div class="counter">
                                <div class="counter-1">
                                    <form method="post" name="option" action="<?= Yii::app()->request->baseUrl; ?>/index.php/cart/Buynow" id="myform">
                                        <input type="hidden"   value="<?= $product->id; ?>" id="prod_id" name="prod">
                                        <input type="submit" value="Add to baskest" class="cart-b" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/cart/Buynow/<?php echo $prod->id; ?>" />
<!--                                        <a class="cart-b" href="#"><i class="fa baskets fa-shopping-basket"></i>Add to baskest</a>-->
                                    </form>
                                </div>

                                <div class="counter-2">
                                    <div class="input-group topz"> <span> Qty :</span>
                                        <input id="after" class="form-control nisi ni" type="text" value="1" min="1" max="10" vk_17e8e="subscribed" style="text-align: center;">
                                    </div>

                                </div>
                            </div>

                            <div class="clearfix"></div>

                        </div></div>
                </div></div>

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

        });

</script>

<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>






