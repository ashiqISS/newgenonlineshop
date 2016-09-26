<?php
if ($product->main_image == NULL) {
    $main_image = Yii::app()->getBaseUrl(true) . '/uploads/products/no_image.jpg';
} else {
    $main_image = Yii::app()->getBaseUrl(true) . '/uploads/products/' . Yii::app()->Upload->folderName(0, 1000, $product->id) . '/' . $product->id . '/medium.' . $product->main_image;
}
?>



<div class="left col col-md-4 col-sm-4 col-xs-6 fill">
    <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Product/Detail/name/<?php echo $product->canonical_name; ?>">

        <div class="wrap-hover-content f1 facial-left-thumbnail thumbnail" style="background: url(<?php echo $main_image; ?>)no-repeat 50% 50%">
            <div class="hover-content">
                <div class="">

                    <img  src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php
                    echo Yii::app()->Upload->folderName(0, 1000, $product->id)
                    ?>/<?php echo $product->id; ?>/hover/hover.<?php echo $product->hover_image; ?>" alt=""/>
                </div>

            </div>

        </div>
    </a>
    <!-- min height set for h2.If dont need pls remove it-->
    <h2>
        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Product/Detail/name/<?php echo $product->canonical_name; ?>">
            <?php echo $product->product_name; ?> 
        </a>
    </h2>
    <?php if (Yii::app()->user->getId()) { ?>
        <h3><?php echo Yii::app()->Currency->convert($product->price); ?></h3>
    <?php }
    else
    {
        echo '<br>';
    }
    ?>

</div>

