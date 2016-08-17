<?php
/* @var $this MerchantDetailsController */
/* @var $model MerchantDetails */
?>
<section class="content-header" style="margin-bottom: .5em">
    <h1>
        MerchantDetails        <small>Update</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseurl.'/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Update MerchantDetails</li>
    </ol>
</section>
&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo Yii::app()->request->baseurl.'/admin.php/users/merchantDetails/admin'; ?>" class='btn  btn-laksyah manage'>Manage Buyer</a>
<section class="content">
    <div class="box box-info">

        <div class="box-body">
            <?php $this->renderPartial('_form', array('model'=>$model,'user_model'=>$user_model)); ?>
        </div>

    </div>

</section><!-- form -->



