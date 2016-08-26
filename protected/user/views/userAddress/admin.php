<?php
/* @var $this UserAddressController */
/* @var $model UserAddress */
?>

<section class="content-header">
    <h1>
        UserAddress    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseurl.'/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">UserAddress</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <a href="<?php echo Yii::app()->request->baseurl.'/userAddress/create'; ?>" class='btn  btn-laksyah'>Add New UserAddress</a>
    <div class="col-xs-12 form-page" style="margin-top: .5em;">
        <div class="box">

            <?php $this->widget('booster.widgets.TbGridView', array(
            'type' => ' bordered condensed hover',
            'id'=>'user-address-grid',
            'dataProvider'=>$model->search(),
            'filter'=>$model,
            'columns'=>array(
            		'id',
		'userid',
		'first_name',
		'last_name',
		'company',
		'contact_number',
		/*
		'address_1',
		'address_2',
		'city',
		'district',
		'postcode',
		'country',
		'state',
		'default_billing_address',
		'default_shipping_address',
		'CB',
		'UB',
		'DOC',
		'DOU',
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
            )); ?>
        </div>

    </div>


</div>
</section>

