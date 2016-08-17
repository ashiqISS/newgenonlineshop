<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.min.css" rel="stylesheet">
            <title><?php echo CHtml::encode($this->pageTitle); ?></title>
            <script>
                    var baseurl = "<?php print Yii::app()->request->baseUrl . "/index.php/"; ?>";
                    var basepath = "<?php print Yii::app()->basePath; ?>";</script>
    </head>

    <body>

        <div class="container" id="page">

            <div id="header">
                <div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
            </div><!-- header -->



        </div>
        <div>
            <ul>
                <?php
                $menus = ProductCategory::model()->findAllByAttributes(array(), array('condition' => 'header_visibility = 1 and id=parent order by sort_order'));
                foreach ($menus as $menu) {
                        ?>
                        <li class=""><a href='<?php echo Yii::app()->request->baseUrl; ?>/index.php/products/category/name/<?php echo $menu->canonical_name; ?>'><span><?php echo $menu->category_name; ?></span></a>

                        </li>
                <?php } ?>

            </ul>
        </div>
        <div id="mainmenu">
            <?php
            $this->widget('zii.widgets.CMenu', array(
                'items' => array(
                    array('label' => 'Home', 'url' => array('')),
                    array('label' => 'About', 'url' => array()),
                    array('label' => 'Contact', 'url' => array()),
                    array('label' => 'Login', 'url' => array('site/login')),
                    array('label' => 'Logout', 'url' => array('site/logout'))
                ),
            ));
            ?>
        </div><!-- mainmenu -->


        <?php echo $content; ?>

        <div id="footer">
            Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
            All Rights Reserved.<br/>
            <?php echo Yii::powered(); ?>
        </div><!-- footer -->
        </div><!-- page -->

    </body>
</html>
