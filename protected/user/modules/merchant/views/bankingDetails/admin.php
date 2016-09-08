<?php
/* @var $this BankingDetailsController */
/* @var $model BankingDetails */
?>

<section class="content-header">
    <h1>
        BankingDetails    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseurl.'/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">BankingDetails</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <a href="<?php echo Yii::app()->request->baseurl.'/bankingDetails/create'; ?>" class='btn  btn-laksyah'>Add New BankingDetails</a>
    <div class="col-xs-12 form-page" style="margin-top: .5em;">
        <div class="box">

            <?php $this->widget('booster.widgets.TbGridView', array(
            'type' => ' bordered condensed hover',
            'id'=>'banking-details-grid',
            'dataProvider'=>$model->search(),
            'filter'=>$model,
            'columns'=>array(
            		'id',
		'user_id',
		'account_type',
		'account_holder_name',
		'account_number',
		'bank_name',
		/*
		'ifsc',
		'paypal_id',
		'email',
		'DOC',
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

