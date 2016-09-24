<style>
    .services {
        background-color: #fff;
        overflow: hidden;
        padding-bottom: 40px;
        padding-top: 20px;
    }
    .table > thead > tr > th {
        text-align: left;
    }
</style>
<section class="banner">
    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">
        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">Error <span class="redish"> </span></h1>
        </div>
    </div>
</section>
<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle = Yii::app()->name . ' - Error';
$this->breadcrumbs = array(
    'Error',
);
?>
<div class="clearfix"></div>

<section class="facial services">
    <div class="container">
        <div class="heading">
            Error <?php echo $code; ?>

        </div>

    </div>
</div>
</section> <!-- end of facial -->


<!--<section class="facial services">-->
<div class="container">
    <div class="row" style="color: red">
        <!--<div class="error">-->
        <?php echo CHtml::encode($message); ?>
    </div>
    <br><br>
</div>
</div>
<!--</section>-->

<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>