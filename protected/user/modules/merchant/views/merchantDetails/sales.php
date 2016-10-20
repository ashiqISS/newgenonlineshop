<style>
    .table > thead > tr > th
    {
        text-align: left;
    }

    .button1 {
        background:url('<?php echo Yii::app()->request->baseUrl . "/images/print.png"; ?>');
        cursor:pointer;

    }
</style>

<?php date_default_timezone_set('Asia/Kolkata'); ?>

<section class="banner">
    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">
        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">My <span class="redish">sales</span></h1>
        </div>

    </div>

</section>
<div class="clearfix"></div>
<section class="cart-main">
    <div class="container">
        <div class="heading">
            Sales report
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-9 his">

                <div class="left-my_acnt">
                    <div style="padding: 2em;">
                        <?php echo $this->renderPartial('_reports_sub_menu'); ?>
                    </div>

                    <div class="panel-body sis">
                        <div class="m_filter_left">
                            <?php
                            echo CHtml::beginForm(
                                    array(
                                        'id' => 'slaesReport',
                                        'action' => Yii::app()->baseUrl . 'user.php/merchant/merchantDetails/mySales',
                                    )
                            );
                            ?>
                            <?php
                            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'name' => 'slaes_filter_date_from',
                                'id' => 'slaes_filter_date_from',
                                'value' => $fromdt,
                                'options' => array(
                                    'dateFormat' => 'yy-mm-dd',
                                    'changeYear' => true, // can change year
                                    'changeMonth' => true, // can change month
                                    'yearRange' => '2000:2099', // range of year
                                    'showButtonPanel' => true, // show button panel
                                ),
                                'htmlOptions' => array(
                                    'placeholder' => 'From',
                                    'style' => 'padding:.2em',
                                ),
                            ));
                            ?>
                            <?php
                            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'name' => 'slaes_filter_date_to',
                                'id' => 'sales_filter_date_to',
                                'value' => $todate,
                                'options' => array(
                                    'dateFormat' => 'yy-mm-dd',
                                    'changeYear' => true, // can change year
                                    'changeMonth' => true, // can change month
                                    'yearRange' => '2000:2099', // range of year
                                    'showButtonPanel' => true, // show button panel
                                ),
                                'htmlOptions' => array(
                                    'placeholder' => 'To',
                                    'style' => 'padding:.2em',
                                ),
                            ));
                            ?>

                            <?php echo CHtml::submitButton('GO', array('class' => "submit_btn sbbt")); ?>
                            <?php echo CHtml::Button('Reset', array('id' => 'resetSalesReport', 'class' => "submit_btn sbbt")); ?>
                            <?php echo CHtml::endForm(); ?>



                        </div>
                        <br/>
                        <?php
                        if (empty($sales)) {
                            ?>
                            <h4 class="fournotfour">You have no completed orders!</h4>
                            <?php
                        } else {
                            ?>


                            <div class="table-responsive ac_up">
                                <table class="table ac">
                                    <thead class="thead-inverse ac_bg">
                                        <tr>
                                            <th>Order Id</th>
                                            <th>Customer Name</th>
                                            <th>Product Name </th>
                                            <th>Amount </th>
                                            <th>date of Order</th>
                                            <th>Quantity </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        foreach ($sales as $sale) {
                                            $order_produ = Order::model()->findByPk($sale->order_id);
                                            if ($order_products = Products::model()->findByPk($sale->product_id)) {
                                                $product_name = $order_products->product_name;
                                            } else {
                                                $product_name = '<font color="#b1b1b1">Product removed</font>';
                                            }
                                            $user = BuyerDetails::model()->findByAttributes(array('user_id' => $order_produ->user_id));
                                            ?>

                                            <tr>
                                                <td>ID-<?= $order_produ->id; ?></td>
                                                <td>
                                                    <?php
                                                    if ($order_produ->user_id == '' || $order_produ->user_id == 0) {
                                                        echo 'Unknown';
                                                    } else {
                                                        echo $user->first_name . ' ' . $user->last_name;
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $product_name ?></td>
                                                <td> <?= $sale->amount; ?></td>
                                                <td><?= date('d-m-Y', strtotime($order_produ->order_date)); ?></td>
                                                <td><?= $sale->quantity; ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="1">Total Order </td> <td colspan="2"><? print_r($slaesSummary->cnt) ?></td>
                                            <td colspan="1">Total Amount</td> <td colspan="2"><? print_r($slaesSummary->amt) ?></td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>


                            <div class="fifty-1">

                                <a href="<?php echo Yii::app()->request->baseUrl . '/user.php/merchant/order/PrintSalesReport?PrintStart=' . $fromdt . '&PrintEnd=' . $todate ?>" target="_blank"> <span class="prnt"> <img class="fives" src="<?php echo Yii::app()->request->baseUrl; ?>/images/print.png" title="Print"></span></a>
                            </div>
                            <?php
                        }
                        ?>

                    </div>




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
<script>
    $("#sales_filter_date_to").on('change', function (e) {
        var start = $("#slaes_filter_date_from").val().replace('-', '/');
        var end = $(this).val().replace('-', '/');
        if (start > end) {
            alert("From date should be less than end date");
            $(this).val("");
            return false;
        }
    });
    $("#resetSalesReport").on('click', function (e) {
        e.preventDefault();
        window.location.href = baseurl + '/my-sales/';
    });

    $("#printSubmit").on('click', function (e) {
        $('#printForm').submit();
    });


</script>