<style>
    .left-content h2
    {
        background-color: #f5f4f2;
    }    
    .services h3 {
        color: #333;
        background-color: #f5f4f2;
    }
    .table-responsive  h4
    {
        font-size: 15px;
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


            Plans

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

                            <span class="recentorders"><h4>Your Plans</h4></span>

                            <div class="table-responsive ac_up">
                                <table class="table ac">
                                    <thead class="thead-inverse ac_bg">
                                        <tr>
                                            <th><h4 style="text-align: left;">Plan Name</th>
                                            <th><h4 style="text-align: left;">Amount</h4></th>
                                            <th><h4 style="text-align: left;">Plan Start Date</h4> </th>
                                            <th><h4 style="text-align: left;">Plan Expiry Date</h4> </th>
                                            <th><h4 style="text-align: left;">Products Left</h4></th>
                                            <th><h4 style="text-align: left;">Ads Left</h4> </th>
                                            <th><h4 style="text-align: left;">View</h4> </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        foreach ($yourplans as $yourplan) {
                                            ?>

                                            <tr>
                                                <td><?= PlanDetails::model()->findByPk($yourplan->plan_id)->plan_name; ?></td>
                                                <td>
                                                    <?= Yii::app()->Currency->convert($yourplan->amount); ?>
                                                </td>
                                                <td><?= date('d-M-Y', strtotime($yourplan->doc)); ?> </td>
                                                <td><?php
                                                    $date = date('Y-m-d', strtotime($yourplan->doc));
                                                    echo date("d-M-Y", strtotime($date . " +  $yourplan->no_of_days days"));
                                                    ?> </td>
                                                <td>
                                                    <?= $yourplan->no_of_product_left; ?>
                                                </td>
                                                <td>
                                                    <?= $yourplan->no_of_ads_left; ?>
                                                </td>
                                                <td>
                                                    <?php echo CHtml::link('<i class="fa fa-eye"  style="max-width:15%;font-size: 24px;
    color: #000;"></i>', array('MerchantPlanDetail', 'plan' => CHtml::encode($yourplan->id)), array('data-toggle' => 'tooltip', 'title' => 'View Plans Details')); ?>
                                                </td>


                                            </tr>
                                            <?php
                                        }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                            <br><br>
                        <?php }
                        ?>


                    <?php } ?>
                    <?php if (Yii::app()->user->getState('merchant_id')) { ?>
                        <?php if (!empty($allplans)) { ?>

                            <span class="recentorders"><h4>Available plans</h4></span>

                            <div class="table-responsive ac_up">
                                <table class="table ac">
                                    <thead class="thead-inverse ac_bg">
                                        <tr>
                                            <th></th>
                                            <th style="background-color: #f5f4f2;"><h4>Plan Name</h4></th>
                                            <th><h4>Amount</h4> </th>
                                            <th><h4>Duration</h4> </th>
                                            <th><h4>Product Limit</h4></th>
                                            <th><h4>Upgrade</h4> </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        foreach ($allplans as $allplan) {
                                            ?>

                                            <tr>
                                                <td style="vertical-align: middle;text-align: center">
                                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/plan/<?php echo $allplan->id; ?>/plan.<?php echo $allplan->image; ?>" />
                                                </td>
                                                <td style="vertical-align: middle;text-align: center">
                                                    <?= $allplan->plan_name; ?>
                                                </td>
                                                <td style="vertical-align: middle;text-align: center"> 
                                                    <?= Yii::app()->Currency->convert($allplan->amount); ?>
                                                </td>
                                                <td style="vertical-align: middle;text-align: center"> 
                                                    <?= $allplan->no_of_days; ?>
                                                </td>
                                                <td style="vertical-align: middle;text-align: center">
                                                    <?= $allplan->no_of_products; ?>
                                                </td>
                                                <td style="vertical-align: middle;text-align: center">
                                                    <?php echo CHtml::link('<i class="fa fa-cart-plus"  style="max-width:15%;font-size: 24px;
    color: #000;"></i>', array('PlanDetail', 'plan' => CHtml::encode($allplan->id)), array('data-toggle' => 'tooltip', 'title' => 'Upgrade Plan')); ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>


                                    </tbody>
                                </table>
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

<script src="<?= Yii::app()->baseUrl ?>/js/bootstrap.min.js"></script>
<script src="<?= Yii::app()->baseUrl ?>/js/bootstrap.min.css"></script>
<!--        <script src="<?= Yii::app()->baseUrl ?>/js/owl.carousel.min.js"></script>
<script src="<?= Yii::app()->baseUrl ?>/js/jquery.appear.js"></script>-->


<script src="<?= Yii::app()->baseUrl ?>/js/slick.min.js"></script>