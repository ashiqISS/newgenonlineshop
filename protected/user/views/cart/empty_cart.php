<div class="container main_container inner_pages centerd_page">
        <!--<div class="breadcrumbs"> <a href="#">HOME</a> <span>/</span> SHOPPING BAG </div>-->
        <!--<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Success </div>-->
        <div class="row">
                <div class="col-xs-6 row-borderd text-right empty_image"><img src="<?php echo Yii::app()->baseUrl ?>/images/shopping-bag.jpg" alt=""/></div>
                <div class="col-xs-6 empty_message">
                        <h2>Sorry!</h2>
                        <h3>Your cart is empty</h3>
                        <button type="submit" onclick="window.location.href = '<?= Yii::app()->request->baseUrl; ?>/index.php/products'" class="btn  btn-default">CONTINUE SHOPPING</button>
                </div>
        </div>
<br><br>
</div>


<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>