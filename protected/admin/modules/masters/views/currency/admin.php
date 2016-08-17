<section class="content-header">
    <h1>
        Currency

    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active"> Currency</li>
    </ol>
</section>
<section class="content">
<a href="<?php echo Yii::app()->request->baseurl . '/admin.php/masters/currency/create'; ?>" class='btn  btn-laksyah manage'>Add Currency</a>

<div class="col-xs-12 form-page" style="margin-top: .5em;">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'currency-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    //'id',
                    'country',
                    'currency',
                    'currency_code',
                    'symbol',
                    'rate',
                     array(
                            'name' => 'image',
                            'value' => function($data) {
                                if ($data->image == "") {
                                    return;
                                } else {
                                    return '<img width="40" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . "/uploads/currency/" . $data->id . "." . $data->image . '" />';
                                }
                            },
                            'type' => 'raw'
                        ),
                    /*
                      'image',
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