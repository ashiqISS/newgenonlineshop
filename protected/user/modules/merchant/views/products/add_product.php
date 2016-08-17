<style>

    label {
        font-weight: 100; 
    }
</style>
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



        <div class="heading">


            Add your Product

        </div>


        <div class="row">
            <div class="col-md-9">

                <div class="left-content" style="padding: em;">


                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'products-form',
                        'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
                        // Please note: When you enable ajax validation, make sure the corresponding
                        // controller action is handling ajax validation correctly.
                        // There is a call to performAjaxValidation() commented in generated controller code.
                        // See class documentation of CActiveForm for details on this.
                        'enableAjaxValidation' => false,
                    ));
                    ?>

                    <?php echo $form->errorSummary($model); ?>

                    <div class="form-group">
                        <div> 
                            <?php echo $form->labelEx($model, 'category_id'); ?>
                        </div>

                        <div>
                            <?php
                            if (!$model->isNewRecord) {
                                if (!empty($model->category_id)) {
                                    $ids = explode(',', $model->category_id);
                                    $selected = array();
                                    foreach ($ids as $id) {
                                        $selected[$id] = array('selected' => true);
                                    }
                                }
                            }
                            ?>
                            <?php echo $form->hiddenField($model, 'category_id'); ?>

                            <?php
                            $this->widget('application.admin.components.CatSelect', array(
                                'type' => 'category',
                                'field_val' => $model->category_id,
                                'category_tag_id' => 'Products_category_id', /* id of hidden field */
                                'form_id' => 'products-form',
                            ));
                            ?>

                            <?php echo $form->error($model, 'category_id', array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">

                            <?php echo $form->textField($model, 'product_name', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control', 'placeholder' => 'Product Name')); ?>
                            <?php echo $form->error($model, 'product_name', array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">

                            <?php echo $form->textField($model, 'product_code', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control', 'placeholder' => 'Product Code')); ?>
                            <?php echo $form->error($model, 'product_code', array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">

                            <?php echo CHtml::activeDropDownList($model, 'brand_id', CHtml::listData(MasterBrands::model()->findAll(), 'id', 'brand_name'), array('empty' => '--Brand--', 'class' => 'form-control')); ?>                
                            <?php echo $form->error($model, 'brand_id', array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">

                            <?php echo $form->textField($model, 'price', array('class' => 'form-control', 'placeholder' => 'Price')); ?>
                            <?php echo $form->error($model, 'price', array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">

                            <?php echo $form->textField($model, 'wholesale_price', array('class' => 'form-control', 'placeholder' => 'Wholesale Price')); ?>
                            <?php echo $form->error($model, 'wholesale_price', array('class'=>'red')); ?>

                        </div>

                        <?php /*
                          <div class="form-group">
                          <div>
                          <?php echo $form->labelEx($model, 'header_visibility'); ?>
                          </div>
                          <div>
                          <?php echo $form->textField($model, 'header_visibility', array('class' => 'form-control', 'placeholder' => 'Email')); ?>
                          <?php echo $form->error($model, 'header_visibility'); ?>
                          </div>
                          </div>
                         * 
                         * 
                          <div class="form-group">
                          <div>
                          <?php echo $form->labelEx($model, 'is_discount_available'); ?>
                          </div>
                          <div>
                          <?php echo $form->dropDownList($model, 'is_discount_available', array('1' => "Yes", '0' => "No"), array('class' => 'form-control', 'placeholder' => 'Email')); ?>
                          <?php echo $form->error($model, 'is_discount_available'); ?>
                          </div>
                          </div>

                          <div class="form-group">
                          <div>
                          <?php echo $form->labelEx($model, 'discount'); ?>
                          </div>
                          <div>
                          <?php echo $form->textField($model, 'discount', array('class' => 'form-control', 'placeholder' => 'Email')); ?>
                          <?php echo $form->error($model, 'discount'); ?>
                          </div>
                          </div>
                         */ ?>

                        <div class="form-group">

                            <?php echo $form->labelEx($model, 'description'); ?>

                            <?php // echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50,'class' => 'form-control', 'placeholder' => 'Email', 'placeholder' => 'Email')); ?>
                            <?php
                            $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                                'model' => $model,
                                'attribute' => 'description',
                            ));
                            ?>
                            <?php echo $form->error($model, 'description', array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Main Image ( image size : 322 X 500 )', array('class' => ' control-label')); ?>

                            <?php echo $form->fileField($model, 'main_image', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control', 'placeholder' => 'Main Image')); ?>
                            <?php
                            if ($model->main_image != '' && $model->id != "") {
                                $folder = Yii::app()->Upload->folderName(0, 1000, $model->id);
                                echo '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/products/' . $folder . '/' . $model->id . '/' . $model->id . '.' . $model->main_image . '" />';
                            }
                            ?>

                            <?php echo $form->error($model, 'main_image', array('class'=>'red')); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Hover Images ( image size : 322 X 500 )', array('class' => ' control-label')); ?>

                            <?php echo $form->fileField($model, 'hover_image', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control', 'placeholder' => 'Hover Image')); ?>
                            <?php
                            if ($model->hover_image != '' && $model->id != "") {
                                $folder = Yii::app()->Upload->folderName(0, 1000, $model->id);
                                echo '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/products/' . $folder . '/' . $model->id . '/hover/hover.' . $model->hover_image . '" />';
                            }
                            ?>

                            <?php echo $form->error($model, 'hover_image', array('class'=>'red')); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Gallery Images ( image size : 3016 X 4030 )<br>', array('class' => ' control-label')); ?>

                            <?php
                            $this->widget('CMultiFileUpload', array(
                                'name' => 'gallery_images',
                                'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
                                'duplicate' => 'Duplicate file!', // useful, i think
                                'denied' => 'Invalid file type', // useful, i think
                            ));
                            ?>

                            <?php
                            if (!$model->isNewRecord) {
                                $folder = Yii::app()->Upload->folderName(0, 1000, $model->id);

                                // $path = Yii::getPathOfAlias('webroot') . '/uploads/products/' . $folder . '/' . $model->id . '/gallery/big';

                                $path = Yii::getPathOfAlias('webroot') . '/uploads/products/' . $folder . '/' . $model->id . '/gallery/big';


                                $path2 = Yii::getPathOfAlias('webroot') . '/uploads/products/' . $folder . '/' . $model->id . '/gallery/';


                                foreach (glob("{$path}/*") as $file) {

                                    $info = pathinfo($file);
                                    $file_name = basename($file, '.' . $info['basename']);

                                    //  var_dump($file_name);



                                    if ($file != '') {
                                        $arry = explode('/', $file);
                                        echo '<div style="float:left;margin:5px;position:relative;">'
                                        . '<a style="position:absolute;top:43%;left:40%;color:red;" href="' . Yii::app()->baseUrl . '/admin.php/products/products/NewDelete?id=' . $model->id . '&path=' . $file_name . '"><i class="glyphicon glyphicon-trash"></i></a>'
                                        . ' <img style="width:100px;height:100px;" src="' . Yii::app()->baseUrl . '/uploads/products/' . $folder . '/' . $model->id . '/gallery/' . end($arry) . '"> </div>';
                                    }
                                }
                            }
                            ?>

                            <?php echo $form->error($model, 'gallery_images', array('class'=>'red')); ?>
                        </div>

                        <div class="form-group">

                            <?php echo $form->textField($model, 'quantity', array('class' => 'form-control', 'placeholder' => 'Quantity')); ?>
                            <?php echo $form->error($model, 'quantity', array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">

                            <?php echo $form->textField($model, 'weight', array('class' => 'form-control', 'placeholder' => 'Weight')); ?>
                            <?php echo $form->error($model, 'weight', array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">

                            <?php echo CHtml::activeDropDownList($model, 'weight_class', CHtml::listData(WeightClass::model()->findAll(), 'id', 'title'), array('empty' => '--Weight Class--', 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'weight_class', array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">

                            <?php
                            $from = date('Y') - 2;
                            $to = date('Y') + 20;
                            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model' => $model,
                                'attribute' => 'sale_from',
                                'value' => 'sale_from',
                                'options' => array(
                                    'minDate' => '0', // this will disable previous dates from datepicker
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
                                    'placeholder' => 'Sale From',
                                ),
                            ));
                            ?>
                            <?php echo $form->error($model, 'sale_from', array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">

                            <?php
                            $from = date('Y') - 2;
                            $to = date('Y') + 20;
                            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model' => $model,
                                'attribute' => 'sale_to',
                                'value' => 'sale_to',
                                'options' => array(
                                    'minDate' => '0', // this will disable previous dates from datepicker
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
                                    'placeholder' => 'Sale to',
                                ),
                            ));
                            ?>
                            <?php echo $form->error($model, 'sale_to', array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">

                            <?php
                            $from = date('Y') - 2;
                            $to = date('Y') + 20;
                            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model' => $model,
                                'attribute' => 'new_from',
                                'value' => 'new_from',
                                'options' => array(
                                    'minDate' => '0', // this will disable previous dates from datepicker
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
                                    'placeholder' => 'New From',
                                ),
                            ));
                            ?>
                            <?php echo $form->error($model, 'new_from', array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">

                            <?php
                            $from = date('Y') - 2;
                            $to = date('Y') + 20;
                            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model' => $model,
                                'attribute' => 'new_to',
                                'value' => 'new_to',
                                'options' => array(
                                    'minDate' => '0', // this will disable previous dates from datepicker
                                    'dateFormat' => 'dd-mm-yy',
                                    'changeYear' => true, // can change year
                                    'changeMonth' => true, // can change month
                                    'yearRange' => $from . ':' . $to, // range of year
                                    'showButtonPanel' => true, // show button panel
                                ),
                                'htmlOptions' => array(
                                    'size' => '10', // textField size
                                    'maxlength' => '10', // textField maxlength
                                    'class' => 'form-control', 'placeholder' => 'Email', 'placeholder' => 'Email',
                                    'placeholder' => 'New To',
                                ),
                            ));
                            ?>
                            <?php echo $form->error($model, 'new_to', array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">

                            <?php echo $form->dropDownList($model, 'discount_type', array('0' => "Classic", '1' => "Fixed"), array('class' => 'form-control', 'empty' => '--Discount Type--')); ?>
                            <?php echo $form->error($model, 'discount_type', array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">

                            <?php
                            $from = date('Y');
                            $to = date('Y') + 20;
                            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model' => $model,
                                'attribute' => 'discount_from',
                                'value' => 'discount_from',
                                'options' => array(
                                    'dateFormat' => 'dd-mm-yy',
                                    'minDate' => '0', // this will disable previous dates from datepicker
                                    'changeYear' => true, // can change year
                                    'changeMonth' => true, // can change month
                                    'yearRange' => $from . ':' . $to, // range of year
                                    'showButtonPanel' => true, // show button panel
                                ),
                                'htmlOptions' => array(
                                    'size' => '10', // textField size
                                    'maxlength' => '10', // textField maxlength
                                    'class' => 'form-control',
                                    'placeholder' => 'Discount From',
                                ),
                            ));
                            ?>
                            <?php echo $form->error($model, 'discount_from', array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">

                            <?php
                            $from = date('Y');
                            $to = date('Y') + 20;
                            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model' => $model,
                                'attribute' => 'discount_to',
                                'value' => 'discount_to',
                                'options' => array(
                                    'minDate' => '0', // this will disable previous dates from datepicker
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
                                    'placeholder' => 'Discount To',
                                ),
                            ));
                            ?>
                            <?php echo $form->error($model, 'discount_to', array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">

                            <?php echo $form->textField($model, 'discount_rate', array('class' => 'form-control', 'placeholder' => 'Discount Rate')); ?>
                            <?php echo $form->error($model, 'discount_rate', array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">

                            <?php echo $form->textField($model, 'special_price', array('class' => 'form-control', 'placeholder' => 'Special Price')); ?>
                            <?php echo $form->error($model, 'special_price', array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">

                            <?php
                            $from = date('Y') - 2;
                            $to = date('Y') + 20;
                            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model' => $model,
                                'attribute' => 'special_price_from',
                                'value' => 'special_price_from',
                                'options' => array(
                                    'minDate' => '0', // this will disable previous dates from datepicker
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
                                    'placeholder' => 'Special Price From',
                                ),
                            ));
                            ?>
                            <?php echo $form->error($model, 'special_price_from', array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">

                            <?php
                            $from = date('Y') - 2;
                            $to = date('Y') + 20;
                            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model' => $model,
                                'attribute' => 'special_price_to',
                                'value' => 'special_price_to',
                                'options' => array(
                                    'minDate' => '0', // this will disable previous dates from datepicker
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
                                    'placeholder' => 'Special Price To',
                                ),
                            ));
                            ?>
                            <?php echo $form->error($model, 'special_price_to', array('class'=>'red')); ?>

                        </div>


                        <div class="form-group">

                            <?php echo $form->textField($model, 'canonical_name', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control', 'placeholder' => 'Canonical Name')); ?>
                            <?php echo $form->error($model, 'canonical_name', array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">

                            <?php echo $form->textField($model, 'meta_title', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control', 'placeholder' => 'Met Title')); ?>
                            <?php echo $form->error($model, 'meta_title', array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">

                            <?php echo $form->textArea($model, 'meta_description', array('rows' => 6, 'cols' => 50, 'class' => 'form-control', 'placeholder' => 'Meta Description')); ?>
                            <?php echo $form->error($model, 'meta_description', array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">

                            <?php echo $form->textField($model, 'meta_keywords', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control', 'placeholder' => 'Meta Keywords')); ?>
                            <?php echo $form->error($model, 'meta_keywords', array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">

                            <?php echo $form->textField($model, 'sort_order', array('class' => 'form-control', 'placeholder' => 'Sort Order')); ?>
                            <?php echo $form->error($model, 'sort_order',array('class'=>'red')); ?>

                        </div>       

                        <div class="form-group">

                            <?php echo $form->dropDownList($model, 'requires_shipping', array('0' => "No", '1' => "Yes"), array('class' => 'form-control', 'placeholder' => 'Requires Shipping', 'empty' => '--Requires Shipping--')); ?>
                            <?php echo $form->error($model, 'requires_shipping',array('class'=>'red')); ?>

                        </div>

                        <?php /*
                          <div class="form-group">
                          <div>
                          <?php echo $form->labelEx($model, 'enquiry_sale'); ?>
                          </div>
                          <div>
                          <?php echo $form->textField($model, 'enquiry_sale', array('class' => 'form-control', 'placeholder' => 'Email')); ?>
                          <?php echo $form->error($model, 'enquiry_sale'); ?>
                          </div>
                          </div> */ ?>

                        <div class="form-group">

                            <?php echo $form->textField($model, 'tax', array('class' => 'form-control', 'placeholder' => 'Tax')); ?>
                            <?php echo $form->error($model, 'tax',array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">

                            <?php echo $form->dropDownList($model, 'gift_option', array('0' => "No", '1' => "Yes"), array('class' => 'form-control', 'placeholder' => 'Gift Option', 'empty' => '--Gift Option--')); ?>
                            <?php echo $form->error($model, 'gift_option',array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">

                            <?php echo $form->dropDownList($model, 'stock_availability', array('0' => "No", '1' => "Yes"), array('class' => 'form-control', 'empty' => 'Stock Availability')); ?>
                            <?php echo $form->error($model, 'stock_availability',array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">

                            <?php echo $form->textField($model, 'video_link', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control', 'placeholder' => 'Video Link')); ?>
                            <?php echo $form->error($model, 'video_link',array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">

                            <?php echo $form->dropDownList($model, 'exchange', array('0' => "No", '1' => "Yes"), array('class' => 'form-control', 'empty' => 'Exchange')); ?>
                            <?php echo $form->error($model, 'exchange',array('class'=>'red')); ?>

                        </div>

                        <div class="form-group">

                            <?php echo $form->hiddenField($model, 'search_tag'); ?>
                            <div>
                                <?php
                                $this->widget('application.admin.components.TagSelect', array(
                                    'type' => 'product',
                                    'field_val' => $model->search_tag,
                                    'category_tag_id' => 'Products_search_tag', /* id of hidden field */
                                    'form_id' => 'products-form',
                                ));
                                ?>
                                <?php echo $form->error($model, 'search_tag',array('class'=>'red')); ?>

                            </div>

                            <div class="form-group">
                                <div> 
                                    <?php echo $form->labelEx($model, 'related_products'); ?>
                                </div>
                                <div>
                                    <?php
                                    if (!is_array($model->related_products)) {
                                        $myArray = explode(',', $model->related_products);
                                    } else {
                                        $myArray = $model->related_products;
                                    }


                                    $related_products = array();

                                    foreach ($myArray as $value) {
                                        $related_products[$value] = array('selected' => 'selected');
                                    }
                                    ?>

                                    <?php echo CHtml::activeDropDownList($model, 'related_products', CHtml::listData(Products::model()->findAll(), 'id', 'product_name'), array('empty' => '-Select-', 'class' => 'form-control', 'placeholder' => 'Related Products', 'multiple' => true, 'options' => $related_products));
                                    ?>
                                    <?php echo $form->error($model, 'related_products',array('class'=>'red')); ?>
                                </div>
                            </div>


                            <?php /*

                              <div class="form-group">
                              <div>
                              <?php echo $form->labelEx($model, 'is_cod_available'); ?>
                              </div>
                              <div>
                              <?php echo $form->dropDownList($model, 'is_cod_available', array('1' => "Yes", '0' => "No"), array('class' => 'form-control', 'placeholder' => 'Email')); ?>
                              <?php echo $form->error($model, 'is_cod_available'); ?>
                              </div>
                              </div>

                              <div class="form-group">
                              <div>
                              <?php echo $form->labelEx($model, 'is_available'); ?>
                              </div>
                              <div>
                              <?php echo $form->dropDownList($model, 'is_available', array('1' => "Yes", '0' => "No"), array('class' => 'form-control', 'placeholder' => 'Email')); ?>
                              <?php echo $form->error($model, 'is_available'); ?>
                              </div>
                              </div>

                              <div class="form-group">
                              <div>
                              <?php echo $form->labelEx($model, 'is_featured'); ?>
                              </div>
                              <div>
                              <?php echo $form->dropDownList($model, 'is_featured', array('1' => "Yes", '0' => "No"), array('class' => 'form-control', 'placeholder' => 'Email')); ?>
                              <?php echo $form->error($model, 'is_featured'); ?>
                              </div>
                              </div>
                              <div class="form-group">
                              <div>
                              <?php echo $form->labelEx($model, 'status'); ?>
                              </div>
                              <div>
                              <?php echo $form->dropDownList($model, 'status', array('1' => "Enabled", '0' => "Disabled"), array('class' => 'form-control', 'placeholder' => 'Email')); ?>
                              <?php echo $form->error($model, 'status'); ?>
                              </div>
                              </div>

                              <div class="form-group">
                              <div>
                              <?php echo $form->labelEx($model, 'is_admin_approved'); ?>
                              </div>
                              <div>
                              <?php echo $form->dropDownList($model, 'is_admin_approved', array('1' => "Yes", '0' => "No"), array('class' => 'form-control', 'placeholder' => 'Email')); ?>
                              <?php echo $form->error($model, 'is_admin_approved'); ?>
                              </div>
                              </
                             * 
                             *  <div class="form-group">
                              <div>
                              <?php echo $form->labelEx($model, 'display_category_name'); ?>
                              </div>
                              <div>
                              <?php echo $form->textField($model, 'display_category_name', array('class' => 'form-control', 'placeholder' => 'Email')); ?>
                              <?php echo $form->error($model, 'display_category_name'); ?>
                              </div>
                              </div>

                             * 
                             */
                            ?>
                            <div class="buttons clearfix b_mrg">
                                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => "edit-btn")); ?>
                            </div>

                            <?php $this->endWidget(); ?>

<!--                            <div class="buttons clearfix b_mrg">

                                <a class="edit-btn" href="#">Edit</a>
                                <a class="delete-btn" href="#">Delete</a>

                            </div>-->

                        </div>





                        <div class="clearfix"></div>


                    </div>





                    <div class="clearfix"></div>
                </div>

            </div>

            <div class="col-md-3 sidebar ">
                <ul>
                    <li ><a href="<?php echo CommonUrls::merchant_profile(); ?>"> <i class="fa fa-user fa-2x" aria-hidden="true"></i> <span>Profile</span></a></li>
                    <li><a href="<?php echo CommonUrls::add_product(); ?>"  class="act "> <i class="fa fa-cart-arrow-down  fa-2x" aria-hidden="true"></i> <span>Add product</span></a></li>
                    <li><a href="<?php echo CommonUrls::change_password(); ?>"> <i class="fa fa-unlock-alt fa-2x" aria-hidden="true"></i></i> <span>Change Password</span></a></li>
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
