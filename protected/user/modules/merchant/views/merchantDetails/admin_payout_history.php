<?php
/* @var $this MerchantPayoutHistoryController */
/* @var $model MerchantPayoutHistory */
?>

<section class="content-header">
    <h1>
        MerchantPayoutHistory    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">MerchantPayoutHistory</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <a href="<?php echo Yii::app()->request->baseurl . '/admin.php/payouts/merchantPayoutHistory/create'; ?>" class='btn  btn-laksyah'>Add New MerchantPayoutHistory</a>
    <div class="col-xs-12 form-page" style="margin-top: .5em;">
        <div class="box">

            <?php
            $merchant_model = new MerchantDetails('search');
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'merchant-payout-history-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array('name' => 'id',
                        'value' => function($data) {
                            $value = MerchantPayoutHistory::model()->findByAttributes(array('request_id' => $data->request_id), array('order' => 'id desc'))->id;
                            return $value;
                        },
                            ),
                            'request_id',
                            array('name' => 'merchant_id',
                                'value' => function($data) {
                                    $value = MerchantPayoutHistory::model()->findByAttributes(array('request_id' => $data->request_id), array('order' => 'id desc'))->merchant_id;
                                    $name = MerchantDetails::getMerchantname($value);
                                    return $name;
                                },
                                    ),
                                    array(
                                        'header' => '<font color="#61625D">Shop Name</font>',
                                        'value' => function($data) {
                                            $value = MerchantPayoutHistory::model()->findByAttributes(array('request_id' => $data->request_id), array('order' => 'id desc'))->merchant_id;
                                            $name = MerchantDetails::getShopname($value);
                                            return $name;
                                        },
                                                'filter' => $merchant_model->shop_name,
                                            ),
                                            array('name' => 'available_balance',
                                                'value' => function($data) {
                                                    $value = MerchantPayoutHistory::model()->findByAttributes(array('request_id' => $data->request_id), array('order' => 'id desc'));
                                                    $accmaster = MerchantAccountMaster::model()->findByAttributes(array('merchant_id' => $value->merchant_id))->available_balance;
                                                    return $accmaster;
                                                },
                                                    ),
                                                    array('name' => 'requested_amount',
                                                        'value' => function($data) {
                                                            $value = MerchantPayoutHistory::model()->findByAttributes(array('request_id' => $data->request_id), array('order' => 'id desc'))->requested_amount;
                                                            return $value;
                                                        },
                                                            ),
                                                            array('name' => 'payment_account',
                                                                'value' => function($data) {
                                                                    $value = MerchantPayoutHistory::model()->findByAttributes(array('request_id' => $data->request_id), array('order' => 'id desc'))->payment_account;
                                                                    $acc_details = BankingDetails::model()->findByPk($value);
                                                                    if (!empty($acc_details)) {

                                                                        if ($acc_details->account_type == 1) {
                                                                            $acc = "Paypal : " . $acc_details->paypal_id . ', ' . $acc_details->email;
                                                                        } else {
                                                                            $acc = "Bank Acc : " . $acc_details->account_number . ', ' . $acc_details->bank_name;
                                                                        }
                                                                    }
                                                                    return $acc;
                                                                },
                                                                    ),
                                                                    array('name' => 'status',
                                                                        'value' => function($data) {
                                                                            $value = MerchantPayoutHistory::model()->findByAttributes(array('request_id' => $data->request_id), array('order' => 'id desc'));
                                                                            return MerchantPayoutHistory::getStatus($value->status);
                                                                        },
                                                                            ),
                                                                            array(
                                                                                'header' => '<font color="#61625D">Edit</font>',
                                                                                'value' => function($data) {
                                                                                    $value = MerchantPayoutHistory::model()->findByAttributes(array('request_id' => $data->request_id), array('order' => 'id desc'))->id;
                                                                                    $url = Yii::app()->baseUrl . '/admin.php/payouts/merchantPayoutHistory/update/id/' . $value;

                                                                                    return '<a href="' . $url . '" target="_blank"><i class="glyphicon glyphicon-pencil"></i></a>';
                                                                                },
                                                                                        'type' => 'html',
                                                                                    ),
                                                                                    array(
                                                                                        'header' => '<font color="#61625D">View</font>',
                                                                                        'value' => function($data) {
                                                                                            $value = MerchantPayoutHistory::model()->findByAttributes(array('request_id' => $data->request_id), array('order' => 'id desc'))->id;
                                                                                            $url = Yii::app()->baseUrl . '/admin.php/payouts/merchantPayoutHistory/view/id/' . $value;

                                                                                            return '<a href="' . $url . '" target="_blank"><i class="glyphicon glyphicon-eye-open"></i></a>';
                                                                                        },
                                                                                                'type' => 'html',
                                                                                            ),
                                                                                        ),
                                                                                    ));
                                                                                    ?>
        </div>

    </div>


</div>
</section>

