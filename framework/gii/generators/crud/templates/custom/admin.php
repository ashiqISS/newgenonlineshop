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

<section class="content-header">
    <h1>
        <?php echo $this->modelClass; ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo "<?php echo Yii::app()->request->baseurl.'/site/home'; ?>"; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active"><?php echo $this->modelClass; ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <a href="<?php echo "<?php echo Yii::app()->request->baseurl.'/" . $_REQUEST['CrudCode']['controller'] . "/create'; ?>"; ?>" class='btn  btn-laksyah'>Add New <?php echo $this->modelClass; ?></a>
    <div class="col-xs-12 form-page" style="margin-top: .5em;">
        <div class="box">

            <?php echo "<?php"; ?> $this->widget('booster.widgets.TbGridView', array(
            'type' => ' bordered condensed hover',
            'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
            'dataProvider'=>$model->search(),
            'filter'=>$model,
            'columns'=>array(
            <?php
            $count = 0;
            foreach ($this->tableSchema->columns as $column) {
                if (++$count == 7)
                    echo "\t\t/*\n";
                echo "\t\t'" . $column->name . "',\n";
            }
            if ($count >= 7)
                echo "\t\t*/\n";
            ?>
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

