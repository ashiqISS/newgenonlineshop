<section class="content-header">
    <h1>
        Weight Class         <small>Manage</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Manage Weight Class   </li>
    </ol>
</section>
<section class="content">
<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/masters/weightClass/create'; ?>" class='btn  btn-laksyah manage'>Add Weight Class</a>
<div class="col-xs-12 form-page" style="margin-top: .5em;">
    <div class="box">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'weight-class-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    'title',
                    'unit',
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

</section>