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
            <div class="col-md-9">

                <div class="left-my_acnt">




                    <div class="col-md-12">

                        <!--flash message-->
                        <?php if (Yii::app()->user->hasFlash('removeWishlist')): ?>
                            <div class="row" style="padding-bottom: 1em;">
                                <div class="alert alert-info fade in">
                                    <?php echo Yii::app()->user->getFlash('removeWishlist'); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="main_upcmg">
                            <?php
                            if (empty($wishlist)) {
                                ?>
                                <div class="col-xs-6 empty_message">
                                    <h4 class="fournotfour">You haven't added any items here.</h4>
                                </div>
                                <?php
                            } else {

                                foreach ($wishlist as $item) {
                                    if($product = Products::model()->findByPk($item->product_id))
                                    {
                                    if ($product->main_image == NULL) {
                                        $main_image = Yii::app()->getBaseUrl(true) . '/uploads/products/no_image.jpg';
                                    } else {
                                        $main_image = Yii::app()->getBaseUrl(true) . '/uploads/products/' . Yii::app()->Upload->folderName(0, 1000, $product->id) . '/' . $product->id . '/medium.' . $product->main_image;
                                    }
                                    ?>




                                    <div class="left col col-md-4 col-sm-4 col-xs-6 fill">
                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Product/Detail/name/<?php echo $product->canonical_name; ?>">
                                            <div class="wrap-hover-content f1 facial-left-thumbnail thumbnail" style="background: url(<?php echo $main_image; ?>)no-repeat 50% 50%">
                                                <div class="hover-content">
                                                    <div class="">
                                                        <img src="<?= $main_image ?>" alt="">
                                                        <p>
                                                            <?php echo $product->product_name; ?> 
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </a>
                                        <!--min height set for h2.If dont need pls remove it-->
                                        <h2>     <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Product/Detail/name/<?php echo $product->canonical_name; ?>">
                                                <?php echo $product->product_name; ?> 
                                            </a>
                                        </h2>
                                        <h3>  <?php if (Yii::app()->user->getId()) { ?>
                                                <h3><?php echo Yii::app()->Currency->convert($product->price); ?></h3>
                                            <?php } ?></h3>
                                        <div class="proceed_upmg">
                                            <button class="btn dlt-btn btn-default" onclick="removeFromWishlist(<?= $item->product_id?>)">delete</button>

                                        </div>
                                    </div>  

                                    <!--end of left--> 

                                    <?php
                                }
                            }
                            }
                            ?>
                        </div>
                    </div>



                    <div class="clearfix"></div>
                </div>

            </div>

            <div class="col-md-3 sidebar ">

                <ul>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/my-account" > <i class="fa fa-user fa-2x" aria-hidden="true"></i> <span>My Account</span></a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/edit-profile" > <i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i> <span>Edit profile</span></a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/change-password"> <i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i> <span>Change Password</span></a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/my-orders"> <i class="fa fa-truck  fa-2x" aria-hidden="true"></i> <span>My orders</span></a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/address-book" > <i class="fa fa-book  fa-2x" aria-hidden="true"></i> <span>Address book</span></a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/my-wishlist" class="act "> <i class="fa fa-heart  fa-2x" aria-hidden="true"></i><span>Wish List</span></a></li>

                </ul>

            </div>
        </div>

    </div>
</section> <!-- end of facial -->


<script>
    function removeFromWishlist(id)
    {
        $.ajax({
            type: "POST",
                url: baseurl + 'cart/RemoveWishlist',
                data: {prod_id: id}
        }).done(function (data) {
            location.reload();
            //            alert("Removed from wishlist");
        });
    }


</script>

<!-- end of container -->

<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>