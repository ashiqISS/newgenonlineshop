<section class="banner">
    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">
        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">My <span class="redish">Accounts </span></h1>
        </div>
    </div>
</section>

<div class="clearfix"></div>

<section class="facial services">
    <div class="container">
        <div class="heading">
            Banking Details
        </div>

        <div class="row">
            <div class="col-md-9">
                <div class="left-content">
                    <div class="row">
                        <div class="col-md-6" >
                        </div>
                        <div class="col-md-3" style="text-align: right;float: right;padding-right: 2em;">
                            <a class="edit-btn" href="<?php echo Yii::app()->request->baseUrl . '/user.php/add-account'; ?>"> Add New Account</a>                           
                        </div>
                    </div>

                    <div class="strip-padding">
                        <div class="row">
                            <?php
                            if (empty($datas)) {
                                ?>
                                <h4 class="fournotfour" style="padding: 2em;">You haven't added any accounts !</h4>
                                <?php
                            } else {
                                ?>
                                <div class="copyz">
                                    <div><center><hr/></center></div>
                                </div>
                                <?php
                                foreach ($datas as $data) {
                                    if ($data->account_type == 1) {
                                        ?>

                                        <div class="copyz">
                                            <div class="col-sm-3 col-xs-3 zeros">
                                                <label for="textinput" class="control-labelz">PayPal Id</label>
                                            </div>
                                            <div class="col-sm-1 col-xs-1 zeros">
                                                <label for="textinput" class="control-labelz">:</label>
                                            </div>
                                            <div class="col-sm-8 col-xs-8 zeros">
                                                <label for="textinput" class="control-labelz-2"><?php echo $data->paypal_id; ?></label>
                                            </div>
                                        </div>
                                        <div class="copyz">
                                            <div class="col-sm-3 col-xs-3 zeros">
                                                <label for="textinput" class="control-labelz">PayPal email</label>
                                            </div>
                                            <div class="col-sm-1 col-xs-1 zeros">
                                                <label for="textinput" class="control-labelz">:</label>
                                            </div>
                                            <div class="col-sm-8 col-xs-8 zeros">
                                                <label for="textinput" class="control-labelz-2"><?php echo $data->email; ?></label>
                                            </div>
                                        </div>
                                        <div class="copyz">
                                            <div><center><hr/></center></div>
                                        </div>
                                    <?php } else {
                                        ?>

                                        <div class="copyz">
                                            <div class="col-sm-3 col-xs-3 zeros">
                                                <label for="textinput" class="control-labelz">Bank Name</label>
                                            </div>
                                            <div class="col-sm-1 col-xs-1 zeros">
                                                <label for="textinput" class="control-labelz">:</label>
                                            </div>
                                            <div class="col-sm-8 col-xs-8 zeros">
                                                <label for="textinput" class="control-labelz-2"><?php echo $data->bank_name; ?></label>
                                            </div>
                                        </div>

                                        <div class="copyz">
                                            <div class="col-sm-3 col-xs-3 zeros">
                                                <label for="textinput" class="control-labelz">Account number</label>
                                            </div>
                                            <div class="col-sm-1 col-xs-1 zeros">
                                                <label for="textinput" class="control-labelz">:</label>
                                            </div>
                                            <div class="col-sm-8 col-xs-8 zeros">
                                                <label for="textinput" class="control-labelz-2"><?php echo $data->account_number; ?></label>
                                            </div>
                                        </div>
                                        <div class="copyz">
                                            <div class="col-sm-3 col-xs-3 zeros">
                                                <label for="textinput" class="control-labelz">Account Holder Name</label>
                                            </div>
                                            <div class="col-sm-1 col-xs-1 zeros">
                                                <label for="textinput" class="control-labelz">:</label>
                                            </div>
                                            <div class="col-sm-8 col-xs-8 zeros">
                                                <label for="textinput" class="control-labelz-2"><?php echo $data->account_holder_name; ?></label>
                                            </div>
                                        </div>

                                        <div class="copyz">
                                            <div class="col-sm-3 col-xs-3 zeros">
                                                <label for="textinput" class="control-labelz">IFSC</label>
                                            </div>
                                            <div class="col-sm-1 col-xs-1 zeros">
                                                <label for="textinput" class="control-labelz">:</label>
                                            </div>
                                            <div class="col-sm-8 col-xs-8 zeros">
                                                <label for="textinput" class="control-labelz-2"><?php echo $data->ifsc; ?></label>
                                            </div>
                                        </div>
                                        <div class="copyz">
                                            <div><center><hr/></center></div>
                                        </div>

                                        <?php
                                    }
                                }
                            }
                            ?>

                        </div>
                    </div>



                </div>

            </div>

            <div class="col-md-3 sidebar hidden-xs">

                <ul>
                    <li ><a href="<?php echo CommonUrls::merchant_profile(); ?>" > <i class="fa fa-user fa-2x" aria-hidden="true"></i> <span>Profile</span></a></li>
                    <li><a href="<?php echo CommonUrls::banking(); ?>"   class="act "> <i class="fa fa-unlock-alt fa-2x" aria-hidden="true"></i></i> <span>Banking Accounts</span></a></li>
                    <li><a href="<?php echo CommonUrls::add_product(); ?>" > <i class="fa fa-cart-arrow-down  fa-2x" aria-hidden="true"></i> <span>Add product</span></a></li>
                    <li><a href="<?php echo CommonUrls::change_password(); ?>"> <i class="fa fa-unlock-alt fa-2x" aria-hidden="true"></i></i> <span>Change Password</span></a></li>                   
                    <li><a href="<?php echo CommonUrls::my_products(); ?>"> <i class="fa fa-cube fa-2x" aria-hidden="true"></i> <span>My products</span></a></li>
                    <li><a href=""> <i class="fa fa-cc-diners-club  fa-2x" aria-hidden="true"></i><span>Paid Post</span></a></li>

                    <li><a href="<?php echo CommonUrls::featured(); ?>" > <i class="fa fa-picture-o fa-2x" aria-hidden="true"></i> <span>Featured ads </span></a></li>
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