<div class="dtl_dsrpn">

    <div class="dtl_inn">
        <h2><?= $product->product_name; ?></h2>
        <?php if (Yii::app()->user->getId()) { ?>
            <h3 style="margin-top: 24px;margin-bottom: 10px;"><?= Yii::app()->Currency->convert($product->price); ?></h3>
        <?php } ?>
        <div class="product_quantity">
            <?= $product->id; ?>
            <div class="qunatity">
                <h4>Quantity</h4>
                <select class="qty" >
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
        </div>


        <button class="cart-b add_to_cart" id="<?= $product->id; ?>"><strong><i class="fa baskets fa-shopping-basket"></i> &nbsp;ADD TO CART</strong></button>                         
        <input type = "hidden" value = "<?= $product->canonical_name; ?>" id="cano_name_<?= $product->id; ?>" name="cano_name">
        <p><?= $product->description; ?></p>
        <div class="clearfix"></div>

    </div>

</div>