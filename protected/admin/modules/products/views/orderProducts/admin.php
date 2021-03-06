<section class="content-header" style="margin-bottom: .5em;">
    <h1>
        Product Orders              <small>Manage</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/orderProducts/admin'; ?>"><i class="fa fa-dashboard"></i>  Product Orders</a></li>
        <li class="active">Manage</li>
    </ol>
</section>
&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/orderProducts/create'; ?>" class='btn  btn-laksyah'>Add New Product order</a>
<div class="col-xs-12 form-page"  style="margin-top: 1em;">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'order-products-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    'order_id',
                    array('name' => 'merchant_id',
                        'filter' => CHtml::listData(MerchantDetails::model()->findAll(), 'id', 'fullname'),
                        'value' => function($data) {
                            $name = MerchantDetails::getMerchantname($data->merchant_id);
                            return $name;
                        },
                    ),
                    array('name' => 'product_id',
                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_code'),
                        'value' => function($data) {
                            return '<a href="' . Yii::app()->baseUrl . '/admin.php/products/products/view/id/' . $data->product_id . '" target="_blank">' . $data->product->product_code . '</a>';
                        },
                        'type' => 'raw',
                    ),
                    'quantity',
                    array('name' => 'amount',
                        'value' => function($data) {
                            return 'INR ' . $data->amount . '/-';
                        }
                    ),
                    'DOC',
                    array('name' => 'status',
                        'filter' => array("1" => "Not Placed", "2" => "Payment Pending", "3" => "Payment Done", "4" => "Delivered to Customer", "5" => "Order Completed"),
                        'value' => function($data) {
                    $name = OrderProducts::getStatus($data->status);
                    return $name;
                },
                    ),
                    array(
                        'header' => '<font color="#61625D">Transfer Money</font>',
                        'htmlOptions' => array('nowrap' => 'nowrap'),
                        'class' => 'booster.widgets.TbButtonColumn',
                        'template' => '{transfer}',
                        'buttons' => array
                            (
                            'transfer' => array
                                (
                                'url' => 'Yii::app()->createUrl("/products/OrderProducts/TransferMoney", array("id"=>$data->id))',
                                'label' => '<center><i class="fa fa-hand-o-right"></i></center>',
                                'visible' => '$data->status == 4',
                                'class' => 'btn',
                                'options' => array(
                                    'data-toggle' => 'tooltip',
                                    'title' => 'Transfer Money',
                                ),
                            ),
                        ),
                    ),
//		'status',
                    array(
                        'htmlOptions' => array('nowrap' => 'nowrap'),
                        'class' => 'booster.widgets.TbButtonColumn',
                        'template' => '{view}',
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</div>
