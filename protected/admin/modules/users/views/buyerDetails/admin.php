<?php
/* @var $this BuyerDetailsController */
/* @var $model BuyerDetails */
?>

<section class="content-header">
    <h1>
        BuyerDetails    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">BuyerDetails</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <a href="<?php echo Yii::app()->request->baseurl . '/admin.php/users/buyerDetails/create'; ?>" class='btn  btn-laksyah'>Add New BuyerDetails</a>
    <div class="col-xs-12 form-page" style="margin-top: .5em;">
        <div class="box">

            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'id' => 'user-info-grid',
//                'dataProvider' => $dataProvider,
                'dataProvider' => $model->search(),
                'type' => 'bordered condensed hover',
                'filter' => $model,
                'columns' => array(
                    'user_id',
                    'first_name',
                    'last_name',
                    'dob',
                    'gender',
//                    'users.email',
                    array(
                        'name' => 'email',
                        'value' => '$data->users->email',
                    ),
                    array(
                        'name' => 'phone_number',
                        'value' => '$data->users->phone_number',
                    ),
                    array(
                        'name' => 'user_status',
                        'value' => function($data) {
                            if ($data->users->user_status == 1) {
                                return "Activation pending";
                            } elseif ($data->users->user_status == 2) {
                                return "Payment pending";
                            } elseif ($data->users->user_status == 3) {
                                return "Enabled";
                            } elseif ($data->users->user_status == 4) {
                                return "Disabled";
                            } else {
                                return "Invalid";
                            }
                        },
                        'filter' => array('1' => "Activation pending", '2' => "Payment pending", '3' => "Enabled", '4' => "Disabled")
                    ),
//                    array(
//                        'name' => 'user_status',
//                        'value' => '$data->users->user_status',
//                    ),
                    array(
                        'name' => 'last_login',
                        'value' => '$data->users->last_login',
                    ),
//                    'email',
//                    'phone_number',
//                    'user_status',
//                    'last_login',
                    'DOC',
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



            /*
              $this->widget('booster.widgets.TbGridView', array(
              'type' => ' bordered condensed hover',
              'id'=>'buyer-details-grid',
              'dataProvider'=>$model->search(),$user_model->search(),
              'filter'=>$model,$user_model,
              'columns'=>array(
              //            		'id',
              'user_id',
              'first_name',
              'last_name',
              'dob',
              'gender',
              'email',
              'phone_number',
              'user_status',
              'last_login',
              'DOC',
              /*
              'phone_no_2',
              'newsletter',
              'wallet_amt',
              'CB',
              'UB',
              'DOC',
              'DOU',
              'field2',
              'field3',

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
             */
            ?>
        </div>

    </div>


</div>
</section>

