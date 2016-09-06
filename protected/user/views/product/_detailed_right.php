<div class="dtl_dsrpn">

    <div class="dtl_inn">
        <h2><?= $product->product_name; ?></h2>
        <?php if (Yii::app()->user->getId()) { ?>
            <h3 style="margin-top: 24px;margin-bottom: 10px;"><?= Yii::app()->Currency->convert($product->price); ?></h3>
        <?php } ?>
        <div class="product_quantity">

            <div class="qunatity">
                <table>
                    <tr>
                        <td style="border-bottom: none;"><h4 style="margin-top: 20px;">Quantity</h4></td>
                        <td style="vertical-align: top;border-bottom: none;">
                            &nbsp;&nbsp;    <select class="qty" >
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </td>
                    </tr>
                </table>


            </div>
        </div>


        <button class="cart-b add_to_cart" id="<?= $product->id; ?>"><strong><i class="fa baskets fa-shopping-basket"></i> &nbsp;ADD TO CART</strong></button>                         
        <button class="cart-b add_to_wishlist" id="<?= $product->id; ?>" onclick="addToWishlist(this.id)"><strong><i class="fa baskets fa-shopping-basket"></i> &nbsp;ADD TO WISHLIST</strong></button>                         
        <input type = "hidden" value = "<?= $product->canonical_name; ?>" id="cano_name_<?= $product->id; ?>" name="cano_name">
        <p><?= $product->description; ?></p>
        <div class="clearfix"></div>

    </div>

</div>
