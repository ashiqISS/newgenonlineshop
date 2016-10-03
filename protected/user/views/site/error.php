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
    
    
    .container.centerd_page {
    /*max-width: 800px;*/
    margin: auto;
    margin-top: 50px;
    margin-bottom: 50px;
    padding: 30px;
    background-color: #fff;
    /*border: solid 2px #414042;*/
    box-shadow: 0px 0px 4px rgba(0,0,0,0.39);
    -webkit-box-shadow: 0px 0px 4px rgba(0,0,0,0.39);
    border-radius: 0;
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

<!--<section class="facial services">
    <div class="container">
        <div class="heading">
            Error <?php echo $code; ?>

        </div>

    </div>

</section>  end of facial -->


<!--<section class="facial services">-->
<div class="container main_container inner_pages centerd_page">
<div class="container">
    
        <div class="row">
                <div class="col-xs-4 row-borderd text-right empty_image"><img src="<?php echo Yii::app()->baseUrl ?>/images/logo.png" alt=""/></div>
                <div class="col-xs-6 empty_message">
                        <h2 class="fournotfour">404!</h2>
                        <h3>Looks like the page you're looking for doesn't exist. Sorry about that.</h3>
                        <input type="hidden" value="<?php echo $code.' : '.CHtml::encode($message); ?>">
                </div>
        </div>
    
    
    
<!--    <div class="row" style="color: red">
        <div class="error">
        <?php // echo CHtml::encode($message); ?>
    </div>-->
    <br><br>
</div>
</div>
<!--</section>-->

<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
?>