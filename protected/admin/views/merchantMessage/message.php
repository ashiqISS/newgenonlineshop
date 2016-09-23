<?php
/* @var $this UserDetailsController */
/* @var $model UserDetails */
/* @var $form CActiveForm */
?>
<style>

    .left{

        background-color: #B1B1CE;
        float:left;
        text-align: left;
        //padding:10px;
        margin-bottom: 10px;
    }
    .right{

        background-color: #C7A9A9;
        float:right;
        text-align: right;
        //padding:10px;
        margin-bottom: 10px;


    }

</style>

<style>
    .table th, td{
        text-align: center;
    }
    .table td{
        text-align: center;
    }
</style>


<div class="page-title">

    <div class="title-env">
        <h1 style="float: left;" class="title">User Details</h1>
        <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Manage User Details</p>
    </div>

    <div class="breadcrumb-env">

        <ol class="breadcrumb bc-1" >
            <li>
                <a href="<?php echo Yii::app()->request->baseurl . '/admin.php/site/home'; ?>"><i class="fa-home"></i>Home</a>
            </li>

            <li class="active">

                <strong>Manage Messages</strong>
            </li>
        </ol>

    </div>

</div>
<?php
//if (isset($_POST['Message'])) {
//        header('Location:' . Yii::app()->request->baseurl . '/admin.php/Message/message/id/' . $id);
//}
?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default ">
            <div class="row">
                <div class="container" style="width:700px;">

                    <?php
                    foreach ($messages as $mes) {
                            $to = $mes->from_to;
                            $date_time = $mes->doc;
                            ?>

                            <div class="col-sm-9 <?php
                            if ($to == 1) {
                                    echo 'left';
                            } else {
                                    ?><?php
                                    echo 'right';
                            }
                            ?>"><p style="color:#2C2E2F;"><?php
                                 if ($mes->from_to == 0) {
                                         echo 'Admin';
                                 } elseif ($mes->from_to == 1) {
                                         $merchant = MerchantDetails::model()->findByAttributes(array('user_id' => $mes->merchant_id));
                                         echo $merchant->fullname;
                                 }
                                 ?></p><h5><?php echo $mes->message; ?></h5><p style="color:#0064CD; text-align:<?php
                                    if ($to == 1) {
                                            echo 'right';
                                    } else {
                                            ?><?php
                                            echo 'left';
                                    }
                                    ?>" ><?php
                                                                                    if ($mes->from_to == 0) {

                                                                                            echo $date_time;
                                                                                    } elseif ($mes->from_to == 1) {
                                                                                            echo $date_time;
                                                                                    }
                                                                                    ?></p></div>

                    <?php } ?>



                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'merchant-message-form',
                        'htmlOptions' => array('class' => 'form-horizontal'),
                        // Please note: When you enable ajax validation, make sure the corresponding
                        // controller action is handling ajax validation correctly.
                        // There is a call to performAjaxValidation() commented in generated controller code.
                        // See class documentation of CActiveForm for details on this.
                        'enableAjaxValidation' => false,
                    ));
                    ?>

                                <!--    <p class="note">Fields with <span class="required">*</span> are required.</p>-->

                    <?php //echo $form->errorSummary($model);                              ?>
                    <br/>

                    <div class="form-group">
                        <?php //echo $form->labelEx($model, 'message', array('class' => 'col-sm-2 control-label'));                            ?>
                        <?php echo $form->textArea($model, 'message', array('rows' => 6, 'cols' => 50, 'class' => 'form-control', 'placeholder' => 'Enter Your Message')); ?>

                        <?php echo $form->error($model, 'message'); ?>
                    </div>

                    <div class="form-group">
                        <label>&nbsp;</label><br/>
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Send', array('class' => 'btn btn-secondary pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
                    </div>

                    <?php $this->endWidget(); ?>
                </div>
            </div>
            <div class="clearfix"></div>
        </div><!-- form -->
    </div>

</div>