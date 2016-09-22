<?php
/* @var $this MerchantMessageController */
/* @var $model MerchantMessage */
?>
<section class="content-header" style="margin-bottom: .5em">
    <h1>
        MerchantMessage        <small>Update</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseurl.'/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Update MerchantMessage</li>
    </ol>
</section>
&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo Yii::app()->request->baseurl.'/merchantMessage/admin'; ?>" class='btn  btn-laksyah manage'>Manage MerchantMessage</a>
<section class="content">
    <div class="box box-info">

        <div class="box-body">
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>
        </div>

    </div>

</section><!-- form -->



