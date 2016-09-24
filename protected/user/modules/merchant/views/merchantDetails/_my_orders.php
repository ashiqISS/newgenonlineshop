<div class="row">           
                <?php if (!empty($sale)) { ?>
                    <div class="table-responsive ord_a">
                        <table class="table ac">
                            <thead class="thead-inverse ">
                                <tr>
                                    <th>Order id</th>
                                    <th>Product Name </th>
                                    <th> Ordered date	</th>
                                    <th>Total price</th>
                                    <th> Status</th>
                                    <th>View details</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($sale as $sales) {
                                    $order_id = Order::model()->findByPk($sales->order_id);
                                    $products_name = Products::model()->findByAttributes(array('id' => $sales->product_id));
                                    $order_history_status = OrderHistory::model()->findByAttributes(array('order_products_id' => $sales->id), array('order' => 'id desc', 'limit' => '1'));
                                    if (!empty($order_history_status)) {
                                        $status = OrderStatus::model()->findByPk($order_history_status->order_status)->title;
                                    } else {
                                        $status = '<b>New Order</b>';
                                    }
                                    ?>
                                    <tr>
                                        <td>#<?= $sales->order_id; ?></td>
                                        <td><?= $products_name->product_name; ?></td>
                                        <td><?= date('d - m - Y', strtotime($order_id->order_date)); ?></td>
                                        <td><?= $products_name->price; ?></td>                                           
                                        <td>
        <?php
        echo $status;
        ?>
                                        </td>
                                        <td>
                                            <?php echo CHtml::link('<i class="fa fa-eye"  style="max-width:15%;font-size: 19px;color: #000;"></i>', array('MerchantDetails/ViewHistory', 'id' => CHtml::encode($sales->id))); ?>
                                        </td>

                                    </tr>

    <?php } ?>

                            </tbody>
                        </table>
                    </div>
<?php } ?>

            </div>