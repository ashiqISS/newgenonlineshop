   

<section class="banner">

    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">


        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">My <span class="redish"> Products </span></h1>

        </div>

    </div>


</section>


<div class="clearfix"></div>



<section class="cart-main">
    <div class="container">



        <div class="heading">




        </div>


        <div class="row">
            <div class="col-md-9">

                <div class="left-my_acnt">





                    <div class="panel-body sis">

                        <div class="table-responsive">
                            <table class="table" style="text-align:left">
                                <thead>
                                    <tr>
                                        <th class="tb"> Image</th>
                                        <th>Product Code</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Description</th> 
                                        <th></th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>


                                    <?php
                                    $this->widget('zii.widgets.CListView', array(
                                        'id' => 'product-list',
                                        'dataProvider' => $dataProvider,
                                        'itemView' => 'product_list',
                                        //        'sortableAttributes' => $sortAttr,
                                        'template' => '{items}{pager}',
                                        'emptyText' => ' <center><div style="vertical-align: central;padding-top: 8em;padding-bottom: 8em">No products added yet.</div></center>',
                                    ));
                                    echo '<br>';
                                    ?>





                                </tbody>


                            </table>
                        </div>


                    </div>



                    <div class="clearfix"></div>
                </div>

            </div>

            <div class="col-md-3 sidebar ">
                <ul>
                    <li ><a href="<?php echo CommonUrls::merchant_profile(); ?>"> <i class="fa fa-user fa-2x" aria-hidden="true"></i> <span>Profile</span></a></li>
                    <li><a href="<?php echo CommonUrls::add_product(); ?>"> <i class="fa fa-cart-arrow-down  fa-2x" aria-hidden="true"></i> <span>Add product</span></a></li>
                    <li><a href="<?php echo CommonUrls::change_password(); ?>"> <i class="fa fa-unlock-alt fa-2x" aria-hidden="true"></i></i> <span>Change Password</span></a></li>
                    <li><a href="<?php echo CommonUrls::my_products(); ?>"  class="act "> <i class="fa fa-cube fa-2x" aria-hidden="true"></i> <span>My products</span></a></li>
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




<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>