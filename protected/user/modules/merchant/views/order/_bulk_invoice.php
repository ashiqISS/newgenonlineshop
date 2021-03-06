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
            }
            .invoice-box table td{
                padding:5px;
                vertical-align:top;
            }
            .invoice-box table tr td:nth-child(2){
                text-align:right;
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
                padding-bottom:40px;
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
            <table>
                <tr>
                    <td class="title">
                        NEWGEN SHOP BULK INVOICE

                    </td>
                </tr>
            </table>


            <?php
            foreach ($productOrders as $productOrder) {

                $order = Order::model()->findByPk($productOrder->order_id);
                $product = Products::model()->findByPk($productOrder->product_id);
                $user_address = UserAddress::model()->findByPk($order->ship_address_id);
                $bill_address = UserAddress::model()->findByPk($order->bill_address_id);
                ?>
                <table cellpadding="0" cellspacing="0">
                    <tr class="top">
                        <td colspan="2">

                            <table width="100%">
                                <tr>
                                    <td width="60%">
                                        Invoice #:<?php echo $productOrder->id; ?><br>
                                        Order Date:<?php
                                        echo
                                        date("d/m/Y", strtotime($productOrder->DOC));
                                        ?>
                                        <br>
                                        Payment Method: <?php
                                        if ($order->payment_mode == 1) {
                                            echo"Wallet";
                                        } elseif ($order->payment_mode == 2) {
                                            echo"Gateway";
                                        } elseif ($order->payment_mode == 3) {
                                            echo"Paypal";
                                        }
                                        ?>
                                    </td>
                                    <td width="40%"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr class="information">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <td style="border: 1px solid #ddd;
                                        text-align: left;padding: 13px 0px 10px 20px" class="addr">
                                        <b> PAYMENT ADDRES.</b><br>
                                        <?php echo $user_address->first_name; ?>   <span>   <?php echo $user_address->last_name; ?></span><br>
                                        <?php echo $user_address->address_1 . ', ' . $user_address->address_2; ?></br>
                                        <?php
                                        if ($user_address->company != '') {
                                            echo $user_address->company . '<br>';
                                        }
                                        ?>
                                        <?php echo 'Post Code: ' . $user_address->postcode; ?></br>
                                        <?php echo States::model()->findByPk($user_address->state)->state_name; ?></br>
                                        <?php echo 'Phone : ' . $user_address->contact_number; ?>
                                    </td>
                                    <td style="  border: 1px solid #ddd;
                                        text-align: left;padding: 13px 0px 10px 20px">
                                        <b> BILLING ADDRES.</b><br>
                                        <?php echo $bill_address->first_name; ?>  <span>   <?php echo $bill_address->last_name; ?></span><br>
                                        <?php echo $bill_address->address_1 . ', ' . $bill_address->address_2; ?><br>
                                        <?php
                                        if ($bill_address->company != '') {
                                            echo $bill_address->company . '<br>';
                                        }
                                        ?>
                                        <?php echo 'Post Code: ' . $bill_address->postcode; ?><br>
                                        <?php echo States::model()->findByPk($bill_address->state)->state_name; ?><br>
                                        <?php echo 'Phone : ' . $bill_address->contact_number; ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table class="tlb_total">
                    <tr class="pro_info">
                        <th class="new">PRODUCT NAME</th><th class="new"> QUANTITY  </th><th class="new"> UNIT PRICE  </th><th class="new"> TOTAL  </th>
                    </tr>
                    <tr> 
                        <td style="border: 1px solid #ddd; text-align: left; padding: 6px 0px 0px 20px;">
                            <?php echo $product->product_name; ?>
                        </td>
                        <td style="border: 1px solid #ddd; text-align: left;padding: 6px 0px 0px 20px;">
                            <?php echo $productOrder->quantity; ?>
                        </td>
                        <td style="border: 1px solid #ddd; text-align: left;padding: 6px 0px 0px 20px;">
                            <?php
                            echo Yii::app()->Currency->convert($product->price) . '.00';
                            ?>
                        </td>
                        <td style="border: 1px solid #ddd; text-align: left;padding: 6px 0px 0px 20px;"> 
                            <?php $tot = ($productOrder->quantity * $product->price) . '.00';
                            echo Yii::app()->Currency->convert($tot);
                            ?>
                        </td>
                    </tr>
                    </br>
                    <tr>
                        <td align="center">TOTAL</td><td></td><td></td><td><strong  style="padding: 6px 0px 0px 17px;"><?php echo Yii::app()->Currency->convert($productOrder->amount) . '.00'; ?></strong></td>
                    </tr>
                </table>
            <?php } ?>


        </div>
    </body>
</html>