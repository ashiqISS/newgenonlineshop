<section class="banner">
    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">
        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">My <span class="redish">Accounts </span></h1>
        </div>
    </div>
</section>

<div class="clearfix"></div>

<section class="facial services">
    <div class="container">
        <div class="heading">
            Banking Details
        </div>

        <div class="row">
            <div class="col-md-9">
                <div class="left-content">
                    <?php $this->renderPartial('_form', array('model' => $model)); ?>  
                </div>

            </div>

       <?php echo $this->renderPartial('../merchantDetails/_rightMenu'); ?>
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
    $(document).ready(function () {
         type = $('input[name=account_type]:checked').val();
         
        if (type == 1)
        {
//           alert(type)
            $('.bankDetails').hide();
            $('.paypalDetails').show();
        } else
        {
            $('.paypalDetails').hide();
            $('.bankDetails').show();
        }
    });

    function accountTypeChange(value)
    {
//        alert(value)
        if (value == 1)
        {
            $('.bankDetails').hide();
//            document.getElementById('bankDetails').style.display = "none";
//            document.getElementById('bankDetails').style.display = "none";
            $('.paypalDetails').show();
        } else
        {
            $('.paypalDetails').hide();
            $('.bankDetails').show();
        }
    }
</script>

