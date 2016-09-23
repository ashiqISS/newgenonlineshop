<section class="banner">

    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">


        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">Add <span class="redish">Product </span></h1>

        </div>

    </div>

</section>
<div class="clearfix"></div>


<section class="facial services">
    <div class="container">
        <div class="row">


            <div class="heading">


                your personal details

            </div>


            <div class="row">
                <div class="col-md-9">

                    <div class="left-content">

                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <fieldset>

                                <div class="form-group required mrg">

                                    <!--                                    <div class="col-sm-12">
                                                                            <div class="col-sm-2 col-xs-2 zeros">
                                                                                <label for="textinput" class="control-label">Ad title</label>
                                                                            </div>

                                                                            <div class="col-sm-1 col-xs-1 zeros">
                                                                                <label for="textinput" class="control-label">:</label>
                                                                            </div>

                                                                            <div class="col-sm-6">

                                                                                <input type="text" name="Meta keyword" value="" placeholder="Meta keyword" id="input-firstname" class="form-control input-fldd" vk_11acd="subscribed">
                                                                            </div>


                                                                        </div>-->

                                    <?php
                                    $form = $this->beginWidget('CActiveForm', array(
                                        'id' => 'ad-payment-adPayment-form',
                                        'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                        // Please note: When you enable ajax validation, make sure the corresponding
                                        // controller action is handling ajax validation correctly.
                                        // See class documentation of CActiveForm for details on this,
                                        // you need to use the performAjaxValidation()-method described there.
                                        'enableAjaxValidation' => false,
                                    ));
                                    ?>
                                    <div class="flash-success">
                                        <?php echo Yii::app()->user->getFlash('paid'); ?>
                                    </div>

                                    <?php echo $form->errorSummary($model); ?>
                                    <div class="col-sm-12">

                                        <div class="col-sm-2 col-xs-2 zeros">
                                            <label for="textinput" class="control-label">Ad Title</label>
                                        </div>

                                        <div class="col-sm-1 col-xs-1 zeros">
                                            <label for="textinput" class="control-label">:</label>
                                        </div>

                                        <div class="col-sm-6">
                                            <?php echo $form->textField($model, 'title', array('class' => 'form-control input-fldd')); ?>
                                            <!--<input type="file" class="filestyle form-control input-fldd" data-icon="false">-->
                                        </div>
                                        <?php echo $form->error($model, 'title'); ?>
                                    </div>
                                    <div class="form-group required mrg">

                                        <div class="col-sm-12">

                                            <div class="col-sm-2 col-xs-2 zeros">
                                                <label for="textinput" class="control-label">Ad Image</label>
                                            </div>

                                            <div class="col-sm-1 col-xs-1 zeros">
                                                <label for="textinput" class="control-label">:</label>
                                            </div>

                                            <div class="col-sm-6">
                                                <?php echo $form->fileField($model, 'image', array('class' => 'filestyle form-control input-fldd')); ?>
                                            </div>
                                            <?php echo $form->error($model, 'image'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group required mrg">

                                        <div class="col-sm-12">

                                            <div class="col-sm-2 col-xs-2 zeros">
                                                <label for="textinput" class="control-label">Location</label>
                                            </div>

                                            <div class="col-sm-1 col-xs-1 zeros">
                                                <label for="textinput" class="control-label">:</label>
                                            </div>

                                            <div class="col-sm-6">
                                                <?php
                                                echo $form->dropDownList($model, 'position', CHtml::listData(MasterAdLocation::model()->findAll(), 'id', 'ad_location'), array('class' => 'form-control input-fldd form-select', 'empty' => 'Select'));
                                                ?>
                                            </div>
                                            <?php echo $form->error($model, 'position'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group required mrg">

                                        <div class="col-sm-12">

                                            <div class="col-sm-2 col-xs-2 zeros">
                                                <label for="textinput" class="control-label">Display From</label>
                                            </div>

                                            <div class="col-sm-1 col-xs-1 zeros">
                                                <label for="textinput" class="control-label">:</label>
                                            </div>

                                            <div class="col-sm-6">
                                                <?php
                                                $from = date('Y') - 2;
                                                $to = date('Y') + 20;
                                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                    'model' => $model,
                                                    'attribute' => 'display_from',
                                                    'value' => 'display_from',
                                                    'options' => array(
                                                        'dateFormat' => 'dd-mm-yy',
                                                        'changeYear' => true, // can change year
                                                        'changeMonth' => true, // can change month
                                                        'yearRange' => $from . ':' . $to, // range of year
                                                        'showButtonPanel' => true, // show button panel
                                                    ),
                                                    'htmlOptions' => array(
                                                        'size' => '10', // textField size
                                                        'maxlength' => '10', // textField maxlength
                                                        'class' => 'form-set',
                                                    ),
                                                ));
                                                ?>
                                            </div>
                                            <?php echo $form->error($model, 'display_from'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group required mrg">

                                        <div class="col-sm-12">

                                            <div class="col-sm-2 col-xs-2 zeros">
                                                <label for="textinput" class="control-label">Display To</label>
                                            </div>

                                            <div class="col-sm-1 col-xs-1 zeros">
                                                <label for="textinput" class="control-label">:</label>
                                            </div>

                                            <div class="col-sm-6">
                                                <?php
                                                $from = date('Y') - 2;
                                                $to = date('Y') + 20;
                                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                    'model' => $model,
                                                    'attribute' => 'display_to',
                                                    'value' => 'display_to',
                                                    'options' => array(
                                                        'dateFormat' => 'dd-mm-yy',
                                                        'changeYear' => true, // can change year
                                                        'changeMonth' => true, // can change month
                                                        'yearRange' => $from . ':' . $to, // range of year
                                                        'showButtonPanel' => true, // show button panel
                                                    ),
                                                    'htmlOptions' => array(
                                                        'size' => '10', // textField size
                                                        'maxlength' => '10', // textField maxlength
                                                        'class' => 'form-set',
                                                    ),
                                                ));
                                                ?>
                                            </div>
                                            <?php echo $form->error($model, 'display_to'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group required mrg">

                                        <div class="col-sm-12">

                                            <div class="col-sm-2 col-xs-2 zeros">
                                                <label for="textinput" class="control-label">Ad Link</label>
                                            </div>

                                            <div class="col-sm-1 col-xs-1 zeros">
                                                <label for="textinput" class="control-label">:</label>
                                            </div>

                                            <div class="col-sm-6">
                                                <?php echo $form->textField($model, 'link', array('class' => 'form-control input-fldd')); ?>
                                            </div>
                                            <?php echo $form->error($model, 'link'); ?>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <?php echo CHtml::submitButton('Submit', array("class" => "btn btn-primary btn-lg bt_up2")); ?>
                                        <!--<input type="file" class="filestyle form-control input-fldd" data-icon="false">-->
                                    </div>


                                    <?php $this->endWidget(); ?>
                                </div><!-- form -->



                            </fieldset>



                            <!--                            <div class="buttons clearfix">


                                                             Button trigger modal
                                                            <button type="button" class="btn btn-primary btn-lg bt_up2" data-toggle="modal" data-target="#myModal">
                                                                request
                                                            </button>

                                                             Modal
                                                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                                                        </div>
                                                                        <div class="modal-body ppp">
                                                                            <p>You will receive the cost soon to the soon to the registered mail id check ok your mail for details </p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default bt_up" data-dismiss="modal">Close</button>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>-->



                        </form>



                        <div class="clearfix"></div>
                    </div>

                </div>

             <?php echo $this->renderPartial('_rightMenu'); ?>
            </div>













        </div>
    </div>
</section> <!-- end of facial -->




<!-- end of container -->





<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>

