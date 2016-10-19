

<section class="banner">
    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">                     
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

<section class="facial services">
    <div class="container">
        <div class="row">                            
            <div class="heading">
                your personal details        
            </div>

            <div class="row">
                <div class="col-md-9">

                    <div class="left-content">    
                        <div class="strip-padding">

                            <div class="copyz">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-labelz">First Name</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <label for="textinput" class="control-labelz-2"><?= $buyer->first_name ?></label>
                                </div>
                            </div>

                            <div class="copyz">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-labelz">Last Name</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <label for="textinput" class="control-labelz-2"><?= $buyer->last_name ?></label>
                                </div>
                            </div>
                            <div class="copyz">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-labelz">Email</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <label for="textinput" class="control-labelz-2"><?= $user->email ?></label>
                                </div>
                            </div>
                            <div class="copyz">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-labelz">Mobile</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <label for="textinput" class="control-labelz-2"><?= $user->phone_number ?></label>
                                </div>
                            </div>
                            <div class="copyz">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-labelz">Account Created On </label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <label for="textinput" class="control-labelz-2"><?= $user->DOC ?></label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-3 sidebar hidden-xs">

                    <ul>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/my-account"  class="act "> <i class="fa fa-user fa-2x" aria-hidden="true"></i> <span>My Account</span></a></li>
                        <li ><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/edit-profile"> <i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i> <span>Edit profile</span></a></li>
                        <li ><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/change-password"> <i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i> <span>Change Password</span></a></li>
                        <li  ><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/my-orders"> <i class="fa fa-truck  fa-2x" aria-hidden="true"></i> <span>My orders</span></a></li>
                        <li ><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/address-book" > <i class="fa fa-book  fa-2x" aria-hidden="true"></i> <span>Address book</span></a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/my-wishlist"> <i class="fa fa-heart  fa-2x" aria-hidden="true"></i><span>Wish List</span></a></li>

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