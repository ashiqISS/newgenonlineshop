<?php
/* @var $this ProductViewedController */
/* @var $model ProductViewed */
?>

<section class="content-header">
    <h1>
        Sales Report </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Product Viewed</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
        <!--<a href="<?php echo Yii::app()->request->baseurl . '/reports/productViewed/create'; ?>" class='btn  btn-laksyah'>Add New ProductViewed</a>-->
    <div class="col-lg-8 col-md-9 his">

        <div class="left-my_acnt">


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
                                            $order_products = Products::model()->findByPk($sale->product_id);
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
                                                <td><?= $order_products->product_name; ?></td>
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



                        <?php
                }
                ?>

            </div>




            <div class="clearfix"></div>
        </div>

    </div>
</div>


</div>
</section>

