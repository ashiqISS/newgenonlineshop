<?php
/* @var $this ContactDetailsController */
/* @var $model ContactDetails */
?>

<section class="content-header">
    <h1>
        ContactDetails    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">ContactDetails</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<!--    <a href="<?php echo Yii::app()->request->baseurl . '/admin.php/contactDetails/create'; ?>" class='btn  btn-laksyah'>Add New ContactDetails</a>-->
    <div class="col-xs-12 form-page" style="margin-top: .5em;">
        <div class="box">

            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'contact-details-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
//                    'id',
                    'company_name',
                    'telephone',
                    'mobile1',
//                    'mobile2',
                    'fax',
                    'email1',
                    /*  'email2',
                      'doc',
                      'dou',
                      'status',
                     */
                    array(
                        'header' => '<font color="#61625D">Edit</font>',
                        'htmlOptions' => array('nowrap' => 'nowrap'),
                        'class' => 'booster.widgets.TbButtonColumn',
                        'template' => '{update}',
                    ),
//                    array(
//                        'header' => '<font color="#61625D">Delete</font>',
//                        'htmlOptions' => array('nowrap' => 'nowrap'),
//                        'class' => 'booster.widgets.TbButtonColumn',
//                        'template' => '{delete}',
//                    ),
//                    array(
//                        'header' => '<font color="#61625D">View</font>',
//                        'htmlOptions' => array('nowrap' => 'nowrap'),
//                        'class' => 'booster.widgets.TbButtonColumn',
//                        'template' => '{view}',
//                    ),
                ),
            ));
            ?>
        </div>

    </div>


</div>
</section>

