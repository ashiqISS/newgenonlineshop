<div id="products">
    <?php foreach ($products as $product): ?>

        <div class="product">  <!--product class for infinite scrolling to work-->
            <?php echo $this->renderPartial('_product_common_content', array('product' => $product)) ?>
        </div>

    <?php endforeach; ?>
</div>

<!-- end of left -->
