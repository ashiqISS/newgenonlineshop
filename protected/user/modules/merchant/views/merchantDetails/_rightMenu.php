<?php
  $active_menu = Yii::app()->controller->id . '/' . Yii::app()->controller->action->id;
        if ($active_menu == 'merchantDetails/profile' || $active_menu == 'merchantDetails/editProfile') {
                $active1 = 'act';
        }else if ($active_menu == 'products/addProduct') {
                $active2 = 'act';
        }else if ($active_menu == 'bankingDetails/details' || $active_menu == 'bankingDetails/create') {
                $active3 = 'act';
        } else if ($active_menu == 'merchantDetails/changePassword') {
                $active4 = 'act';
        } else if ($active_menu == 'merchantDetails/Messages') {
                $active5 = 'act';
        } else if ($active_menu == 'products/myProducts'  || $active_menu == 'products/Edit') {
                $active6 = 'act';
        } else if ($active_menu == 'merchantDetails/featuredAds') {
                $active7 = 'act';
        } else if ($active_menu == 'merchantDetails/mySales' || $active_menu == 'merchantDetails/mostPurchased' || $active_menu == 'merchantDetails/mostViewed' ) {
                $active8 = 'act';
        } else if ($active_menu == 'merchantDetails/paymentRequest' || $active_menu == 'merchantDetails/ViewPayouts') {
                $active9 = 'act';
        }  else if ($active_menu == 'merchantDetails/UpgradePlan') {
                $active10 = 'act';
        }
?>

<div class="col-md-3 sidebar ">

    <ul>
        <li ><a href="<?php echo CommonUrls::merchant_profile(); ?>" class="<?= $active1 ?>"> <i class="fa fa-user fa-2x" aria-hidden="true"></i> <span>Profile</span></a></li>
        <li><a href="<?php echo CommonUrls::banking(); ?>" class="<?= $active3 ?>"> <i class="fa fa-unlock-alt fa-2x" aria-hidden="true"></i></i> <span>Banking Accounts</span></a></li>
        <li><a href="<?php echo CommonUrls::add_product(); ?>" class="<?= $active2 ?>"> <i class="fa fa-cart-arrow-down  fa-2x" aria-hidden="true"></i> <span>Add product</span></a></li>
        <li><a href="<?php echo CommonUrls::change_password(); ?>" class="<?= $active4 ?>"> <i class="fa fa-unlock-alt fa-2x" aria-hidden="true"></i></i> <span>Change Password</span></a></li>
        <li><a href="<?php echo CommonUrls::my_products(); ?>" class="<?= $active6 ?>"> <i class="fa fa-cube fa-2x" aria-hidden="true"></i> <span>My products</span></a></li>
        <li><a href="<?php echo CommonUrls::featured(); ?>" class="<?= $active7 ?>"> <i class="fa fa-picture-o fa-2x" aria-hidden="true"></i> <span>Featured ads </span></a></li>
        <li><a href="<?php echo CommonUrls::my_sales(); ?>" class="<?= $active8 ?>"> <i class="fa fa-line-chart fa-2x" aria-hidden="true"></i> <span>My Sales</span></a></li>
        <li><a href="<?php echo CommonUrls::request_pay(); ?>"  class="<?= $active9 ?>"> <i class="fa fa-cc-mastercard fa-2x" aria-hidden="true"></i><span>Payment / Payout</span></a></li>
        <li><a href="<?php echo CommonUrls::message(); ?>"  class="<?= $active5 ?>"> <i class="fa fa-cc-mastercard fa-2x" aria-hidden="true"></i><span>Messages</span></a></li>
        <li><a href="<?php echo CommonUrls::plans(); ?>"  class="<?= $active10 ?>"> <i class="fa fa-cc-mastercard fa-2x" aria-hidden="true"></i><span>Plans</span></a></li>
    </ul>

</div>