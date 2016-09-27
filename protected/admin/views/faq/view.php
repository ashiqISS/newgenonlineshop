<?php
/* @var $this FaqController */
/* @var $model Faq */

$this->breadcrumbs = array(
    'Faqs' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Faq', 'url' => array('index')),
    array('label' => 'Create Faq', 'url' => array('create')),
    array('label' => 'Update Faq', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Faq', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Faq', 'url' => array('admin')),
);
?>

<h1>View Faq #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
//		'id',
//		'ub',
//		'doc',
//		'dou',
        array(
            'name' => 'status',
            'value' => function ($data) {
                    if ($data->status == 1) {
                            return 'Enabled';
                    } elseif ($data->status == '0') {
                            return 'Disabled';
                    } else {
                            return 'Invalid';
                    }
            }
        ),
        'question',
        'answer',
//		'cb',
    ),
));
?>
