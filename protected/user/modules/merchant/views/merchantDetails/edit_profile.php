<section class="banner">
    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">
        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">My <span class="redish">Account </span></h1>
        </div>
    </div>
</section>

<div class="clearfix"></div>

<section class="facial services">
    <div class="container">
        <div class="heading">
            your personal details
        </div>

        <div class="row">
            <div class="col-md-9">
                <div class="left-content">
                    <div class="strip-padding">
                        <div class="row">

                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'merchant-details-form',
                                'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
                                'enableAjaxValidation' => false,
                            ));
                            ?>

                            <?php echo $form->errorSummary(array($model, $user_model)); ?>
                            <br/>

                            <div class="form-group">
                                <div class="col-sm-2 control-label"> 
                                    <?php echo $form->labelEx($model, 'fullname'); ?>
                                </div>
                                <div class="col-sm-10">
                                    <?php echo $form->textField($model, 'fullname', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'fullname'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-2 control-label"> 
                                    <?php echo $form->labelEx($model, 'product_categories'); ?>
                                </div>
                                <div class="col-sm-10">
                                    <?php
                                    if (!$model->isNewRecord) {
                                        if (!empty($model->product_categories)) {
                                            $ids = explode(',', $model->product_categories);
                                            $selected = array();
                                            foreach ($ids as $id) {
                                                $selected[$id] = array('selected' => true);
                                            }
                                        }
                                    }
                                    ?>
                                    <?php echo $form->hiddenField($model, 'product_categories'); ?>

                                    <?php
                                    $this->widget('application.admin.components.CatSelect', array(
                                        'type' => 'category',
                                        'field_val' => $model->product_categories,
                                        'category_tag_id' => 'MerchantDetails_product_categories', /* id of hidden field */
                                        'form_id' => 'merchant-details-form',
                                    ));
                                    ?>
                                    <?php echo $form->error($model, 'product_categories'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-2 control-label"> 
                                    <?php echo $form->labelEx($model, 'merchant_type'); ?>
                                </div>
                                <div class="col-sm-10">
                                    <?php echo $form->dropDownList($model, 'merchant_type', array('2' => "Wholesale", '1' => "Retail", '0' => "Default"), array('empty' => 'Select', 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'merchant_type'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-2 control-label"> 
                                    <?php echo $form->labelEx($model, 'shop_name'); ?>
                                </div>
                                <div class="col-sm-10">
                                    <?php echo $form->textField($model, 'shop_name', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'shop_name'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-2 control-label"> 
                                    <?php echo $form->labelEx($model, 'shop_logo'); ?>
                                </div>
                                <div class="col-sm-10"> 
                                    <?php echo $form->fileField($model, 'shop_logo', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                                    <?php
                                    if ($model->shop_logo != '') {
                                        echo '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/users/merchants/shop_logo/' . $model->id . '.' . $model->shop_logo . '" />';
                                    }
                                    ?>
                                    <?php echo $form->error($model, 'shop_logo'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-2 control-label"> 
                                    <?php echo $form->labelEx($model, 'shop_banner'); ?>
                                </div>
                                <div class="col-sm-10">
                                    <?php echo $form->fileField($model, 'shop_banner', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                                    <?php
                                    if ($model->shop_banner != '') {
                                        echo '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/users/merchants/shop_banner/' . $model->id . '.' . $model->shop_banner . '" />';
                                    }
                                    ?>
                                    <?php echo $form->error($model, 'shop_banner'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-2 control-label"> 
                                    <?php echo $form->labelEx($model, 'address'); ?>
                                </div>
                                <div class="col-sm-10">
                                    <?php echo $form->textArea($model, 'address', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'address'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-2 control-label"> 
                                    <?php echo $form->labelEx($model, 'country'); ?>
                                </div>
                                <div class="col-sm-10">          
                                    <?php
                                    echo CHtml::activeDropDownList($model, 'country', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name'), array('empty' => '--Select--',
                                        'class' => 'form-control',
                                        'ajax' => array(
                                            'type' => 'POST',
                                            'url' => Yii::app()->createUrl('/merchant/MerchantDetails/loadStates'), //or $this->createUrl('loadcities') if '$this' extends CController
                                            'update' => '#MerchantDetails_state', //or 'success' => 'function(data){...handle the data in the way you want...}',
                                            'data' => array('MerchantDetails_country' => 'js:this.value'),
                                        )
                                    ));
                                    ?>
                                    <?php echo $form->error($model, 'country'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-2 control-label"> 
                                    <?php echo $form->labelEx($model, 'state'); ?>
                                </div>
                                <div class="col-sm-10">
                                    <?php
                                    if ($model->state == '') {
                                        echo CHtml::activeDropDownList($model, 'state', array(), array('empty' => '--Select--',
                                            'class' => 'form-control',
                                            'ajax' => array(
                                                'type' => 'POST',
                                                'url' => Yii::app()->createUrl('/merchant/MerchantDetails/loadDistricts'), //or $this->createUrl('loadcities') if '$this' extends CController
                                                'update' => '#MerchantDetails_district', //or 'success' => 'function(data){...handle the data in the way you want...}',
                                                'data' => array('MerchantDetails_state' => 'js:this.value'),
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
                                                'url' => Yii::app()->createUrl('/merchant/MerchantDetails/loadDistricts'), //or $this->createUrl('loadcities') if '$this' extends CController
                                                'update' => '#MerchantDetails_district', //or 'success' => 'function(data){...handle the data in the way you want...}',
                                                'data' => array('MerchantDetails_state' => 'js:this.value'),
                                            )
                                        ));
                                    }
                                    ?>
                                    <?php echo $form->error($model, 'state'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-2 control-label"> 
                                    <?php echo $form->labelEx($model, 'district'); ?>
                                </div>
                                <div class="col-sm-10">
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

                            <div class="form-group">
                                <div class="col-sm-2 control-label"> 
                                    <?php echo $form->labelEx($model, 'locality'); ?>
                                </div>
                                <div class="col-sm-10">
                                    <?php echo $form->textField($model, 'locality', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'locality'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-2 control-label"> 
                                    <?php echo $form->labelEx($model, 'city'); ?>
                                </div>
                                <div class="col-sm-10">
                                    <?php echo $form->textField($model, 'city', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'city'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-2 control-label"> 
                                    <?php echo $form->labelEx($model, 'pincode'); ?>
                                </div>
                                <div class="col-sm-10">
                                    <?php echo $form->textField($model, 'pincode', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($model, 'pincode'); ?>
                                </div>
                            </div>

                            <div class="col-sm-12">

                                <div class="buttons clearfix">
                                    <div class="pull-left bt_pdg">
                                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-default btn-sm bt_up2 ')); ?>
                                    </div>

                                </div>

                            </div>



                            <?php $this->endWidget(); ?>



                        </div>
                    </div>



                </div>

            </div>

            <div class="col-md-3 sidebar hidden-xs">

                <ul>
                    <li ><a href="<?php echo CommonUrls::merchant_profile(); ?>"    class="act "> <i class="fa fa-user fa-2x" aria-hidden="true"></i> <span>Profile</span></a></li>
                    <li><a href="<?php echo CommonUrls::add_product(); ?>"> <i class="fa fa-cart-arrow-down  fa-2x" aria-hidden="true"></i> <span>Add product</span></a></li>
                    <li><a href="<?php echo CommonUrls::change_password(); ?>p"> <i class="fa fa-unlock-alt fa-2x" aria-hidden="true"></i></i> <span>Change Password</span></a></li>
                    <li><a href="<?php echo CommonUrls::my_products(); ?>"> <i class="fa fa-cube fa-2x" aria-hidden="true"></i> <span>My products</span></a></li>
                    <li><a href=""> <i class="fa fa-cc-diners-club  fa-2x" aria-hidden="true"></i><span>Paid Post</span></a></li>

                    <li><a href="<?php echo CommonUrls::featured(); ?>" > <i class="fa fa-picture-o fa-2x" aria-hidden="true"></i> <span>Featured ads </span></a></li>
                    <li><a href="<?php echo CommonUrls::my_sales(); ?>"> <i class="fa fa-line-chart fa-2x" aria-hidden="true"></i> <span>My Sales</span></a></li>
                    <li><a href="<?php echo CommonUrls::request_pay(); ?>"> <i class="fa fa-cc-mastercard fa-2x" aria-hidden="true"></i><span>Payment / Payout</span></a></li>
                </ul>

            </div>
        </div>


    </div>
</div>
</section> <!-- end of facial -->




<!-- end of container -->