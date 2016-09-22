
<style>
    .messages{
        height: 350px !important;
        overflow: scroll;
    }
</style>
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


            Messages

        </div>


        <div class="form-group">
            <div class="col-md-9">

                <div class="left-content messages">
                    <?php
                    foreach ($messages as $mes) {
                            $to = $mes->from_to;
                            if ($to == 1) {
                                    ?>
                                    <div class="message-left">
                                        <div class="mess-1">
                                            <img class="msg" src="<?php echo yii::app()->baseUrl ?>/images/merchant.jpg">
                                        </div>
                                        <div class="mess-2">
                                            <span class="industry"><?php echo $mes->message ?>.</span>
                                            <span class="dat"><?php echo $mes->doc ?></span>
                                        </div>
                                    </div>
                            <?php } else if ($to == 0) { ?>
                                    <div class="message-right">

                                        <div class="mess-22">
                                            <span class="industry2"><?php echo $mes->message ?>.</span>
                                            <span class="dat2"><?php echo $mes->doc ?></span>
                                        </div>
                                        <div class="mess-1">
                                            <img class="msgd" src="<?php echo yii::app()->baseUrl ?>/images/admin_.jpg">
                                        </div>

                                    </div>

                                    <?php
                            }
                    }
                    ?>
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'merchant-message-maas-form',
                        // Please note: When you enable ajax validation, make sure the corresponding
                        // controller action is handling ajax validation correctly.
                        // See class documentation of CActiveForm for details on this,
                        // you need to use the performAjaxValidation()-method described there.
                        'enableAjaxValidation' => false,
                    ));
                    ?>

                    <?php echo $form->errorSummary($model); ?>


                    <div class="form-group form-group-full">

                        <?php echo $form->textArea($model, 'message', array('rows' => 3, 'cols' => 10, 'class' => 'form-control', 'placeholder' => 'Type Your Message Here!')); ?>
                    </div>
                    <div class="form-group form-group-full">
                        <?php echo CHtml::submitButton('Submit', array('class' => 'up1 btn')); ?>
                    </div>

                    <?php $this->endWidget(); ?>

                </div>

            </div>

            <div class="col-md-3 sidebar ">

                <ul>
                    <li ><a href="<?php echo CommonUrls::merchant_profile(); ?>"> <i class="fa fa-user fa-2x" aria-hidden="true"></i> <span>Profile</span></a></li>
                    <li><a href="<?php echo CommonUrls::banking(); ?>"> <i class="fa fa-unlock-alt fa-2x" aria-hidden="true"></i></i> <span>Banking Accounts</span></a></li>
                    <li><a href="<?php echo CommonUrls::add_product(); ?>" > <i class="fa fa-cart-arrow-down  fa-2x" aria-hidden="true"></i> <span>Add product</span></a></li>
                    <li><a href="<?php echo CommonUrls::change_password(); ?>" > <i class="fa fa-unlock-alt fa-2x" aria-hidden="true"></i></i> <span>Change Password</span></a></li>
                    <li><a href="<?php echo CommonUrls::message(); ?>"    class="act "> <i class="fa fa-unlock-alt fa-2x" aria-hidden="true"></i></i> <span>Messages</span></a></li>
                    <li><a href="<?php echo CommonUrls::my_products(); ?>"> <i class="fa fa-cube fa-2x" aria-hidden="true"></i> <span>My products</span></a></li>
                    <li><a href="<?php echo CommonUrls::featured(); ?>" > <i class="fa fa-picture-o fa-2x" aria-hidden="true"></i> <span>Featured ads </span></a></li>
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
