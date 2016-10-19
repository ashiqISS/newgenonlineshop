<style>
    input.btn.submit_btn {
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
input.btn.submit_btn:hover {
        background: #dc9780 !important;
   }

   
    .form-review {
        display: block;
        width: 250px;
        height: 39px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #e6e6e6;
        background-image: none;
        font-family: 'Lato', sans-serif;
        border: 0;
        border-radius: 0;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    }
    .stars ul {
        list-style: none;
        padding-left: 0;
    }
    .stars ul li{
        display: inline-block;
        color: #cf7116;
        font-size: 21px;
    }
    .review_content{
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
        margin-bottom: 10px;
    }

    i.fa.stars.fa-star {
        color: #cf7116;
    }
    a.reviews{
        padding: 11px 32px;
        font-size: 13px;
        color: #fff;
        background: #122102;
        font-family: 'Lato', sans-serif;
        border: none;
        float: left;
        margin-top: 0;
        text-transform: uppercase;
    }
    div.stars {
        /*//width: 270px;*/
        display: inline-block;
    }

    input.star { display: none; }

    label.star {
        float: right;
        padding: 10px;
        font-size: 36px;
        color: #122102;
        transition: all .2s;
    }

    input.star:checked ~ label.star:before {
        content: '\f005';
        color: #FD4;
        transition: all .25s;
    }

    input.star-5:checked ~ label.star:before {
        color: #FE7;
        text-shadow: 0 0 20px #952;
    }

    input.star-1:checked ~ label.star:before { color: #F62; }

    label.star:hover { transform: rotate(-15deg) scale(1.3); }

    label.star:before {
        content: '\f006';
        font-family: FontAwesome;
    }
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

            <div class="row" style="padding: .5em;padding-bottom: 2em;">
                <h2><?= $product->product_name; ?></h2>
            </div>

            <div class="row">

                <div class="col-md-7">
                    <div class="product_thumb">
                        <ul id="gal1">

                            <?php
                            $big = dirname(Yii::app()->request->scriptFile) . '/uploads/products/' . $folder . '/' . $product->id . '/gallery/big';
                            $bigg = Yii::app()->request->baseUrl . '/uploads/products/' . $folder . '/' . $product->id . '/gallery/big/';
                            $thu = dirname(Yii::app()->request->scriptFile) . '/../uploads/products/' . $folder . '/' . $product->id . '/gallery/small';
                            $thumbs = Yii::app()->request->baseUrl . '/uploads/products/' . $folder . '/' . $product->id . '/gallery/small/';
                            $zoo = dirname(Yii::app()->request->scriptFile) . '/../uploads/products/' . $folder . '/' . $product->id . '/gallery/zoom';
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
                <?php echo $this->renderPartial('_detailed_description', array('product' => $product)); ?>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <form id="reviewform" class="form-inline">
                        <?php
                        if ($user_id = Yii::app()->user->getId()) {
                            $email = Users::model()->findByPk($user_id)->email;
                            if (BuyerDetails::model()->findByAttributes(array('user_id' => $user_id))) {
                                $data = BuyerDetails::model()->findByAttributes(array('user_id' => $user_id));
                                $name = $data->first_name . ' ' . $data->last_name;
                            } elseif (MerchantDetails::model()->findByAttributes(array('user_id' => $user_id))) {
                                $data = MerchantDetails::model()->findByAttributes(array('user_id' => $user_id));
                                $name = $data->fullname;
                            } else {
                                $name = "";
                            }
                        } else {
                            $name = '';
                            $email = "";
                        }
                        ?>


                        <input type="hidden" value="<?= $product->id ?>" name="review_product_id" id="review_product_id">
                        <div class="form-group">
                            <input type="text" required="" class="form-review" id="review_name" value="<?= $name ?>" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="email" required="" class="form-review" id="review_email" value="<?= $email ?>" placeholder="Email address">
                        </div>
                        <div class="form-group">
                            <textarea class="form-review" rows="5" id="review_comment" placeholder="Comment"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="stars">
                                <input type="hidden" id="review_star" name="review_star" />
                                <input class="star str star-5" id="star-5-2" type="radio" value="5" name="star"/>
                                <label class="star  star-5" for="star-5-2"></label>
                                <input class="star str star-4" id="star-4-2" type="radio" value="4" name="star"/>
                                <label class="star star-4" for="star-4-2"></label>
                                <input class="star str star-3" id="star-3-2" type="radio" value="3" name="star"/>
                                <label class="star star-3" for="star-3-2"></label>
                                <input class="star str star-2" id="star-2-2" type="radio" value="2" name="star"/>
                                <label class="star star-2" for="star-2-2"></label>
                                <input class="star str star-1" id="star-1-2" type="radio" value="1" name="star"/>
                                <label class="star star-1" for="star-1-2"></label>

                            </div>
                        </div>
                        <div class="form-group">
                            <input class="btn submit_btn" type="button" value="Submit">

                        </div>

                    </form>
                    <div class="review_message"> </div>
                </div>
            </div></div>
    </div>
</section> <!-- end of facial -->



<?php
if (!empty($you_may_also_like)) {
    ?>
    <section class="more">

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h1><span class="redish">You May Also Like</span></h1>
                    <img class="img-responsive lis" src="<?= Yii::app()->baseUrl; ?>/images/border.jpg">
                    <div class="part-4">


                        <?php
                        $i = 1;
                        foreach ($you_may_also_like as $product) {
                            if ($product->main_image == NULL) {
                                $main_image = Yii::app()->getBaseUrl(true) . '/uploads/products/no_image.jpg';
                            } else {
                                $main_image = Yii::app()->getBaseUrl(true) . '/uploads/products/' . Yii::app()->Upload->folderName(0, 1000, $product->id) . '/' . $product->id . '/medium.' . $product->main_image;
                            }
                            ?>
                            <div class="item effects">
                                <div class="main">
                                    <div class="zoom-img">
                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Product/Detail/name/<?php echo $product->canonical_name; ?>"><img src="<?= $main_image; ?>" class="img-responsive" style="height: 250px;"></a>
                                    </div>
                                    <h2>
                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Product/Detail/name/<?php echo $product->canonical_name; ?>">
                                            <?php echo $product->product_name; ?>
                                        </a>
                                    </h2>
                                    <?php if (Yii::app()->user->getId()) { ?>
                                        <h3><?php echo Yii::app()->Discount->Discount($product); ?></h3>
                                    <?php } ?>

                                </div>
                            </div>

                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>

    </section>
<?php } ?>

<?php
if (!empty($you_may_also_like)) {
    ?>

    <!--best sellers-->

    <section class="more">

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h1><span class="redish">Best Sellers</span></h1>

                    <img class="img-responsive lis" src="<?= Yii::app()->baseUrl; ?>/images/border.jpg">
                    <div class="part-5">


                        <?php
                        $i = 1;
                        foreach ($best_sellers as $productid) {
                            $product = Products::model()->findByPk($productid->product_id);
                            if ($product->main_image == NULL) {
                                $main_image = Yii::app()->getBaseUrl(true) . '/uploads/products/no_image.jpg';
                            } else {
                                $main_image = Yii::app()->getBaseUrl(true) . '/uploads/products/' . Yii::app()->Upload->folderName(0, 1000, $product->id) . '/' . $product->id . '/medium.' . $product->main_image;
                            }
                            ?>
                            <div class="item effects">
                                <div class="main">
                                    <div class="zoom-img">
                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Product/Detail/name/<?php echo $product->canonical_name; ?>"><img src="<?= $main_image; ?>" class="img-responsive" style="height: 250px;"></a>
                                    </div>
                                    <h2>
                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Product/Detail/name/<?php echo $product->canonical_name; ?>">
                                            <?php echo $product->product_name; ?>
                                        </a>
                                    </h2>
                                    <?php if (Yii::app()->user->getId()) { ?>
                                        <h3><?php echo Yii::app()->Discount->Discount($product); ?></h3>
                                    <?php } ?>

                                </div>
                            </div>

                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>

    </section>

<?php } ?>






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

        $(document).ready(function () {
            $("#review_star").val(0);
            $(".str").click(function () {
                var values = $(this).val();
                $("#review_star").val(values);
            });
        });


        $(".review_submit").click(function () {
            var name = $("#review_name").val();
            if (name == "") {
                alert('Name Must be filled out');
                return false;
            }
            var email = $("#review_email").val();
            if (email == "") {
                alert('Email Must be filled out');
                return false;
            }
            var comment = $("#review_comment").val();
            var star = $("#review_star").val();
            if (star == 0) {
                alert('Star Must be Choosen');
                return false;
            }
            var review_product_id = $("#review_product_id").val();
            $.ajax({
                type: "POST",
                cache: 'false',
                async: false,
                url: baseurl + 'Product/Addreview',
                data: {name: name, email: email, comment: comment, star: star, review_product_id: review_product_id}
            }).done(function (data) {
                $("#reviewform")[0].reset();
                if (data == 2) {
                    $(".review_message").html("<h5 style='color:green;'>Your Review Successfully Sent</h4>");
                } else if (data == 1) {
                    $(".review_message").html("<h5 style='color:red;'>You Already reviewed this Product</h4>");
                }

            });
        });



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
            data: {prod_id: id, cano_name: canname, qty: qty}
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

    function addToWishlist(id)
    {
        $.ajax({
            type: "POST",
            url: baseurl + 'cart/Wishlist',
            data: {prod_id: id}
        }).done(function (data) {
            alert("Added to wishlist");
        });
    }

    function showLoader() {
        $('.over-lay').show();
    }
    function hideLoader() {
        $('.over-lay').hide();
    }

    $('.zoomContainer img').css({"width": ""});</script>
<script src="<?php echo yii::app()->request->baseUrl; ?>/js/jquery.elevatezoom.js"></script>
<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>

<script>

    $(document).ready(function () {

        $('.part-4').slick({
            slidesToShow: 4,
            autoplay: true,
            autoplaySpeed: 5000,
            slidesToScroll: 1,
            pauseOnHover: true,
            prevArrow: '<i id="prev_slide_2" class="fa fa-chevron-left"></i>',
            nextArrow: '<i id="next_slide_2" class="fa fa-chevron-right"></i>',
            responsive: [
                {
                    breakpoint: 1000,
                    settings: {
                        centerMode: false,
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 550,
                    settings: {
                        centerMode: false,
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        centerMode: false,
                        slidesToShow: 1
                    }
                }
            ]
        });

        $('.part-5').slick({
            slidesToShow: 4,
            autoplay: true,
            autoplaySpeed: 7000,
            slidesToScroll: 1,
            pauseOnHover: true,
            prevArrow: '<i id="prev_slide_2" class="fa fa-chevron-left"></i>',
            nextArrow: '<i id="next_slide_2" class="fa fa-chevron-right"></i>',
            responsive: [
                {
                    breakpoint: 1000,
                    settings: {
                        centerMode: false,
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 550,
                    settings: {
                        centerMode: false,
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        centerMode: false,
                        slidesToShow: 1
                    }
                }
            ]
        });

    });

</script>
