<div class="clearfix"></div>
<div class="container main_container inner_pages">
    <h1>Checkout</h1>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-address-form',
        'htmlOptions' => array('class' => 'form-group'),
        'action' => Yii::app()->baseUrl . '/index.php/CheckOut/CheckOut/',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>


    <?php if (Yii::app()->user->hasFlash('success')):
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::app()->user->getFlash('success'); ?>
        </div>
    <?php endif; ?>
    <?php if (Yii::app()->user->hasFlash('checkout_error')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::app()->user->getFlash('checkout_error'); ?>
        </div>

    <?php endif; ?>
    <div class="row">
        <div class="col-md-8">
            <div class="check_out related_element">
                <div class="border_box">
                    <input type="hidden" value="<?php echo $deafult_shipping->country; ?>" class="country_default" name="country_default" />
                    <div class="box_title">
                        Billing Address
                    </div>
                    <div class="box_content">
                        <div class="form_row">
                            <label>Select a billing address from your address book or enter a new address.</label>
                            <select  name="bill_address" class="select_bill_exist form-control" id="bill_exist">
                                <option  value="0">New Address</option>
                                <?php
                                if (isset($addresss)) {
                                    foreach ($addresss as $address) {
                                        ?>
                                        <option <?php
                                        if ($address->default_billing_address == 1) {
                                            echo 'selected';
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
                                }
                                ?>
                            </select>
                        </div>

                        <div class="bill_form" style="">
                            <div class="row">
                                <?php //echo $form->errorSummary($billing);  ?>
                                <?php $billing->first_name = $buyer->first_name; ?>
                                <?php $billing->last_name = $buyer->last_name; ?>
                                <?php // $billing->country = $user->country; ?>
                                <?php $billing->contact_number = $user->phone_number; ?>
                                <div class = "col-sm-6">
                                    <?php echo $form->labelEx($billing, '[bill]first_name', array('class' => 'control-label'));
                                    ?>
                                    <?php echo $form->textField($billing, '[bill]first_name', array('placeholder' => 'First Name ', 'class' => 'form-control aik')); ?>
                                    <?php echo $form->error($billing, '[bill]first_name'); ?>
                                </div>

                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($billing, '[bill]last_name', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($billing, '[bill]last_name', array('placeholder' => 'Last Name ', 'class' => 'form-control aik')); ?>
                                    <?php echo $form->error($billing, '[bill]last_name'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($billing, '[bill]address_1', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($billing, '[bill]address_1', array('placeholder' => 'Address Line 1 ', 'class' => 'form-control aik')); ?>
                                    <?php echo $form->error($billing, '[bill]address_1'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($billing, '[bill]address_2', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($billing, '[bill]address_2', array('placeholder' => 'Address Line 2 ', 'class' => 'form-control aik')); ?>
                                    <?php echo $form->error($billing, '[bill]address_2'); ?>
                                </div>


                            </div>

                            <div class="row">

                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($billing, '[bill]country', array('class' => 'control-label')); ?>
                                    <?php echo CHtml::activeDropDownList($billing, '[bill]country', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name'), array('empty' => '--Select--', 'class' => 'form-control aik billing_country', 'options' => array(99 => array('selected' => 'selected')))); ?>
                                    <?php echo $form->error($billing, '[bill]country'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($billing, '[bill]state', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($billing, '[bill]state', array('placeholder' => 'state ', 'class' => 'form-control aik')); ?>
                                    <?php echo $form->error($billing, '[bill]state'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($billing, '[bill]city', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($billing, '[bill]city', array('placeholder' => 'City ', 'class' => 'form-control aik')); ?>
                                    <?php echo $form->error($billing, '[bill]city'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($billing, 'Zip code', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($billing, '[bill]postcode', array('placeholder' => 'Postal Code ', 'class' => 'form-control aik postcode')); ?>
                                    <?php echo $form->error($billing, '[bill]postcode'); ?>
                                </div>


                            </div>


                            <div class="row">

                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($billing, '[bill]contact_number', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($billing, '[bill]contact_number', array('placeholder' => 'Contact Number ', 'class' => 'form-control aik')); ?>
                                    <?php echo $form->error($billing, '[bill]contact_number'); ?>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>



                <div class="border_box">
                    <div class="box_title">
                        Delivery Address
                    </div>
                    <div class="box_content">
                        <span class="pull-right"><input type="checkbox" checked="" name="billing_same" value="1" class="bill_same"><label>Same as Billing Address</label></span>
                        <div class="ship_form">
                            <div class="form_row">
                                <label>Select a shipping address from your address book or enter a new address.</label>
                                <select  name="ship_address" class="select_ship_exist form-control">
                                    <option  value="0">New Address</option>
                                    <?php
                                    foreach ($addresss as $address) {
                                        ?>
                                        <option  value="<?php echo $address->id; ?>"><?php echo $address->first_name; ?> <?php echo $data->last_name; ?> ,   <?php echo $address->address_1; ?>
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


                            <div class="row ship_form_content">
                                <?php $shipping->first_name = $user->first_name; ?>
                                <?php $shipping->last_name = $user->last_name; ?>
                                <?php $shipping->country = $user->country; ?>
                                <?php $shipping->contact_number = $user->phone_no_1; ?>
                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($shipping, '[ship]first_name', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($shipping, '[ship]first_name', array('placeholder' => 'First Name ', 'class' => 'form-control aik1')); ?>
                                    <?php echo $form->error($shipping, '[ship]first_name'); ?>
                                </div>

                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($shipping, '[ship]last_name', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($shipping, '[ship]last_name', array('placeholder' => 'Last Name ', 'class' => 'form-control aik1')); ?>
                                    <?php echo $form->error($shipping, '[ship]last_name'); ?>
                                </div>
                            </div>
                            <div class="row ship_form_content">
                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($shipping, '[ship]contact_number', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($shipping, '[ship]contact_number', array('placeholder' => 'Contact Number ', 'class' => 'form-control aik1')); ?>
                                    <?php echo $form->error($shipping, '[ship]contact_number'); ?>
                                </div>

                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($shipping, '[ship]address_1', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($shipping, '[ship]address_1', array('placeholder' => 'Address Line 1 ', 'class' => 'form-control aik1')); ?>
                                    <?php echo $form->error($shipping, '[ship]address_1'); ?>
                                </div>
                            </div>
                            <div class="row ship_form_content">
                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($shipping, '[ship]address_2', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($shipping, '[ship]address_2', array('placeholder' => 'Address Line 2 ', 'class' => 'form-control aik1')); ?>
                                    <?php echo $form->error($shipping, '[ship]address_2'); ?>
                                </div>

                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($shipping, '[ship]city', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($shipping, '[ship]city', array('placeholder' => 'City ', 'class' => 'form-control aik1')); ?>
                                    <?php echo $form->error($shipping, '[ship]city'); ?>
                                </div>
                            </div>
                            <div class="row ship_form_content">
                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($shipping, '[ship]postcode', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($shipping, '[ship]postcode', array('placeholder' => 'Postal Code ', 'class' => 'form-control aik1')); ?>
                                    <?php echo $form->error($shipping, '[ship]postcode'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($shipping, '[ship]country', array('class' => 'control-label')); ?>
                                    <?php echo CHtml::activeDropDownList($shipping, '[ship]country', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name'), array('empty' => '--Select Country--', 'class' => 'form-control aik1 shipping_country', 'options' => array(99 => array('selected' => 'selected')))); ?>

                                    <?php echo $form->error($shipping, '[ship]country'); ?>
                                </div>
                            </div>
                            <div class="row ship_form_content">
                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($shipping, '[ship]state', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($shipping, '[ship]state', array('placeholder' => 'state ', 'class' => 'form-control aik1')); ?>
                                    <?php echo $form->error($shipping, '[ship]state'); ?>
                                </div>
                                <div class="col-sm-6">

                                </div>
                            </div>
                        </div>
                        <h3>Shipping Method</h3>
                        <div class="row">
                            <div class="col-xs-12 ">
                                <?php if (Yii::app()->user->hasFlash('shipp_availability')): ?>
                                    <div class="alert alert-danger fade in">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">x</a>
                                        <?php echo Yii::app()->user->getFlash('shipp_availability'); ?>
                                    </div>

                                <?php endif; ?>

                                <div id="shipping_method" class="shipping_method">

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>

        <div class="col-md-4 sidebar-right">
            <div>
                <div class="order_summary">
                    <div class="panel-body cart_products">

                        <div class=" sub_upcmg">
                            <?php
                            foreach ($carts as $cart) {
                                $prod_details = Products::model()->findByPk($cart->product_id);
                                $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);

                                $i = 0;

                                if ($prod_details->discount) {
                                    $price = $prod_details->price - $prod_details->discount;
                                } else {
                                    $price = $prod_details->price;
                                }
                                $cart_qty = $cart->quantity;
                                $tot_price = $cart_qty * $price;
                                ?>

                                <div>   <!-- ordered item start -->



                                    <div class="sub_ttl">

                                        <table id="t2">
                                            <tr>
                                                <td colspan="2"><h2 style="margin-top: 0"><?php echo $prod_details->product_name; ?></h2></td>
                                            </tr>
                                            <tr>
                                                <td rowspan="3">
                                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php echo $folder; ?>/<?php echo $prod_details->id; ?>/small.<?php echo $prod_details->main_image; ?>" class="img-responsive crt mid" align="absmiddle" style="height:110px; width:100px;display: block;">
                                                </td>
                                                <td>Price : <?= Yii::app()->Currency->convert($price); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Quantity : <?= $cart_qty ?></td>
                                            </tr>
                                            <tr>

                                                <td>Total: <?= Yii::app()->Currency->convert($tot_price); ?></td>
                                            </tr>
                                        </table>

                                    </div>
                                </div>  <!-- ordered items end -->
                                <?php
                            }
                            ?>


                            <table id="t03">
                                <tbody><tr>
                                        <td class="tdd">Sub-Total :</td>
                                        <td class="tdd"><?= Yii::app()->Currency->convert($total_amt); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="tdd">Total :</td>
                                        <td class="tdd"><?= Yii::app()->Currency->convert($total_amt); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>





                    </div>

                    <div class="total_pay total_to_pay">
                        <div class="price_group">

                            <div class="pull-left">Total Amount to pay :</div>
                            <div class="pull-right"><span id="total_pay"></span> <input type="hidden" name="total_pay" class="total_pay" /></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="price_group payment_method">

                            <strong class="radio_label pull-left"><input type="radio" checked="" name="payment_method" value="2">&nbsp;&nbsp;&nbsp;CREDIT/DEBIT/NET BANKING</strong>
                            <strong class="radio_label pull-left"><input type="radio" name="payment_method" value="3">&nbsp;&nbsp;&nbsp;PAYPAL</strong>
                            <div class="clearfix"></div>



                        </div>
                    </div>
                    <div class="agree_terms">
                        <p><input type="checkbox" required> By placing an order you agree to our <?php echo CHtml::link('Terms', array('site/Terms')); ?> &amp; <?php echo CHtml::link('Policies', array('site/PrivacyPolicy')); ?></p>
                    </div>

                    <div class="cart_buttons">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'PAY SECURELY NOW', array('class' => 'btn-primary btn-full', 'id' => 'laksyah_order_payment')); ?>
                    </div>

                </div>


                <?php $this->endWidget(); ?>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {

            var select_val = $('.select_bill_exist').val();
            if (select_val != 0) {
                $('.bill_form').hide();
            } else {
                $('.bill_form').show();
            }

            if ($('.bill_same').is(":checked"))
            {

                $('.ship_form').hide();
                var select_val = $(".select_bill_exist").val();
                if (select_val != 0) {
                    getcountry(select_val);
                    $('.bill_form').hide();
                } else {

                    $('.bill_form').show();
                    var country = $('.billing_country').val();
                    getshipmethod(country);
                    $(".billing_country").change(function () {

                        var country = $('.billing_country').val();
                        getshipmethod(country);
                    });
                }
                $(".select_bill_exist").change(function () {

                    var select_val = $(this).val();
                    if (select_val != 0) {

                        getcountry(select_val);
                        $('.bill_form').hide();
                    } else {

                        $('.bill_form').show();
                        var country = $('.billing_country').val();
                        getshipmethod(country);
                        $(".billing_country").change(function () {
                            var country = $('.billing_country').val();
                            getshipmethod(country);
                        });
                    }
                });
            } else {
                $('.ship_form').show();
                var select_ship_val = $(".select_ship_exist").val();
                if (select_ship_val != 0) {

                    getcountry(select_ship_val);
                    $('.ship_form_content').hide();
                } else {

                    var country = $('.shipping_country').val();
                    getshipmethod(country);
                    $('.ship_form_content').show();
                    $(".shipping_country").change(function () {
                        var country = $('.shipping_country').val();
                        getshipmethod(country);
                    });
                }
                $(".select_ship_exist").change(function () {
                    var select_ship_val = $(this).val();
                    if (select_ship_val != 0) {

                        getcountry(select_ship_val);
                        $('.ship_form_content').hide();
                    } else {

                        var country = $('.shipping_country').val();
                        getshipmethod(country);
                        $('.ship_form_content').show();
                        $(".shipping_country").change(function () {
                            var country = $('.shipping_country').val();
                            getshipmethod(country);
                        });
                    }
                });
            }

        });
    </script>

    <script>
        /*
         * Select already added addressbook
         */


        var select_ship_val = $('.select_ship_exist').val();
        if (select_ship_val != 0) {
            $('.ship_form_content').hide();
        } else {
            $('.ship_form_content').show();
        }


    </script>

    <script>

<?php if ($shipping->hasErrors()) { ?>
            $('.bill_same').prop('checked', false);
            $('.ship_form').show();
<?php } ?>
        $('.bill_same').click(function () {

            if ($(this).is(":checked"))
            {

                $('.ship_form').hide();
                var select_val = $(".select_bill_exist").val();
                if (select_val != 0) {
                    getcountry(select_val);
                    $('.bill_form').hide();
                } else {
                    $('.bill_form').show();
                    var country = $('.billing_country').val();
                    getshipmethod(country);
                    $(".billing_country").change(function () {
                        var country = $('.billing_country').val();
                        getshipmethod(country);
                    });
                }
                $(".select_bill_exist").change(function () {

                    var select_val = $(this).val();
                    if (select_val != 0) {
                        getcountry(select_val);
                        $('.bill_form').hide();
                    } else {
                        $('.bill_form').show();
                        var country = $('.billing_country').val();
                        getshipmethod(country);
                        $(".billing_country").change(function () {
                            var country = $('.billing_country').val();
                            getshipmethod(country);
                        });
                    }
                });
            } else {

                $('.ship_form').show();
                var select_ship_val = $(".select_ship_exist").val();
                if (select_ship_val != 0) {

                    getcountry(select_ship_val);
                    $('.ship_form_content').hide();
                } else {

                    var country = $('.shipping_country').val();
                    getshipmethod(country);
                    $('.ship_form_content').show();
                    $(".shipping_country").change(function () {
                        var country = $('.shipping_country').val();
                        getshipmethod(country);
                    });
                }
                $(".select_ship_exist").change(function () {
                    var select_ship_val = $(this).val();
                    if (select_ship_val != 0) {

                        getcountry(select_ship_val);
                        $('.ship_form_content').hide();
                    } else {

                        var country = $('.shipping_country').val();
                        getshipmethod(country);
                        $('.ship_form_content').show();
                        $(".shipping_country").change(function () {
                            var country = $('.shipping_country').val();
                            getshipmethod(country);
                        });
                    }
                });
            }
        });
    </script>
    <script>
        $('input.select').on('change', function () {
            $('input.select').not(this).prop('checked', false);
        });
        $('input.select2').on('change', function () {
            $('input.select2').not(this).prop('checked', false);
        });
    </script>

    <script>
        $(".wallet_amount").keyup(function () {
            var wallet = $(this).val();
            showLoader();
            if ($('.bill_same').is(":checked"))
            {

                //var countryname = $('.select_bill_exist').val();
                if ($('.select_bill_exist').val() == 0) {
                    var country = $('.billing_country').val();
                } else {

                    var countryname = $('.select_bill_exist').val();
                    var country = getcountryid(countryname);
                }


            } else {

                if ($('.select_ship_exist').val() == 0) {

                    var country = $('.shipping_country').val();
                } else {
                    var countryname = $('.select_ship_exist').val();
                    var country = getcountryid(countryname);
                }

            }

            //var grant = $("#grant_total").html();
            totalcalculate(wallet, country);
            hideLoader();
        });
        function calculatetotalpay() {
            var wallet = $('.wallet_amount').val();
            if ($('.bill_same').is(":checked"))
            {
                //var countryname = $('.select_bill_exist').val();
                if ($('.select_bill_exist').val() == 0) {
                    var country = $('.billing_country').val();
                } else {
                    var countryname = $('.select_bill_exist').val();
                    var country = getcountryid(countryname);
                }

            } else {

                if ($('.select_ship_exist').val() == 0) {
                    var country = $('.shshipping_country').val();
                } else {
                    var countryname = $('.select_ship_exist').val();
                    var country = getcountryid(countryname);
                }
            }

            var grant = $("#grant_total").html();
            totalcalculate(wallet, country);
        }
    </script>
    <script>
        convert(total)
        {
        var result;
        showLoader();
        $.ajax({
        type: "POST",
                cache: 'false',
                async: false,
                url: baseurl + 'CheckOut/currencyconvert',
                data: {total: total}
        }).done(function (data) {

            result = data;
            hideLoader();
        });
                return result;
        }

        function totalcalculate(wallet, country) {

            showLoader();
            $.ajax({
                type: "POST",
                cache: 'false',
                async: false,
                url: baseurl + 'CheckOut/totalcalculate',
                data: {wallet: wallet, country: country}
            }).done(function (data) {
                var obj = jQuery.parseJSON(data);
                $("#wallet_total").html(obj.wallet_balance);
                if (obj.total == 0) {

                    $(".wallet_amount").val(obj.wallet);
                    $("#total_pay").html(obj.totalamounttopay);
                    $(".total_pay").val(obj.total);
                    $('.total_to_pay').hide();
                    $('#laksyah_order_payment').val('CONFIRM ORDER');
                } else {
                    $(".wallet_amount").val(obj.wallet);
                    $('.total_to_pay').show();
                    $("#total_pay").html(obj.totalamounttopay);
                    $(".total_pay").val(obj.total);
                    $('#laksyah_order_payment').val('PAY SECURELY NOW');
                }
                hideLoader();
                //$(".wallet_amount").val(obj.wallet);
            });
        }
        function getshipmethod(country) {
            var wallet = $('.wallet_amount').val();
            showLoader();
            $.ajax({
                type: "POST",
                cache: 'false',
                async: false,
                url: baseurl + 'CheckOut/Getshippingmethod',
                data: {country: country}
            }).done(function (data) {
                $("#shipping_method").html(data);
                getshippingcharge(country);
                totalcalculate(wallet, country);
                hideLoader();
            });
        }
        function getshippingcharge(value) {
            var wallet = $('.wallet_amount').val();
            showLoader();
            $.ajax({
                type: "POST",
                cache: 'false',
                async: false,
                url: baseurl + 'CheckOut/Getshippingcharge',
                data: {country: value}
            }).done(function (data) {
                var obj = jQuery.parseJSON(data);
                $("#shipping_charge").html(obj.shippingcharge);
                $("#grant_total").html(obj.granttotal);
                $("#total_pay").html(obj.granttotal);
                $(".total_pay").val(obj.totalpay);
                totalcalculate(wallet, value);
                hideLoader();
            });
        }
        function getcountryid(country) {
            var result;
            showLoader();
            $.ajax({
                type: "POST",
                cache: 'false',
                async: false,
                url: baseurl + 'CheckOut/Getcountry',
                data: {country: country}
            }).done(function (data) {

                result = data;
                hideLoader();
            });
            return result;
        }
        function getcountry(country) {
            showLoader();
            $.ajax({
                type: "POST",
                cache: 'false',
                async: false,
                url: baseurl + 'CheckOut/Getcountry',
                data: {country: country}
            }).done(function (data) {

                getshippingcharge(data);
                if (data != 0) {
                    getshipmethod(data);
                }
                hideLoader();
            });
        }

        function showLoader() {
            $('.over-lay').show();
        }
        function hideLoader() {
            $('.over-lay').hide();
        }
    </script>
