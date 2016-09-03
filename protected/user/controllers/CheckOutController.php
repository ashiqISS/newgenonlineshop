<?php

class CheckOutController extends Controller {

    public function accessRules() {
        return array(
//            array('allow', // allow all users to perform 'index' and 'view' actions
////                'actions' => array('addProduct', 'myProducts', 'edit', 'deleteproduct','view'),
//                'users' => array('*'),
//            ),
            array('allow', // allow authenticated users to access all actions
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
//                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $this->render('index');
    }

    public function actionCheckout() {

        $bill_address_id = $ship_address_id = $defaultShipping = $defaultBilling = $address = '';
        $user = Users::model()->findByPk(Yii::app()->user->getId());
        $buyer = BuyerDetails::model()->findByAttributes(array('user_id' => Yii::app()->user->getId()));
        $cart = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->user->getId()));

        $params = array();
        if (isset($_POST['total_amt'])) {
            $total_amt = $_POST['total_amt'];
            $user_id = Yii::app()->user->getState('user_id');
            $cart = Cart::model()->findAllByAttributes(array('user_id' => $user_id));
            if (!empty($cart)) {

                $billing = new UserAddress;
                $shipping = new UserAddress;
                $address_id = '';

                if ($_REQUEST['bill_address'] == 0) {
                    if (isset($_POST['UserAddress']['bill'])) {
                        $billing_address = $this->addAddress($billing, $_POST['UserAddress']['bill']);
                        $bill_address_id = $billing_address;
                    }
                } else {
                    $bill_address_id = $_REQUEST['bill_address'];
                }
                if ($_REQUEST['billing_same'] == NULL) {
                    if ($_REQUEST['ship_address'] == 0) {
                        if (isset($_POST['UserAddress']['ship'])) {
                            $shipping_address = $this->addAddress($shipping, $_POST['UserAddress']['ship']);
                            $ship_address_id = $shipping_address;
                        }
                    } else {
                        $ship_address_id = $_REQUEST['ship_address'];
                    }
                } else {
                    $ship_address_id = $bill_address_id;
                }
                $shipp_address = UserAddress::model()->findByPk($ship_address_id);

                if (isset(Yii::app()->session['currency'])) {
                    $currency_rate = Yii::app()->session['currency']['rate'];
                } else {
                    $currency_rate = 1;
                }
                $granttotal = round(($currency_rate * $subtotal), 2);


                if (isset(Yii::app()->session['currency'])) {
                    if (Yii::app()->session['currency']['rate'] == 1) {
                        $total_balance_to_pay = $granttotal;
                    } else {
                        $total_balance_to_pay = ceil($granttotal / Yii::app()->session['currency']['rate']);
                    }
                }


                if (($bill_address_id != '') && ($ship_address_id != '')) {
                    // redirection into final checkout page
                    $this->createOrder($ship_address_id, $bill_address_id, $cart);
                }
            } else {
                echo 'cart empty !!';
            }
            $defaultShipping = UserAddress::model()->findByAttributes(array('userid' => Yii::app()->user->getId(), 'default_shipping_address' => 1));
            $defaultBilling = UserAddress::model()->findByAttributes(array('userid' => Yii::app()->user->getId(), 'default_billing_address' => 1));
            $address = UserAddress::model()->findAllByAttributes(array('userid' => Yii::app()->user->getId()));

            Yii::app()->user->setState('total_amt', $total_amt);
            $params['total_amt'] = $total_amt;
            $params['carts'] = $cart;
            $params['defaultShipping'] = $defaultShipping;
            $params['defaultBilling'] = $defaultBilling;
            $params['addresss'] = $address;
            $params['user'] = $user;
            $params['buyer'] = $buyer;
            $params['billing'] = $billing;
            $params['shipping'] = $shipping;
            $params['selected_billing'] = $bill_address_id;
            $params['selected_shipping'] = $ship_address_id;
            $this->render('checkout_address', $params);
        } else {
            $this->redirect(Yii::app()->getBaseUrl() . '/user.php/cart/Mycart');
        }
    }

    public function actionCheckoutFinal() {
        $cart = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->user->getId()));
        $this->render('checkoutFinal', array('carts' => $cart));
    }

    public function actionCompleteCheckOut() {

        if ($_POST['p_type']) {
            $payment_type = $_POST['p_type'];
            if ($payment_type = 'card') {
                $ptype = 2;
            } else if ($payment_type = 'paypal') {
                $ptype = 3;
            } else {
                $ptype = 0;
            }

            // update order table
            $updateOrder = $this->updateOrder($ptype);

            if ($updateOrder == 1) {

                // update orderproducts table
                 $order_id = Yii::app()->user->getState('order_id');
                $orderProducts = OrderProducts::model()->findAllByAttributes(array('order_id' => $order_id));
                foreach ($orderProducts as $product_order) {
                    $product_order->status = 3; // payment done
                    if ($product_order->update()) {
                        $product_id = $product_order->product_id;

                        // insertion into order history table
                        $this->createOrderHistory($order_id, $product_id);
                    } else {
                        echo 'order product not updated';
//                        print_r($product_order->attributes);
//                        exit;
                    }
                }



                // delete from carts table
                $this->removeFromCart();

                // todo check payment success or fail
                $this->redirect('orderPlaced');
            } else {
                echo 'order table not updated';
//                $this->redirect('checkoutFinal');
            }
        } else {
            $this->redirect('checkoutFinal');
        }
    }

    public function actionOrderPlaced() {
        $this->render('order_placed');
    }

    public function addAddress($model, $data) {

        $model->attributes = $data;
        $model->address_1 = $data['address_1'];
        $model->address_2 = $data['address_2'];
        $model->contact_number = $data['contact_number'];
        $model->CB = Yii::app()->user->getId();
        $model->DOC = date('Y-m-d');
        $model->userid = Yii::app()->user->getId();
        if ($model->validate()) {
            if ($model->save()) {
                return $model->id;
            } else {

                return false;
            }
        } else {
            return false;
        }
    }

    // insertion into order table on confirming user address before final checkout
    public function createOrder($ship_address_id, $bill_address_id, $cart) {

        date_default_timezone_set('Asia/Calcutta');
        $order = new Order;
        $order->user_id = Yii::app()->user->getId();
        $order->total_amount = Yii::app()->user->getState('total_amt');
        $order->order_date = date('Y-m-d H:i:s');
        $order->ship_address_id = $ship_address_id;
        $order->bill_address_id = $bill_address_id;
        $order->payment_status = 0;
        $order->status = 0;
        $order->DOC = date('Y-m-d');
//
        if ($order->save()) {
            $order_id = $order->id;
            Yii::app()->user->setState('order_id', $order_id);
            $this->addOrderProducts($cart, $order);

            $this->redirect('checkoutFinal');
        } else {
            Yii::app()->user->setFlash('order_failure', "Sorry, your checkout is not able to proceed now. Please ensure your shipping details are provided correctly.");
//                    $this->redirect('../cart/Mycart');
        }
    }

    // insertion into order_products table on insertion into order table
    public function addOrderProducts($cart, $order) {
        if (isset(Yii::app()->session['currency'])) {
            $currency_rate = Yii::app()->session['currency']['rate'];
        } else {
            $currency_rate = 1;
        }

        foreach ($cart as $product) {
            $unit_price = Products::model()->findByPk($product->product_id)->price;
            $merchant = Products::model()->findByPk($product->product_id)->merchant_id;
            $model = new OrderProducts;
            $model->order_id = $order->id;
            $model->product_id = $product->product_id;
            $model->merchant_id = $merchant;
            $model->quantity = $product->quantity;
            $model->amount = $unit_price;
            $model->status = 1; // not placed
            $model->DOC = date('Y-m-d');
            $model->rate = $unit_price * $currency_rate * $product->quantity;
//            print_r($model->attributes);exit;
            $model->save();
        }
    }

    public function createOrderHistory($order_id, $product_id) {
        $orderHistory = new OrderHistory;
        $orderHistory->order_id = $order_id;
        $orderHistory->product_id = $product_id;
        $orderHistory->order_status_comment = 'Order Placed';
        $orderHistory->order_status = 1;
        $orderHistory->date = date('Y-m-d');
        $orderHistory->status = 1;
        $orderHistory->cb = 1;
        $orderHistory->ub = 1;
        if ($orderHistory->save()) {
            
        } else {
//            print_r($orderHistory->attributes);
//            exit;
        }
    }

    public function updateOrder($ptype) {
        $order_id = Yii::app()->user->getState('order_id');
        $order = Order::model()->findByPk($order_id);
        $order->payment_mode = $ptype;
        $order->transaction_id = 'sample123';
        $order->payment_status = 1;
        $order->status = 2; // success
        if ($order->update()) {
            return 1;
        } else {
//            print_r($order->attributes);exit;
            return 0;
        }
    }

    public function removeFromCart() {
        $carts = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->user->getId()));
        foreach ($carts as $cart) {
            Cart::model()->deleteByPk($cart->id);
        }
    }

}
