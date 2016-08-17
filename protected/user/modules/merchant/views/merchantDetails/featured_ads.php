<section class="banner">

    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">


        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">Add <span class="redish">Product </span></h1>

        </div>

    </div>               

</section>
<div class="clearfix"></div>


<section class="facial services">
    <div class="container">
        <div class="row">


            <div class="heading">


                your personal details

            </div>


            <div class="row">
                <div class="col-md-9">

                    <div class="left-content">

                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <fieldset>

                       <div class="form-group required mrg">

                                    <div class="col-sm-12">
                          <div class="col-sm-2 col-xs-2 zeros">
                                            <label for="textinput" class="control-label">Ad title</label>
                                        </div>

                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-label">:</label>
                                        </div>

                                        <div class="col-sm-6">

                                            <input type="text" name="Meta keyword" value="" placeholder="Meta keyword" id="input-firstname" class="form-control input-fldd" vk_11acd="subscribed">
                                        </div> 


                                    </div>
                                </div>

                                <div class="form-group required mrg">

                                    <div class="col-sm-12">

                                        <div class="col-sm-2 col-xs-2 zeros">
                                            <label for="textinput" class="control-label">Ad Image</label>
                                        </div>

                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-label">:</label>
                                        </div>

                                        <div class="col-sm-6">

                                            <input type="file" class="filestyle form-control input-fldd" data-icon="false">
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
                                <button type="button" class="btn btn-primary btn-lg bt_up2" data-toggle="modal" data-target="#myModal">
                                    request
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <!--<h4 class="modal-title" id="myModalLabel">Modal title</h4>-->
                                            </div>
                                            <div class="modal-body ppp">
                                                <p>You will receive the cost soon to the soon to the registered mail id check ok your mail for details </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default bt_up" data-dismiss="modal">Close</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>


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

                        <li><a href="<?php echo CommonUrls::featured(); ?>" class="act "> <i class="fa fa-picture-o fa-2x" aria-hidden="true"></i> <span>Featured ads </span></a></li>
                        <li><a href="<?php echo CommonUrls::my_sales(); ?>"> <i class="fa fa-line-chart fa-2x" aria-hidden="true"></i> <span>My Sales</span></a></li>
                        <li><a href="<?php echo CommonUrls::request_pay(); ?>"> <i class="fa fa-cc-mastercard fa-2x" aria-hidden="true"></i><span>Payment / Payout</span></a></li>
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

