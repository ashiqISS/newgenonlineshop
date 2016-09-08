<style>
    .services {
        background-color: #fff;
        overflow: hidden;
        padding-bottom: 40px;
        padding-top: 20px;
    }
    .table > thead > tr > th {
        text-align: left;
    }
</style>
<section class="banner">
    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">
        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">Merchant <span class="redish">Dashboard </span></h1>
        </div>
    </div>
</section>

<div class="clearfix"></div>

<section class="facial services">
    <div class="container">
        <div class="heading">
            My Orders

        </div>

    </div>
</div>
</section> <!-- end of facial -->

<section class="facial services">
    <div class="container">
        <div class="row">
            <!--flash message-->
            <?php if (Yii::app()->user->hasFlash('history_update')): ?>
                <div class="alert alert-info fade in">
                    <?php echo Yii::app()->user->getFlash('history_update'); ?>
                </div>
            <?php endif; ?>
            <?php
            if (empty($productOrders)) {
                ?>
                <h4 class="fournotfour">You have no orders now!</h4>
                <?php
            } else {
                ?>
                <div class="merchant_filter">

                    <div class="col-md-9 col-sm-9 col-xs-12"> 


                        <div class="m_filter_left">
                            <form id="filters" method="POST" action="<?php echo Yii::app()->request->baseUrl . '/user.php/merchant/merchantDetails/home' ?>">
                                <input type="hidden" name="filter_status_drpdwn" id="filter_status_drpdwn" value="">
                                <?php
                                $filterSelected = 1;
                                echo CHtml::dropDownList('filter_status', '', CHtml::listData(OrderStatus::model()->findAll(), 'id', 'title'), array('empty' => '--Order Status--',
                                    'class' => 'dt',
                                    'options' => array($filterSelected => array('selected' => true)),
                                    'style' => 'width:150px;',
                                    'onchange' => 'filterlist(this.value)'
                                ));
                                ?>
                                <!--
                                
                                                            <select name="item_status" style="width:150px;" onchange="location = this.options[this.selectedIndex].value;" class="dt">
                                                                <option value="orders" selected="selected">Show all Pending</option>
                                                                <option value="order_cancel">Show all Cancelled</option>
                                                                <option value="order_shipped">Show all Shipped</option>
                                                                <option value="order_hold">Show all On Hold</option>
                                                            </select>-->
                                <!--
                                                            &nbsp;&nbsp;&nbsp;&nbsp; Narrow Results by Date &nbsp;
                                                            
                                                            <input class="date_pick date_input_first hasDatepicker dt" placeholder="From" type="text" id="custom_design_from" style="width:95px; float:none; background-position:70px 3px!important;" value="" name="order_from">
                                                            &nbsp;&nbsp;
                                                            <input class="date_pick date_input_first hasDatepicker dt" placeholder="To" type="text" id="custom_design_to" name="order_to" style="width:95px; float:none; background-position:70px 3px!important;" value="">
                                
                                                            <input type="submit" value="Submit" style="width:100px; margin:0px; text-transform:uppercase; margin-left: 5px;" class="submit_btn sbbt" name="order_submit">
                                                            <a href="#"><span class="prnt2"> <img class="fives" src="<?php echo Yii::app()->request->baseUrl; ?>/images/print.png">print</span></a>-->
                            </form>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="m_filter_right">                            
                            <a href="<?php echo Yii::app()->request->baseUrl . '/user.php/merchant/order/printBulkInvoice' ?>" target="_blank" style=" width:auto; float:right; margin:0px; text-transform:uppercase;" class="submit_btn bl">Bulk Invoice</a>
                        </div></div>

                    <div class="col-md-12 col-sm-12 col-xs-12"> 

                        <div class="table-responsive ord_a">
                            <table class="table ac">
                                <thead class="thead-inverse ">
                                    <tr>
                                        <th>Order id</th>
                                        <th>Product Name </th>
                                        <th> Ordered date	</th>
                                        <th>Quantity </th>
                                        <th>Shipping charge </th>
                                        <th>Total price</th>
                                        <th>Shipping address</th>
                                        <th>Billing address</th>
                                        <th>Change Status</th>
                                        <th>Invoice</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <form id="setOrderStatus" method="POST" action="<?php echo Yii::app()->request->baseUrl . '/user.php/merchant/order/ChangeOrderStatus' ?>">
                                    <input type="hidden" name="order_id" id="order_id" value="">
                                    <input type="hidden" name="product_id" id="product_id" value="">
                                    <input type="hidden" name="order_status" id="order_status" value="">

                                    <?php
                                    foreach ($productOrders as $productOrder) {
                                        $product = Products::model()->findByPk($productOrder->product_id);
                                        $order = Order::model()->findByPk($productOrder->order_id);
                                        $orderHistory = OrderHistory::model()->findByAttributes(array('order_id' => $productOrder->order_id, 'product_id' => $productOrder->product_id));
                                        $ship_data = UserAddress::model()->findByPk($order->ship_address_id);
                                        $ship_address = $ship_data->first_name . ' ' . $ship_data->last_name . '<br>' . $ship_data->address_1 . ', ' . $ship_data->address_2 . '<br>' . $ship_data->city . ', ' . $ship_data->district . '<br>' . $ship_data->postcode . '<br>' . 'Phone : ' . $ship_data->contact_number;
                                        $bill_data = UserAddress::model()->findByPk($order->bill_address_id);
                                        $bill_address = $bill_data->first_name . ' ' . $bill_data->last_name . '<br>' . $bill_data->address_1 . ', ' . $bill_data->address_2 . '<br>' . $bill_data->city . ', ' . $bill_data->district . '<br>' . $bill_data->postcode . '<br>' . 'Phone : ' . $bill_data->contact_number;
                                        ?>
                                        <tr>
                                            <td><?php echo $productOrder->id; ?></td>
                                            <td><?php echo $product->product_name; ?></td>
                                            <td><?php echo $productOrder->DOC; ?></td>
                                            <td><?php echo $productOrder->quantity; ?></td>
                                            <td> Nil</td>
                                            <td><?php echo Yii::app()->Currency->convert($productOrder->amount); ?></td>
                                            <td><?php echo $ship_address; ?></td>
                                            <td><?php echo $bill_address; ?></td>



                                            <td>
                                                <?php
                                                 $sel = $orderHistory->order_status;
                                                $pid = $productOrder->product_id;
                                                $oid = $productOrder->order_id;
                                                if ($sel == 5) {
                                                    echo CHtml::dropDownList('status', '', CHtml::listData(OrderStatus::model()->findAll(), 'id', 'title'), array(
                                                        'class' => 'form-control',
                                                        'options' => array($sel => array('selected' => true)),
                                                        'id' => "order_status_option",
                                                        'disabled' => 'disabled'
                                                    ));
                                                } else {
                                                    echo CHtml::dropDownList('status', '', CHtml::listData(OrderStatus::model()->findAll(), 'id', 'title'), array(
                                                        'class' => 'form-control',
                                                        'options' => array($sel => array('selected' => true)),
                                                        'id' => "order_status_option",
                                                        'onchange' => "updateOrderStatus($pid,$oid,this.value)"
                                                    ));
                                                }
                                                ?>

                                            </td>


                                            <td><a href="<?php echo Yii::app()->request->baseUrl . '/user.php/merchant/order/printProductInvoice/id/' . $productOrder->id ?>" target="_blank"><span class="prnt2"> <img class="fives" src="<?php echo Yii::app()->request->baseUrl; ?>/images/print.png" title="Print"></span></a></td>
                                        </tr>

                                    <?php } ?>
                                </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            <?php } ?>

        </div>
    </div>
</section> <!-- end of facial -->

<!-- end of container -->



<script>
    function updateOrderStatus(productid, orderid, val)
    {
        // get value of selected priceRange
        var e = document.getElementById("order_status_option");
        var order_status = e.options[e.selectedIndex].value;
//        alert(order_status);

        // set value of selected price range        
        $("#order_status").val(val);
        $("#product_id").val(productid);
        $("#order_id").val(orderid);
        $('#setOrderStatus').submit();

    }

    function filterlist(drpdwn)
    {
        $("#filter_status_drpdwn").val(drpdwn);
        $('#filters').submit();
    }
</script>

<!-- end of container -->
<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>