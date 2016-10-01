<?php

class ProductController extends Controller {

    public function actionCategory($name) {
        $this->redirect(array('products', 'cat_name' => $name));
    }
    
    public function actionOffers() {
        $this->redirect(array('products', 'offers' => 1));
    }

    public function actionDetail($name) {

        $prduct = Products::model()->findByAttributes(array('canonical_name' => $name, 'status' => 1));
        $related_products = explode(",", $prduct->related_products);
        $criteria = new CDbCriteria();
        $criteria->select = '`product_id`, COUNT(`product_id`) AS `value_occurrence`';
        $criteria->group = '`product_id`';

        if (!empty($prduct)) {
            $this->AddProductViewed($prduct);

            $value = trim($prduct->category_id, ",");
            $category = explode(",", $value);
            foreach ($category as $cats) {
                $condition .= 'category_id like "%' . $cats . '%" OR ';
            }
            $condition = trim($condition, " OR ");
            $criteria->having = '`product_id` IN (SELECT `id` FROM `products` WHERE ' . $condition . ')';
            $criteria->order = '`value_occurrence` DESC';
            $bestsellers = OrderProducts::model()->findAll($criteria);

            $you_may_also_like = Products::model()->findAll(array('condition' => 'status = 1 AND is_admin_approved = 1 AND (' . $condition . ')'));


            $this->render('detailed', array('product' => $prduct, 'related_products' => $related_products, 'you_may_also_like' => $you_may_also_like, 'best_sellers' => $bestsellers));
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
//        print_r($_POST);
        $brands = $price = $category = $category_name = '';
        $def_min = $min = 50;
        $def_max = $max = 20000;
//        echo $def_min = Yii::app()->db->createCommand("SELECT min(`price`) FROM `products`")->queryScalar();
//        echo $def_max = Yii::app()->db->createCommand('SELECT max(`price`) FROM `products`')->queryScalar();
        $criteria = new CDbCriteria;
        $criteria->condition = 'status = 1 AND is_admin_approved = 1 AND `sale_to` >= CURDATE() ';
//        is_discount_available
         if (isset($_GET['offers']) && $_GET['offers'] == 1) {
             $criteria->addCondition("`is_discount_available` = 1");
        }
        
        if (isset($_GET['cat_name']) && $_GET['cat_name'] != "" || (isset($_POST['category']) && $_POST['category'] != '')) {
            $category = $_GET['cat_name'];
            if (isset($_POST['category'])) {
                $category = $_POST['category'];
            }

            $cat_details = ProductCategory::model()->findByAttributes(array('canonical_name' => $category));
            if (!empty($cat_details)) {
                $criteria->addCondition("`category_id` like '%$cat_details->id%' ");
            }
        }

        if (isset($_POST['brand_inputs']) && $_POST['brand_inputs'] != "") {
            $brands = $_POST['brand_inputs'];
            $brs = explode(',', $brands);
            foreach ($brs as $brand) {
//                $find_in_set .= "FIND_IN_SET('$brand',`brand_id`) OR ";
                $condition .= "`brand_id` = $brand OR";
            }
            $condition = rtrim($condition, ' OR');
            $criteria->condition = $condition;
        }

        if (isset($_POST['priceRange']) && $_POST['priceRange'] != '') {
            $price = $_POST['priceRange'];


            if ($price != '') {
                $new_price = explode(',', $price);
                $min = $new_price[0];
                $max = $new_price[1];
                $price = str_replace(",", " AND ", $price);
                $price_condition .= "price BETWEEN $price OR ";
                $price_condition = rtrim($price_condition, ' OR');
                $criteria->addCondition($price_condition);
//                                var_dump($criteria->addCondition($price_condition));
//                                exit;
            }
        }
//        if (isset($_POST['priceRange']) && $_POST['priceRange'] != '') {
//            $price = $_POST['priceRange'];
//            $prc = explode(', ', $price);
//            foreach ($prc as $price) {
//                $price_condition .= "price BETWEEN $price OR ";
//            }
//            $price_condition = rtrim($price_condition, ' OR');
//            $criteria->addCondition($price_condition);
//        }
//        var_dump($criteria);
        $criteria->order = 'id desc';
        $total = Products::model()->count($criteria);

        $pages = new CPagination($total);
        $pages->pageSize = 6;
        $pages->applyLimit($criteria);

        $products = Products::model()->findAll($criteria);

        $this->render('products', array(
            'products' => $products,
            'pages' => $pages,
            'file_name' => '_searchresult',
            'parameter' => $_REQUEST['saerchterm'],
            'brandsel' => $brands,
            'price' => $price,
            'category' => $category,
            'cat_details' => $cat_details,
            'search_parm' => $category,
            'min' => $min,
            'max' => $max,
            'def_min' => $def_min,
            'def_max' => $def_max
        ));
    }

    public function actionAddreview() {
        if (Yii::app()->request->isAjaxRequest) {
            $name = $_REQUEST['name'];
            $email = $_REQUEST['email'];
            $comment = $_REQUEST['comment'];
            $star = $_REQUEST['star'];
            $review_product_id = $_REQUEST['review_product_id'];
            $review_exist = UserReviews::model()->findByAttributes(array('author' => $name, 'email' => $email));
            if (!empty($review_exist)) {
                echo 1;
            } else {
                $reviews = new UserReviews;
                if (isset(Yii::app()->session['user'])) {
                    $reviews->user_id = Yii::app()->user->getId();
                }
                $reviews->author = $name;
                $reviews->email = $email;
                $reviews->review = $comment;
                $reviews->rating = $star;
                $reviews->product_id = $review_product_id;

                if ($reviews->save(false)) {
                    echo 2;
                } else {
                    echo 3;
                }
            }
        }
    }

}
