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
        print_r($_POST);

        $user = Users::model()->findByPk(Yii::app()->user->getId());
        $buyer = BuyerDetails::model()->findByAttributes(array('user_id' => Yii::app()->user->getId()));

        $order = Order::model()->findByPk(Yii::app()->session['orderid']);
        $cart = Cart::model()->findAllByAttributes(array('user_id' => Yii::app()->user->getId()));
//        if (!empty($cart)) {
//            $deafult_shipping = UserAddress::model()->findByAttributes(array('userid' => Yii::app()->user->getId(), 'default_shipping_address' => 1));
//            $addresss = UserAddress::model()->findAllByAttributes(array('userid' => Yii::app()->user->getId()));
//            $billing = new UserAddress;
//            $shipping = new UserAddress;
//            $address_id = '';
//            if ($_POST['yt0']) {
//
//                $post_total_pay = $_POST['total_pay'];
//
//
//                if ($_REQUEST['bill_address'] == 0) {
//                    if (isset($_POST['UserAddress']['bill'])) {
//                        $billing_address = $this->addAddress($billing, $_POST['UserAddress']['bill']);
//                        $bill_address_id = $billing_address;
//                    }
//                } else {
//                    $bill_address_id = $_REQUEST['bill_address'];
//                }
//                if ($_REQUEST['billing_same'] == NULL) {
//                    if ($_REQUEST['ship_address'] == 0) {
//                        if (isset($_POST['UserAddress']['ship'])) {
//                            $shipping_address = $this->addAddress($shipping, $_POST['UserAddress']['ship']);
//                            $ship_address_id = $shipping_address;
//                        }
//                    } else {
//                        $ship_address_id = $_REQUEST['ship_address'];
//                    }
//                } else {
//                    $ship_address_id = $bill_address_id;
//                }
//                $shipp_address = UserAddress::model()->findByPk($ship_address_id);
//
//                if (isset(Yii::app()->session['currency'])) {
//                    $currency_rate = Yii::app()->session['currency']['rate'];
//                } else {
//                    $currency_rate = 1;
//                }
//                $subtotal = $this->subtotal();
//
//                $granttotal = round(($currency_rate * $subtotal), 2);
//
//
//                if (isset(Yii::app()->session['currency'])) {
//                    if (Yii::app()->session['currency']['rate'] == 1) {
//                        $total_balance_to_pay = $granttotal;
//                    } else {
//                        $total_balance_to_pay = ceil($granttotal / Yii::app()->session['currency']['rate']);
//                    }
//                }
//            }
//
//
//                if ($bill_address_id != '' && $ship_address_id != '') {
//
//                    $order_id = Yii::app()->session['orderid'];
//
//                    $this->addOrder($bill_address_id, $ship_address_id, $cart, $order_id);
//                    $order->shipping_method = '';
//                 
//
//
//                        $order->payment_mode = $_POST['payment_method'];
//
//
//                        $order->bill_address_id = $bill_address_id;
//                        $order->ship_address_id = $ship_address_id;
//                        $order_billing_details = UserAddress::model()->findBypk($bill_address_id);
//                        $order_shipping_detils = UserAddress::model()->findBypk($ship_address_id);
//
//                        if ($order->validate()) {
////                            if (Yii::app()->user->hasFlash('shipp_availability') != 1) {
//
//                                if ($order->save()) {
//                                    Cart::model()->deleteAllByAttributes(array('user_id' => Yii::app()->user->getId()));
//
//                                    $this->updateorderproduct($order->id);
//
//
//                                    $this->redirect(array('OrderSuccess'));
//                                }
////                            }
//                        } else {
//                            var_dump($order->getErrors());
//                            exit;
//                        }
////
//                    
//                }
//            }
////            print_r($billing);exit;
//            $this->render('checkout', array('carts' => $cart, 'user' => $user,'buyer' => $buyer, 'deafult_shipping' => $deafult_shipping, 'addresss' => $addresss, 'shipping' => $shipping, 'orderid' => $order_id, 'billing' => $billing));
//        } else {
//            $this->redirect(array('Cart/Mycart'));
//
////todo render a cart empty page here
//        }
//
////todo invalid user message
        $params = array();
        $defaultShipping = $defaultBilling = $address = '';
        if (isset($_POST['total_amt'])) {
            $total_amt = $_POST['total_amt'];
            $user_id = Yii::app()->user->getState('user_id');
            $cart = Cart::model()->findAllByAttributes(array('user_id' => $user_id));
            if (!empty($cart)) {
                $defaultShipping = UserAddress::model()->findByAttributes(array('userid' => Yii::app()->user->getId(), 'default_shipping_address' => 1));
                $defaultBilling = UserAddress::model()->findByAttributes(array('userid' => Yii::app()->user->getId(), 'default_billing_address' => 1));
                $address = UserAddress::model()->findAllByAttributes(array('userid' => Yii::app()->user->getId()));
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
//                    $subtotal = $this->subtotal();

                $granttotal = round(($currency_rate * $subtotal), 2);


                if (isset(Yii::app()->session['currency'])) {
                    if (Yii::app()->session['currency']['rate'] == 1) {
                        $total_balance_to_pay = $granttotal;
                    } else {
                        $total_balance_to_pay = ceil($granttotal / Yii::app()->session['currency']['rate']);
                    }
                }
                
                
                if (isset($_POST['bill_address'])) {

            $bill_address_id = $ship_address_id = '';
            // get billing address
            if ($_POST['bill_address'] == 0) {
                // todo insertion into address table
            } else {

                $bill_address_id = $_POST['bill_address'];
            }

            if (isset($_POST['billing_same'])) {

                if ($_POST['billing_same'] == 1) {  // if billing address is same as shippig address
                    $ship_address_id = $bill_address_id;
                } else {
                    // get shipping address
                    if ($_POST['ship_address'] == 0) {

                        // todo insertion into address table
                    } else {

                        $ship_address_id = $_POST['ship_address'];
                    }
                }
            }

            if (($bill_address_id != '') && ($ship_address_id != '')) {
                date_default_timezone_set('Asia/Calcutta');
                $order = new Order;
                $order->user_id = Yii::app()->user->getId();
                $order->user_id = Yii::app()->user->getId();
                $order->total_amount = $_POST['total_amt'];
                $order->order_date = date('Y-m-d H:i:s');
                $order->ship_address_id = $ship_address_id;
                $order->bill_address_id = $bill_address_id;
                $order->payment_status = 0;
                $order->status = 0;
                $order->DOC = date('Y-m-d');                
                if ($order->save()) {
//                    $this->redirect('checkoutFinal');
                } else {
                    Yii::app()->user->setFlash('order_failure', "Sorry, your checkout is not able to proceed now. Please ensure your shipping details are provided correctly.");
//                    $this->redirect('../cart/Mycart');
                }
            }
        }
                
                
                
                
                
                
            }

            $params['total_amt'] = $total_amt;
            $params['carts'] = $cart;
            $params['defaultShipping'] = $defaultShipping;
            $params['defaultBilling'] = $defaultBilling;
            $params['addresss'] = $address;
            $params['user'] = $user;
            $params['buyer'] = $buyer;
            $params['billing'] = $billing;
            $params['shipping'] = $shipping;

            $this->render('checkout_address', $params);
        }
    }

    public function actionCheckoutAddress() {

        if (isset($_POST['bill_address'])) {

            $bill_address_id = $ship_address_id = '';
            // get billing address
            if ($_POST['bill_address'] == 0) {
                // todo insertion into address table
            } else {

                $bill_address_id = $_POST['bill_address'];
            }

            if (isset($_POST['billing_same'])) {

                if ($_POST['billing_same'] == 1) {  // if billing address is same as shippig address
                    $ship_address_id = $bill_address_id;
                } else {
                    // get shipping address
                    if ($_POST['ship_address'] == 0) {

                        // todo insertion into address table
                    } else {

                        $ship_address_id = $_POST['ship_address'];
                    }
                }
            }

            if (($bill_address_id != '') && ($ship_address_id != '')) {
                date_default_timezone_set('Asia/Calcutta');
                $order = new Order;
                $order->user_id = Yii::app()->user->getId();
                $order->user_id = Yii::app()->user->getId();
                $order->total_amount = $_POST['total_amt'];
                $order->order_date = date('Y-m-d H:i:s');
                $order->ship_address_id = $ship_address_id;
                $order->bill_address_id = $bill_address_id;
                $order->payment_status = 0;
                $order->status = 0;
                $order->DOC = date('Y-m-d');                
                if ($order->save()) {
                    $this->redirect('checkoutFinal');
                } else {
                    Yii::app()->user->setFlash('order_failure', "Sorry, your checkout is not able to proceed now. Please ensure your shipping details are provided correctly.");
                    $this->redirect('../cart/Mycart');
                }
            }
        }
    }

    public function actionCheckoutFinal() {
        $this->render('checkoutFinal');
    }

}
