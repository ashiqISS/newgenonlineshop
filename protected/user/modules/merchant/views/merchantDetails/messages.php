
<style>
    .messages{
        height: 430px !important;
        overflow: auto;
    }
    .message-right {
        background-color: #fff;
        padding: 12px;
        float: right;
        width: 93%;
        margin-bottom: 10px;
        border:1px solid #ccc;
    }

    .mess-22 {
        float: left;
        width: 90%;
    }

    .mess-1 {
        float: left;
        width: 10%;
    }
    .mess-2 {
        float: right;
        width: 90%;
    }
    .message-left {
        background-color: whitesmoke;
        padding: 12px;
        float: left;
        width: 90%;
        margin-bottom: 10px;
        border:1px solid #ccc;
    }
    img.msg {
        float: left;
        max-width: 100%;
        height: auto;

    }
    img.msgd {
        float: right;
        max-width: 100%;
    }
    span.industry {
        font-size: 12px;
        font-weight: 400;
        font-family: 'Lato', sans-serif;
        text-align: left;
        margin-bottom: 3px;
        margin-top: 3px;
        line-height: 23px;
        color: #333;
        display: block;
    }
    span.dat {
        font-size: 12px;
        font-weight: 400;
        font-family: 'Lato', sans-serif;
        text-align: left;
        margin-bottom: 0px;
        margin-top: 3px;
        line-height: 21px;
        color: #333;
        display: block;
    }
    span.industry2 {
        font-size: 12px;
        font-weight: 400;
        font-family: 'Lato', sans-serif;
        text-align: right;
        margin-bottom: 3px;
        margin-top: 3px;
        line-height: 23px;
        color: #333;
        display: block;
    }
    span.dat2 {
        font-size: 12px;
        font-weight: 400;
        font-family: 'Lato', sans-serif;
        text-align: right;
        margin-bottom: 0px;
        margin-top: 3px;
        line-height: 21px;
        color: #333;
        display: block;
    }
</style>
<section class="banner">

    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">


        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">MY <span class="redish">Account </span></h1>

        </div>

    </div>

</section>

<div class="clearfix"></div>


<section class="facial services">
    <div class="container">



        <div class="heading">


            Messages

        </div>


        <div class="form-group">
            <div class="col-md-9">

                <div class="left-content messages">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'merchant-message-maas-form',
                        // Please note: When you enable ajax validation, make sure the corresponding
                        // controller action is handling ajax validation correctly.
                        // See class documentation of CActiveForm for details on this,
                        // you need to use the performAjaxValidation()-method described there.
                        'enableAjaxValidation' => false,
                    ));
                    ?>

                    <?php echo $form->errorSummary($model); ?>


                    <div class="form-group form-group-full">

                        <?php echo $form->textArea($model, 'message', array('rows' => 3, 'cols' => 10, 'class' => 'form-control', 'placeholder' => 'Type Your Message Here!')); ?>
                    </div>
                    <div class="form-group form-group-full">
                        <?php echo CHtml::submitButton('Submit', array('class' => 'up1 btn')); ?>
                    </div>

                    <?php $this->endWidget(); ?>
                    <?php
                    foreach ($messages as $mes) {
                            $to = $mes->from_to;
                            if ($to == 1) {
                                    ?>
                                    <div class="message-left">
                                        <div class="mess-1">
                                            <img class="msg" src="<?php echo yii::app()->baseUrl ?>/images/merchant.jpg">
                                        </div>
                                        <div class="mess-2">
                                            <span class="industry"><?php echo $mes->message ?>.</span>
                                            <span class="dat"><?php echo $mes->doc ?></span>
                                        </div>
                                    </div>
                            <?php } else if ($to == 0) { ?>
                                    <div class="message-right">

                                        <div class="mess-22">
                                            <span class="industry2"><?php echo $mes->message ?>.</span>
                                            <span class="dat2"><?php echo $mes->doc ?></span>
                                        </div>
                                        <div class="mess-1">
                                            <img class="msgd" src="<?php echo yii::app()->baseUrl ?>/images/admin_.jpg">
                                        </div>

                                    </div>

                                    <?php
                            }
                    }
                    ?>


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
