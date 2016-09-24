<!doctype html>
<html>
    <head>
        <meta charset="utf-8">


        <style>

            .new{
                border: 1px solid #ddd; text-align: center;
            }
            .tlb_total{
                border: 1px solid #ddd; border-collapse: collapse;
            }
            .invoice-box{
                max-width:800px;
                margin:auto;
                padding:30px;
                border:1px solid #eee;

                font-size:13px;
                line-height:24px;
                font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;

            }


            .invoice-box table{
                width:100%;
                line-height:inherit;
                text-align:left;
                border:1px solid #eee;
            }
            .invoice-box table td{
                padding:5px;
                vertical-align:top;
            }
            .invoice-box table tr td:nth-child(2){
                /*text-align:right;*/
            }
            .invoice-box table tr.top table td{
                padding-bottom:20px;
            }
            .invoice-box table tr.top table td.title{
                font-size:30px;
                line-height:45px;
                /*//  color:#333;*/
            }
            .invoice-box table tr.information table td{
                padding-bottom:20px;
            }
            .invoice-box table th{
                border-bottom:1px solid #ddd;
            }
            .invoice-box table tr.heading td{
                /*// background:#eee;*/
                border-bottom:1px solid #ddd;
                font-weight:bold;
            }

            .invoice-box table tr.details td{
                padding-bottom:20px;
            }
            .invoice-box table tr.item.last td{
                border-bottom:none;
            }


            @media only screen and (max-width: 600px) {
                .invoice-box table tr.top table td{
                    width:100%;
                    display:block;
                    text-align:center;
                }

                .invoice-box table tr.information table td{
                    width:100%;
                    display:block;
                    text-align:center;
                }
            }
        </style>
    </head>
    <script>
            window.print();
    </script>
    <body>
        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    NEWGEN SHOP : SALES REPORT
                                </td>

                                <td>
                                    Merchant Id #: <?php echo $merchant_details->id; ?><br>
                                    Merchant Name: <?php echo $merchant_details->fullname; ?><br>
                                    Email : <?php echo $userData->email; ?><br>
                                    Report Date : <?php echo date("d/m/Y"); ?><br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="information">
                    <td colspan="2">
                        <table class="table ac">
                            <thead class="thead-inverse ac_bg">
                                <tr>
                                    <th>Order Id</th>
                                    <th>Customer Name</th>
                                    <th>Product Name </th>
                                    <th>Amount </th>
                                    <th>date of Order</th>
                                    <th>Quantity </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($sales as $sale) {
                                        $order_produ = Order::model()->findByPk($sale->order_id);
                                        $order_products = Products::model()->findByPk($sale->product_id);
                                        $user = BuyerDetails::model()->findByAttributes(array('user_id' => $order_produ->user_id));
                                        ?>

                                        <tr>
                                            <td>ID-<?= $order_produ->id; ?></td>
                                            <td>
                                                <?php
                                                if ($order_produ->user_id == '' || $order_produ->user_id == 0) {
                                                        echo 'Unknown';
                                                } else {
                                                        echo $user->first_name . ' ' . $user->last_name;
                                                }
                                                ?>
                                            </td>
                                            <td><?= $order_products->product_name; ?></td>
                                            <td> <?= $sale->amount; ?></td>
                                            <td><?= date('d-m-Y', strtotime($order_produ->order_date)); ?></td>
                                            <td><?= $sale->quantity; ?></td>
                                        </tr>
                                        <?php
                                }
                                ?>
                                <tr>
                                    <td colspan="1">Total Order </td> <td colspan="2"><? print_r($salesSummary->cnt) ?></td>
                                    <td colspan="1">Total Amount</td> <td colspan="2"><? print_r($salesSummary->amt) ?></td>

                                </tr>

                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
<!--            <table class="tlb_total">
                <tr class="pro_info">
                    <th class="new">PRODUCT NAME</th><th class="new"> QUANTITY  </th><th class="new"> UNIT PRICE  </th><th class="new"> TOTAL  </th>
                </tr>
            <?php // foreach ($productOrder as $orders) {  ?>
            <?php
//                        $product = Products::model()->findByPk($orders->product_id);
//                        print_r($product_names);exit;
//                        foreach ($product_names as $product) {
            ?>
                <tr> <td style="border: 1px solid #ddd; text-align: left; padding: 6px 0px 0px 20px;"><?php echo $product->product_name; ?></td>
                    <td style="border: 1px solid #ddd; text-align: left;padding: 6px 0px 0px 20px;">
            <?php echo $productOrder->quantity; ?>
                    </td>
                    <td style="border: 1px solid #ddd; text-align: left;padding: 6px 0px 0px 20px;"><?php
            echo $product->price . '.00';
            ?></td>
                    <td style="border: 1px solid #ddd; text-align: left;padding: 6px 0px 0px 20px;"> <?php echo ($productOrder->quantity * $product->price) . '.00'; ?></td>
                </tr>
                </br>
            <?php // }
            ?>
            <?php
//                }
            ?>
                <tr>
                    <td align="center">TOTAL</td><td></td><td></td><td><strong  style="padding: 6px 0px 0px 17px;"><?php echo $productOrder->amount . '.00'; ?></strong></td>
                </tr>
            </table>-->
            <!--            <button onclick="myFunction()">Print this page</button>-->
        </div>
    </body>
</html>