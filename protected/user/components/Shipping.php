<?php

class Shipping extends CApplicationComponent {

        public function Calculate() {

                //discount rate value not equal to null//
                if (Yii::app()->user->getId()) {
                        $user_details = BuyerDetails::model()->findByPk(Yii::app()->user->getId());
                        $user_id = Yii::app()->user->getId();
                        $condition = "user_id = " . $user_id;
                } else {
                        $user_id = Yii::app()->session['temp_user'];
                        $condition = "session_id = " . $user_id;
                }


                $cart_exist = Cart::model()->findAll(array('condition' => $condition));
                if (!empty($cart_exist)) {
                        foreach ($cart_exist as $cart) {
                                $product_details = Products::model()->findByPk($cart->product_id);
                                // $shipping_charge += ($product_details->shipping_rate * $cart->quantity);
                                $shipping_charge += ($product_details->special_price * $cart->quantity);
                        }
                        return $shipping_charge;
                }
        }

}

?>