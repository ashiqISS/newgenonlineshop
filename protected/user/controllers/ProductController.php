<?php

class ProductController extends Controller {

        public function actionCategory($name) {
                $parent = ProductCategory::model()->findByAttributes(array('canonical_name' => $name));
                if (empty($parent)) {
                        $this->render('ProductNotfound');
                        return FALSE;
                }
                if (isset($_GET['brand'])) {
                        $brand = $_GET['brand'];
                } else {
                        $brand = '';
                }

                $category = ProductCategory::model()->findAllByAttributes(array('parent' => $parent->parent));
                $cats = ProductCategory::model()->findAllByattributes(array('parent' => $parent->id), array('condition' => "id != $parent->id"));
                $dataProvider = Yii::app()->Menu->MenuCategories($cats, $parent, $brand);
                $this->render('index', array('dataProvider' => $dataProvider, 'parent' => $parent, 'category' => $category, 'name' => $name, 'brand' => $brand));
                exit;
        }

        public function init() {
                date_default_timezone_set('Asia/Calcutta');
        }

        public function actionDetail($name) {

                $prduct = Products::model()->findByAttributes(array('canonical_name' => $name, 'status' => 1));
                $related_products = explode(",", $prduct->related_products);

                if (!empty($prduct)) {
                        $this->AddProductViewed($prduct);

                        $value = trim($prduct->category_id, ",");
                        $category = explode(",", $value);
                        foreach ($category as $cats) {
                                $condition .= 'category_id like "%' . $cats . '%" OR ';
                        }
                        $condition = trim($condition, " OR ");
                        $you_may_also_like = Products::model()->findAll(array('condition' => 'status = 1 AND is_admin_approved = 1 AND (' . $condition . ')'));


                        $this->render('detailed', array('product' => $prduct, 'related_products' => $related_products, 'you_may_also_like' => $you_may_also_like));
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

                $brands = '';
                $price = '';
                $criteria = new CDbCriteria;
                $criteria->condition = 'status = 1';

                if (isset($_POST['brand_inputs'])) {
                        $brands = $_POST['brand_inputs'];
                        if ($brands != '') {
                                $brs = explode(', ', $brands);
                                foreach ($brs as $brand) {
                                        $find_in_set .= "FIND_IN_SET('$brand',`brand_id`) OR ";
                                }
                                $find_in_set = rtrim($find_in_set, ' OR');
                                $criteria->addCondition($find_in_set);
                        }
                }


                if (isset($_POST['priceRange'])) {
                        $price = $_POST['priceRange'];

                        if ($price != '') {
                                $prc = explode(', ', $price);
                                foreach ($prc as $price) {
                                        $price_condition .= "price BETWEEN $price OR ";
                                }
                                $price_condition = rtrim($price_condition, ' OR');
                                $criteria->addCondition($price_condition);
                        }
                }


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
                    'search_parm' => $category,
                    'searchterm' => $searchterm
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
