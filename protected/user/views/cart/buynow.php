<style>
    custom_a{
        background-color: #777777 !important;
        width: 44%;
        border: 0;
        border-radius: 4px;
        color: #fff;
        padding-top: 10px;
        padding-bottom: 10px;
        margin-bottom: 33px;
        text-transform: uppercase;
        font-size: 13px;
        margin-top: 20px;
    }
</style>
<section class="banner">
    <div id="large-header" class="large-header " style="height: 124px; background: url(<?= Yii::app()->baseUrl; ?>/images/img_inn.jpg">
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
                <div class="col-md-9">

                    <div class="left-my_acnt">
                        <div class="panel-body sis">

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="tb"> Image</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Delete</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($carts as $cart) {

                                                $prod_details = Products::model()->findByPk($cart->product_id);
                                                $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);

                                                $i = 0;
                                                ?>
                                                <tr>
                                                    <td>
                                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php echo $folder; ?>/<?php echo $prod_details->id; ?>/small.<?php echo $prod_details->main_image; ?>" class="img-responsive crt mid" align="absmiddle" style="max-height:300px; max-width:200px;display: block;">
                                                    </td>
                                                    <td><h2>
                                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Products/Detail/<?php echo $prod_details->id; ?>"style="text-decoration: none;">
                                                                <?php echo $prod_details->product_name; ?>
                                                            </a></h2></td>
                                                    <?php
                                                    if ($prod_details->discount) {
                                                            $price = $prod_details->price - $prod_details->discount;
                                                    } else {
                                                            $price = $prod_details->price;
                                                    }
                                                    $cart_qty = $cart->quantity;
                                                    $tot_price = $cart_qty * $price;
                                                    ?>
                                                    <td><h2><?= Yii::app()->Currency->convert($price); ?></h2></td>
                                                    <td class="">
                                                        <select  class="quantity qty" cart="<?php echo $cart->id; ?>" style="width: 35px !important">
                                                            <?php for ($i = 1; $i < 5; $i++) {
                                                                    ?>
                                                                    <option <?= $cart->quantity == $i ? 'selected' : '' ?> value="<?= $i; ?>" class="jsNumeric jsQty p0  qty" "><?= $i; ?> </option>
                                                            <?php }
                                                            ?>
                                                        </select>


                                                    </td>
                                                    <td><a href="<?= Yii::app()->request->baseUrl; ?>/index.php/cart/Delete/<?= $cart->id; ?>"><img class="bin" src="<?= Yii::app()->baseUrl; ?>/images/ben.png"></a></td>
                                                    <td><h2 class="range_<?php echo $cart->id; ?>"><?= Yii::app()->Currency->convert($tot_price); ?></h2></td>
                                            <input type="hidden" id="cart_<?php echo $cart->id; ?>" value="<?php echo $prod_details->id; ?>">
                                            </tr>
                                            <?php
                                            $total+= $tot_price;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="proceed_inn">
                        <div class="slip-2">
                            <!--                            <button type="submit" class="btn proceed-btn btn-default" href="checkout.php">proceed to checkout</button>-->
                            <button class="btn ctn-btn btn-default" >continue shopping</button>
                        </div>
                        <div class="slip-1">
                            <a class="shop-cart range">Subtotal: <?= Yii::app()->Currency->convert($total); ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 sub_upcmg">
                    <table id="t03">

                        <tbody><tr>
                                <td class="tdd">Sub-Total :</td>
                                <td class="tdd">â‚¹ 3500.00</td>
                            </tr>
                            <tr>
                                <td class="tdd">Total :</td>
                                <td class="tdd">â‚¹ 3500.00</td>

                            </tr>
                        </tbody>
                    </table>
                    <div class="proceed_upmg">
                        <button class="btn prsd-btn btn-default">proceed to checkout</button>

                    </div></div>
            </div>
        </div>
    </div>
</section> <!-- end of facial -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
        $(document).ready(function () {

            $('.quantity').change(function () {
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



</script>