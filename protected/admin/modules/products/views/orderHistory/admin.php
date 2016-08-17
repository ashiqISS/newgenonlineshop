<?php   /*
<div class="page-title">

        <div class="title-env">
                <h1 style="float: left;" class="title">OrderHistory</h1>
                <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Manage OrderHistory</p>
        </div>

        <div class="breadcrumb-env">

                <ol class="breadcrumb bc-1" >
                        <li>
                                <a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa-home"></i>Home</a>
                        </li>

                        <li class="active">

                                <strong>Manage OrderHistory</strong>
                        </li>
                </ol>

        </div>
            

</div>
   */   ?>
<section class="content-header">
    <h1>
        OrderHistory         <small>Manage</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/OrderHistory/admin'; ?>"><i class="fa fa-dashboard"></i>  OrderHistory</a></li>
        <li class="active">Manage</li>
    </ol>
</section>

<div class="row">


        <div class="col-sm-12">

<!--                <a class="btn  btn-success manage" href="<?php echo Yii::app()->request->baseurl . '/admin.php/products/OrderHistory/create'; ?>" id="add-note">
                        <i class="fa fa-pencil"></i>
                        <span>Add OrderHistory</span>
                </a>-->
                <div class="panel panel-default">
                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'order-history-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
                                'id',
                                'order_id',
                                'order_status_comment',
                                'order_status',
                                'shipping_type',
                                'tracking_id',
                                /*
                                  'date',
                                  'status',
                                  'cb',
                                  'ub',
                                 */
                                 array(
                        'htmlOptions' => array('nowrap' => 'nowrap'),
                        'class' => 'booster.widgets.TbButtonColumn',
                        'template' => '{delete}',
                    ),
                                 array(
                        'htmlOptions' => array('nowrap' => 'nowrap'),
                        'class' => 'booster.widgets.TbButtonColumn',
                        'template' => '{delete}',
                    ),
                                array(
                                    'htmlOptions' => array('nowrap' => 'nowrap'),
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'template' => '{update}{delete}',
                                ),
                            ),
                        ));
                        ?>
                </div>

        </div>


</div>

