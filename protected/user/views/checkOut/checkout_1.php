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
            <div class="row">
                <div class="col-md-9">
                    <div class="left-my_acnt">
                        <div class="panel-body sis">
                            <div class="col-md-6 cht">
                                <div class="bx1">
                                    <div class="bx2">
                                        <span class="icon icon-lg icon-primary   round">1</span>
                                    </div>

                                    <div class="bx3"> <h1>
                                            Shipping address
                                        </h1>  
                                        <p>Select a billing address from your address book or enter a 
                                            new address.</p></div>



                                    <div class="clearfix"></div>
                                </div>

                                <form role="form">
                                    <div class="form-group form_mrg">

                                        <input type="email" class="form-chkout" id="email" placeholder="First Name">
                                    </div>

                                    <div class="form-group form_mrg">

                                        <input type="email" class="form-chkout" id="email" placeholder="Contact Number ">
                                    </div>
                                    <div class="form-group form_mrg">

                                        <input type="email" class="form-chkout" id="email" placeholder="Address 2">
                                    </div>


                                    <div class="form-group form_mrg">

                                        <input type="password" class="form-chkout" id="pwd" placeholder="Postcode ">
                                    </div>

                                    <div class="form-group form_mrg">

                                        <input type="email" class="form-chkout" id="email" placeholder="State ">
                                    </div>

                                    <div class="form-group form_mrg">

                                        <input type="email" class="form-chkout" id="email" placeholder="Last Name ">
                                    </div>


                                    <div class="form-group form_mrg">

                                        <input type="email" class="form-chkout" id="email" placeholder="Address 1">
                                    </div>


                                    <div class="form-group form_mrg">

                                        <input type="email" class="form-chkout" id="email" placeholder="City">
                                    </div>


                                    <div class="form-group form_mrg">

                                        <input type="email" class="form-chkout" id="email" placeholder="Postcode">
                                    </div>


                                    <div class="form-group form_mrg">

                                        <input type="email" class="form-chkout" id="email" placeholder="Country ">
                                    </div>
















                                    <button type="submit" class="btn btn-default btn-sm bt_up2 ">Submit</button>

                                    <button type="submit" class="btn btn-default btn-sm bt_up ">Cancel</button>




                                </form>

                            </div>



                            <div class="col-md-6 ">

                                <div class="bx1">

                                    <div class="bx2">

                                        <span class="icon icon-lg icon-primary   round">2</span></div>

                                    <div class="bx3"> <h1>
                                            Billing address
                                        </h1>  
                                        <p>Select a billing address from your address book or enter a 
                                            new address.</p></div>


                                    <div class="clearfix"></div>

                                </div>

                                <form role="form">
                                    <div class="form-group form_mrg">

                                        <input type="email" class="form-chkout" id="email" placeholder="">
                                    </div>










































                                </form>


                                <div class="bx1">

                                    <div class="bx2">

                                        <span class="icon icon-lg icon-primary   round">3</span></div>

                                    <div class="bx3"> <h1>
                                            Shipping methods
                                        </h1> 



                                        <form role="form">
                                            <label class="radio-inline">
                                                <input type="radio" name="optradio">I will pick up the order              
                                            </label>
                                        </form>

                                        <form role="form">
                                            <label class="radio-inline">
                                                <input type="radio" name="optradio">Free Shipping 
                                            </label>
                                        </form>




                                    </div>



                                    <div class="clearfix"></div>
                                </div>

                                <div class="bx1">

                                    <div class="bx2">

                                        <span class="icon icon-lg icon-primary   round">4</span></div>

                                    <div class="bx3"> <h1>
                                            Payment methods
                                        </h1>  
                                        <p>Select a billing address from your address book or enter a 
                                            new address.</p></div>



                                    <div class="clearfix"></div>
                                </div>

                            </div>


                        </div>



                        <div class="clearfix"></div>
                    </div>








                </div>

                <div class="col-md-3">
                    <?php echo $this->renderPartial('_checkout_right_content', array('total_amt' => $total_amt,'carts' => $carts)) ?>
           

                </div>
            </div>













        </div>
    </div>
</section> <!-- end of facial -->




<!-- end of container -->

<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>





















