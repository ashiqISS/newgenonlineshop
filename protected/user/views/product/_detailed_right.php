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
            <a href="#descriptionTab" style="color: #337ab7;float: right;" id="seeLink"> See Full description</a>

        </p>
        <?php if (Yii::app()->user->getId()) { ?>

            <h3><?php echo Yii::app()->Discount->Discount($product); ?></h3>
            <span class="extax">Ex Tax : <?php echo Yii::app()->Discount->extax($product); ?></span>
            <div class="row" style="padding-left: 1em;">
               
                <h4 style="">Wholesale Price : <?php echo Yii::app()->Currency->convert($product->wholesale_price); ?> </h4>
                <h5> Wholesale Quantity : <?= $product->wholesale_quantity ?> </h5>
            
            </div>
        <?php } ?>

        <div class="product_quantity" style="padding-bottom: 1em;">

            <div class="qunatity">
                <?php
//                $product->quantity = 0;
                if ($product->quantity != 0) {
                    ?>
                    <table>
                        <tr>
                            <td style="border-bottom: none;"><h4 style="margin-top: 20px;">Quantity</h4></td>
                            <td style="vertical-align: top;border-bottom: none;">

                                &nbsp;&nbsp;    <select class="qty" >
                                    <?php foreach (range(1, $product->quantity) as $number) { ?>
                                        <option value="<?= $number ?>"><?= $number ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <?php
                } else {
                    ?>
                    <label style="color: red;font-size: 18px;">  Out Of stock </label>
                    <?php
                }
                ?>

            </div>
        </div>
        <?php if (Yii::app()->user->getId()) { ?>
            <ul>
                <?php if ($product->quantity != 0) { ?>
                    <li style="display: inline-block;padding-right: 1em;">
                        <button class="cart-b add_to_cart" style="padding-right: 18px;padding-left: 18px;" id="<?= $product->id; ?>" ><strong><i class="fa baskets fa-shopping-basket"></i> &nbsp;ADD TO CART</strong></button>
                    </li>
                <?php } ?>
                <li style="display: inline-block;">
                    <button class="cart-b add_to_wishlist" id="<?= $product->id; ?>" onclick="addToWishlist(this.id)"><strong><i class="fa baskets fa-shopping-basket"></i> &nbsp;ADD TO WISHLIST</strong></button>
                </li>

            </ul>
            <?php
        } else {
            ?>
            <a class="edit-btn" href="/newgenonlineshop/user.php/login" style="border-radius: 0;background-color: #dc9780 !important;">Login to see price</a>
            <?php
        }
        ?>

        <input type = "hidden" value = "<?= $product->canonical_name; ?>" id="cano_name_<?= $product->id; ?>" name="cano_name">

        <div class="clearfix"></div>

    </div>

</div>

<script>
    $('#seeLink').click(function () {
        $('#myTabs a[href="#productDesc"]').tab('show');
    });
</script>