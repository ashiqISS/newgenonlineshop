
<div class="container main_container product_archive">
    <div class="row">
        <?php
        $category_name = Yii::app()->request->getParam('name');
        if ($category_name != "") {
                $get_cat_name = ProductCategory::model()->findByAttributes(array('canonical_name' => $category_name));
        }
        ?>
        <div class="col-sm-3 sidebar">

            <?php
            $parent = Yii::app()->Menu->findParent($get_cat_name->id);
            echo $this->renderPartial('left_menu', array('category' => $category, 'parent' => $parent));
            ?>
        </div>
        <div class="col-sm-9">
            <div class="product_list">
                <div class="row">
                    <?php
                    if (!empty($dataprovider) || $dataProvider != '') {
                            $this->widget('zii.widgets.CListView', array(
                                'dataProvider' => $dataProvider,
                                'itemView' => '_view',
                                'template' => "{pager}\n{items}\n{pager}",
                            ));
                    } else {
                            
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>