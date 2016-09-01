<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'user-address-form',
    'htmlOptions' => array('class' => 'form-group'),
    'action' => Yii::app()->baseUrl . '/index.php/CheckOut/Checkout',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
        ));
?>
<input type="hidden" name="total_amt" value="<?= $total_amt ?>">
<input type="hidden" name="carts" value="<?= $carts ?>">


<div class="left-my_acnt">
    <div class="panel-body sis">
        <div class="col-md-6">
            <div class="bx1">
                <div class="bx2">
                    <span class="icon icon-lg icon-primary   round">1</span></div>
                <div class="bx3"> <h1>
                        Shipping address
                    </h1>  
                    <p>Select a billing address from your address book or enter a 
                        new address.</p></div>



                <div class="clearfix"></div>
            </div>


            <div class="form-group form_mrg">
                <select  name="bill_address" class="select_bill_exist form-control" id="bill_exist">
                    <option  value="0">New Address</option>
                    <?php                                        
                    foreach ($addresss as $address) {
                        ?>
                        <option <?php
                        if ($selected_billing == $address->id) {
                            echo 'selected';
                        } else {
                            if ($address->default_billing_address == 1) {
                                echo 'selected';
                            }
                        }
                        ?>  value="<?php echo $address->id; ?>"><?php echo $address->first_name; ?> <?php echo $data->last_name; ?> ,   <?php echo $address->address_1; ?>
                            <?php echo $address->address_2; ?> , <?php echo $address->city; ?> ,
                            <?php echo $address->state; ?> , <?php echo Countries::model()->findByPk($address->country)->country_name; ?>
                            <?php echo $address->postcode; ?></option>
                        <?php
                        if (isset($_GET['box'])) {
                            echo "Success!";
                        }
                    }
                    ?>
                </select>

            </div>

            <div class=" bill_form" style="padding-top: 1em;">

                <?php // echo $form->errorSummary($billing);  ?>
                <?php $billing->first_name = $buyer->first_name; ?>
                <?php $billing->last_name = $buyer->last_name; ?>
                <?php $billing->contact_number = $user->phone_number; ?>

                <div class="form-group form_mrg">
                    <?php echo $form->labelEx($billing, '[bill]first_name', array('class' => 'control-label'));
                    ?>
                    <?php echo $form->textField($billing, '[bill]first_name', array('placeholder' => 'First Name ', 'class' => 'form-control aik')); ?>
                    <?php echo $form->error($billing, '[bill]first_name'); ?>
                </div>

                <div class="form-group form_mrg">
                    <?php echo $form->labelEx($billing, '[bill]last_name', array('class' => 'control-label')); ?>
                    <?php echo $form->textField($billing, '[bill]last_name', array('placeholder' => 'Last Name ', 'class' => 'form-control aik')); ?>
                    <?php echo $form->error($billing, '[bill]last_name'); ?>
                </div>

                <div class="form-group form_mrg">
                    <?php echo $form->labelEx($billing, '[bill]address_1', array('class' => 'control-label')); ?>
                    <?php echo $form->textField($billing, '[bill]address_1', array('placeholder' => 'Address Line 1 ', 'class' => 'form-control aik')); ?>
                    <?php echo $form->error($billing, '[bill]address_1'); ?>
                </div>

                <div class="form-group form_mrg">
                    <?php echo $form->labelEx($billing, '[bill]address_2', array('class' => 'control-label')); ?>
                    <?php echo $form->textField($billing, '[bill]address_2', array('placeholder' => 'Address Line 2 ', 'class' => 'form-control aik')); ?>
                    <?php echo $form->error($billing, '[bill]address_2'); ?>
                </div>

                <div class="form-group form_mrg">
                    <?php echo $form->labelEx($billing, '[bill]country', array('class' => 'control-label')); ?>
                    <?php echo CHtml::activeDropDownList($billing, '[bill]country', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name'), array('empty' => '--Select--', 'class' => 'form-control aik billing_country', 'options' => array(99 => array('selected' => 'selected')))); ?>
                    <?php echo $form->error($billing, '[bill]country'); ?>
                </div>

                <div class="form-group form_mrg">
                    <?php echo $form->labelEx($billing, '[bill]state', array('class' => 'control-label')); ?>
                    <?php echo $form->textField($billing, '[bill]state', array('placeholder' => 'state ', 'class' => 'form-control aik')); ?>
                    <?php echo $form->error($billing, '[bill]state'); ?>
                </div>

                <div class="form-group form_mrg">
                    <?php echo $form->labelEx($billing, '[bill]city', array('class' => 'control-label')); ?>
                    <?php echo $form->textField($billing, '[bill]city', array('placeholder' => 'City ', 'class' => 'form-control aik')); ?>
                    <?php echo $form->error($billing, '[bill]city'); ?>
                </div>
                <div class="form-group form_mrg">
                    <?php echo $form->labelEx($shipping, '[bill]district ', array('class' => 'control-label')); ?>
                    <?php echo $form->textField($shipping, '[bill]district', array('placeholder' => 'district ', 'class' => 'form-control aik1')); ?>
                    <?php echo $form->error($shipping, '[bill]district'); ?>
                </div>

                <div class="form-group form_mrg">
                    <?php echo $form->labelEx($billing, 'Zip code', array('class' => 'control-label')); ?>
                    <?php echo $form->textField($billing, '[bill]postcode', array('placeholder' => 'Postal Code ', 'class' => 'form-control aik postcode')); ?>
                    <?php echo $form->error($billing, '[bill]postcode'); ?>
                </div>

                <div class="form-group form_mrg">
                    <?php echo $form->labelEx($billing, '[bill]contact_number', array('class' => 'control-label')); ?>
                    <?php echo $form->textField($billing, '[bill]contact_number', array('placeholder' => 'Contact Number ', 'class' => 'form-control aik')); ?>
                    <?php echo $form->error($billing, '[bill]contact_number'); ?>
                </div>


            </div>

        </div>



        <div class="col-md-6 cht">
            <div class="row" style="padding: 0 0 2em 2em;">
                <input type="checkbox" checked="" name="billing_same" value="1" class="bill_same"><label style="padding-left: .5em;">Shipping Address same as Billing Address</label>
            </div>

            <div class="shipping_form">
            <div class="shipping_form_select">

                <div class="bx1">

                    <div class="bx2">

                        <span class="icon icon-lg icon-primary   round">2</span>
                    </div>

                    <div class="bx3"> <h1>
                            Billing address
                        </h1>  

                        <p>Select a shipping address from your address book or enter a 
                            new address.</p></div>


                    <div class="clearfix"></div>

                </div>




                <div class="form-group form_mrg">
                    <select  name="ship_address" class="select_ship_exist form-control">
                        <option  value="0">New Address</option>
                        <?php
                        foreach ($addresss as $address) {
                            ?>
                            <option 
                            <?php
                            if ($selected_shipping == $address->id) {
                                echo 'selected';
                            } else {
                                if ($address->default_billing_address == 1) {
                                    echo 'selected';
                                }
                            }
                            ?> 
                                value="<?php echo $address->id; ?>">
                                <?php echo $address->first_name; ?> <?php echo $data->last_name; ?> ,   <?php echo $address->address_1; ?>
                                <?php echo $address->address_2; ?> , <?php echo $address->city; ?> ,
                                <?php echo $address->state; ?> , <?php echo Countries::model()->findByPk($address->country)->country_name; ?>
                                <?php echo $address->postcode; ?>
                            </option>
                            <?php
                            if (isset($_GET['box'])) {
                                echo "Success!";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
                <div class="ship_form" style="padding-top: 1em;">
                    <div class="ship_form_content">
                        <?php // echo $form->errorSummary($shipping);  ?>
                        <?php $shipping->first_name = $buyer->first_name; ?>
                        <?php $shipping->last_name = $buyer->last_name; ?>
                        <?php $shipping->contact_number = $user->phone_number; ?>

                        <div class="form-group form_mrg">
                            <?php echo $form->labelEx($shipping, '[ship]first_name', array('class' => 'control-label')); ?>
                            <?php echo $form->textField($shipping, '[ship]first_name', array('placeholder' => 'First Name ', 'class' => 'form-control aik1')); ?>
                            <?php echo $form->error($shipping, '[ship]first_name'); ?>
                        </div>

                        <div class="form-group form_mrg">
                            <?php echo $form->labelEx($shipping, '[ship]last_name', array('class' => 'control-label')); ?>
                            <?php echo $form->textField($shipping, '[ship]last_name', array('placeholder' => 'Last Name ', 'class' => 'form-control aik1')); ?>
                            <?php echo $form->error($shipping, '[ship]last_name'); ?>
                        </div>

                        <div class="form-group form_mrg">
                            <?php echo $form->labelEx($shipping, '[ship]contact_number', array('class' => 'control-label')); ?>
                            <?php echo $form->textField($shipping, '[ship]contact_number', array('placeholder' => 'Contact Number ', 'class' => 'form-control aik1')); ?>
                            <?php echo $form->error($shipping, '[ship]contact_number'); ?>
                        </div>

                        <div class="form-group form_mrg">
                            <?php echo $form->labelEx($shipping, '[ship]address_1', array('class' => 'control-label')); ?>
                            <?php echo $form->textField($shipping, '[ship]address_1', array('placeholder' => 'Address Line 1 ', 'class' => 'form-control aik1')); ?>
                            <?php echo $form->error($shipping, '[ship]address_1'); ?>
                        </div>

                        <div class="form-group form_mrg">
                            <?php echo $form->labelEx($shipping, '[ship]address_2', array('class' => 'control-label')); ?>
                            <?php echo $form->textField($shipping, '[ship]address_2', array('placeholder' => 'Address Line 2 ', 'class' => 'form-control aik1')); ?>
                            <?php echo $form->error($shipping, '[ship]address_2'); ?>
                        </div>

                        <div class="form-group form_mrg">
                            <?php echo $form->labelEx($shipping, '[ship]city', array('class' => 'control-label')); ?>
                            <?php echo $form->textField($shipping, '[ship]city', array('placeholder' => 'City ', 'class' => 'form-control aik1')); ?>
                            <?php echo $form->error($shipping, '[ship]city'); ?>
                        </div>

                        <div class="form-group form_mrg">
                            <?php echo $form->labelEx($shipping, '[ship]postcode', array('class' => 'control-label')); ?>
                            <?php echo $form->textField($shipping, '[ship]postcode', array('placeholder' => 'Postal Code ', 'class' => 'form-control aik1')); ?>
                            <?php echo $form->error($shipping, '[ship]postcode'); ?>
                        </div>

                        <div class="form-group form_mrg">
                            <?php echo $form->labelEx($shipping, '[ship]country', array('class' => 'control-label')); ?>
                            <?php echo CHtml::activeDropDownList($shipping, '[ship]country', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name'), array('empty' => '--Select Country--', 'class' => 'form-control aik1 shipping_country', 'options' => array(99 => array('selected' => 'selected')))); ?>

                            <?php echo $form->error($shipping, '[ship]country'); ?>
                        </div>

                        <div class="form-group form_mrg">
                            <?php echo $form->labelEx($shipping, '[ship]state', array('class' => 'control-label')); ?>
                            <?php echo $form->textField($shipping, '[ship]state', array('placeholder' => 'state ', 'class' => 'form-control aik1')); ?>
                            <?php echo $form->error($shipping, '[ship]state'); ?>
                        </div>

                        <div class="form-group form_mrg">
                            <?php echo $form->labelEx($shipping, '[ship]district ', array('class' => 'control-label')); ?>
                            <?php echo $form->textField($shipping, '[ship]district', array('placeholder' => 'district ', 'class' => 'form-control aik1')); ?>
                            <?php echo $form->error($shipping, '[ship]district'); ?>
                        </div>

                    </div>
                </div>
            </div>

        </div>


    </div>



    <div class="clearfix"></div>
    <div style="    text-align: right;padding-right: 3em;">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Continue', array('class' => "btn btn-default btn-sm bt_up2 ")); ?>
    </div>
</div>

<?php $this->endWidget(); ?>