<?php
/* @var $this MasterBrandsController */
/* @var $model MasterBrands */
?>

<section class="content-header">
    <h1>
        MasterBrands    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">MasterBrands</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <a href="<?php echo Yii::app()->request->baseurl . '/admin.php/masters/masterBrands/create'; ?>" class='btn  btn-laksyah'>Add New MasterBrands</a>
    <div class="col-xs-12 form-page" style="margin-top: .5em;">
        <div class="box">

            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'master-brands-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
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
                                    $folder = Yii::app()->Upload->folderName(0, 1000, $data->id);
                                    return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/uploads/products/brands/' . $data->id . '.' . $data->logo . '" />';
                                }
                            },
                            'type' => 'raw'
                        ),
                    'CB',
                    'UB',
                    /*
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
                ),
            ));
            ?>
        </div>

    </div>


</div>
</section>

