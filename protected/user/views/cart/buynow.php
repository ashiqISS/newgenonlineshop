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
        <div id="large-header" class="large-header " style="height: 124px; background: url(<?= Yii::app()->baseUrl; ?>/images/img_inn.jpg)">
                <div class="banner_txt">
                        <h1 class="animated fadeInLeft m2">My <span class="redish"> Cart </span></h1>
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

                                        <?php
                                        if (Yii::app()->user->hasFlash('success')) {
                                                ?>
                                                <div class="alert-success">
                                                        <?php
                                                        echo Yii::app()->user->getFlash('success');
                                                        ?>
                                                </div>
                                                <?php
                                        } else if (Yii::app()->user->hasFlash('error')) {
                                                ?>
                                                <div class="alert-danger">
                                                        <?php
                                                        echo Yii::app()->user->getFlash('error');
                                                        ?>
                                                </div>
                                                <?php
                                        }
                                        ?>

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
                                                                                        <th>Total</th>
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
                                                                                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Product/Detail/name/<?php echo $prod_details->canonical_name; ?>">
                                                                                                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php echo $folder; ?>/<?php echo $prod_details->id; ?>/small.<?php echo $prod_details->main_image; ?>" class="img-responsive crt mid" align="absmiddle" style="max-height:300px; max-width:200px;display: block;">
                                                                                                        </a>
                                                                                                </td>
                                                                                                <td>
                                                                                                        <h2>
                                                                                                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Product/Detail/name/<?php echo $prod_details->canonical_name; ?>"style="text-decoration: none;">
                                                                                                                        <?php echo $prod_details->product_name; ?>
                                                                                                                </a>
                                                                                                        </h2>
                                                                                                </td>
                                                                                                <?php
                                                                                                if ($prod_details->discount) {
                                                                                                        $price = $prod_details->price - $prod_details->discount;
                                                                                                } else {
                                                                                                        $price = $prod_details->price;
                                                                                                }
                                                                                                $shipprice = $prod_details->special_price;
                                                                                                $cart_qty = $cart->quantity;
                                                                                                $tot_price = $cart_qty * $price;
                                                                                                $ship = $cart_qty * $shipprice;
                                                                                                $gt = $tot_price + $ship;
                                                                                                ?>
                                                                                                <td><h2><?= Yii::app()->Currency->convert($price); ?></h2></td>
                                                                                                <td class="">
                                                                                                        <form action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/cart/updatecart" method="post" id="qty_<?php echo $cart->id; ?>">
                                                                                                                <input type="hidden" value="<?php echo $cart->id; ?>" name="cart_id" />

                                                                                                                <select  class="quantity qty" id="<?php echo $cart->id; ?>" name="cart_quantity" cart="<?php echo $cart->id; ?>" style="width: 35px !important">
                                                                                                                        <?php for ($i = 1; $i < 5; $i++) {
                                                                                                                                ?>
                                                                                                                                <option <?= $cart->quantity == $i ? 'selected' : '' ?> value="<?= $i; ?>" class="jsNumeric jsQty p0  qty"><?= $i; ?> </option>
                                                                                                                        <?php }
                                                                                                                        ?>
                                                                                                                </select>
                                                                                                        </form>

                                                                                                </td>
                                                                                                <td><a href="<?= Yii::app()->request->baseUrl; ?>/index.php/cart/Delete?id=<?= $cart->id; ?>"><img class="bin" src="<?= Yii::app()->baseUrl; ?>/images/ben.png"></a></td>
                                                                                                <td><h2 class="range_<?php echo $cart->id; ?>"><?= Yii::app()->Currency->convert($tot_price); ?></h2></td>
                                                                                <input type="hidden" id="cart_<?php echo $cart->id; ?>" value="<?php echo $prod_details->id; ?>">
                                                                                </tr>
                                                                                <?php
                                                                                $subt+=$tot_price;
                                                                                $total += $gt;
                                                                                $sp += $ship;
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
                                                        <br>
                                                        <!--                            <button type="submit" class="btn proceed-btn btn-default" href="checkout.php">proceed to checkout</button>-->
                                                        <a style="color:#ff6633" href="<?= Yii::app()->baseUrl; ?>/index.php/products" >Continue Shopping</a>
                                                </div>
                                                <div class="slip-1">
                                                        <a class="shop-cart range"><!--Subtotal: <?= Yii::app()->Currency->convert($total); ?>--></a>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-md-3 sub_upcmg">
                                        <table id="t03">

                                                <tbody>
                                                        <tr>
                                                                <td class="tdd">Sub-Total :</td>
                                                                <td class="tdd range"><?= Yii::app()->Currency->convert($subt); ?></td>
                                                        </tr>

                                                        <?php
                                                        foreach (Yii::app()->Discount->Taxcalculate($carts) as $key11 => $value11) {
                                                                ?>
                                                                <tr>
                                                                        <td class="tdd"><?php echo $key11; ?></span></td>
                                                                        <td class="tdd range"><?php echo Yii::app()->Currency->convert($value11); ?></span></td>
                                                                </tr>
                                                        <?php } ?>
                                                        <tr>
                                                                <td class="tdd">Shipping Charge</td>
                                                                <td class="tdd range"><span class="colors1"><?php echo Yii::app()->Currency->convert($sp); ?></span></td>
                                                        </tr>
                                                        <?php
                                                        if ($coupon_amount > 0) {
                                                                $tot = $total;
                                                                $coup = $coupon_amount;
                                                                $grant = $tot - $coup;
                                                                ?>
                                                                <tr>
                                                                        <td class="tdd">Coupon Code (<span style="font-size: 9px;"><?php echo $coupen_details->code; ?></span>)</td>
                                                                        <td class="tdd range"><?php echo Yii::app()->Currency->convert($coupon_amount); ?></td>
                                                                </tr>
                                                                <?php
                                                        } else {
                                                                $tot = $total;
                                                                $grant = $tot;
                                                        }
                                                        ?>

                                                        <tr>
                                                                <td class="tdd">Total :</td>
                                                                <td class="tdd range"><?= Yii::app()->Currency->convert($granttotal); ?></td>

                                                        </tr>
                                                </tbody>
                                        </table>
                                        <div class="proceed_upmg">
                                                <div class="panel panel-default">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#p1">
                                                                <div class="panel-heading headz">

                                                                        <span class="panel-title">
                                                                                <i class="glyphicon gly glyphicon-minus"></i>  Coupon Code
                                                                        </span>


                                                                </div>
                                                        </a>
                                                        <div id="p1" class="panel-collapse collapse in">
                                                                <div class="panel-body">
                                                                        <form class="form-inline" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/cart/updatecoupon" method="post" >
                                                                                <div class="form-group">

                                                                                        <input type="test" class="form-control" name="coupon_code"  placeholder="Enter your coupon here">
                                                                                </div>

                                                                                <button type="submit" class="btn btn-default go">Go</button>
                                                                        </form>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="proceed_upmg">
                                                <form method="post" action="<?= Yii::app()->request->baseUrl; ?>/index.php/checkOut/Checkout/" id="checkoutForm">
                                                        <input type="hidden" value="<?php echo $total; ?>" name="total_amt" />
                                                        <button class="btn prsd-btn btn-default" id="checkout_btn">proceed to checkout</button>
                                                </form>

                                        </div></div>
                        </div>
                </div>
        </div>
</section> <!-- end of facial -->
<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
        $(document).ready(function() {

                $(".quantity").change(function() {

                        var id = $(this).attr("id");
                        $("#qty_" + id).submit();
                });
        });
        $(document).ready(function() {
                // submit checkout form
                $('#checkout_btn').click(function() {
                        $('#checkoutForm').submit();
                });

                $('.quantity1').change(function() {
                        var cart = $(this).attr('cart');
                        var qty = this.value;
                        var product_id = $('#cart_' + cart).val();
                        quantityChange1(cart, qty, product_id);
                        total();
                });

        });
        function quantityChange1(cart, qty, product_id) {

                $.ajax({
                        type: "POST",
                        cache: 'false',
                        async: false,
                        url: baseurl + 'Cart/Calculate',
                        data: {cart_id: cart, Qty: qty, prod_id: product_id},
                }).done(function(data) {
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
                }).done(function(data) {
                        $(".range").html(data);
                        hideLoader();
                });
        }



</script>