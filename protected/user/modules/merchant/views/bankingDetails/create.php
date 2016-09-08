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
                    <?php $this->renderPartial('_form', array('model' => $model)); ?>  
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

<script>
    $(document).ready(function () {
         type = $('input[name=account_type]:checked').val();
         
        if (type == 1)
        {
//           alert(type)
            $('.bankDetails').hide();
            $('.paypalDetails').show();
        } else
        {
            $('.paypalDetails').hide();
            $('.bankDetails').show();
        }
    });

    function accountTypeChange(value)
    {
//        alert(value)
        if (value == 1)
        {
            $('.bankDetails').hide();
//            document.getElementById('bankDetails').style.display = "none";
//            document.getElementById('bankDetails').style.display = "none";
            $('.paypalDetails').show();
        } else
        {
            $('.paypalDetails').hide();
            $('.bankDetails').show();
        }
    }
</script>

