<section class="banner">
    <div id="large-header" class="large-header " style="height: 124px; background: url(<?= Yii::app()->baseUrl; ?>/images/img_inn.jpg)">
        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">Check <span class="redish"> Out </span></h1>
        </div>
    </div>
</section>


<div class="clearfix"></div>

<section class="beautifull-spa-and-faeture">
    <h2 class="hidden">Feature</h2>
    <div class="container">
        <div class="row">
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</section>


<section class="cart-main">
    <div class="container">
        <div class="row">
            <div class="heading">

            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class=" sub_upcmg" style="border: 1px solid #c5c0c0;">
                        <?php
                        $total_amt = Yii::app()->user->getState('total_amt');
                        foreach ($carts as $cart) {
                            $prod_details = Products::model()->findByPk($cart->product_id);
                            $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);

                            $i = 0;

                            if ($prod_details->discount) {
                                $price = $prod_details->price - $prod_details->discount;
                            } else {
                                $price = $prod_details->price;
                            }
                            $cart_qty = $cart->quantity;
                            $tot_price = $cart_qty * $price;
                            ?>

                            <div>   <!-- ordered item start -->



                                <div class="sub_ttl">

                                    <table id="t2">
                                        <tr>
                                            <td colspan="2"><h2 style="margin-top: 0"><?php echo $prod_details->product_name; ?></h2></td>
                                        </tr>
                                        <tr>
                                            <td rowspan="3">
                                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php echo $folder; ?>/<?php echo $prod_details->id; ?>/small.<?php echo $prod_details->main_image; ?>" class="img-responsive crt mid" align="absmiddle" style="height:110px; width:100px;display: block;">
                                            </td>
                                            <td>Price : <?= Yii::app()->Currency->convert($price); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Quantity : <?= $cart_qty ?></td>
                                        </tr>
                                        <tr>

                                            <td>Total: <?= Yii::app()->Currency->convert($tot_price); ?></td>
                                        </tr>
                                    </table>

                                </div>
                            </div>  <!-- ordered items end -->
                            <?php
                        }
                        ?>


                        <div class="clearfix"></div>

                    </div>

                </div>
                <div class="col-md-2"></div>

                <div class="col-md-4">

                    <table id="t03" style="float: none;">
                        <tbody>
                            <tr>
                                <td class="tdd">Sub-Total :</td>
                                <td class="tdd"><?= Yii::app()->Currency->convert($total_amt); ?></td>

                            </tr>


                            <tr>
                                <td class="tdd">Total :</td>
                                <td class="tdd"><?= Yii::app()->Currency->convert($total_amt); ?></td>


                            </tr>
                        </tbody>
                    </table>
                    <div style="padding-top: 2em;">
                        <h2 style="font-weight: 500;font-size: 21px;color: black">Total Amount to pay : <?= Yii::app()->Currency->convert($total_amt); ?></h2>
                    </div>
                    <form method="POST" action="<?= Yii::app()->request->baseUrl; ?>/index.php/CheckOut/CompleteCheckOut">
                        <div style="padding-top: 2em;color: #635c5c;">
                            <span style="font-size: 17px;"> Payment Type</span><br><br>
                            <div style="font-size: 18px;font-weight: bold;">
                                <input type="radio" name="p_type" value="card" checked> CREDIT/DEBIT/NET BANKING<br>
                                <input type="radio" name="p_type" value="paypal"> PAYPAL
                            </div>

                            <br>
                            <input type="checkbox" name="confirm_payment" required> By placing an order you agree to our Terms & Policies
                        </div>


                        <div class="proceed_upmg">
                            <button class="btn prsd-btn btn-default">PAY SECURELY NOW</button>

                        </div>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>


        </div>
    </div>
</section> <!-- end of facial -->




<!-- end of container -->

<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
?>
