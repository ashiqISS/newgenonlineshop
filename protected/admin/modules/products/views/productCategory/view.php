<br>
<section class="content-header">
    <h1>View Product Category#<?php echo $model->id; ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/ProductCategory/admin'; ?>"><i class="fa fa-dashboard"></i>  Product Category</a></li>
        <li class="active">Manage</li>
    </ol>
</section>

<div class="col-xs-12 form-page">
    <div class="box">
        <br><br>
        <div class="box-body table-responsive no-padding">
            <?php
            $this->widget('booster.widgets.TbDetailView', array(
                'data' => $model,
                'attributes' => array(
                    'category_name',
                    array(
                        'name' => 'parent',
                        'value' => function($data) {
                            $cats = explode(',', $data->parent);
                            $catt = '';
                            foreach ($cats as $cat) {
                                unset($_SESSION['category']);
                                $category = ProductCategory::model()->findByPk($cat);
                                $catt .= Yii::app()->category->selectCategories($category) . ', ';
                            }
                            return $catt;
                        },
                    ),
                    array(
                        'name' => 'image',
                        'value' => function($data) {
                            if ($data->image == "") {
                                return;
                            } else {
                                return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/uploads/products/category/' . $data->id . '.' . $data->image . '" />';
                            }
                        },
                        'type' => 'raw'
                    ),
                    array(
                        'name' => 'description',
                        'value' => $data->description,
                        'type' => 'html'
                    ),
//                    'description',
                    'sort_order',
                    'meta_title',
                    'meta_description',
                    'meta_keywords',
                    'search_tag',
                    'status',
                    'canonical_name',
                    array('name' => 'header_visibility',
                        'value' => function($data) {
                            if ($data->header_visibility == 1) {

                                return "Enabled";
                            } elseif ($data->header_visibility == 0) {
                                return "Disabled";
                            } else {
                                return "Invalid data...";
                            }
                        },
                        'filter' => array('1' => "Enabled", '0' => "disabled")
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</div>