<?php

class CartController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionBuynow() {

        $id = $_REQUEST['prod_id'];
        $canonical_name = $_REQUEST['cano_name'];
        $qty = $_REQUEST['qty'];
//        $id = Products::model()->findByAttributes(array('canonical_name' => $canonical_name))->id;
        if (Yii::app()->user->getId()) {

            $user_id = Yii::app()->user->getId();
            Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1) and user_id != ' . $user_id));
        } else {
            if (!isset(Yii::app()->session['temp_user'])) {
                Yii::app()->session['temp_user'] = microtime(true);
            }
            Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1)'));
            $sessonid = Yii::app()->session['temp_user'];
        }
        if (isset($user_id)) {
            $condition = "user_id= $user_id";
        } else if (isset($sessonid)) {
            $condition = "session_id= $sessonid";
        }

        $cart = Cart::model()->findByAttributes(array(), array('condition' => ($condition . ' and product_id=' . $id)));
        if (!empty($cart)) {
            $cart->quantity = $cart->quantity + $qty;
            $cart->update();
            $cart_contents = Cart::model()->findAllByAttributes(array(), array('condition' => ($condition)));

            if (!empty($cart_contents)) {
                echo ' <div class="drop_cart">';
                foreach ($cart_contents as $cart_content) {

                    $prod_details = Products::model()->findByPk($cart_content->product_id);
                    $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);

                    $total = $cart_content->quantity * $prod_details->price;

                    $this->renderPartial('_cartcontents', array('cart_content' => $cart_content, 'prod_details' => $prod_details, 'folder' => $folder, 'total' => $total));

                    $subtotoal = $subtotoal + $total;
                }
                $this->renderPartial('_cartfooter', array('subtotoal' => $subtotoal));
                echo ' </div>';
            } else {
                echo 'Cart box is Empty';
            }
        } else {

            $model = new cart;
            $model->user_id = $user_id;
            $model->session_id = $sessonid;
            $model->product_id = $id;
            $model->quantity = $qty;
            $model->date = date('Y-m-d');
            if ($model->save()) {

                $cart_contents = Cart::model()->findAllByAttributes(array(), array('condition' => ($condition)));

                if (!empty($cart_contents)) {
                    echo ' <div class="drop_cart">';
                    foreach ($cart_contents as $cart_content) {
                        $prod_details = Products::model()->findByPk($cart_content->product_id);

                        $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);
                        $total = $cart_content->quantity * $prod_details->price;

                        $this->renderPartial('_cartcontents', array('cart_content' => $cart_content, 'prod_details' => $prod_details, 'folder' => $folder, 'total' => $total));

                        $subtotoal = $subtotoal + $total;
                    }
                    $this->renderPartial('_cartfooter', array('subtotoal' => $subtotoal));
                    echo ' </div>';
                } else {
                    echo 'Cart box is Empty';
                }
            }
        }




//
//        if (Yii::app()->user->getId()) {
//
//            $user_id = Yii::app()->user->getId();
//            Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1) and user_id != ' . $user_id));
//        } else {
//            if (!isset(Yii::app()->session['temp_user'])) {
//                Yii::app()->session['temp_user'] = microtime(true);
//            }
//            Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1)'));
//            $sessonid = Yii::app()->session['temp_user'];
//        }
//        if (isset($user_id)) {
//            $condition = "user_id= $user_id";
//        } else if (isset($sessonid)) {
//            $condition = "session_id= $sessonid";
//        }
//
//        if (Cart::model()->findByAttributes(array(), array('condition' => ($condition . " and product_id = $id")))) {
//            exit;
//            $this->redirect(array('Mycart'));
//        } else {
//            echo $option_id;
//
//            $model = new cart;
//            $model->user_id = $user_id;
//            $model->session_id = $sessonid;
//            $pro_details = Products::model()->findByPk($id);
//            $model->product_id = $pro_details->id;
//            $model->quantity = 1;
//            $model->date = date('Y-m-d');
//            if ($model->save()) {
//                $this->redirect(array('Mycart'));
//            }
//        }
    }

    public function actionGetcartcount() {

        if (Yii::app()->user->getId()) {
            $cart_items = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->user->getId()));
            $counts = count($cart_items);
        } else {
            if (isset(Yii::app()->session['temp_user'])) {
                $cart_items = Cart::model()->findAllByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                $counts = count($cart_items);
            } else {
                $counts = 0;
            }
        }
        echo $counts;
    }

    public function actionGetcarttotal() {

        if (Yii::app()->user->getId()) {
            $cart_items = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->user->getId()));
            if (!empty($cart_items)) {
                foreach ($cart_items as $cart_item) {
                    $product = Products::model()->findByPk($cart_item->product_id);
                    $ptotal = $product->price * $cart_item->quantity;
//$subtotoal = $subtotoal + $total;
                    $carttotal += $ptotal;
                }
                echo Yii::app()->Currency->convert($carttotal);
            } else {
                echo Yii::app()->Currency->convert(0);
            }
        } else {
            if (isset(Yii::app()->session['temp_user'])) {
                $cart_items = Cart::model()->findAllByAttributes(array('session_id' => Yii::app()->session['temp_user']));

                if (!empty($cart_items)) {
                    foreach ($cart_items as $cart_item) {
                        $product = Products::model()->findByPk($cart_item->product_id);
                        $ptotal = $product->price * $cart_item->quantity;
                        $carttotal += $ptotal;
                    }
                    echo Yii::app()->Currency->convert($carttotal);
                } else {
                    echo Yii::app()->Currency->convert(0);
                }
            } else {
                echo Yii::app()->Currency->convert(0);
            }
        }
    }

    public function actionSelectcart() {

        if (Yii::app()->user->getId()) {
            $user_id = Yii::app()->user->getId();
            $cart_contents = Cart::model()->findAllByAttributes(array('user_id' => $user_id));
            if (!empty($cart_contents)) {
                echo ' <div class="drop_cart">';
                foreach ($cart_contents as $cart_content) {
                    $prod_details = Products::model()->findByPk($cart_content->product_id);
                    $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);
                    $total = $cart_content->quantity * $prod_details->price;
                    $this->renderPartial('_cartcontents', array('cart_content' => $cart_content, 'prod_details' => $prod_details, 'folder' => $folder, 'total' => $total));
                    $subtotoal = $subtotoal + $total;
                }
                $this->renderPartial('_cartfooter', array('subtotoal' => $subtotoal));
                echo '</div>';
            } else {
                echo 'Cart box is Empty';
            }
        } else {
            if (Yii::app()->user->getId()) {

                $session_id = Yii::app()->session['temp_user'];
                $cart_contents = Cart::model()->findAllByAttributes(array('session_id' => $session_id));
                if (!empty($cart_contents)) {
                    echo ' <div class="drop_cart">';
                    foreach ($cart_contents as $cart_content) {
                        $prod_details = Products::model()->findByPk($cart_content->product_id);
                        $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);
                        $total = $cart_content->quantity * $prod_details->price;
                        $this->renderPartial('_cartcontents', array('cart_content' => $cart_content, 'prod_details' => $prod_details, 'folder' => $folder, 'total' => $total));
                        $subtotoal = $subtotoal + $total;
                    }
                    $this->renderPartial('_cartfooter', array('subtotoal' => $subtotoal));
                    echo '</div>';
                } else {
                    echo 'Cart box is Empty';
                }
            } else {
                echo 'Cart box is Empty';
            }
        }
    }

    public function actionMycart() {

        if (Yii::app()->user->getId()) {

            $user_details = Users::model()->findByPk(Yii::app()->user->getState('user_id'));

            $id = $user_details->id;

            $cart_items = Cart::model()->findAllByAttributes(array('user_id' => $id));
        } else {
            $temp_id = Yii::app()->session['temp_user'];
            $cart_items = Cart::model()->findAllByAttributes(array('session_id' => $temp_id));
        }

        if (!empty($cart_items)) {
            $this->render('buynow', array('carts' => $cart_items));
        } else {
            $this->render('empty_cart', array());
        }
    }

    public function actionCalculate() {
        if (Yii::app()->request->isAjaxRequest) {
            $cart_id = $_POST['cart_id'];
            $quantity = $_POST['Qty'];
            $product_id = $_POST['prod_id'];
            $model = $this->loadModel($cart_id);
            $model->quantity = $quantity;
            $model->save();

            $product_details = Products::model()->findByPk($product_id);
            if ($product_details->discount) {
                $product_price = $product_details->price - $product_details->discount;
            } else {
                $product_price = $product_details->price;
            }

            $total = $product_price * $model->quantity;
            echo Yii::app()->Currency->convert($total);
        } else {
            echo "";
        }
    }

    public function actionTotal() {

        if (Yii::app()->user->getState('user_id') != '' && Yii::app()->user->getState('user_id') != NULL) {
            $id = Yii::app()->user->getState('user_id');
            $cart_items = Cart::model()->findAllByAttributes(array('user_id' => $id));
        } else {
            $temp_id = Yii::app()->session['temp_user'];
            $cart_items = Cart::model()->findAllByAttributes(array('session_id' => $temp_id));
        }
        $total = 0;
        foreach ($cart_items as $items) {

            $product = Products::model()->findByAttributes(array('id' => $items->product_id));
            if ($product->discount) {
                $prod_price = $product->price - $product->discount;
            } else {
                $prod_price = $product->price;
            }

            $price = ($prod_price) * ($items->quantity);

            $total+= $price;
        }
        echo Yii::app()->Currency->convert($total);
    }

    public function actionEmptyCart() {
        if (Yii::app()->user->getState('user_id')) {
            Cart::model()->deleteAllByAttributes(array('user_id' => Yii::app()->user->getState('user_id')));
        } else if (isset(Yii::app()->session['temp_user'])) {
            Cart::model()->deleteAllByAttributes(array('session_id' => Yii::app()->session['temp_user']));
        }
        $this->redirect(Yii::app()->baseUrl . '/index.php/site/index');
    }

    public function loadModel($id) {
        $model = Cart::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionDelete($id) {
        $model = $this->loadModel($id);
        $model->delete();
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('Mycart'));
    }

    public function actionWishlist() {
        if ($_REQUEST['prod_id'] != '') {
            $id = $_REQUEST['prod_id'];
            $user_id = Yii::app()->user->getId();
            if (Wishlist::model()->findByAttributes(array('user_id' => $user_id, 'product_id' => $id))) {
                
            } else {
                $model = new Wishlist;
                $model->user_id = $user_id;
                $model->product_id = $id;
                $model->DOC = date('Y-m-d');
                $model->save();
            }
        }
    }

}
