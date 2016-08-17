<section class="content-header">
    <h1>
        States        <small>Manage</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Manage States  </li>
    </ol>
</section>
<section class="content">
<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/masters/states/create'; ?>" class='btn  btn-laksyah manage'>Add States</a>
<div class="col-xs-12 form-page" style="margin-top: .5em;">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'states-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'country_id',
                        'value' => '$data->country->country_name',
                        'filter' => CHtml::listData(States::model()->findAll(), 'id', 'country_name')
                    ),
                    'state_name',
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