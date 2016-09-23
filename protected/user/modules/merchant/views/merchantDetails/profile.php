<section class="banner">
    <div id="large-header" class="large-header " style="height: 124px; background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/img_inn.jpg)">
        <div class="banner_txt">
            <h1 class="animated fadeInLeft m2">My <span class="redish">Account </span></h1>
        </div>
    </div>
</section>

<div class="clearfix"></div>

<section class="facial services">
    <div class="container">
        <div class="heading">
            your personal details
        </div>

        <div class="row">
            <div class="col-md-9">
                <div class="left-content">
                    <div class="strip-padding">
                        <div class="row">

                            <div class="copyz">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-labelz">Full Name</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-6 col-xs-6 zeros">
                                    <label for="textinput" class="control-labelz-2"><?php echo $model->fullname; ?></label>
                                </div>
                                <div class="col-sm-2 col-xs-2 ">
                                    <a class="edit-btn" href="<?php echo Yii::app()->request->baseUrl . '/user.php/merchant-editProfile'; ?>">Edit</a>
                                </div>
                            </div>

                            <div class="copyz">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-labelz">Email</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <label for="textinput" class="control-labelz-2"><?php echo $user_model->email; ?></label>
                                </div>
                            </div>

                            <div class="copyz">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-labelz">Phone Number</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <label for="textinput" class="control-labelz-2"><?php echo $user_model->phone_number; ?></label>
                                </div>
                            </div>

                            <div class="copyz">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-labelz">Product Categories</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <label for="textinput" class="control-labelz-2">
                                        <?php
                                        $cats = explode(',', $model->product_categories);
                                        $catt = '';
                                        foreach ($cats as $cat) {
                                            unset($_SESSION['category']);
                                            $category = ProductCategory::model()->findByPk($cat);
                                            $catt .= Yii::app()->category->selectCategories($category) . ', ';
                                        }
                                        echo $catt;
                                        ?>
                                    </label>
                                </div>
                            </div>

                            <div class="copyz">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-labelz">Shop Name</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <label for="textinput" class="control-labelz-2">
                                        <?php
                                        if ($model->shop_name == '') {
                                            echo 'Not Updated';
                                        } else
                                            echo $model->shop_name;
                                        ?>
                                    </label>
                                </div>
                            </div>

                            <div class="copyz">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-labelz">Shop Logo</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <label for="textinput" class="control-labelz-2">                                       
                                        <?php
                                        if ($model->shop_logo == '') {
                                            echo 'Not Updated';
                                        } else {
                                            echo '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . "/uploads/users/merchants/shop_logo/" . $model->id . "." . $model->shop_logo . '" />';
//                                            echo $model->shop_logo;
                                        }
                                        ?>
                                    </label>
                                </div>
                            </div>

                            <div class="copyz">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-labelz">Shop Banner</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <label for="textinput" class="control-labelz-2">
                                        <?php
                                        if ($model->shop_banner == '') {
                                            echo 'Not Updated';
                                        } else {
//                                            echo $model->shop_banner;
                                            echo '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . "/uploads/users/merchants/shop_banner/" . $model->id . "." . $model->shop_banner . '" />';
                                        }
                                        ?>                                        
                                    </label>
                                </div>
                            </div>

                            <div class="copyz">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-labelz">Address</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <label for="textinput" class="control-labelz-2">
                                        <?php
                                        if ($model->address == '') {
                                            echo 'Not Updated';
                                        } else
                                            echo $model->address;
                                        ?>
                                    </label>
                                </div>
                            </div>

                            <div class="copyz">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-labelz">Pincode</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <label for="textinput" class="control-labelz-2">
                                        <?php
                                        if ($model->pincode == 0) {
                                            echo 'Not Updated';
                                        } else
                                            echo $model->pincode;
                                        ?>
                                    </label>
                                </div>
                            </div>

                            <div class="copyz">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-labelz">Locality</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <label for="textinput" class="control-labelz-2">
                                        <?php
                                        if ($model->locality == '') {
                                            echo 'Not Updated';
                                        } else
                                            echo $model->locality;
                                        ?>
                                    </label>
                                </div>
                            </div>                           

                            <div class="copyz">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-labelz">City </label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <label for="textinput" class="control-labelz-2">
                                        <?php
                                        if ($model->city == 0) {
                                            echo 'Not Updated';
                                        } else
                                            echo $model->city;
                                        ?>
                                    </label>
                                </div>
                            </div>

                            <div class="copyz">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-labelz">District </label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <label for="textinput" class="control-labelz-2">
                                        <?php
                                        if ($model->district == 0) {
                                            echo 'Not Updated';
                                        } else {
                                            $dist = $model->district;
                                            echo Districts::model()->findByPk($dist)->district_name;
                                        }
                                        ?>
                                    </label>
                                </div>
                            </div>

                            <div class="copyz">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-labelz">State</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <label for="textinput" class="control-labelz-2">
                                        <?php
                                        if ($model->state == 0) {
                                            echo 'Not Updated';
                                        } else {
                                            $state = $model->state;
                                            echo States::model()->findByPk($state)->state_name;
                                        }
                                        ?>
                                    </label>
                                </div>
                            </div>

                            <div class="copyz">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-labelz">Country</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <label for="textinput" class="control-labelz-2">
                                        <?php
                                        if ($model->country == 0) {
                                            echo 'Not Updated';
                                        } else {
                                            $country = $model->country;
                                            echo Countries::model()->findByPk($country)->country_name;
                                        }
                                        ?>
                                    </label>
                                </div>
                            </div>


                        </div>
                    </div>
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