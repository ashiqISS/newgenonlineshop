<section class="banner">

    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">


        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">Request <span class="redish">Payment </span></h1>

        </div>

    </div>

</section>

<div class="clearfix"></div>

<section class="facial services">
    <div class="container">

        <div class="heading">


            request payment

        </div>


        <div class="row">
            <div class="col-md-9">

                <div class="left-content">

                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <fieldset>

                            <div class="form-group required mrg">

                                <div class="col-sm-12">

                                    <div class="col-sm-2 col-xs-2 zeros">
                                        <label for="textinput" class="control-label">Amount</label>
                                    </div>


                                    <div class="col-sm-1 col-xs-1 zeros">
                                        <label for="textinput" class="control-label">:</label>
                                    </div>

                                    <div class="col-sm-6">

                                        <label for="textinput" class="control-label pay">₹ 20555.00</label>
                                    </div> 


                                </div>
                            </div>

                            <div class="form-group required mrg">

                                <div class="col-sm-12">

                                    <div class="col-sm-2 col-xs-2 zeros">
                                        <label for="textinput" class="control-label">Description</label>
                                    </div>


                                    <div class="col-sm-1 col-xs-1 zeros">
                                        <label for="textinput" class="control-label">:</label>
                                    </div>

                                    <div class="col-sm-6">

                                        <textarea class=" filestyle form-control form-control txt_ara" id="exampleTextarea" rows="3"></textarea>

                                    </div> 

                                </div>
                            </div>

                        </fieldset>



                        <div class="buttons clearfix">

                            <!-- Button trigger modal -->
                            <button type="submit" class="btn btn-default btn-sm bt_up2 ">Submit</button>

                            <!-- Modal -->

                        </div>


                    </form>

                    <div class="clearfix"></div>
                </div>

            </div>

            <div class="col-md-3 sidebar ">
                
                   <ul>
                        <li ><a href="<?php echo CommonUrls::merchant_profile(); ?>"> <i class="fa fa-user fa-2x" aria-hidden="true"></i> <span>Profile</span></a></li>
                        <li><a href="<?php echo CommonUrls::add_product(); ?>" > <i class="fa fa-cart-arrow-down  fa-2x" aria-hidden="true"></i> <span>Add product</span></a></li>
                        <li><a href="<?php echo CommonUrls::change_password(); ?>"> <i class="fa fa-unlock-alt fa-2x" aria-hidden="true"></i></i> <span>Change Password</span></a></li>
                        <li><a href="<?php echo CommonUrls::my_products(); ?>"> <i class="fa fa-cube fa-2x" aria-hidden="true"></i> <span>My products</span></a></li>
                        <li><a href=""> <i class="fa fa-cc-diners-club  fa-2x" aria-hidden="true"></i><span>Paid Post</span></a></li>

                        <li><a href="<?php echo CommonUrls::featured(); ?>"> <i class="fa fa-picture-o fa-2x" aria-hidden="true"></i> <span>Featured ads </span></a></li>
                        <li><a href="<?php echo CommonUrls::my_sales(); ?>"> <i class="fa fa-line-chart fa-2x" aria-hidden="true"></i> <span>My Sales</span></a></li>
                        <li><a href="<?php echo CommonUrls::request_pay(); ?>"  class="act "> <i class="fa fa-cc-mastercard fa-2x" aria-hidden="true"></i><span>Payment / Payout</span></a></li>
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
