<section class="content-header">
    <h1>View Order #<?php echo $model->id; ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/order/admin'; ?>"><i class="fa fa-dashboard"></i>  Order</a></li>
        <li class="active">Manage</li>
    </ol>
</section>
<!--<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/order/create'; ?>" class='btn  btn-success manage'>Add Order</a>-->
<div class="col-xs-12 form-page">
    <div class="box">
        <div class="box-body table-responsive no-padding">

            <?php
            $this->widget('booster.widgets.TbDetailView', array(
                'data' => $model,
                'attributes' => array(
//                    'id',
                    array('name' => 'user_id',
                        'value' => function($data) {
                            $buyer = BuyerDetails::model()->findByAttributes(array('user_id' => $data->user_id));
                            $name = $buyer->first_name.' '.$buyer->last_name;
                            return $name;
                        },
                            ),
                            array('name' => 'total_amount',
                                'value' => function($data) {
                                    return 'INR ' . $data->total_amount . '/-';
                                },
                            ),
                            'order_date',
                            array('name' => 'ship_address_id',
                                'type' => 'raw',
                                'value' => function($data) {
                                    $shipp_add = UserAddress::model()->findByPk($data->ship_address_id);
                                    $result .= $shipp_add->first_name . ' ' . $shipp_add->last_name . '<br />';
                                    $result .= $shipp_add->address_1 . ' ' . $shipp_add->address_2 . '<br />';
                                    $result .= $shipp_add->city . ' ' . $shipp_add->postcode . '<br />';
                                    $result .= Countries::model()->findByPk($shipp_add->country)->country_name . ' ' . States::model()->findByPk($shipp_add->state)->state_name . '<br />';
                                    return $result;
                                },
                            ),
                            array('name' => 'bill_address_id',
                                'type' => 'raw',
                                'value' => function($data) {

                                    $bill_add = UserAddress::model()->findByPk($data->bill_address_id);
                                    $result1 .= $bill_add->first_name . ' ' . $bill_add->last_name . '<br />';
                                    $result1 .= $bill_add->address_1 . ' ' . $bill_add->address_2 . '<br />';
                                    $result1 .= $bill_add->city . ' ' . $bill_add->postcode . '<br />';
                                    $result1 .= Countries::model()->findByPk($bill_add->country)->country_name . ' ' . States::model()->findByPk($bill_add->state)->state_name . '<br />';
                                    return $result1;
                                },
                            ),
                            'comment',
                            array('name' => 'payment_mode',
                                'value' => function($data) {
                                    if ($data->payment_mode == 1) {
                                        return 'Wallet';
                                    } else if ($data->payment_mode == 2) {
                                        return 'Netbanking';
                                    } else if ($data->payment_mode == 3) {
                                        return 'Paypal';
                                    } else if ($data->payment_mode == 4) {
                                        return 'Wallet, Netbanking';
                                    } else {
                                        return 'Cash On delivery';
                                    }
//                                            return 'INR ' . $data->payment_status . '/-';
                                },
                            ),
                            'admin_comment',
                            'transaction_id',
                            array('name' => 'payment_status',
                                'value' => function($data) {
                                    if ($data->payment_status == 1) {
                                        return 'Success';
                                    } else if ($data->payment_status == 2) {
                                        return 'Failed Transaction';
                                    } else {
                                        return 'Not Paid';
                                    }
//                                            return 'INR ' . $data->payment_status . '/-';
                                },
                            ),
//                            array('name' => 'status',
//                                'value' => function($data) {
//                                    if ($data->status == 1) {
//                                        return 'Order Placed , Not Delivered to customer';
//                                    } else if ($data->status == 2) {
//                                        return 'Order Success';
//                                    } else if ($data->payment_status == 3) {
//                                        return 'Order Failed';
//                                    } else {
//                                        return 'Order Not Placed';
//                                    }
////                                            return 'INR ' . $data->payment_status . '/-';
//                                },
//                            ),
//                    'DOC',
                        ),
                    ));
                    ?>

            
            
                        <section class="content-header">
                                <h1>Products With These Orders</h1>
                        </section>
                        <?php $model1 = new OrderProducts('search'); ?>
                        <?php
                        $model1->order_id = $model->id;
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'order-products-grid',
                            'dataProvider' => $model1->search(),
                            //'filter' => $model1,
                            'columns' => array(
                                'order_id',
                                array('name' => 'product_id',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                                    'value' => function($model1) {
                                            $product_details = Products::model()->findByPk($model1->product_id);
                                            return '<a href="' . Yii::app()->baseUrl . '/admin.php/products/products/view/id/' . $product_details->id . '" target="_blank">' . $product_details->product_name . '-' . $product_details->product_code . '</a>';
                                    },
                                    'type' => 'raw',
                                ),
                                'quantity',
                                array('name' => 'amount',
                                    'value' => function($model1) {
                                            return 'INR ' . $model1->amount . '/-';
                                    }
                                ),
                                array('name' => 'status',
                                    'value' => function($model1) {
                                            $status = OrderStatus::model()->findByAttributes(array('id' => $model1->status));
                                            return $status->title;
                                    }
                                        ),
//                        'status',
                                        'order_comments',
                                        'DOC',
//		'status',
                                        array(
                                            'header' => '<font color="#61625D">View </font>',
                                            'htmlOptions' => array('nowrap' => 'nowrap', 'style' => 'text-align:center'),
                                            'class' => 'booster.widgets.TbButtonColumn',
                                            'template' => '{status}',
                                            'buttons' => array(
                                                'status' => array(
                                                    'url' => 'Yii::app()->request->baseUrl."/admin.php/products/orderProducts/view/id/$data->id"',
                                                    'label' => '<i class="fa fa-eye" style="font-size:20px;padding:2px;"></i>',
                                                    'options' => array(
                                                        'data-toggle' => 'tooltip',
                                                        'title' => 'View In Detail',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        array(
                                            'header' => '<font color="#61625D">Edit</font>',
                                            'htmlOptions' => array('nowrap' => 'nowrap', 'style' => 'text-align:center'),
                                            'class' => 'booster.widgets.TbButtonColumn',
                                            'template' => '{status}',
                                            'buttons' => array(
                                                'status' => array(
                                                    'url' => 'Yii::app()->request->baseUrl."/admin.php/products/orderProducts/update/id/$data->id"',
                                                    'label' => '<i class="fa fa-pencil" style="font-size:20px;padding:2px;"></i>',
                                                    'options' => array(
                                                        'data-toggle' => 'tooltip',
                                                        'title' => 'update',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        array(
                                            'header' => '<font color="#61625D">Delete</font>',
                                            'htmlOptions' => array('nowrap' => 'nowrap', 'style' => 'text-align:center'),
                                            'class' => 'booster.widgets.TbButtonColumn',
                                            'template' => '{status}',
                                            'buttons' => array(
                                                'status' => array(
                                                    'url' => 'Yii::app()->request->baseUrl."/admin.php/products/orderProducts/delete/id/$data->id"',
                                                    'label' => '<i class="fa fa-trash" style="font-size:20px;padding:2px;"></i>',
                                                    'options' => array(
                                                        'data-toggle' => 'tooltip',
                                                        'title' => 'delete',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        array(
                                            'header' => '<font color="#61625D">Add New History</font>',
                                            'htmlOptions' => array('nowrap' => 'nowrap', 'style' => 'text-align:center'),
                                            'class' => 'booster.widgets.TbButtonColumn',
                                            'template' => '{status}',
                                            'buttons' => array(
                                                'status' => array(
                                                    'url' => 'Yii::app()->request->baseUrl."/admin.php/products/orderHistory/create/id/$data->id"',
                                                    'label' => '<i class="fa fa-truck" style="font-size:20px;padding:2px;"></i>',
                                                    'options' => array(
                                                        'data-toggle' => 'tooltip',
                                                        'title' => 'History',
                                                        'target' => '_blank',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        array(
                                            'header' => '<font color="#61625D">Print</font>',
                                            'htmlOptions' => array('nowrap' => 'nowrap'),
                                            'class' => 'booster.widgets.TbButtonColumn',
                                            'template' => '{print}',
                                            'buttons' => array(
                                                'print' => array(
                                                    'url' => 'Yii::app()->request->baseUrl."/admin.php/products/orderProducts/print/id/$data->id"',
                                                    'label' => '<i class="fa fa-print" style="font-size:20px;padding:2px;"></i>',
                                                    'options' => array(
                                                        'data-toggle' => 'tooltip',
                                                        'title' => 'Print',
                                                        'target' => '_blank',
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ));
                                ?>
        </div>
    </div>
</div>