<style>

    label {
        font-weight: 100; 
    }
</style>  

<section class="banner">

    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">


        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">Forgot<span class="redish">password</span></h1>

        </div>

    </div>

</section>

<div class="clearfix"></div>


<section class="facial services">
    <div class="container">
        <div class="row">

            <div class="col-md-12 pdg">

                <div class="new_form2">

                    <p>Don’t worry! just fill in your email and we’ll help you recover your password.</p>


                    <div class="form" >

                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'forgot-password',
                            'enableClientValidation' => true,
                            'clientOptions' => array(
                                'validateOnSubmit' => true,
                            ),
                        ));
                        ?>

                        <div class="form-group">
                            <?php echo $form->textField($model, 'email', array('class' => "form-new", 'placeholder' => 'Email')); ?>            
                            <?php echo $form->error($model, 'email', array('class' => 'red')); ?>
                        </div>

                        <div class="form-group">
                            <?php if (CCaptcha::checkRequirements()): ?>                                                    
                                <div id="capche" >
                                    <?php echo $form->labelEx($model, 'verifyCode'); ?>
                                    <br/>
                                    <?php $this->widget('CCaptcha'); ?>
                                    <br/>


                                    <?php echo $form->textField($model, 'verifyCode', array('class' => "form-new")); ?>

                                    <?php echo $form->error($model, 'verifyCode', array('class' => 'red')); ?>


                                <?php endif; ?>    
                            </div>

                            <div class="form-group">
                                <br>  <br>                               
                                <button type="submit" class="btn btn-default btn-sm bt_up2 ">Submit</button>
                            </div>

                            <?php $this->endWidget(); ?>


                        </div>



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