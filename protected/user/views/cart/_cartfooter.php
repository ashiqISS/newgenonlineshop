<div class="sub_total">
        <div class="pull-left">ORDER SUB TOTAL</div>
        <div class="pull-right"><?php echo Yii::app()->Currency->convert($subtotoal); ?></div>
        <div class="clearfix"></div>
</div>
<a class="btn-dark btn-full" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/my-cart">VIEW SHOPPING BAG / CHECKOUT</a>
<div class="text-center"><a class="btn-continue" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/products">CONTINUE SHOPPING</a></div>