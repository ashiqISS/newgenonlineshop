<?php
/* @var $this NewsletterContentController */
/* @var $model NewsletterContent */
?>

<section class="content-header" style="margin-bottom: .5em">
    <h1>
        NewsletterContent        <small>Create</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>NewsletterContent</a></li>
        <li class="active">Create</li>
    </ol>
</section>
&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo Yii::app()->request->baseurl . '/admin.php/newsletterContent/admin'; ?>" class='btn  btn-laksyah manage'>Manage NewsletterContent</a>
<section class="content">

    <div class="box box-info">

        <div class="box-body">
            <?php $this->renderPartial('_form', array('model' => $model)); ?>        </div>
    </div>
</section>
