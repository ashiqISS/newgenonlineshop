<section class="content-header">
    <h1 style="padding: 1em;">Merchant Payout History #<?php echo $model->id; ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/payouts/merchantPayoutHistory/admin'; ?>"><i class="fa fa-dashboard"></i>  PayOut Requests</a></li>
        <li class="active">Manage</li>
    </ol>
</section>
<div class="col-xs-12 form-page">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <?php
            $this->widget('booster.widgets.TbDetailView', array(
                'data' => $model,
                'attributes' => array(
                    'id',
                    'request_id',
                    'merchant_id',
                    array('name' => 'merchant_id',
                        'value' => function($data) {
                            return $data->merchant->fullname;
                        },
                    ),
                    'available_balance',
                    'requested_amount',
//                    'payment_account',
                    array('name' => 'payment_account',
                        'value' => function($data) {
                            $acc_data = BankingDetails::model()->findByPk($data->payment_account);
                            if ($acc_data->account_type == 1) {
                                //paypal
                                $detail = "Paypal : $acc_data->paypal_id";
                            } else if ($acc_data->account_type == 2) {
                                // 2 bank
                                $detail = "Bank ACc : $acc_data->account_number, Acc Holder name : $acc_data->account_holder_name, IFSC : $acc_data->ifsc";
                            } else {
                                // invalid
                                $detail = "Invalid details";
                            }
                            return $detail;
                        },
                    ),
//                    'status',
                    array('name' => 'status',
                        'value' => function($data) {
                            return MerchantPayoutHistory::getStatus($data->status);
                        },
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</div>
<section class="content-header">
<h1>
    PayOut History (Request Id : <?= $model->request_id ?> )
</h1>
</section>
<?php

$model1 = new MerchantPayoutHistory('search');
$model1->request_id = $model->request_id;
$this->widget('booster.widgets.TbGridView', array(
    'type' => ' bordered condensed hover',
    'id' => 'merchant-payout-history-grid',
    'dataProvider' => $model1->searchAdmin(),
    'columns' => array(
        'id',
        'request_id',
        array('name' => 'merchant_id',
            'value' => function($data) {
                return $data->merchant->fullname . ' - ' . $data->merchant->shop_name;
            },
        ),
        array('name' => 'status',
            'value' => function($data) {
                return MerchantPayoutHistory::getStatus($data->status);
            },
        ),
        'DOC',
        /*
          'DOC',
          'DOU',
         */
        array(
            'header' => '<font color="#61625D">Edit</font>',
            'htmlOptions' => array('nowrap' => 'nowrap'),
            'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{update}',
        ),
        array(
            'header' => '<font color="#61625D">View</font>',
            'htmlOptions' => array('nowrap' => 'nowrap'),
            'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{view}',
        ),
    ),
));
?>
