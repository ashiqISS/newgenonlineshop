<section class="banner">
    <div id="large-header" class="large-header " style="height: 124px; background: url(<?= Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">
        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">My <span class="redish">Account </span></h1>
        </div>
    </div>
</section>
<div class="clearfix"></div>

<section class="addressbook">
    <div class="container">
        <div class="heading">
            Address Book 

        </div>

        <!--flash message-->
        <?php if (Yii::app()->user->hasFlash('address_updation')): ?>
            <div class="row" style="padding-bottom: 1em;">
                <div class="alert alert-info fade in">
                    <?php echo Yii::app()->user->getFlash('address_updation'); ?>
                </div>
            </div>
        <?php endif; ?>


        <div class="row">

            <div class="col-md-9">

                <div class="row">


                    <?php
//                    $addresses = '';
                    if (!empty($addresses)) {
                        foreach ($addresses as $address) {
                            $district = $state = $country = '';
                            if (Districts::model()->findByPk($address->district)) {
                                $district = Districts::model()->findByPk($address->district)->district_name;
                            }
                            if (States::model()->findByPk($address->state)) {
                                $state = States::model()->findByPk($address->state)->state_name;
                            }
                            if (Countries::model()->findByPk($address->country)) {
                                $country = Countries::model()->findByPk($address->country)->country_name;
                            }
                            ?>
                            <!-- billing address section start-->

                            <div class="col-sm-6">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th class="cart_action">
                                                <?php if ($address->default_billing_address == 1) { ?>
                                                    <span class="label label-success"><i class="fa fa-check"></i></span>                                                    
                                                <?php } ?>
                                                Billing Address
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>
                                                    <?= $address->first_name . ' ' . $address->last_name; ?><br>
                                                    <?= $address->contact_number; ?><br>
                                                    <?= $address->address_1; ?><br>
                                                    <?= $address->address_2; ?><br>
                                                    <?= $address->postcode; ?><br>
                                                    <?= $address->city . ', ' . $district . ', ' . $state; ?><br>
                                                    <?= $country; ?><br>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cart_action action_link"><?php echo CHtml::link('Edit', array('userAddress/update', 'id' => $address->id)); ?> | <a href="<?= Yii::app()->request->baseUrl; ?>/user.php/userAddress/create">New Address</a> | <a style="cursor: pointer"  onclick="deleteaddress(<?= $address->id; ?>)">Delete</a> </td>
        <!--                                                                                                <td class="cart_action action_link"><a href="/index.php/Myaccount/EditAddress/7">Edit</a> | <a href="/index.php/Myaccount/Newaddress/7">New Address</a> | <a class="" onclick="deleteaddress($address-&gt;id)" href="/index.php/Myaccount/DeleteAddress">Delete</a></td>-->
                                        </tr>

                                    </tbody>

                                </table>
                            </div>

                            <!-- billing address section end-->

                            <!-- Shipping address section start-->
                            <div class="col-sm-6">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th class="cart_action">
                                                <?php if ($address->default_shipping_address == 1) { ?>
                                                    <span class="label label-success"><i class="fa fa-check"></i></span>
                                                <?php } ?>
                                                Shipping Address
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>
                                                    <?= $address->first_name . ' ' . $address->last_name; ?><br>
                                                    <?= $address->contact_number; ?><br>
                                                    <?= $address->address_1; ?><br>
                                                    <?php
                                                    if (isset($address->address_2)) {
                                                        echo $address->address_2 . '<br>';
                                                    }
                                                    ?>
                                                    <?= $address->postcode; ?><br>
                                                    <?= $address->city . ', ' . $district . ', ' . $state; ?><br>
                                                    <?= $country; ?><br>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cart_action action_link"><?php echo CHtml::link('Edit', array('userAddress/update', 'id' => $address->id)); ?> | <a href="<?= Yii::app()->request->baseUrl; ?>/user.php/userAddress/create">New Address</a> | <a style="cursor: pointer" onclick="deleteaddress(<?= $address->id; ?>)">Delete</a> </td>
         <!--                                                                                                <td class="cart_action action_link"><a href="/index.php/Myaccount/EditAddress/7">Edit</a> | <a href="/index.php/Myaccount/Newaddress/7">New Address</a> | <a class="" onclick="deleteaddress($address-&gt;id)" href="/index.php/Myaccount/DeleteAddress">Delete</a></td>-->
                                        </tr>

                                    </tbody>

                                </table>
                            </div>

                            <!-- Shipping address section end-->

                            <?php
                        }
                    } else {
                        ?>
                        <div class="col-xs-6 empty_message">
                            <h4 class="fournotfour">You haven't added any addresses.</h4>
                            <br>
                            <?php echo CHtml::link('Add New Address', array('userAddress/create'), array('class' => 'btn-dark')); ?>
                        </div>

                        <?php
                    }
                    ?>

                </div>

                <div class="clearfix"></div>


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
<script>
    function deleteaddress(id)
    {

        var r = confirm("Are you sure you want to delete shipping address and billing address?");
        if (r == true)
        {
            $.ajax({
                type: "GET",
                url: baseurl + 'userAddress/DeleteAddress',
                data: ({id: id}),
                success: function (data)
                {
                    window.location.replace("<?= Yii::app()->baseUrl; ?>/user.php/address-book");
                },
                error: function (request, error) {
//                    console.log(arguments);
                    alert(" Can't delete : Address already in use. ");
                }
            });

        } else
        {
            window.location.replace("<?= Yii::app()->baseUrl; ?>/user.php/address-book");
        }
    }

</script>