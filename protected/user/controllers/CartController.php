<?php

class CartController extends Controller {

        public function actionIndex() {
                $this->render('index');
        }

        public function actionBuynow() {

                $id = $_REQUEST['prod'];
                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {

                        $user_id = Yii::app()->session['user']['id'];
                        Cart::model()->deleteAllByAttributes(array(), array('condition' => 'date < subdate(now(), 1) and user_id != ' . Yii::app()->session['user']['id']));
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

                if (Cart::model()->findByAttributes(array(), array('condition' => ($condition . ' and product_id=' . $id . ' ' )))) {
                        exit;
                        $this->redirect(array('Mycart'));
                } else {
                        echo $option_id;

                        $model = new cart;
                        $model->user_id = $user_id;
                        $model->session_id = $sessonid;
                        $pro_details = Products::model()->findByPk($id);
                        $model->product_id = $pro_details->id;
                        $model->quantity = 1;
                        $model->date = date('Y-m-d');
                        if ($model->save()) {
                                $this->redirect(array('Mycart'));
                        }
                }
        }

        public function actionMycart() {

                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {

                        $user_details = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);

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

                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                        $id = Yii::app()->session['user']['id'];
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
                if (isset(Yii::app()->session['user']['id'])) {
                        Cart::model()->deleteAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
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

}
