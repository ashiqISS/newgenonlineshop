

<h1>View BuyerDetails #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'user_id',
        'first_name',
        'last_name',
        'dob',
        'gender',
        'users.email',
        'users.password',
        'users.phone_number',
        'phone_no_2',
        'newsletter',
        'wallet_amt',
//        'users.user_status',
        array(
            'name' => 'users.user_status',
            'value' => function($data) {
                if ($data->users->user_status == 1) {
                    return "Activation pending";
                } elseif ($data->users->user_status == 2) {
                    return "Payment pending";
                } elseif ($data->users->user_status == 3) {
                    return "Enabled";
                } elseif ($data->users->user_status == 4) {
                    return "Disabled";
                } else {
                    return "Invalid";
                }
            },
            'filter' => array('1' => "Activation pending", '2' => "Payment pending", '3' => "Enabled", '4' => "Disabled")
        ),
        'users.last_login',
        'CB',
        'UB',
        'DOC',
        'DOU',
    ),
));
?>
