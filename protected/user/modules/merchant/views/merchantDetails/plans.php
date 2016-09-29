<style>
    .comm {
    float: left;
    margin-bottom: 30px;
    width: 100%;
}

.commission-1 {
    float: left;
    width: 100%;
    background-color: #e0e0e0;
    padding-left: 20px;
    padding-right: 20px;
    padding-top: 10px;
    padding-bottom: 10px;
}
.head-2 {
    float: left;
    width: 13%;
}
.comm h2 {
    font-size: 12px;
    font-weight: 400;
    font-family: 'Roboto', sans-serif;
    text-align: left;
    margin-bottom: 0;
    margin-top: 0;
    line-height: 24px;
    color: #333;
    font-weight: bold;
}
.commission-2 {
    float: left;
    width: 100%;
    background-color: #fff;
    padding-left: 20px;
    padding-right: 20px;
    border-bottom: 1px solid #ccc;
    border-left: 1px solid #ccc;
    border-right: 1px solid #ccc;
    padding-bottom: 22px;
    padding-top: 22px;
}
    </style>
<section class="banner">

    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">


        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">MY <span class="redish">Plans </span></h1>

        </div>

    </div>

</section>

<div class="clearfix"></div>


<section class="facial services">
    <div class="container">



        <div class="heading">


            My Plans

        </div>


        <div class="form-group">
            <div class="col-md-9">

                <div class="left-content">


                    <?php if (Yii::app()->user->hasFlash('success')): ?>
                        <div class="accountsettings">
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
                            </div>
                        </div>
                    <?php endif; ?>


                    <?php if (Yii::app()->user->hasFlash('error')): ?>
                        <div class="accountsettings">
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <strong>Sorry!</strong> <?php echo Yii::app()->user->getFlash('error'); ?>
                            </div>
                        </div>
                    <?php endif; ?>


                    <?php if (Yii::app()->user->getState('merchant_id')) { ?>
                        <?php if (!empty($yourplans)) { ?>

                            <span class="recentorders">Your Plans</span>
                            <div class="comm">

                                <div class="commission-1">
                                    <div class="head-2"><h2>Plan Name</h2></div>
                                    <div class="head-2"><h2>Amount</h2></div>
                                    <div class="head-2"><h2>Plan Start Date</h2></div>
                                    <div class="head-2"><h2>Plan Expiry Date</h2></div>
                                    <div class="head-2"><h2>Products Left</h2></div>
                                    <div class="head-2"><h2>Ads Left</h2></div>
                                    <div class="head-2"><h2>View</h2></div>

                                </div>
                                <?php
                                foreach ($yourplans as $yourplan) {
                                    ?>
                                    <div class="commission-2">
                                        <div class="head-2"><h2><?= PlanDetails::model()->findByPk($yourplan->plan_id)->plan_name; ?></h2></div>
                                        <div class="head-2"><h2><?= Yii::app()->Currency->convert($yourplan->amount); ?></h2></div>
                                        <div class="head-2"><h2><?= date('d-M-Y', strtotime($yourplan->doc)); ?></h2></div>
                                        <div class="head-2"><h2><?php
                                                $date = date('Y-m-d', strtotime($yourplan->doc));
                                                echo date("d-M-Y", strtotime($date . " +  $yourplan->no_of_days days"));
                                                ?></h2></div>
                                        <div class="head-2"><h2><?= $yourplan->no_of_product_left; ?></h2></div>
                                        <div class="head-2"><h2><?= $yourplan->no_of_ads_left; ?></h2></div>

                                        <div class="head-2"><h2><?php echo CHtml::link('<i class="fa fa-eye"  style="max-width:15%;font-size: 24px;
    color: #000;"></i>', array('Myaccount/MerchantPlanDetail', 'plan' => CHtml::encode($yourplan->id)), array('data-toggle' => 'tooltip', 'title' => 'View Plans Details')); ?></h2></div>

                                    </div>
                                <?php }
                                ?>
                            </div>
                        <?php }
                        ?>


                    <?php } ?>
                    <?php if (Yii::app()->user->getState('merchant_id')) { ?>
                        <?php if (!empty($allplans)) { ?>

                            <span class="recentorders">Available plans</span>
                            <div class="comm">

                                <div class="commission-1">
                                    <div class="head-1"><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2></div>
                                    <div class="head-1"><h2>Plan Name</h2></div>
                                    <div class="head-1"><h2>Amount</h2></div>
                                    <div class="head-1"><h2>Duration</h2></div>
                                    <div class="head-1"><h2>Product Limit</h2></div>
                                    <!--<div class="head-1"><h2>Quantity</h2></div>-->

                                    <div class="head-1"><h2>Upgrade</h2></div>

                                </div>
                                <?php
                                foreach ($allplans as $allplan) {
                                    ?>
                                    <div class="commission-2">
                                        <div class="head-1"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/plan/<?php echo $allplan->id; ?>/plan.<?php echo $allplan->image; ?>" /></div>
                                        <div class="head-1"><h2><?= $allplan->plan_name; ?></h2></div>
                                        <div class="head-1"><h2><?= Yii::app()->Currency->convert($allplan->amount); ?></h2></div>
                                        <div class="head-1"><h2><?= $allplan->no_of_days; ?></h2></div>
                                        <div class="head-1"><h2><?= $allplan->no_of_products; ?></h2></div>
                                        <div class="head-1"><h2><?php echo CHtml::link('<i class="fa fa-cart-plus"  style="max-width:15%;font-size: 24px;
    color: #000;"></i>', array('Myaccount/PlanDetail', 'plan' => CHtml::encode($allplan->id)), array('data-toggle' => 'tooltip', 'title' => 'Upgrade Plan')); ?></h2></div>

                                    </div>
                                <?php }
                                ?>
                            </div>
                        <?php }
                        ?>


                    <?php } ?>




                    <div class="clearfix"></div>
                </div>

            </div>

            <?php echo $this->renderPartial('_rightMenu'); ?>
        </div>

    </div>
</div>
</section> <!-- end of facial -->




<!-- end of container -->
<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>
