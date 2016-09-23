
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
                        <table cellpadding="0" cellspacing="0">
                                <tr class="top">
                                        <td colspan="2">
                                                <table>
                                                        <tr>
                                                                <td class="title">
                                                                        SHIPPING DETAILS
                                                                </td>

                                                                <td>
                                                                        Invoice #:<?php echo $productOrder->id; ?><br>
                                                                        Order Date:<?php
                                                                        echo
                                                                        date("d/m/Y", strtotime($productOrder->DOC));
                                                                        ?>
                                                                        <br>
                                                                </td>
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
                                                                        <b> SHIPPING ADDRESS.</b><br>
                                                                        <?php echo $user_address->first_name.' '.$user_address->last_name; ?>   <span>   </span><br>
                                                                        <?php echo $user_address->address_1 . ', ' . $user_address->address_2; ?></br>
                                                                        <?php
                                                                        if ($user_address->contact_number != '') {
                                                                                echo $user_address->contact_number . '<br>';
                                                                        }
                                                                        ?>
                                                                        <?php echo 'Post Code: ' . $user_address->postcode; ?></br>
                                                                        <?php echo States::model()->findByPk($user_address->state)->state_name; ?></br>
                                                                        <?php echo 'Phone : ' . $user_address->contact_number; ?>
                                                                </td>
                                                        </tr>
                                                </table>
                                        </td>
                                </tr>
                        </table>
                        <!--            <button onclick="myFunction()">Print this page</button>-->
                </div>
        </body>
</html>