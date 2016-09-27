<?php
/* @var $this FaqController */
/* @var $model Faq */
?>

<section class="content-header">
    <h1>
        Faq    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Faq</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <a href="<?php echo Yii::app()->request->baseurl . '/admin.php/faq/create'; ?>" class='btn  btn-laksyah'>Add New Faq</a>
    <div class="col-xs-12 form-page" style="margin-top: .5em;">
        <div class="box">

            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'faq-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
//                    'id',
//                    'ub',
//                    'doc',
//                    'dou',
                    'question',
                    'answer',
                    array(
                        'name' => 'status',
                        'filter' => array('1' => 'Enabled', '0' => 'Disabled'),
                        'value' => function ($data) {
                        if ($data->status == 1) {
                                return 'Enabled';
                        } elseif ($data->status == '0') {
                                return 'Disabled';
                        } else {
                                return 'Invalid';
                        }
                }
                    ),
                    /*
                      'cb',
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

