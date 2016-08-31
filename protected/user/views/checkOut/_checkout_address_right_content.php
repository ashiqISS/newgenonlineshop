<div class=" sub_upcmg">
    <?php
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



        <table id="t03" style="margin-top: 3em;">


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

    <h1>Total Amount to pay : <?= Yii::app()->Currency->convert($total_amt); ?></h1>

    <div class="clearfix"></div>

</div>