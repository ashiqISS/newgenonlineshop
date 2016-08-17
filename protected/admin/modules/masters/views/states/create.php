<section class="content-header" style="margin-bottom: .5em">
    <h1>
        States        <small>Create</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Create States  </li>
    </ol>
</section>


&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/masters/states/admin'; ?>" class='btn  btn-laksyah manage'>Manage States</a>
<section class="content">
    <div class="box box-info">

        <div class="box-body">
            <?php $this->renderPartial("_form", array("model" => $model)); ?>
        </div>

    </div>

</section><!-- form -->