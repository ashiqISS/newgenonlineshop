<?php
if ($data->main_image == NULL) {
    $main_image = Yii::app()->request->baseUrl . '/uploads/products/no-productimage.jpg';
} else {
    $main_image = Yii::app()->request->baseUrl . '/uploads/products/' . Yii::app()->Upload->folderName(0, 1000, $data->id) . '/' . $data->id . '/medium.' . $data->main_image;
}
?>

<div class="left col col-md-34 col-sm-4 col-xs-6 fill">
    <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Product/Detail/name/<?php echo $data->canonical_name; ?>">
        <div class="wrap-hover-content f3 facial-left-thumbnail thumbnail" style="background: url(<?php echo $main_image; ?>)no-repeat 50% 50%">
            <div class="hover-content">
                <div class="">
                    <?php if ($data->main_image == NULL) { ?>
                        <img width="280" height="300" class="safe" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/no-productimage.jpg" />
                        <?php
                    } else {
                        ?><div class="img_div_view">
                            <img  src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php
                            echo Yii::app()->Upload->folderName(0, 1000, $data->id)
                            ?>/<?php echo $data->id; ?>/hover/hover.<?php echo $data->hover_image; ?>" alt=""/></div>
                            <?php
                        }
                        ?>
                    <p><?= $data->product_name; ?></p>
                </div>
            </div>
        </div>
        <!--   min height set for h2.If dont need pls remove it-->
        <h2><?= $data->product_name; ?></h2>
        <h3><?php echo Yii::app()->Currency->convert($data->price); ?></h3>
    </a>
</div> <!-- end of left -->

<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>