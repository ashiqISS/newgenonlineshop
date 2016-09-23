<?php
/* @var $this NewsletterContentController */
/* @var $model NewsletterContent */
?>

<section class="content-header">
    <h1>
        NewsletterContent    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">NewsletterContent</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <a href="<?php echo Yii::app()->request->baseurl . '/admin.php/newsletterContent/create'; ?>" class='btn  btn-laksyah'>Add New NewsletterContent</a>
    <div class="col-xs-12 form-page" style="margin-top: .5em;">
        <div class="box">

            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'newsletter-content-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
//                    'id',
                    'type',
                    'heading',
                    'subheading',
                    'content',
                    array(
                        'name' => 'image',
                        'value' => function($data) {
                                if ($data->image == "") {
                                        return;
                                } else {
                                        return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/uploads/newsletter/' . $data->id . '.' . $data->image . '" />';
                                }
                        },
                        'type' => 'raw'
                    ),
                    'link',
                    array(
                        'name' => 'status',
                        'filter' => array('1' => 'enable', '0' => 'disable'),
                        'value' => function($data) {
                        if ($data->status == '1') {
                                return 'enable';
                        } elseif ($data->status == '0') {
                                return 'disable';
                        } else {
                                return 'Invalid';
                        }
                },
                    ),
                    /*
                      'status',
                      'doc',
                      'cb',
                      'dou',
                      'ub',
                     */
                    array(
                        'class' => 'booster.widgets.TbButtonColumn',
                        'header' => '<th>Send Newsletter</th><th>Edit</th><th>Delete</th>',
                        'template' => '<td>{send}</td><td>{update}</td><td>{delete}</td>',
                        'buttons' => array(
                            'send' => array(
                                'url' => 'Yii::app()->request->baseUrl."/admin.php/NewsletterContent/EmailSend/id/".$data->id',
                                'label' => '<i class="fa fa-newspaper-o" aria-hidden="true"></i>',
                                'options' => array(
                                    'data-toggle' => 'tooltip',
                                    'title' => 'Send Newsletter',
                                ),
                            ),
                        ),
                    ),
                ),
            ));
            ?>
        </div>

    </div>


</div>
</section>

