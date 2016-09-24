<?php
/* @var $this CouponsController */
/* @var $model Coupons */
/* @var $form CActiveForm */
?>

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'coupons-form',
            'htmlOptions' => array('class' => 'form-horizontal'),
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
        ));
        ?>

        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>
        <br/>
        <!--<div class="form-inline">-->
        <!--   <div class="form-group">
           <div class="col-sm-2 control-label">
        <?php echo $form->labelEx($model, 'user_id'); ?>
           </div>
           <div class="col-sm-10">
        <?php echo $form->textField($model, 'user_id', array('size' => 20, 'maxlength' => 20, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'user_id'); ?>
           </div>
       </div>-->

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'cash_limit'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'cash_limit', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'cash_limit'); ?>
                </div>
        </div>

        <!--   <div class="form-group">
       <div class="col-sm-2 control-label">
        <?php echo $form->labelEx($model, 'gift_card_amount'); ?>
       </div>
       <div class="col-sm-10">
        <?php echo $form->textField($model, 'gift_card_amount', array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'gift_card_amount'); ?>
       </div>
   </div>-->

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'code'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'code', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'code'); ?>
                </div>
        </div>

        <!--     <div class="form-group">
         <div class="col-sm-2 control-label">
        <?php echo $form->labelEx($model, 'gift_card_id'); ?>
         </div>
         <div class="col-sm-10">
        <?php echo $form->textField($model, 'gift_card_id', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'gift_card_id'); ?>
         </div>
     </div>-->

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'starting_date'); ?>
                </div>
                <div class="col-sm-10">
                        <?php
                        $from = date('Y') - 2;
                        $to = date('Y') + 20;
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
                            'attribute' => 'starting_date',
                            'value' => 'starting_date',
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
                                'class' => 'form-control',
                                'placeholder' => 'starting_date',
                            ),
                        ));
                        ?><?php echo $form->error($model, 'starting_date'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'expiry_date'); ?>
                </div>
                <div class="col-sm-10">
                        <?php
                        $from = date('Y') - 2;
                        $to = date('Y') + 20;
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
                            'attribute' => 'expiry_date',
                            'value' => 'expiry_date',
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
                                'class' => 'form-control',
                                'placeholder' => 'expiry_date',
                            ),
                        ));
                        ?> <?php echo $form->error($model, 'expiry_date'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'discount'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'discount', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'discount'); ?>
                </div>
        </div>

        <!--    <div class="form-group">
     <div class="col-sm-2 control-label">
        <?php echo $form->labelEx($model, 'discount_type'); ?>
     </div>
     <div class="col-sm-10">
        <?php echo $form->textField($model, 'discount_type', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'discount_type'); ?>
     </div>
 </div>

         <div class="form-group">
     <div class="col-sm-2 control-label">
        <?php echo $form->labelEx($model, 'unique'); ?>
     </div>
     <div class="col-sm-10">
        <?php echo $form->textField($model, 'unique', array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'unique'); ?>
     </div>
 </div>

         <div class="form-group">
     <div class="col-sm-2 control-label">
        <?php echo $form->labelEx($model, 'type'); ?>
     </div>
     <div class="col-sm-10">
        <?php echo $form->textField($model, 'type', array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'type'); ?>
     </div>
 </div>-->

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'status'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'status', array('1' => "Enabled", '0' => "Disabled"), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'status'); ?>
                </div>
        </div>


        <!-- <div class="form-group">
                <div class="col-sm-2 control-label">
        <?php echo $form->labelEx($model, 'product_id'); ?>
                </div>
                <div class="col-sm-10">
        <?php echo CHtml::activeDropDownList($model, 'product_id', CHtml::listData(Products::model()->findAll(), 'id', 'product_name'), array('empty' => '-Select-', 'class' => 'form-control', 'multiple' => true, 'options' => $related_products)); ?>
        <?php echo $form->error($model, 'product_id'); ?>
                </div>
        </div>-->

        <!--</div>-->
        <div class="box-footer">
                <label>&nbsp;</label><br/>
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
        </div>

        <?php $this->endWidget(); ?>

</div><!-- form -->