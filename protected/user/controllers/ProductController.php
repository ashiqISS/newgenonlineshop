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
        $related_products = explode(",", $prduct->related_products);
        if (!empty($prduct)) {
            $this->AddProductViewed($prduct);
            $this->render('detailed', array('product' => $prduct, 'related_products' => $related_products));
        } else {
            $this->redirect(array('Site/Error'));
        }
    }

    public function AddProductViewed($product) {
        $product_view = new ProductViewed;
        if (Yii::app()->user->getId()) {
            $user_id = Yii::app()->user->getId();
            $product_view_exist = ProductViewed::model()->findByAttributes(array('user_id' => $user_id, 'product_id' => $product->id));
            if ($product_view_exist == NULL) {
                $product_view->date = date('Y-m-d');
                $product_view->product_id = $product->id;
                $product_view->session_id = NULL;
                $product_view->user_id = $user_id;
                if ($prduct->id != '') {
                    $product_view->save(FALSE);
                }
            }
        } else {
            if (!isset(Yii::app()->session['temp_user'])) {
                Yii::app()->session['temp_user'] = microtime(true);
            }
            $sessonid = Yii::app()->session['temp_user'];
            $product_view_exist = ProductViewed::model()->findByAttributes(array('session_id' => $sessonid, 'product_id' => $product->id));

            if (empty($product_view_exist) && $product_view_exist == NULL) {
                $product_view->date = date('Y-m-d');
                $product_view->product_id = $product->id;
                $product_view->session_id = $sessonid;
                $product_view->user_id = NULL;
                if ($product->id != '') {
                    $product_view->save(FALSE);
                }
            }
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
