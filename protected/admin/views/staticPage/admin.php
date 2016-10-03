<?php
/* @var $this StaticPageController */
/* @var $model StaticPage */
?>

<section class="content-header">
    <h1>
        StaticPage    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">StaticPage</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <a href="<?php echo Yii::app()->request->baseurl . '/admin.php/staticPage/create'; ?>" class='btn  btn-laksyah'>Add New StaticPage</a>
    <div class="col-xs-12 form-page" style="margin-top: .5em;">
        <div class="box">

            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'static-page-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
//                    'id',
                    'category_name',
//                    'parent',
//                    'side_menu',
//                    'header_visibility',
//                    'sort_order',
//                      'has_page',
                    'canonical_name',
//                      'link',
                    'title',
//                    'heading',
//                      'small_content',
//                      'big_content',
//                      'small_image',
//                      'banner',
                    array('name' => 'big_image',
                        'value' => function ($data) {
                            if ($data->big_image != "") {
                                return '<img style="width:100px;height:100px;" src="' . Yii::app()->baseUrl . '/uploads/static/' . $data->id . '/big_image.' . $data->big_image . '">';
                            } else {
                                return '<img style="width:100px;height:100px;" src="' . Yii::app()->getBaseUrl(true) . '/uploads/products/no_image.jpg' . '">';
                            }
                        },
                        'type' => 'raw',
                    ),
                    /*
                      'status',
                      'field_1',
                      'field_2',
                      'field_3',
                      'cb',
                      'ub',
                      'doc',
                      'dou',
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
                ),
            ));
            ?>
        </div>

    </div>


</div>
</section>

