<style>
    .form-group {
        margin-bottom: 0; 
    }
</style>

<section class="banner">
    <div id="large-header" class="large-header " style="height: 124px; background: url(<?= Yii::app()->baseUrl; ?>/images/img_inn.jpg)">
        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">Check <span class="redish"> Out </span></h1>
        </div>
    </div>
</section>


<div class="clearfix"></div>

<section class="beautifull-spa-and-faeture">
    <h2 class="hidden">Feature</h2>
    <div class="container">
        <div class="row">
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</section>


<section class="cart-main">
    <div class="container">
        <div class="row">
            <div class="heading">

            </div>
            <!--flash message-->
            <?php if (Yii::app()->user->hasFlash('order_failure')): ?>
                <div class="alert alert-danger fade in">
                    <?php echo Yii::app()->user->getFlash('order_failure'); ?>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-9">
                    <div class="left-my_acnt">


                        <?php
                        $params = array();

                        $params['selected_billing'] = $selected_billing;
                        $params['selected_shipping'] = $selected_shipping;
                        $params['total_amt'] = $total_amt;
                        $params['carts'] = $carts;
                        $params['defaultShipping'] = $defaultShipping;
                        $params['defaultBilling'] = $defaultBilling;
                        $params['addresss'] = $addresss;
                        $params['user'] = $user;
                        $params['buyer'] = $buyer;
                        $params['billing'] = $billing;
                        $params['shipping'] = $shipping;

                        echo $this->renderPartial('_checkout_address_left_content', $params);
                        ?>



                        <div class="clearfix"></div>
                    </div>


                </div>

                <div class="col-md-3">
                    <?php echo $this->renderPartial('_checkout_address_right_content', array('total_amt' => $total_amt, 'carts' => $carts)) ?>


                </div>
            </div>


        </div>
    </div>
</section> <!-- end of facial -->




<!-- end of container -->

<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
?>


<script>

    $(document).ready(function () {


        if ($(".bill_same").is(':checked')) {
            $('.shipping_form').hide();
        } else
        {
            $('.shipping_form_select').show();
        }


        var select_val = $('.select_bill_exist').val();

        if (select_val != 0) {
            $('.bill_form').hide();
        } else {
            $('.bill_form').show();
        }

        if ($('.bill_same').is(":checked"))
        {

            $('.shipping_form').hide();
            var select_val = $(".select_bill_exist").val();

            if (select_val != 0) {
//                getcountry(select_val);
                $('.bill_form').hide();
            } else {

                $('.bill_form').show();
//                var country = $('.billing_country').val();
//                getshipmethod(country);

//                $(".billing_country").change(function () {
//
//                    var country = $('.billing_country').val();
//                    getshipmethod(country);
//                });
            }
            $(".select_bill_exist").change(function () {

                var select_val = $(this).val();
                if (select_val != 0) {

//                    getcountry(select_val);
                    $('.bill_form').hide();
                } else {

                    $('.bill_form').show();
//                    var country = $('.billing_country').val();
//                    getshipmethod(country);
//                    $(".billing_country").change(function () {
//                        var country = $('.billing_country').val();
//                        getshipmethod(country);
//                    });
                }
            });
        } else {
            $('.shipping_form_select').show();
            var select_ship_val = $(".select_ship_exist").val();

            if (select_ship_val != 0) {

//                getcountry(select_ship_val);

                $('.ship_form_content').hide();
            } else {

//                var country = $('.shipping_country').val();
//                getshipmethod(country);
                $('.ship_form_content').show();
//                $(".shipping_country").change(function () {
//                    var country = $('.shipping_country').val();
//                    getshipmethod(country);
//                });
            }
            $(".select_ship_exist").change(function () {
                var select_ship_val = $(this).val();

                if (select_ship_val != 0) {

//                    getcountry(select_ship_val);

                    $('.ship_form_content').hide();
                } else {

//                    var country = $('.shipping_country').val();
//                    getshipmethod(country);
                    $('.ship_form_content').show();
//                    $(".shipping_country").change(function () {
//                        var country = $('.shipping_country').val();
//                        getshipmethod(country);
//                    });
                }
            });
        }


<?php if ($shipping->hasErrors()) { ?>
            $('.bill_same').prop('checked', false);
            $('.ship_form_content').show();
<?php } ?>
<?php if ($billing->hasErrors()) { ?>
            //        $('.bill_same').prop('checked', false);
            $('.bill_form').show();
<?php } ?>

    });

    $('.bill_same').change(function () {

        if (this.checked) { //if ($(this).is(':checked')) {
            $('.shipping_form').hide();
        } else {
            $('.shipping_form').show();
        }
        ;
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
    /*
     * Check whether the order is checked
     */

<?php if ($shipping->hasErrors()) { ?>
        $('.bill_same').prop('checked', false);
        $('.ship_form_content').show();
<?php } ?>
<?php if ($billing->hasErrors()) { ?>
        //        $('.bill_same').prop('checked', false);
        $('.bill_form').show();
<?php } ?>
    $('.bill_same').click(function () {

        if ($(this).is(":checked"))
        {

            $('.shipping_form').hide();
            var select_val = $(".select_bill_exist").val();
            if (select_val != 0) {
//                getcountry(select_val);
                $('.ship_form_content').hide();
            } else {
                $('.ship_form_content').show();
//                var country = $('.billing_country').val();
//                getshipmethod(country);
//
//                $(".billing_country").change(function () {
//                    var country = $('.billing_country').val();
//                    getshipmethod(country);
//                });
            }
            $(".select_bill_exist").change(function () {

                var select_val = $(this).val();
                if (select_val != 0) {
//                    getcountry(select_val);
                    $('.bill_form').hide();
                } else {
                    $('.bill_form').show();
//                    var country = $('.billing_country').val();
//                    getshipmethod(country);
//                    $(".billing_country").change(function () {
//                        var country = $('.billing_country').val();
//                        getshipmethod(country);
//                    });
                }
            });

        } else {

            $('.shipping_form_select').show();
            var select_ship_val = $(".select_ship_exist").val();

            if (select_ship_val != 0) {

//                getcountry(select_ship_val);

                $('.ship_form_content').hide();
            } else {

//                var country = $('.shipping_country').val();
//                getshipmethod(country);
                $('.ship_form_content').show();
//                $(".shipping_country").change(function () {
//                    var country = $('.shipping_country').val();
//                    getshipmethod(country);
//                });
            }
            $(".select_ship_exist").change(function () {
                var select_ship_val = $(this).val();

                if (select_ship_val != 0) {

//                    getcountry(select_ship_val);

                    $('.ship_form_content').hide();
                } else {

//                    var country = $('.shipping_country').val();
//                    getshipmethod(country);
                    $('.ship_form_content').show();
//                    $(".shipping_country").change(function () {
//                        var country = $('.shipping_country').val();
//                        getshipmethod(country);
//                    });
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
//        $(document).ready(function () {
//                var country = $('.country_default').val();
//                getshipmethod(country);
//        });
</script>
<script>
//    $(".wallet_amount").keyup(function () {
//        var wallet = $(this).val();
//        showLoader();
//        if ($('.bill_same').is(":checked"))
//        {
//
//            //var countryname = $('.select_bill_exist').val();
//            if ($('.select_bill_exist').val() == 0) {
//                var country = $('.billing_country').val();
//            } else {
//
//                var countryname = $('.select_bill_exist').val();
//                var country = getcountryid(countryname);
//
//            }
//
//
//        } else {
//
//            if ($('.select_ship_exist').val() == 0) {
//
//                var country = $('.shipping_country').val();
//
//            } else {
//                var countryname = $('.select_ship_exist').val();
//
//
//                var country = getcountryid(countryname);
//            }
//
//        }
//
//        //var grant = $("#grant_total").html();
//        totalcalculate(wallet, country);
//        hideLoader();
//
//    });

//    function calculatetotalpay() {
//        var wallet = $('.wallet_amount').val();
//        if ($('.bill_same').is(":checked"))
//        {
//            //var countryname = $('.select_bill_exist').val();
//            if ($('.select_bill_exist').val() == 0) {
//                var country = $('.billing_country').val();
//            } else {
//                var countryname = $('.select_bill_exist').val();
//                var country = getcountryid(countryname);
//            }
//
//        } else {
//
//            if ($('.select_ship_exist').val() == 0) {
//                var country = $('.shshipping_country').val();
//            } else {
//                var countryname = $('.select_ship_exist').val();
//
//                var country = getcountryid(countryname);
//            }
//        }
//
//        var grant = $("#grant_total").html();
//        totalcalculate(wallet, country);
//    }
</script>
<script>
//        $(".shipping_country").change(function () {
//                var country = $('.shipping_country').val();
//
//                getshipmethod(country);
//        });
    function getcurencyconvert(total) {
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


















