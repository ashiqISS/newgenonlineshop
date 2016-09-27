<section class="banner">

    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">


        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">Sales  <span class="redish">Reports </span></h1>

        </div>

    </div>

</section>

<div class="clearfix"></div>


<section class="facial services">
    <div class="container">

        <div class="heading">
Most Purchased Products
        </div>


        <div class="form-group">
            <div class="col-md-9">

                <div class="left-content">
                    
                    <?php  echo $this->renderPartial('_reports_sub_menu');?>
         
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
