<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
<?php echo "?>\n"; ?>
<section class="content-header" style="margin-bottom: .5em">
    <h1>
        <?php echo $this->modelClass; ?>
        <small>Update</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo "<?php echo Yii::app()->request->baseurl.'/site/home'; ?>"; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Update <?php echo $this->modelClass; ?></li>
    </ol>
</section>
&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo "<?php echo Yii::app()->request->baseurl.'/" . $_REQUEST['CrudCode']['controller'] . "/admin'; ?>"; ?>" class='btn  btn-laksyah manage'>Manage <?php echo $this->modelClass; ?></a>
<section class="content">
    <div class="box box-info">

        <div class="box-body">
            <?php echo "<?php \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>

        </div>

    </div>

</section><!-- form -->



