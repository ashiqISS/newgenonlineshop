<style>
        .table > thead > tr > th {
                text-align: left;
        }
</style>
<?php date_default_timezone_set('Asia/Kolkata'); ?>
<section class="banner">
        <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">
                <div class="banner_txt">
                        <h1 class="animated fadeInLeft m2">Request <span class="redish">Payment </span></h1>
                </div>
        </div>
</section>
<div class="clearfix"></div>
<section class="facial services">
        <div class="container">
                <div class="heading">
                        request payment
                </div>
                <div class="row">
                        <div class="col-md-9">
                                <div class="left-content">

                                        <!--flash message-->
                                        <?php if (Yii::app()->user->hasFlash('RequestPayment')): ?>
                                                <div class="alert alert-info fade in">
                                                        <?php echo Yii::app()->user->getFlash('RequestPayment'); ?>
                                                </div>
                                        <?php endif; ?>

                                        <?php
                                        if (empty($account_data)) {
                                                ?>
                                                <h4 class="fournotfour" style="padding: 2em;">No account details available right now!</h4>
                                                <?php
                                        } else {
                                                ?>
                                                <div class="form-group required mrg">
                                                        <div class="col-sm-12">
                                                                <h4 class="fournotfour" style="padding: 0 0 1em 1em;"> NEWGEN MERCHANT ACCOUNT</h4>
                                                        </div>
                                                        <div class="col-sm-12">

                                                                <div class="col-sm-3 col-xs-2 zeros">
                                                                        <label for="textinput" class="control-label" style="font-size: 16px;">Merchant Id</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label" style="font-size: 16px;">:</label>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                        <label for="textinput" class="control-label pay" style="font-size: 16px;"><?= $account_data->merchant_id; ?></label>
                                                                </div>
                                                        </div>
                                                        <div class="col-sm-12">

                                                                <div class="col-sm-3 col-xs-2 zeros">
                                                                        <label for="textinput" class="control-label" style="font-size: 16px;">Account Balance</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label" style="font-size: 16px;">:</label>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                        <label for="textinput" class="control-label pay" style="font-size: 16px;"><?= Yii::app()->Currency->convert($account_data->available_balance); ?></label>
                                                                </div>
                                                        </div>
                                                        <?php
                                                        if (empty($banking_data)) {
                                                                ?>
                                                                <div class="col-sm-12">
                                                                        <h4 class="fournotfour" style="padding: 2em;">You haven't added any payment accounts yet.<a href='<?php echo Yii::app()->request->baseUrl . '/user.php/add-account'; ?>' style="color:#337ab7"> Click here to add account.</a></h4>
                                                                </div>
                                                                <?php
                                                        } else {
                                                                ?>
                                                                <?php
                                                                $form = $this->beginWidget('CActiveForm', array(
                                                                    'id' => 'buyer-details-form',
                                                                    'htmlOptions' => array('class' => 'form-horizontal'),
                                                                    'action' => Yii::app()->request->baseUrl . '/user.php/request-pay',
                                                                    // Please note: When you enable ajax validation, make sure the corresponding
                                                                    // controller action is handling ajax validation correctly.
                                                                    // There is a call to performAjaxValidation() commented in generated controller code.
                                                                    // See class documentation of CActiveForm for details on this.
                                                                    'enableAjaxValidation' => false,
                                                                ));
                                                                ?>
                                                                <div class="col-sm-12">

                                                                        <div class="col-sm-3 col-xs-2 zeros">
                                                                                <label for="textinput" class="control-label" style="font-size: 16px;">WIthdraw Amount</label>
                                                                        </div>
                                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                                <label for="textinput" class="control-label" style="font-size: 16px;">:</label>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                                <?php echo $form->textField($model, 'withdraw_amount', array('class' => 'form-control', 'onpaste' => 'return false;')); ?>
                                                                                <?php echo $form->error($model, 'withdraw_amount'); ?>
                                                                        </div>
                                                                </div>

                                                                <div class="col-sm-12" style="padding-top: 1em;">

                                                                        <div class="col-sm-3 col-xs-2 zeros">
                                                                                <label for="textinput" class="control-label" style="font-size: 16px;">WIthdraw Account</label>
                                                                        </div>
                                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                                <label for="textinput" class="control-label" style="font-size: 16px;">:</label>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                                <select name="account" class="form-control">
                                                                                        <?php
                                                                                        foreach ($banking_data as $acc) {
                                                                                                if ($acc->account_type == 1) {
                                                                                                        ?>
                                                                                                        <!--paypal-->
                                                                                                        <option value="<?= $acc->id ?>"><?php echo $acc->paypal_id . ', ' . $acc->email; ?></option>
                                                                                                        <?php
                                                                                                } else {
                                                                                                        ?>
                                                                                                        <!--bank account-->
                                                                                                        <option value="<?= $acc->id ?>"><?php echo $acc->account_number . ', ' . $acc->bank_name; ?></option>
                                                                                                        <?php
                                                                                                }
                                                                                        }
                                                                                        ?>
                                                                                </select>
                                                                        </div>
                                                                </div>

                                                                <!--</div>-->

                                                                <div class="col-sm-12">
                                                                        <br><br>
                                                                        <button type="submit" class="btn btn-default btn-sm bt_up2 ">Request to Admin</button>
                                                                </div>
                                                                <?php $this->endWidget(); ?>
                                                        <?php } ?>
                                                </div>
                                                <?php
                                        }
                                        ?>
                                        <div class="clearfix"></div>
                                        <?php if (!empty($payoutHistory)) {
                                                ?>
                                                <br>
                                                <span style="font-size: 17px;">Transaction history : </span>
                                                <br> <br>

                                                <div class="table-responsive ac_up" style="max-height: 50em;overflow: auto">
                                                        <table class="table ac">
                                                                <thead class="thead-inverse ac_bg">
                                                                        <tr>
                                                                                <th>PayOutId</th>
                                                                                <th>Request Date </th>
                                                                                <th>Account Balance </th>
                                                                                <th>Requested Amount</th>
                                                                                <th>Balance Left </th>
                                                                                <th>Status </th>
                                                                                <th>Approval Date </th>
                                                                        </tr>
                                                                </thead>
                                                                <tbody>
                                                                        <?php foreach ($payoutHistory as $payOut) {
                                                                                ?>
                                                                                <tr>
                                                                                        <td><?= $payOut->id; ?></td>
                                                                                        <td>
                                                                                                <?php
                                                                                                $doc = strtotime($payOut->DOC);
                                                                                                echo date('d/m/Y', $doc);
                                                                                                ?>
                                                                                        </td>
                                                                                        <td><?= Yii::app()->Currency->convert($payOut->available_balance); ?></td>
                                                                                        <td><?= Yii::app()->Currency->convert($payOut->requested_amount); ?></td>
                                                                                        <td><?= Yii::app()->Currency->convert($payOut->available_balance - $payOut->requested_amount); ?></td>
                                                                                        <td style="color: black"><?= Utilities::getStatusMerchantPayout($payOut->status); ?></td>
                                                                                        <td>
                                                                                                <?php
                                                                                                if ($payOut->status == 5) {

                                                                                                        $dou = strtotime($payOut->DOU);
                                                                                                        echo date('d/m/Y', $dou);
                                                                                                } else {
                                                                                                        echo 'Nil';
                                                                                                }
                                                                                                ?>
                                                                                        </td>
                                                                                </tr>
                                                                        <?php } ?>

                                                                </tbody>
                                                        </table>

                                                </div>

                                        <?php } ?>


                                </div>

                        </div>

                        <div class="col-md-3 sidebar ">

                                <ul>
                                        <li ><a href="<?php echo CommonUrls::merchant_profile(); ?>"> <i class="fa fa-user fa-2x" aria-hidden="true"></i> <span>Profile</span></a></li>
                                        <li><a href="<?php echo CommonUrls::banking(); ?>"> <i class="fa fa-unlock-alt fa-2x" aria-hidden="true"></i></i> <span>Banking Accounts</span></a></li>
                                        <li><a href="<?php echo CommonUrls::add_product(); ?>" > <i class="fa fa-cart-arrow-down  fa-2x" aria-hidden="true"></i> <span>Add product</span></a></li>
                                        <li><a href="<?php echo CommonUrls::change_password(); ?>"> <i class="fa fa-unlock-alt fa-2x" aria-hidden="true"></i></i> <span>Change Password</span></a></li>
                                        <li><a href="<?php echo CommonUrls::my_products(); ?>"> <i class="fa fa-cube fa-2x" aria-hidden="true"></i> <span>My products</span></a></li>
                                        <li><a href="<?php echo CommonUrls::featured(); ?>"> <i class="fa fa-picture-o fa-2x" aria-hidden="true"></i> <span>Featured ads </span></a></li>
                                        <li><a href="<?php echo CommonUrls::my_sales(); ?>"> <i class="fa fa-line-chart fa-2x" aria-hidden="true"></i> <span>My Sales</span></a></li>
                                        <li><a href="<?php echo CommonUrls::request_pay(); ?>"  class="act "> <i class="fa fa-cc-mastercard fa-2x" aria-hidden="true"></i><span>Payment / Payout</span></a></li>
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
        document.getElementById('RequestPayment_withdraw_amount').addEventListener('keyup', function () {
                if (this.value.charAt(0) === '0')
                        this.value = this.value.slice(1);
        });
</script>
