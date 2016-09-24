<style>
    .pagination {
        float: right;
        margin-top: 0;
    }
</style>
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

        <div class="row">
            <div class="col-md-9">
  <div class="heading">
            My Products
        </div>
                <div class="left-my_acnt">

                    <?php
                    if (empty($ModelInstance)) {
                        echo '<center><br><br>No products to display.</center>';
                    } else {
                        ?>

               

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
                                            <th style="color: #e40689 !important">Admin Approved</th> 
                                            <th></th>
                                        

                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php
                                        $this->widget('booster.widgets.TbListView', array(
                                            'id' => 'product-list',
                                            'dataProvider' => $dataProvider,
                                            'itemView' => 'product_list',
                                            'template'=>'{items}{pager}',
                                            'emptyText' => ' <center><div style="vertical-align: central;padding-top: 8em;padding-bottom: 8em">No products added yet.</div></center>',
                                        ));
//                                        echo '<br>';
                                        ?>





                                    </tbody>


                                </table>
                            </div>


                        </div>

                        <?php
                    }
                    ?>

                    <div class="clearfix"></div>
                </div>

            </div>

                 <?php echo $this->renderPartial('../merchantDetails/_rightMenu'); ?>



    </div>
</div>
</section> <!-- end of facial -->




<!-- end of container -->




<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>