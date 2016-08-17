<h1>View MasterBrands #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'brand_name',
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
        array(
            'name' => 'logo',
            'value' => function($data) {
                if ($data->logo == "") {
                    return;
                } else {
                    return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/uploads/products/brands/' . $data->id . '.' . $data->logo . '" />';
                }
            },
            'type' => 'raw'
        ),
        'CB',
        'UB',
        'DOC',
        'DOU',
    ),
));
?>
