<section class="banner">

    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">


        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">MY <span class="redish">Account </span></h1>

        </div>

    </div>

</section>

<div class="clearfix"></div>


<section class="facial services">
    <div class="container">



        <div class="heading">


            change password

        </div>


        <div class="row">
            <div class="col-md-9">

                <div class="left-content">

                    <form role="form">



                        <div class="form-group">

                            <input type="password" class="form-news" id="pwd" placeholder="Current Password ">
                        </div>
                        <div class="form-group">

                            <input type="password" class="form-news" id="pwd" placeholder="New Password ">
                        </div>
                        <div class="form-group">

                            <input type="password" class="form-news" id="pwd" placeholder="Confirm Password ">
                        </div>

                        <button type="submit" class="btn back btn-default edit-btn">Back</button>

                        <button type="submit" class="btn continue btn-default delete-btn">continue</button>


                    </form>

                    <div class="clearfix"></div>
                </div>

            </div>

            <div class="col-md-3 sidebar ">

                <ul>
                    <li ><a href="<?php echo CommonUrls::merchant_profile(); ?>"> <i class="fa fa-user fa-2x" aria-hidden="true"></i> <span>Profile</span></a></li>
                    <li><a href="<?php echo CommonUrls::add_product(); ?>" > <i class="fa fa-cart-arrow-down  fa-2x" aria-hidden="true"></i> <span>Add product</span></a></li>
                    <li><a href="<?php echo CommonUrls::change_password(); ?>"    class="act "> <i class="fa fa-unlock-alt fa-2x" aria-hidden="true"></i></i> <span>Change Password</span></a></li>
                    <li><a href="<?php echo CommonUrls::my_products(); ?>"> <i class="fa fa-cube fa-2x" aria-hidden="true"></i> <span>My products</span></a></li>
                    <li><a href=""> <i class="fa fa-cc-diners-club  fa-2x" aria-hidden="true"></i><span>Paid Post</span></a></li>

                    <li><a href="Featured_ads.php" > <i class="fa fa-picture-o fa-2x" aria-hidden="true"></i> <span>Featured ads </span></a></li>
                    <li><a href="my_sales.php"> <i class="fa fa-line-chart fa-2x" aria-hidden="true"></i> <span>My Sales</span></a></li>
                    <li><a href="payment.php"  > <i class="fa fa-cc-mastercard fa-2x" aria-hidden="true"></i><span>Payment / Payout</span></a></li>
                </ul>

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
