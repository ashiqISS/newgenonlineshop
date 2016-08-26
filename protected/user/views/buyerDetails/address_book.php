<section class="banner">
    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">
        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">My <span class="redish">Account </span></h1>
        </div>
    </div>
</section>
<div class="clearfix"></div>

<section class="addressbook">
    <div class="container">
        <div class="heading">
            Address Book Entries
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="left-my_acnt">
                    <div class="row">
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/userAddress/create">Add new address </a>
                    </div>

                    <?php
                    if (!empty($addresses)) {
                        foreach ($addresses as $address) {
                            if ($address->default_billing_address == 1) {
                                echo '<br><br><br>Default Billing Address<br>';
                                echo '<br>fname :' . $address->first_name;
                                echo '<br>lname :' . $address->last_name;
                                echo '<br>Address :' . $address->address_1;
                            } else {
                                echo '<br><br>Other Billing Addresses<br>';
                                echo '<br>fname :' . $address->first_name;
                                echo '<br>lname :' . $address->last_name;
                                echo '<br>Address :' . $address->address_1;
                            }

                            if ($address->default_shipping_address == 1) {
                                echo '<br><br><br>Default Shipping Address<br>';
                                echo '<br>fname :' . $address->first_name;
                                echo '<br>lname :' . $address->last_name;
                                echo '<br>Address :' . $address->address_1;
                            } else {
                                echo '<br><br>Other Shipping Addresses<br>';
                                echo '<br>fname :' . $address->first_name;
                                echo '<br>lname :' . $address->last_name;
                                echo '<br>Address :' . $address->address_1;
                            }
                        }
                    }
                    ?>


                    <div class="clearfix"></div>
                </div>

            </div>

            <div class="col-md-3 sidebar ">

                <ul>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/my-account" > <i class="fa fa-user fa-2x" aria-hidden="true"></i> <span>My Account</span></a></li>
                    <li ><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/edit-profile" > <i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i> <span>Edit profile</span></a></li>
                    <li ><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/change-password"> <i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i> <span>Change Password</span></a></li>
                    <li  ><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/my-orders"> <i class="fa fa-truck  fa-2x" aria-hidden="true"></i> <span>My orders</span></a></li>
                    <li ><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/address-book"  class="act"> <i class="fa fa-book  fa-2x" aria-hidden="true"></i> <span>Address book</span></a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user.php/my-wishlist"> <i class="fa fa-heart  fa-2x" aria-hidden="true"></i><span>Wish List</span></a></li>

                </ul>

            </div>
        </div>














    </div>
</section> <!-- end of facial -->




<!-- end of container -->


<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>