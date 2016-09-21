<?php
/* @var $this MaterTaxRatesController */
/* @var $model MaterTaxRates */
?>

<section class="content-header">
        <h1>
                Tax Rates    </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">Tax Rates</li>
        </ol>
</section>

<!-- Main content -->
<section class="content">
        <a href="<?php echo Yii::app()->request->baseurl . '/admin.php/masters/materTaxRates/create'; ?>" class='btn  btn-laksyah'>Add New Tax Rates</a>
        <div class="col-xs-12 form-page" style="margin-top: .5em;">
                <div class="box">

                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'mater-tax-rates-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
//                                'id',
                                'tax_name',
                                'tax_rate',
                                array(
                                    'name' => 'type',
                                    'value' => function($data) {
                                            if ($data->type == 1) {
                                                    return 'Percentage';
                                            } else if ($data->type == 1) {
                                                    //return $data->merchant;

                                                    return "Fixed";
                                            }
                                    },
                                    'type' => 'raw'
                                ),
//                                'zone',
//                                'doc',
                                /*
                                  'dou',
                                  'cb',
                                  'ub',
                                  'status',
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

