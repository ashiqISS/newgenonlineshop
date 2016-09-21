<?php
/* @var $this MasterTaxClassController */
/* @var $model MasterTaxClass */
?>

<section class="content-header">
        <h1>
                Tax Class    </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">Tax Class</li>
        </ol>
</section>

<!-- Main content -->
<section class="content">
        <a href="<?php echo Yii::app()->request->baseurl . '/admin.php/masters/masterTaxClass/create'; ?>" class='btn  btn-laksyah'>Add New Tax Class</a>
        <div class="col-xs-12 form-page" style="margin-top: .5em;">
                <div class="box">

                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'master-tax-class-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
//                                'id',
                                'tax_class_name',
                                array(
                                    'name' => 'tax_rate',
                                    'value' => function($data) {
                                            $new_datas = explode(',', $data->tax_rate);
                                            foreach ($new_datas as $new_data) {
                                                    $rate .= MaterTaxRates::model()->findByPk($new_data)->tax_name . ', ';
                                            }
                                            $rate = rtrim($rate, ', ');
                                            return $rate;
                                    },
                                    'type' => 'raw'
                                ),
//                                'doc',
//                                'dou',
//                                'cb',
                                array(
                                    'name' => 'status',
                                    'filter' => array(1 => 'Enabled', 0 => 'Disabled'),
                                    'value' => function($data) {
                                    return $data->status == 1 ? 'Enabled' : 'Disabled';
                            }
                                ),
                                /*
                                  'ub',

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

