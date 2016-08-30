<section class="banner">

    <div id="large-header" class="large-header " style="height: 124px; background: url(<?= Yii::app()->baseUrl ?>/images/img_inn.jpg">


        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">Contact<span class="redish">Us</span></h1>

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

                <div class="col-md-3">


                    <div class="ctnf">
                        <h2>Contact info</h2>

                        <div class="kk">
                            <div class="add-left">
                                <i class="fa tack fa-thumb-tack"></i>
                            </div>
                            <div class="add-right">
                                <p>The Company Name Inc. 9870 </p>
                            </div>

                            <div style="clear:both"></div>

                        </div>

                        <div class="kk">

                            <div class="add-left">
                                <i class="fa tack fa-phone"></i>
                            </div>
                            <div class="add-right">
                                <p><strong>Telephone:</strong> +1 800 603 6035</p>


                            </div><div style="clear:both"></div></div>
                        <div class="kk">

                            <div class="add-left">
                                <i class="fa tack fa-fax"></i>
                            </div>
                            <div class="add-right">
                                <p><strong>FAX: </strong> +1 800 889 9898</p>

                            </div>
                            <div style="clear:both"></div>
                        </div>

                        <div class="kk">


                            <div class="add-left">
                                <i class="fa tack fa-envelope"></i>
                            </div>
                            <div class="add-right">
                                <p><strong>E-mail: </strong> mail@demolink.org</p>


                            </div> <div style="clear:both"></div>
                        </div>
                    </div>

                </div>

                <div class="col-md-9">

                    <div class="row">
                        <div class="g_map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62871.24482347028!2d76.29922780198503!3d9.979404659830088!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b080d08f976f3a9%3A0xe9cdb444f06ed454!2sErnakulam%2C+Kerala+682011!5e0!3m2!1sen!2sin!4v1470136600874" width="100%" height="279" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div> </div>

                </div>

            </div>

            <div class="col-md-12  pdg">

                <!--flash message-->
                <?php if (Yii::app()->user->hasFlash('contactus')): ?>
                    <div class="alert alert-info fade in">
                        <?php echo Yii::app()->user->getFlash('contactus'); ?>
                    </div>
                <?php endif; ?>
      

                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'contact-us-form',
                    'htmlOptions' => array('class' => 'contact-form-box'),
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation' => false,
                ));
                ?>


                <?php // echo $form->errorSummary($model); ?>


                <fieldset>

                    <div class="clearfix">
                        <div class="col-xs-12 col-md-3">

                            <p id="desc_contact0" class="desc_contact">&nbsp;</p>


                            <p class="form-group">
                                <label for="email">Name</label>
                                <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control grey validate')); ?>
                                <?php echo $form->error($model, 'name', array('class' => 'red')); ?>
                            </p>
                            <div class="form-group selector1">
                                <label>Email Address</label>
                                <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control grey')); ?>
                                <?php echo $form->error($model, 'email', array('class' => 'red')); ?>
                            </div>


                            <div class="form-group selector1">
                                <label>Contact Number</label>
                                <?php echo $form->textField($model, 'contact_number', array('class' => 'form-control grey')); ?>
                                <?php echo $form->error($model, 'contact_number', array('class' => 'red')); ?>
                            </div>

                            <div class="form-group selector1">
                                <label>Subject</label>
                                <?php echo $form->textField($model, 'subject', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control grey')); ?>
                                <?php echo $form->error($model, 'subject', array('class' => 'red')); ?>
                            </div>


                        </div>

                        <div class="col-xs-12 col-md-9">
                            <div class="form-group">
                                <label for="message">Message</label>
                                <?php echo $form->textArea($model, 'message', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'message', array('class' => 'red')); ?>
                            </div>
                        </div>

                    </div>
                    <div class="submit">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save', array('class' => 'btn btn-default btn-sm bt_up')); ?>

                        <?php $this->endWidget(); ?>

                    </div>                       
                </fieldset>



            </div>



        </div>
    </div>
</section> <!-- end of facial -->




<!-- end of container -->























<div class="banner"> 
    <img class="img-responsive" src="<?= Yii::app()->baseUrl ?>/images/layer.jpg" alt="">
    <h2>Turning your visions into realities<br><span class="wis">Top Event managers</span></h2>
    <div class="bottoms">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h4>Prominence <span class="events">event managements</span></h4>
            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor </h3>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <a href="#" class="lakshmi" tabindex="0">View More Details</a>
        </div>
    </div>
</div>


