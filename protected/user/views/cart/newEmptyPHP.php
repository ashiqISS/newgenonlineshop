<style>
    .fa-trash-o:before {

        font-size: 20px;
    }

</style>
<div class="container">
    <div class="ord-summry">
        <div class="row">
            <div class="col-md-12">
                <h1>Order Summary</h1>
            </div>
        </div>
    </div>

    <?php
    foreach ($carts as $cart) {

            $prod_details = Products::model()->findByPk($cart->product_id);
            $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);

            $i = 0;
            ?>
            <div class="row crt_min">
                <div class="cart-clm adz">
                    <div class="col-md-6">

                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php echo $folder; ?>/<?php echo $prod_details->id; ?>/small.<?php echo $prod_details->main_image; ?>" class="img-responsive crt mid" align="absmiddle" style="max-height:300px; max-width:200px;display: block;">

                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Products/Detail/<?php echo $prod_details->id; ?>"style="font-size:20px;color: #F04032;text-decoration: none;"><?php echo $prod_details->product_name; ?></a>
                        <?php
                        $trimstring = substr($prod_details->description, 0, 100);
                        ?>
                        <p><?= $trimstring . '.....'; ?><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Products/Detail/<?php echo $prod_details->id; ?>" style="color:#F04032">Read More</a></p>

                    </div>
                    <div class="col-md-6">


                        <ul class="list-inline list-unstyled">
                            <li class="wid">
                                <div><select  class="quantity" cart="<?php echo $cart->id; ?>" style="padding: 5px;">
                                        <?php for ($i = 1; $i < 5; $i++) {
                                                ?>
                                                <option <?= $cart->quantity == $i ? 'selected' : '' ?> value="<?= $i; ?>"><?= $i; ?> </option>

                                        <?php }
                                        ?>
                                    </select></div>
                            </li>
                            <li class="wid">

                                <?php
                                if ($cart->options != 0) {

                                        $price = Options::model()->findByPk($cart->options)->amount;
                                } else {
                                        if ($prod_details->discount) {
                                                $price = $prod_details->price - $prod_details->discount;
                                        } else {
                                                $price = $prod_details->price;
                                        }
                                }
                                $cart_qty = $cart->quantity;
                                $tot_price = $cart_qty * $price;
                                ?>
                                <h1><br><span class="range_<?php echo $cart->id; ?>"><?= Yii::app()->Currency->convert($tot_price); ?></span></h1>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <!--                        <li><a href="<?= Yii::app()->request->baseUrl; ?>/index.php/cart/Delete/<?= $cart->id; ?>" class="trash"></a></li>-->
                                <input type="hidden" id="cart_<?php echo $cart->id; ?>" value="<?php echo $prod_details->id; ?>">
                            </li>


                            <li class="wid">
                                <a href="<?= Yii::app()->request->baseUrl; ?>/index.php/cart/Delete/<?= $cart->id; ?>"><i class="fa cart-del fa-trash-o"></i></a>
                            </li>
                        </ul>





                    </div>


                    <!--                    <div class="col-md-1 ">

                                        </div>-->

                </div>
            </div>
            <?php
            $total+= $tot_price;
    }
    ?>
    <div class="has">
        <div class="container">

            <div class="row">
                <div class="col-md-3">
                    <i class="fa fa-angle-left"></i><a class="adjust" href="<?= Yii::app()->baseUrl; ?>/index.php">&nbsp;&nbsp;Continue with shopping</a>
                </div>
                <div class="col-md-3">
                    <i class="fa fa-angle-left"></i><a class="adjust" href="<?= Yii::app()->baseUrl; ?>/index.php/Cart/EmptyCart">&nbsp;&nbsp;Empty Cart</a>
                </div>
                <div class="col-md-4  col-sm-4 col-xs-12"  style="text-align:center;">
                    <ul class="kwid">
                        <li>YOU PAY</li>
                        <li>(inclusive of all taxes)</li>

                    </ul>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-12">
                    <ul class="hourd">
                        <li class="range"><?= Yii::app()->Currency->convert($total); ?></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-4 col-xs-12">
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/cart/Proceed/<?php echo $prod->id; ?>"><button type="button" class="btn btn-success cartpg crm">PROCEED&nbsp;<i class="fa fa-angle-right "></i> </button></a>
                </div>

            </div>



            <div class="row">

                <div class="col-md-2 col-sm-4 col-xs-12">

                </div>
            </div>


        </div>
    </div>


</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
        $(document).ready(function () {

            $('.quantity').change(function () {
                showLoader();
                var cart = $(this).attr('cart');
                var qty = this.value;
                var product_id = $('#cart_' + cart).val();
                quantityChange(cart, qty, product_id);
                total();
            });



        });
        function quantityChange(cart, qty, product_id) {

            $.ajax({
                type: "POST",
                cache: 'false',
                async: false,
                url: baseurl + 'Cart/Calculate',
                data: {cart_id: cart, Qty: qty, prod_id: product_id},
            }).done(function (data) {
                $(".range_" + cart).html(data);
                hideLoader();
            });
        }


        function total() {
            $.ajax({
                type: "POST",
                cache: 'false',
                async: false,
                url: baseurl + 'Cart/Total',
                data: {}
            }).done(function (data) {
                $(".range").html(data);
                hideLoader();
            });
        }

        function showLoader() {
            $('.over-lay').show();
        }
        function hideLoader() {
            $('.over-lay').hide();
        }
</script>







