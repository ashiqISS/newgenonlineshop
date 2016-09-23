<section class="banner">

    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">


        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">MY <span class="redish">Products </span></h1>

        </div>

    </div>

</section>

<div class="clearfix"></div>


<section class="facial services">
    <div class="container">



        <div class="heading">


            Product View

        </div>


        <div class="form-group">
            <div class="col-md-9">

                <div class="left-content">

                    <?php
                    $this->widget('zii.widgets.CDetailView', array(
                        'data' => $model,
                        'attributes' => array(
                            array(
                                'name' => 'category_id',
                                'value' => function($data) {
                                    $cats = explode(',', $data->category_id);
                                    $catt = '';
                                    foreach ($cats as $cat) {
                                        unset($_SESSION['category']);
                                        $category = ProductCategory::model()->findByPk($cat);
                                        $catt .= Yii::app()->category->selectCategories($category) . ', ';
                                    }
                                    return $catt;
                                },
                            ),
                            'product_name',
                            'product_code',
                            'brand_id',
                            array(
                                'name' => 'description',
                                'value' => function($data) {
                                    if ($data->description == "") {
                                        return;
                                    } else {
                                        $description = str_replace('background-color: rgb(255, 255, 255)', ' ', $data->description);
                                        return $description;
                                    }
                                },
                                'type' => 'html'
                            ),
                            array(
                                'name' => 'main_image',
                                'value' => function($data) {
                                    if ($data->main_image == "") {
                                        return;
                                    } else {
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $data->id);
                                        return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/uploads/products/' . $folder . '/' . $data->id . '/small.' . $data->main_image . '" />';
                                    }
                                },
                                'type' => 'raw'
                            ),
//                            'gallery_images',
//                                        $dirname = "media/images/iconized/";
//$images = glob($dirname."*.png");
//foreach($images as $image) {
//echo '<img src="'.$image.'" /><br />';
//}
                            array(
                                'name' => 'gallery_images',
                                'value' => function($data) {
                                    if ($data->gallery_images == "") {
                                        return;
                                    } else {
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $data->id);
                                        $folder = $folder . '/gallery';
                                        $images = glob($folder . "*.png");
                                        foreach ($images as $image) {
                                            $img = '<img src="' . $image . '" /><br />';
                                        }
                                        return $img;
//                    return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/uploads/products/' . $folder . '/' . $data->id . '/hover/hover.' . $data->hover_image . '" />';
                                    }
                                },
                                'type' => 'raw'
                            ),
                            array(
                                'name' => 'hover_image',
                                'value' => function($data) {
                                    if ($data->hover_image == "") {
                                        return;
                                    } else {
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $data->id);
                                        return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/uploads/products/' . $folder . '/' . $data->id . '/hover/hover.' . $data->hover_image . '" />';
                                    }
                                },
                                'type' => 'raw'
                            ),
                            'canonical_name',
                            'meta_title',
                            'meta_description',
                            'meta_keywords',
//                            'display_category_name',
                            'price',
                            'wholesale_price',
//                            'is_discount_available',
//                            'discount',
//                            'discount_type',
//                            'discount_rate',
                            'quantity',
//                            'requires_shipping',
//                            'enquiry_sale',
                            'new_from',
                            'new_to',
                            'sale_from',
                            'sale_to',
                            'special_price_from',
                            'special_price_to',
                            'tax',
                            'gift_option',
//                            'stock_availability',
//                            'video_link',
//                            'video',
                            'weight',
                            'weight_class',
                            'status',
//                            'exchange',
                            'search_tag',
                            'related_products',
                            'is_cod_available',
//                            'is_available',
//                            'is_featured',
                            'is_admin_approved',
//                            'CB',
//                            'UB',
                            'DOC',
//                            'DOU',
                        ),
                    ));
                    ?>



                    <div class="clearfix"></div>
                </div>

            </div>

        <?php echo $this->renderPartial('../merchantDetails/_rightMenu'); ?>
        </div>

    </div>
</div>
</section> <!-- end of facial -->


<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>
