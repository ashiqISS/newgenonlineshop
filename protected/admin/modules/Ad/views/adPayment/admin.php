<?php
/* @var $this AdPaymentController */
/* @var $model AdPayment */
?>

<section class="content-header">
    <h1>
        AdPayment    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseurl . '/admin.php/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">AdPayment</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <a href="<?php echo Yii::app()->request->baseurl . '/admin.php/Ad/adPayment/create'; ?>" class='btn  btn-laksyah'>Add New AdPayment</a>
    <div class="col-xs-12 form-page" style="margin-top: .5em;">
        <div class="box">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'ad-payment-grid',
                'dataProvider' => $model->search_2(),
                'filter' => $model,
                'columns' => array(
//                                'id',
                    array('name' => 'position',
                        'value' => function($data) {
                                return $data->position0->ad_location;
                        },
                        'filter' => CHtml::listData(MasterAdLocation::model()->findAll(array('condition' => 'id in (select position from ad_payment)')), 'id', 'ad_location'),
                    ),
                    array('name' => 'image',
                        'value' => function ($data) {
                                $folder = Yii::app()->Upload->folderName(0, 1000, $data->id);
                                return '<img style="width:100px;height:100px;" src="' . yii::app()->baseUrl . '/uploads/ads/' . $folder . '/' . $data->id . '/small.' . $data->image . '">';
                        },
                        'type' => 'raw'),
                    array('name' => 'vendor_name',
                        'value' => function($data) {
                                return $data->vendorName->first_name;
                        },
                        'filter' => CHtml::listData(MerchantDetails::model()->findAll(array('condition' => 'id in (select vendor_name from ad_payment)')), 'id', 'fullname'),
                    ),
//                    'sort_order',
                    'display_from',
                    'display_to',
//                    'payment_status',
                    /*
                      'cb',
                      'doc',
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
                    array(
                        'header' => '<font color="#61625D">Approve</font>',
                        'htmlOptions' => array('nowrap' => 'nowrap'),
                        'class' => 'booster.widgets.TbButtonColumn',
                        'template' => '{Approved}{Not Approved}',
                        'buttons' => array
                            (
                            'Approved' => array
                                (
                                'url' => 'Yii::app()->createUrl("/Ad/adPayment/notApprove", array("id"=>$data->id))',
                                'label' => '<i class="fa fa-thumbs-o-up" style="font-size:20px;padding:2px;" aria-hidden="true"></i>',
                                'visible' => '$data->admin_approve == 1',
                                'options' => array(
                                    'data-toggle' => 'tooltip',
                                    'title' => 'Approved'
                                ),
                            ),
                            'Not Approved' => array
                                (
                                'url' => 'Yii::app()->createUrl("/Ad/adPayment/Approve", array("id"=>$data->id))',
                                'label' => '<i class="fa fa-thumbs-o-down" style="font-size:20px;padding:2px;" aria-hidden="true"></i>',
                                'visible' => '$data->admin_approve == 0',
                                'options' => array(
                                    'data-toggle' => 'tooltip',
                                    'title' => 'Not Approved'
                                ),
                            ),
//                            'user' => array
//                                (
//                                'url' => 'Yii::app()->createUrl("/user/UserDetails/admin/user_approval/".$data->user_id)',
//                                'label' => '<i class="fa fa-user" style="font-size:20px;padding:2px;" aria-hidden="true"></i>',
//                                'options' => array(
//                                    'data-toggle' => 'tooltip',
//                                    'title' => 'User Detail'
//                                ),
//                            ),
                        ),
                    ),
                ),
            ));
            ?>
        </div>

    </div>


</div>
</section>

