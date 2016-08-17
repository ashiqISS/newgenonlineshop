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
                                'value' => $data->description,
                                'type' => 'html'
                            ),
                            array(
                                'name' => 'main_image',
                                'value' => function($data) {
                                    if ($data->main_image == "") {
                                        return;
                                    } else {
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $data->id);
                                        return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/uploads/products/' . $folder . '/' . $data->id . '/' . $data->id . '.' . $data->main_image . '" />';
                                    }
                                },
                                'type' => 'raw'
                            ),
                           
                            'gallery_images',
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

            <div class="col-md-3 sidebar ">

                <ul>
                    <li ><a href="<?php echo CommonUrls::merchant_profile(); ?>"> <i class="fa fa-user fa-2x" aria-hidden="true"></i> <span>Profile</span></a></li>
                    <li><a href="<?php echo CommonUrls::add_product(); ?>" > <i class="fa fa-cart-arrow-down  fa-2x" aria-hidden="true"></i> <span>Add product</span></a></li>
                    <li><a href="<?php echo CommonUrls::change_password(); ?>"> <i class="fa fa-unlock-alt fa-2x" aria-hidden="true"></i></i> <span>Change Password</span></a></li>
                    <li><a href="<?php echo CommonUrls::my_products(); ?>"    class="act "> <i class="fa fa-cube fa-2x" aria-hidden="true"></i> <span>My products</span></a></li>
                    <li><a href=""> <i class="fa fa-cc-diners-club  fa-2x" aria-hidden="true"></i><span>Paid Post</span></a></li>

                    <li><a href="<?php echo CommonUrls::featured(); ?>" > <i class="fa fa-picture-o fa-2x" aria-hidden="true"></i> <span>Featured ads </span></a></li>
                    <li><a href="my_sales.php"> <i class="fa fa-line-chart fa-2x" aria-hidden="true"></i> <span>My Sales</span></a></li>
                    <li><a href="payment.php"  > <i class="fa fa-cc-mastercard fa-2x" aria-hidden="true"></i><span>Payment / Payout</span></a></li>
                </ul>

            </div>
        </div>

    </div>
</div>
</section> <!-- end of facial -->


<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>
