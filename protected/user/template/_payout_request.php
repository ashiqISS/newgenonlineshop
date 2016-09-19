<?php
$accountdata = BankingDetails::model()->findByPk($payoutModel->payment_account);
?>

<html>
    <head>
        <title>NewGenShop</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
        <!-- Save for Web Slices (emailer.psd) -->
        <div style="margin:auto; width:776px; border:solid 2px #404241; margin-top:40px; margin-bottom:40px;">
            <table id="Table_01" width="776" border="0" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="padding-top: 1em;padding-bottom: 1em;border:solid 1px #d7d7d7;"><center><a href="#"><img src="http://intersmarthosting.in/newgen_shop/images/logo.png" alt=""></a></center></td>
                </tr>
                <tr>
                    <td>

                        <div style="padding: 2em">
                            <?php
                            echo 'New payout Request from ' . MerchantDetails::getFullname($user_model->id) . '.';
                            ?>
                          
                            <br><br>
                            <table width="50%" id="mail_content_tbl">
                                <tr>
                                    <td width="20%">Merchant_id</td>
                                    <td width="2%">:</td>
                                    <td width="23%"><?= $payoutModel->merchant_id ?></td>
                                </tr>
                                <tr>
                                    <td>Available Balance</td>
                                    <td>:</td>
                                    <td><?= Yii::app()->Currency->convert($payoutModel->available_balance) ?></td>
                                </tr>
                                <tr>
                                    <td>Requested Amount</td>
                                    <td>:</td>
                                    <td><?= Yii::app()->Currency->convert($payoutModel->requested_amount) ?></td>
                                </tr>

                                <tr>
                                    <td>Payment Account</td>
                                    <td>:</td>
                                    <td>
                                        <?php
                                        if ($accountdata == 1) { //paypal
                                           echo 'Paypal : ';
                                            $len = strlen($accountdata->paypal_id);
                                            $last_four = substr($accountdata->paypal_id, -4);
                                            for ($i = 0; $i <= $len - 4; $i++) {
                                                echo 'x';
                                            }
                                            echo $last_four;
                                           
                                        } else {
                                            echo 'Bank Account : ';
                                            $len = strlen($accountdata->account_number);
                                            $last_four = substr($accountdata->account_number, -4);
                                            for ($i = 0; $i <= $len - 4; $i++) {
                                                echo 'x';
                                            }
                                            echo $last_four;
                                        }
                                        ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td> Request <?= $status ?></td>
                                </tr>
                                <tr>
                                    <td>Date</td>
                                    <td>:</td>
                                    <td>
                                        <?php
                                        $doc = strtotime($payoutModel->DOC);
                                        echo date('d/m/Y', $doc);
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td style="padding:20px;  border:solid 1px #d7d7d7;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>

                                    <td align="center">
                                        <h4 style=" font-family:'Open Sans',arial, sans-serif; font-size:16px; color:#414042; margin-bottom:10px;"></h4>
                                        <p style="font-family:'Open Sans',arial, sans-serif; font-size:13px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do, <br>Tel:  +90 123 45 67, +90 123 45 68 <br>
                                            <a href="mailto:support@newgen.com" style="border:none; color:#414042;">info@loremisum.com</a> <br>
                                            Copyright © 2016. All rights reserved.</p></td>

                                </tr>
                            </tbody>
                        </table></td>
                </tr>
            </table></div>
        <!-- End Save for Web Slices -->
    </body>
</html>