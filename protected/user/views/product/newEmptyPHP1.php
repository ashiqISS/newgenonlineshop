<div class="col-md-4 col-sm-6 col-xs-6" style="width: 28%;">

    <div  style="border: 2px solid #d2d2d2;padding: 10px;text-align: center;">

        <div  style="    border: 2px solid #828181;">

            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Products/Detail/id/<?php echo $data->id; ?>">
                <?php if ($data->main_image == NULL) { ?>
                        <img width="280" height="300" class="safe" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/no-productimage.jpg" />
                        <?php
                } else {
                        ?><div class="img_div_view">
                            <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php
                            echo Yii::app()->Upload->folderName(0, 1000, $data->id)
                            ?>/<?php echo $data->id; ?>/medium.<?php echo $data->main_image; ?>"/></div>
                            <?php
                    }
                    ?></a>
        </div>


        <h4><?php echo $data->product_name; ?></h4>
        <p><?php echo Yii::app()->Currency->convert($data->price); ?></p>


        <a  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Product/Detail/name/<?php echo $data->canonical_name; ?>" style="text-align: right !important;">More >></a>

    </div>


</div>
