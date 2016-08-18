<?php

class ProductController extends Controller {

    public function actionCategory($name) {
        $parent = ProductCategory::model()->findByAttributes(array('canonical_name' => $name));
        if (empty($parent)) {
            $this->render('ProductNotfound');
            return FALSE;
        }
        $category = ProductCategory::model()->findAllByAttributes(array('parent' => $parent->parent));
        $cats = ProductCategory::model()->findAllByattributes(array('parent' => $parent->id), array('condition' => "id != $parent->id"));
        $dataProvider = Yii::app()->Menu->MenuCategories($cats, $parent);
        $this->render('index', array('dataProvider' => $dataProvider, 'parent' => $parent, 'category' => $category, 'name' => $name));
        exit;
    }

    public function actionDetail($name) {
        $prduct = Products::model()->findByAttributes(array('canonical_name' => $name, 'status' => 1));
//        $related_products = explode(",", $prduct->related_products);
        if (!empty($prduct)) {
            $this->render('detailed', array('product' => $prduct));
        } else {
            $this->redirect(array('Site/Error'));
        }
    }

    public function actionProducts() {

//        $dataProvider = new CActiveDataProvider('Products', array(
//            'criteria' => array(
//                'condition' => 'status = 1',
//            ),
//            'pagination' => array(
//                'pageSize' => 6,
//            ),
//            'sort' => array(
//                //'defaultOrder' => 'price ASC',
////                'defaultOrder' => $srt,
//            )
//                )
//        );
//        if (!empty($dataProvider)) {
//            $this->render('products', array('dataProvider' => $dataProvider));
//        } else {
//            $this->redirect(array('Site/Error'));
//        }


        $criteria = new CDbCriteria;
        $total = Products::model()->count();

        $pages = new CPagination($total);
        $pages->pageSize = 6;
        $pages->applyLimit($criteria);

        $products = Products::model()->findAll($criteria);

        $this->render('products', array(
            'products' => $products,
            'pages' => $pages,
        ));
    }

}
