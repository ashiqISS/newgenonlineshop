<?php

class CartController extends Controller {

        public function actionIndex() {
                $this->render('index');
        }

        public function init() {
                date_default_timezone_set('Asia/Calcutta');
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
                        $session_id = Yii::app()->session['temp_user'];
                        if ($session_id) {
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
                if (Yii::app()->user->getId() == '') {

                        $this->redirect(Yii::app()->getBaseUrl() . '/user.php/login');
                }
                if (Yii::app()->user->getId()) {

                        $user_details = Users::model()->findByPk(Yii::app()->user->getState('user_id'));
                        $id = $user_details->id;
                        $cart_items = Cart::model()->findAllByAttributes(array('user_id' => $id));
                        if (isset(Yii::app()->session['temp_user'])) {
                                $condition = "user_id = " . $id . " AND session_id = " . Yii::app()->session['temp_user'];
                        } else {
                                Yii::app()->session['temp_user'] = microtime(true);
                                $condition = "user_id = " . $id . " AND session_id = " . Yii::app()->session['temp_user'];
                        }
                } else {
                        $temp_id = Yii::app()->session['temp_user'];

                        $cart_items = Cart::model()->findAllByAttributes(array('session_id' => $temp_id));

                        $condition = "session_id = " . $temp_id;
                }

                $coupon = CouponHistory::model()->find(array('condition' => $condition));
                if (!empty($coupon)) {
                        $coupen_details = Coupons::model()->findByPk($coupon->coupon_id);
                        $coupon_amount = Coupons::model()->findByPk($coupon->coupon_id)->discount;
                } else {
                        $coupen_details = NULL;
                        $coupon_amount = 0;
                }
                if (!empty($cart_items)) {
                        $granttotal = Yii::app()->Discount->Granttotal();
                        $this->render('buynow', array('carts' => $cart_items, 'coupen_details' => $coupen_details, 'coupon_amount' => $coupon_amount, 'granttotal' => $granttotal));
                } else {
                        $this->render('empty_cart', array());
                }
        }

        public function granttotal() {
                if (Yii::app()->user->getId()) {
                        $cart_items = cart::model()->findAllByAttributes(array('user_id' => Yii::app()->user->getId()));
                        $user_id = Yii::app()->user->getId();
                        if (isset(Yii::app()->session['temp_user'])) {
                                $condition = "user_id = " . $user_id . " AND session_id = " . Yii::app()->session['temp_user'];
                        } else {
                                Yii::app()->session['temp_user'] = microtime(true);
                                $condition = "user_id = " . $user_id . " AND session_id = " . Yii::app()->session['temp_user'];
                        }
                } else if (isset(Yii::app()->session['temp_user'])) {
                        $cart_items = cart::model()->findAllByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                        $user_id = Yii::app()->session['temp_user'];
                        $condition = "session_id = " . $user_id;
                }
                $coupon = CouponHistory::model()->find(array('condition' => $condition));
                if (!empty($coupon)) {
                        $coupen_details = Coupons::model()->findByPk($coupon->coupon_id);
                        $coupon_amount = Coupons::model()->findByPk($coupon->coupon_id)->discount;
                } else {
                        $coupen_details = NULL;
                        $coupon_amount = 0;
                }
                $tax = Yii::app()->Discount->Taxcalculate($cart_items);
                foreach ($cart_items as $cart_item) {
                        $product = Products::model()->findByPk($cart_item->product_id);
                        $ship +=$product->special_price;
                        $price = Yii::app()->Discount->DiscountAmount($product);
                        $subtotal += ($price * $cart_item->quantity);
                }
                foreach ($tax as $taxs => $value) {
                        $val +=$value;
                }
                return $subtotal - $coupon_amount + $ship + $val;
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

        public function actionUpdateCart() {
                $cart_quantity = $_POST['cart_quantity'];
                $cart_id = $_POST['cart_id'];
                if (Yii::app()->user->getId()) {

                        $user_id = Yii::app()->user->getId();
                        if (isset(Yii::app()->session['temp_user'])) {
                                $condition = "user_id = " . $user_id . " AND session_id = " . Yii::app()->session['temp_user'];
                        } else {
                                Yii::app()->session['temp_user'] = microtime(true);
                                $condition = "user_id = " . $user_id . " AND session_id = " . Yii::app()->session['temp_user'];
                        }
                } else {

                        $user_id = Yii::app()->session['temp_user'];
                        $condition = "session_id = " . $user_id;
                }
                $cou_used = CouponHistory::model()->find(array('condition' => $condition));

                $model = Cart::model()->findByPk($cart_id);
                $model->quantity = $cart_quantity;
                if ($model->save()) {
                        $total_amount = $this->subtotalamount();
                        $coupon_validation = Coupons::model()->findByPk($cou_used->coupon_id);
                        if ($coupon_validation->cash_limit != 0) {
                                if ($total_amount <= $coupon_validation->cash_limit) {
                                        $cou_used->deleteAll();
                                }
                        } else {
                                if ($total_amount < $coupon_validation->discount) {
                                        $cou_used->deleteAll();
                                }
                        }
                        $this->redirect(array('cart/MyCart'));
                }
        }

        public function actionUpdateCoupon() {
                $coupon_code = $_POST['coupon_code'];
                if (Yii::app()->user->getId()) {

                        $user_details = Users::model()->findByPk(Yii::app()->user->getState('user_id'));
                        $user_id = $user_details->id;

                        if (isset(Yii::app()->session['temp_user'])) {

                                $condition = "user_id = " . $user_id . " AND session_id = " . Yii::app()->session['temp_user'];
                        } else {
                                Yii::app()->session['temp_user'] = microtime(true);
                                $condition = "user_id = " . $user_id . " AND session_id = " . Yii::app()->session['temp_user'];
                        }
                } else {
                        $user_id = Yii::app()->session['temp_user'];
                        $condition = "session_id = " . $user_id;
                }

                $cou_used = CouponHistory::model()->find(array('condition' => $condition));
                if (empty($cou_used)) {

                        $coupon_validation = Coupons::model()->find(array('condition' => "code = '" . $coupon_code . "'"));
                        if (!empty($coupon_validation)) {
                                $is_coupon_exist = CouponHistory::model()->findByAttributes(array('coupon_id' => $coupon_validation->id), array('condition' => $condition));

                                if (empty($is_coupon_exist)) {

                                        $total_amount = $this->subtotalamount();

                                        if ($coupon_validation->cash_limit != 0) {

                                                if ($total_amount > $coupon_validation->cash_limit) {
                                                        $new_coupen_value = new CouponHistory;
                                                        $new_coupen_value->coupon_id = $coupon_validation->id;
                                                        $new_coupen_value->total_amount = $coupon_validation->discount;
                                                        $new_coupen_value->status = 1;
                                                        if (Yii::app()->user->getId()) {
                                                                $new_coupen_value->user_id = $user_id;
                                                                $new_coupen_value->session_id = Yii::app()->session['temp_user'];
                                                        } else {
                                                                $new_coupen_value->session_id = $user_id;
                                                        }
                                                        if ($new_coupen_value->save(false)) {
                                                                Yii::app()->user->setFlash('success', "Successfully Added Your Coupen Code");
                                                                $this->redirect(array('cart/MyCart'));
                                                        }
                                                } else {
                                                        Yii::app()->user->setFlash('error', "Your Coupon Code Cannot be applied . Because Your Sub Total  is shoulbe grater than  " . Yii::app()->Currency->convert($coupon_validation->cash_limit));
                                                        $this->redirect(array('cart/MyCart'));
                                                }
                                        } else {

                                                if ($total_amount > $coupon_validation->discount) {

                                                        $new_coupen_value = new CouponHistory;
                                                        $new_coupen_value->coupon_id = $coupon_validation->id;
                                                        $new_coupen_value->total_amount = $coupon_validation->discount;
                                                        $new_coupen_value->status = 1;

                                                        if (Yii::app()->user->getId()) {
                                                                $new_coupen_value->user_id = $user_id;
                                                                $new_coupen_value->session_id = Yii::app()->session['temp_user'];
                                                        } else {
                                                                $new_coupen_value->session_id = $user_id;
                                                        }
                                                        if ($new_coupen_value->save(false)) {
                                                                Yii::app()->user->setFlash('success', "Successfully Added Your Coupen Code");
                                                                $this->redirect(array('cart/MyCart'));
                                                        }
                                                } else {
                                                        Yii::app()->user->setFlash('error', "Your Coupon Code Cannot be applied . Because Your Sub Total  is shoulbe grater than " . Yii::app()->Currency->convert($coupon_validation->discount));

                                                        $this->redirect(array('cart/MyCart'));
                                                }
                                        }
                                } else {
                                        Yii::app()->user->setFlash('error', "The Entered Coupen You Already Used");
                                        $this->redirect(array('cart/MyCart'));
                                }
                        } else {
                                Yii::app()->user->setFlash('error', "The Entered Coupen Is Invalid");
                                $this->redirect(array('cart/MyCart'));
                        }
                } else {
                        Yii::app()->user->setFlash('error', "You Already Applied A Coupon. Only One coupon can applay in a Order.");
                        $this->redirect(array('cart/MyCart'));
                }
        }

        public function subtotalamount() {
                if (Yii::app()->user->getId()) {
                        $cart = cart::model()->findAllByAttributes(array('user_id' => Yii::app()->user->getId()));
                } else {
                        $cart = cart::model()->findAllByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                }

                foreach ($cart as $cart_item) {
                        $product = Products::model()->findByPk($cart_item->product_id);
                        $price = Yii::app()->Discount->DiscountExtax($product);
                        $subtotal += ($price * $cart_item->quantity);
                }
                return $subtotal;
        }

        public function actionTotal() {

                if (Yii::app()->user->getState('user_id') != '' && Yii::app()->user->getState('user_id') != NULL) {
                        $id = Yii::app()->user->getState('user_id');
                        $cart_items = Cart::model()->findAllByAttributes(array('user_id' => $id));
                        if (isset(Yii::app()->session['temp_user'])) {
                                $condition = "user_id = " . $user_id . " AND session_id = " . Yii::app()->session['temp_user'];
                        } else {
                                Yii::app()->session['temp_user'] = microtime(true);
                                $condition = "user_id = " . $user_id . " AND session_id = " . Yii::app()->session['temp_user'];
                        }
                } else {
                        $temp_id = Yii::app()->session['temp_user'];
                        $cart_items = Cart::model()->findAllByAttributes(array('session_id' => $temp_id));
                        $condition = "session_id = " . $user_id;
                }
                $total = 0;
                $coupon = CouponHistory::model()->find(array('condition' => $condition));
                if (!empty($coupon)) {
                        $coupen_details = Coupons::model()->findByPk($coupon->coupon_id);
                        $coupon_amount = Coupons::model()->findByPk($coupon->coupon_id)->discount;
                } else {
                        $coupen_details = NULL;
                        $coupon_amount = 0;
                }
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
                $sub = $total - $coupon_amount;
                echo Yii::app()->Currency->convert($sub);
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
                $cart_id = $id;

                if (Yii::app()->user->getId()) {

                        $user_id = Yii::app()->user->getId();
                        if (isset(Yii::app()->session['temp_user'])) {
                                $condition = "user_id = " . $user_id . " AND session_id = " . Yii::app()->session['temp_user'];
                        } else {
                                Yii::app()->session['temp_user'] = microtime(true);
                                $condition = "user_id = " . $user_id . " AND session_id = " . Yii::app()->session['temp_user'];
                        }
                } else {
                        $user_id = Yii::app()->session['temp_user'];
                        $condition = "session_id = " . $user_id;
                }
                $cou_used = CouponHistory::model()->find(array('condition' => $condition));

                $cart_items = Cart::model()->findAllByAttributes(array('user_id' => $user_id));

                if ($cart_items) {
                        $total_amount = $this->subtotalamount();
                        $coupon_validation = Coupons::model()->findByPk($cou_used->coupon_id);

                        if ($coupon_validation->cash_limit != 0) {
                                if ($total_amount <= $coupon_validation->cash_limit) {
                                        $cou_used->deleteAll();
                                }
                        } else {
                                if ($total_amount < $coupon_validation->discount) {
                                        $cou_used->deleteAll();
                                }
                        }
                        $this->redirect(array('cart/MyCart'));
                }
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

        public function actionRemoveWishlist() {
                if ($_REQUEST['prod_id'] != '') {
                        $id = $_REQUEST['prod_id'];
                        $user_id = Yii::app()->user->getId();
                        $model = Wishlist::model()->findByAttributes(array('user_id' => $user_id, 'product_id' => $id));
                        if ($model->delete()) {
                                Yii::app()->user->setFlash('removeWishlist', "Item removed from wishlist");
                        } else {
                                Yii::app()->user->setFlash('removeWishlist', "Cannot remove item now. Please try later!");
                        }
                } else {
                        Yii::app()->user->setFlash('removeWishlist', "Product not found. Please try later!");
                }
        }

        public function actioncatMnu() {
//        $query = mysql_query('SELECT * FROM `product_category`');
                $categories = ProductCategory::model()->findAll();
//        $count = count($categories);
//        for($i = 0;$i<= $count; $i++)
                foreach ($categories as $category) {
                        if ($category->id == $category->parent) {
                                echo '<br>=========================================<br>';
                                echo $category->category_name;
                                $this->showCategory($category->id);
                        }
                }
        }

        public function showCategory($parent) {

                if ($subcats = ProductCategory::model()->findAllByAttributes(array('parent' => $parent), array('condition' => "id != $parent"))) {


                        foreach ($subcats as $subcategory) {

                                echo '<br>';
                                echo '--' . $subcategory->category_name;
                                $this->showCategory($subcategory->id);
                        }
                }
        }

        public function actionRemoveCoupon() {
                if (isset(Yii::app()->session['couponid'])) {
                        if (isset(Yii::app()->session['user']))
                                $data = CouponHistory::model()->findByAttributes(array('user_id' => Yii::app()->session['user'], 'coupon_id' => Yii::app()->session['couponid']));
                        elseif (isset(Yii::app()->session['temp_user']))
                                $data = CouponHistory::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user'], 'coupon_id' => Yii::app()->session['couponid']));
                        if ($data->delete())
                                unset(Yii::app()->session['couponid']);
                        $this->redirect(Yii::app()->request->urlReferrer);
                }
        }

}
