<section class="banner">
    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">
        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">Merchant <span class="redish">Dashboard </span></h1>
        </div>
    </div>
</section>

<div class="clearfix"></div>

<section class="facial services">
    <div class="container">
        <div class="heading">
            My Orders

        </div>

    </div>
</div>
</section> <!-- end of facial -->


<section class="facial services">
    <div class="container">
        <div class="row">


            <div class="merchant_filter">


                <div class="col-md-9 col-sm-9 col-xs-12"> 
                    <div class="m_filter_left">
                        <select name="item_status" style="width:150px;" onchange="location = this.options[this.selectedIndex].value;" class="dt">
                            <option value="orders" selected="selected">Show all Pending</option>
                            <option value="order_cancel">Show all Cancelled</option>
                            <option value="order_shipped">Show all Shipped</option>
                            <option value="order_hold">Show all On Hold</option>
                        </select>

                        &nbsp;&nbsp;&nbsp;&nbsp; Narrow Results by Date &nbsp;
                        <input class="date_pick date_input_first hasDatepicker dt" placeholder="From" type="text" id="custom_design_from" style="width:95px; float:none; background-position:70px 3px!important;" value="" name="order_from">
                        &nbsp;&nbsp;
                        <input class="date_pick date_input_first hasDatepicker dt" placeholder="To" type="text" id="custom_design_to" name="order_to" style="width:95px; float:none; background-position:70px 3px!important;" value="">

                        <input type="submit" value="Submit" style="width:100px; margin:0px; text-transform:uppercase; margin-left: 5px;" class="submit_btn sbbt" name="order_submit">
                        <a href="#"><span class="prnt2"> <img class="fives" src="<?php echo Yii::app()->request->baseUrl; ?>/images/print.png">print</span></a>

                    </div>





                </div>




                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="m_filter_right">
                        <a href="https://merchant.pepperfry.com/merchant/bulkinvoice" style=" width:auto; float:right; margin:0px; text-transform:uppercase;" class="submit_btn bl">Bulk Invoice</a>
                    </div></div>






                <div class="col-md-12 col-sm-12 col-xs-12"> 

                    <div class="table-responsive ord_a">
                        <table class="table ac">
                            <thead class="thead-inverse ">
                                <tr>
                                    <th>Order id</th>
                                    <th>Product Name </th>
                                    <th>Unit Price </th>
                                    <th> Ordered date	</th>
                                    <th>Quantity </th>
                                    <th>Shipping charge </th>
                                    <th>Total price</th>
                                    <th>destination address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>025</td>
                                    <td>Lorem Ipsum</td>
                                    <td>$250</td>
                                    <td> 26-7-2016</td>
                                    <td> 2</td>
                                    <td> 10$</td>
                                    <td> $500</td>
                                    <td>Lorem Ipsum</td>

                                    <td><select name="item_status" style="width:150px;" onchange="location = this.options[this.selectedIndex].value;" class="dt">
                                            <option value="orders" selected="selected">Show all Pending</option>
                                            <option value="order_cancel">Show all Cancelled</option>
                                            <option value="order_shipped">Show all Shipped</option>
                                            <option value="order_hold">Show all On Hold</option>
                                        </select></td>

                                    <td><a href="#"><span class="prnt2"> <img class="fives" src="<?php echo Yii::app()->request->baseUrl; ?>/images/print.png">print</span></a></td>
                                </tr>


                            </tbody>

                            <tbody>
                                <tr>
                                    <td>025</td>
                                    <td>Lorem Ipsum</td>
                                    <td>$250</td>
                                    <td> 26-7-2016</td>
                                    <td> 2</td>
                                    <td> 10$</td>
                                    <td> $500</td>
                                    <td>Lorem Ipsum</td>

                                    <td><select name="item_status" style="width:150px;" onchange="location = this.options[this.selectedIndex].value;" class="dt">
                                            <option value="orders" selected="selected">Show all Pending</option>
                                            <option value="order_cancel">Show all Cancelled</option>
                                            <option value="order_shipped">Show all Shipped</option>
                                            <option value="order_hold">Show all On Hold</option>
                                        </select></td>

                                    <td><a href="#"><span class="prnt2"> <img class="fives" src="<?php echo Yii::app()->request->baseUrl; ?>/images/print.png">print</span></a></td>
                                </tr>


                            </tbody>

                            <tbody>
                                <tr>
                                    <td>025</td>
                                    <td>Lorem Ipsum</td>
                                    <td>$250</td>
                                    <td> 26-7-2016</td>
                                    <td> 2</td>
                                    <td> 10$</td>
                                    <td> $500</td>
                                    <td>Lorem Ipsum</td>

                                    <td><select name="item_status" style="width:150px;" onchange="location = this.options[this.selectedIndex].value;" class="dt">
                                            <option value="orders" selected="selected">Show all Pending</option>
                                            <option value="order_cancel">Show all Cancelled</option>
                                            <option value="order_shipped">Show all Shipped</option>
                                            <option value="order_hold">Show all On Hold</option>
                                        </select></td>

                                    <td><a href="#"><span class="prnt2"> <img class="fives" src="<?php echo Yii::app()->request->baseUrl; ?>/images/print.png">print</span></a></td>
                                </tr>


                            </tbody>
                        </table>


                    </div>

                </div>







            </div>



        </div>
    </div>
</section> <!-- end of facial -->




<!-- end of container -->

























<!-- end of container -->
<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>