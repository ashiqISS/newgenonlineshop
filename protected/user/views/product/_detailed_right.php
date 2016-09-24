<div class="dtl_dsrpn">
    <h1><?= $product->product_name; ?></h1>
    <div class="dtl_inn">
            <!--<h2 style="margin-bottom: 12px"><?= $product->product_name; ?></h2>-->
        <p>
            <?php
            $servicedesc = strip_tags($product->description);
            $servicedesc = SUBSTR($servicedesc, 0, 300);
            if ((strlen($product->description)) > 300) {
                echo $servicedesc . '...';
            } else {
                echo $servicedesc;
            }
            ?>
            <a href="#descriptionTab" style="color: #337ab7;float: right;"> See Full description</a>

        </p>
        <?php if (Yii::app()->user->getId()) { ?>

            <h3><?php echo Yii::app()->Discount->Discount($product); ?></h3>
            <span class="extax">Ex Tax : <?php echo Yii::app()->Discount->extax($product); ?></span>
        <?php } ?>
        <div class="product_quantity" style="padding-bottom: 1em;">

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
        <ul>
            <li style="display: inline-block;">
                <button class="cart-b add_to_cart" style="padding-right: 18px;padding-left: 18px;" id="<?= $product->id; ?>"><strong><i class="fa baskets fa-shopping-basket"></i> &nbsp;ADD TO CART</strong></button>
            </li>
            <?php if (Yii::app()->user->getId()) { ?>
                <li style="display: inline-block;padding-left: 1em;">
                    <button class="cart-b add_to_wishlist" id="<?= $product->id; ?>" onclick="addToWishlist(this.id)"><strong><i class="fa baskets fa-shopping-basket"></i> &nbsp;ADD TO WISHLIST</strong></button>
                </li>
            <?php } ?>
        </ul>

        <input type = "hidden" value = "<?= $product->canonical_name; ?>" id="cano_name_<?= $product->id; ?>" name="cano_name">

        <div class="clearfix"></div>

    </div>

</div>
