<section class="content-header">
    <h1>
        Districts        <small>Manage</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Manage Districts  </li>
    </ol>
</section>
<section class="content">
<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/masters/districts/create'; ?>" class='btn  btn-laksyah manage'>Add Districts</a>
<div class="col-xs-12 form-page" style="margin-top: .5em;">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'districts-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    'country_id',
                    'state_id',
                    'district_name',
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