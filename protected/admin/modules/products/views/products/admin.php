<?php
/* @var $this ProductsController */
/* @var $model Products */
?>

<section class="content-header">
    <h1>
        Products    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseurl . '/admin.php/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Products</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <a href="<?php echo Yii::app()->request->baseurl . '/admin.php/products/Products/create'; ?>" class='btn  btn-laksyah'>Add New Product</a>
    <div class="col-xs-12 form-page" style="margin-top: .5em;">
        <div class="box">
            <div class="box-body table-responsive no-padding">

                <?php
                $this->widget('booster.widgets.TbGridView', array(
                    'type' => ' bordered condensed hover',
                    'id' => 'products-grid',
                    'dataProvider' => $model->search(),
                    'filter' => $model,
                    'columns' => array(
                        'product_name',
                        'product_code',
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
                                $catt = rtrim($catt, ', ,');
                                return $catt;
                            },
                        ),
                        array(
                            'name' => 'main_image',
                            'value' => function($data) {
                                if ($data->main_image == "") {
                                    return;
                                } else {
                                    $folder = Yii::app()->Upload->folderName(0, 1000, $data->id);
//                                    return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/uploads/products/' . $folder . '/' . $data->id . '/' . $data->id . '.' . $data->main_image . '" />';

                                    return '<img width="100" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/products/' . $folder . '/' . $data->id . '/small.' . $data->main_image . '" />';
                                }
                            },
                            'type' => 'raw'
                        ),
//		'brand_id',
                        array('name' => 'merchant_id',
                            'value' => function($data) {
                                $name = MerchantDetails::getMerchantname($data->merchant_id);
                                return $name;
                            },
                        ),
                        'price',
                        'quantity',
                        array(
                            'name' => 'is_admin_approved',
                            'value' => function($data) {

                                if ($data->is_admin_approved == 0) {
                                    return "<span style='color:red; font-weight:bold;'><center>Not Approved</center></span>";
                                } else {
                                    return "<span style='color:green; font-weight:bold;'><center>Approved</center></span>";
                                }
                            },
                            'type' => 'raw'
                        ),
                        array(
                            'name' => 'is_featured',
                            'value' => function($data) {

                                if ($data->is_featured == 0) {
                                    return "<center>-</center>";
                                } else {
                                    return "<span style='color:blue; font-weight:bold;'><center>Featured</center></span>";
                                }
                            },
                            'type' => 'raw'
                        ),
                        /*
                          'merchant_type',
                          'description',
                          'main_image',
                          'gallery_images',
                          'hover_image',
                          'canonical_name',
                          'meta_title',
                          'meta_description',
                          'meta_keywords',
                          'header_visibility',
                          'sort_order',
                          'display_category_name',

                          'wholesale_price',
                          'is_discount_available',
                          'discount',
                          'discount_type',
                          'discount_rate',
                          'requires_shipping',
                          'enquiry_sale',
                          'new_from',
                          'new_to',
                          'sale_from',
                          'sale_to',
                          'special_price_from',
                          'special_price_to',
                          'tax',
                          'gift_option',
                          'stock_availability',
                          'video_link',
                          'video',
                          'weight',
                          'weight_class',
                          'status',
                          'exchange',
                          'search_tag',
                          'related_products',
                          'is_cod_available',
                          'is_available',
                          'is_featured',
                          'is_admin_approved',
                          'CB',
                          'UB',
                          'DOC',
                          'DOU',
                         */
                        array(
                            'header' => '<font color="#61625D">Edit</font>',
                            'htmlOptions' => array('nowrap' => 'nowrap'),
                            'class' => 'booster.widgets.TbButtonColumn',
                            'template' => '{update}',
                        ),
                        array(
                            'header' => '<font color="#61625D">Delete</font>',
                            'htmlOptions' => array('nowrap' => 'nowrap'),
                            'class' => 'booster.widgets.TbButtonColumn',
                            'template' => '{delete}',
                        ),
                        array(
                            'header' => '<font color="#61625D">View</font>',
                            'htmlOptions' => array('nowrap' => 'nowrap'),
                            'class' => 'booster.widgets.TbButtonColumn',
                            'template' => '{view}',
                        ),
                        array(
                            'header' => '<font color="#61625D">Clone</font>',
                            'htmlOptions' => array('nowrap' => 'nowrap'),
                            'class' => 'booster.widgets.TbButtonColumn',
                            'template' => '{approval}',
                            'buttons' => array(
                                'approval' => array(
                                    'url' => 'Yii::app()->request->baseUrl."/admin.php/products/products/cloneProduct/id/".$data->id',
                                    'label' => '<i class="fa fa-clone" aria-hidden="true"></i>',
                                    'options' => array(
                                        'data-toggle' => 'tooltip',
                                        'title' => 'Clone the Product',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ));
                ?>
            </div>

        </div>
    </div>

</section>

