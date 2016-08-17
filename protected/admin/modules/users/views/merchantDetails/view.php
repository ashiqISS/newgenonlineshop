

<h1>View MerchantDetails #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'user_id',
        'fullname',
        'users.email',
        'users.phone_number',
        'users.password',
        array(
            'name' => 'product_categories',
            'value' => function($data) {
                $cats = explode(',', $data->product_categories);
                $catt = '';
                foreach ($cats as $cat) {
                    unset($_SESSION['category']);
                    $category = ProductCategory::model()->findByPk($cat);
                    $catt .= Yii::app()->category->selectCategories($category) . ', ';
                }
                return $catt;
            },
        ),
        array(
            'name' => 'merchant_type',
            'value' => function($data) {
                if ($data->merchant_type == 2) {
                    return "Wholesale";
                } elseif ($data->merchant_type == 1) {
                    return "Retail";
                } elseif ($data->merchant_type == 0) {
                    return "Default";
                } else {
                    return "Invalid";
                }
            },
        ),
        'shop_name',
        array(
            'name' => 'shop_logo',
            'value' => function($data) {
                if ($data->shop_logo == "") {
                    return;
                } else {
                    return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . "/uploads/users/merchants/shop_logo/" . $data->id . "." . $data->shop_logo . '" />';
                }
            },
            'type' => 'raw'
        ),
        array(
            'name' => 'shop_banner',
            'value' => function($data) {
                if ($data->shop_banner == "") {
                    return;
                } else {
                    return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . "/uploads/users/merchants/shop_banner/" . $data->id . "." . $data->shop_banner . '" />';
                }
            },
            'type' => 'raw'
        ),
        'address',
        'pincode',
        'city',
        'locality',
        'district',
        'state',
        'country',
        array(
            'name' => 'is_payment_done',
            'value' => function($data) {
                if ($data->is_payment_done == 1) {
                    return "Yes";
                } elseif ($data->is_payment_done == 0) {
                    return "No";
                } else {
                    return "Invalid";
                }
            },
        ),
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
