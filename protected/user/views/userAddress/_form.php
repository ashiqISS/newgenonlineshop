
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-address-form',
        'htmlOptions' => array('class' => 'form-horizontal'),
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <!--<p class="note">Fields with <span class="required">*</span> are required.</p>-->

    <?php // echo $form->errorSummary($model); ?>
    <br/>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'first_name'); ?><br>
                <?php echo $form->textField($model, 'first_name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'first_name'); ?>

            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'last_name'); ?><br>
                <?php echo $form->textField($model, 'last_name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'last_name'); ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'company'); ?><br>
                <?php echo $form->textField($model, 'company', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'company'); ?>

            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'contact_number'); ?>
                <?php echo $form->textField($model, 'contact_number', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'contact_number'); ?>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'address_1'); ?><br>
                <?php echo $form->textArea($model, 'address_1', array('rows' => 3, 'cols' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'address_1'); ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'address_2'); ?><br>
                <?php echo $form->textArea($model, 'address_2', array('rows' => 3, 'cols' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'address_2'); ?>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'city'); ?>
                <?php echo $form->textField($model, 'city', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'city'); ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'postcode'); ?>
                <?php echo $form->textField($model, 'postcode', array('size' => 60, 'maxlength' => 111, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'postcode'); ?>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'country'); ?>
                <?php // echo CHtml::activeDropDownList($model, 'country', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
                <?php
                echo CHtml::activeDropDownList($model, 'country', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name'), array('empty' => '--Select--',
                    'class' => 'form-control',
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => Yii::app()->createUrl('/UserAddress/loadStates'), //or $this->createUrl('loadcities') if '$this' extends CController
                        'update' => '#UserAddress_state', //or 'success' => 'function(data){...handle the data in the way you want...}',
                        'data' => array('UserAddress_country' => 'js:this.value'),
                    )
                ));
                ?>
                <?php echo $form->error($model, 'country'); ?>

            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'state'); ?>
                <?php
                if ($model->state == '') {
                    echo CHtml::activeDropDownList($model, 'state', array(), array('empty' => '--Select--',
                        'class' => 'form-control',
                        'ajax' => array(
                            'type' => 'POST',
                            'url' => Yii::app()->createUrl('/UserAddress/loadDistricts'), //or $this->createUrl('loadcities') if '$this' extends CController
                            'update' => '#UserAddress_district', //or 'success' => 'function(data){...handle the data in the way you want...}',
                            'data' => array('UserAddress_state' => 'js:this.value'),
                        )
                    ));
                } else {
                    $data = States::model()->findAllByAttributes(array(
                        'country_id' => $model->country), array("order" => "state_name"));
                    $data = CHtml::listData($data, 'Id', 'state_name');
                    echo CHtml::activeDropDownList($model, 'state', $data, array('empty' => '--Select--',
                        'class' => 'form-control',
                        'selected' => $model->state,
                        'ajax' => array(
                            'type' => 'POST',
                            'url' => Yii::app()->createUrl('/UserAddress/loadDistricts'), //or $this->createUrl('loadcities') if '$this' extends CController
                            'update' => '#UserAddress_district', //or 'success' => 'function(data){...handle the data in the way you want...}',
                            'data' => array('UserAddress_state' => 'js:this.value'),
                        )
                    ));
                }
                ?>
                <?php echo $form->error($model, 'state'); ?>

            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'district'); ?>
                <?php
                if ($model->district == '') {
                    echo CHtml::activeDropDownList($model, 'district', array(), array('empty' => '--Select--', 'class' => 'form-control'));
                } else {

                    $data_d = Districts::model()->findAllByAttributes(array(
                        'state_id' => $model->state), array("order" => "district_name"));
                    $data_d = CHtml::listData($data_d, 'Id', 'district_name');
                    echo CHtml::activeDropDownList($model, 'district', $data_d, array('empty' => '--Select--', 'selected' => $model->district, 'class' => 'form-control'));
                }
                ?>
                <?php echo $form->error($model, 'district'); ?>

            </div>
        </div>

    </div>

    <div class="row" style="padding-top: 1em;">
        <div class="col-sm-6">
            <div class="form-group">                
                <?php echo $form->checkBox($model, 'default_billing_address'); ?>
                Set as default billing address
                <?php // echo $form->labelEx($model, 'default_billing_address'); ?>
                <?php echo $form->error($model, 'default_billing_address'); ?>

            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">                
                <?php echo $form->checkBox($model, 'default_shipping_address'); ?>
                Set as default shipping address
                <?php // echo $form->labelEx($model, 'default_shipping_address'); ?>
                <?php echo $form->error($model, 'default_shipping_address'); ?>
            </div>
        </div>
    </div>



    <!--</div>-->
    <div class="box-footer">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->