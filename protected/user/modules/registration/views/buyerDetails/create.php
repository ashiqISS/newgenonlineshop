<section class="banner">

    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseurl; ?>/images/img_inn.jpg)">
        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">Buyer<span class="redish">Register </span></h1>
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


<section class="facial services">
    <div class="container">
        <div class="row">
            <div class="col-md-12 pdg">
                <div class="row">
                    <div class="col-md-2 space list-1">
                        <ul class="list-unstyled">
                            <li><a href="<?php echo Yii::app()->request->baseurl; ?>/user.php/user-registration"  class="a_act">Buyer Details</a></li>
                            <li><a href="<?php echo Yii::app()->request->baseurl; ?>/user.php/merchant-registration">Merchant Details</a></li>

                        </ul>
                    </div>
                    <div class="col-md-9 space list-2">
                        <div class="colleges president">
                            <div class="rgr_form">

                                <?php $this->renderPartial('_form', array('model' => $model, 'user_model' => $user_model)); ?>                                   
                                
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!-- end of facial -->

<!-- end of container -->


