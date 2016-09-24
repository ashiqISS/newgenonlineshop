<?php

class DiscountPrice extends CApplicationComponent {

        public function Discount($model) {

                //discount rate value not equal to null//

                if ($model->is_discount_available == 1) {
                        $value = $this->DiscountType($model);
                        return Yii::app()->Currency->convert($value);
                } else {
                        $value = $this->WithoutDiscountType($model);
                        return Yii::app()->Currency->convert($value);
                }
        }

        public function DiscountCartUnit($model, $qty) {

                //discount rate value not equal to null//

                if ($model->is_discount_available == 1) {
                        $value = $this->DiscountType($model);
                        return Yii::app()->Currency->convert($value);
                } else {
                        if ($model->wholesale_quantity != 0) {
                                if ($qty >= $model->wholesale_quantity) {
                                        $tax_only = Yii::app()->Discount->Taxonly($model, $model->wholesale_price);
                                        $totalprice = $tax_only + $model->wholesale_price;

                                        return Yii::app()->Currency->convert($totalprice);
                                } else {
                                        $tax_only = Yii::app()->Discount->Taxonly($model, $model->price);
                                        $totalprice = $tax_only + $model->price;
                                        return Yii::app()->Currency->convert($totalprice);
                                }
                        } else {
                                $tax_only = Yii::app()->Discount->Taxonly($model, $model->price);
                                $totalprice = $tax_only + $model->price;
                                return Yii::app()->Currency->convert($totalprice);
                        }
                }
        }

        public function Extax($model) {

                //discount rate value not equal to null//

                if ($model->is_discount_available == 1) {
                        $value = $this->DiscountExtax($model);
                        return Yii::app()->Currency->convert($value);
                } else {

                        return Yii::app()->Currency->convert($model->price);
                }
        }

        public function DiscountCart($model, $qty) {

                //discount rate value not equal to null//

                if ($model->is_discount_available == 1) {
                        $value = $this->DiscountType($model);
                        $newvalue = $value * $qty;
                        return Yii::app()->Currency->convert($newvalue);
                } else {
                        if ($model->wholesale_quantity != 0) {
                                if ($qty >= $model->wholesale_quantity) {
                                        $tax_only = Yii::app()->Discount->Taxonly($model, $model->wholesale_price);
                                        $totalprice = $tax_only + $model->wholesale_price;
                                        $newvalue = $totalprice * $qty;

                                        return Yii::app()->Currency->convert($newvalue);
                                } else {
                                        $tax_only = Yii::app()->Discount->Taxonly($model, $model->price);
                                        $totalprice = $tax_only + $model->price;
                                        $newvalue = $totalprice * $qty;
                                        return Yii::app()->Currency->convert($newvalue);
                                }
                        } else {
                                $tax_only = Yii::app()->Discount->Taxonly($model, $model->price);
                                $totalprice = $tax_only + $model->price;
                                $newvalue = $totalprice * $qty;
                                return Yii::app()->Currency->convert($newvalue);
                        }
                }
        }

        public function DiscountAmount($model) {

                //discount rate value not equal to null//
                if ($model->is_discount_available == 1) {
                        $value = $this->DiscountType($model);
                        return $value;
                } else {
                        return $model->price;
                }
        }

        public function Granttotal() {
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

                foreach ($cart_items as $cart_item) {
                        $product = Products::model()->findByPk($cart_item->product_id);
                        if ($product->is_discount_available == 1) {
                                $price = Yii::app()->Discount->DiscountType($product);
                                $subtotal += ($price * $cart_item->quantity);
                        } else {
                                if ($product->wholesale_quantity != 0) {
                                        if ($cart_item->quantity >= $product->wholesale_quantity) {
                                                $tax_only += Yii::app()->Discount->Taxonly($product, $product->wholesale_price);
                                                $totalprice = $tax_only + $product->wholesale_price;
                                                $subtotal += ($totalprice * $cart_item->quantity);
                                        } else {
                                                $tax_only += Yii::app()->Discount->Taxonly($product, $product->price);
                                                $totalprice = $tax_only + $product->price;
                                                $subtotal += ($totalprice * $cart_item->quantity);
                                        }
                                } else {
                                        $tax_only += Yii::app()->Discount->Taxonly($product, $product->price);
                                        $totalprice = $tax_only + $product->price;
                                        $subtotal += ($totalprice * $cart_item->quantity);
                                }
                        }
                }
                return $subtotal - $coupon_amount + Yii::app()->Shipping->Calculate();
        }

        public function Subtotal() {
                if (Yii::app()->user->getId()) {
                        $cart = cart::model()->findAllByAttributes(array('user_id' => Yii::app()->user->getId()));
                } else {
                        $cart = cart::model()->findAllByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                }
                foreach ($cart as $cart_item) {
                        $product = Products::model()->findByPk($cart_item->product_id);
                        if ($product->is_discount_available == 1) {
                                $price = Yii::app()->Discount->DiscountExtax($product);
                                $subtotal += ($price * $cart_item->quantity);
                        } else {
                                if ($product->wholesale_quantity != 0) {
                                        if ($cart_item->quantity >= $product->wholesale_quantity) {
                                                $price = $product->wholesale_price;
                                                $subtotal += ($price * $cart_item->quantity);
                                        } else {
                                                $price = $product->price;
                                                $subtotal += ($price * $cart_item->quantity);
                                        }
                                } else {
                                        $price = $product->price;
                                        $subtotal += ($price * $cart_item->quantity);
                                }
                        }
                }
                return $subtotal;
        }

        public function DiscountExtax($data) {
                date_default_timezone_set('Asia/Kolkata');
                $date = date('Y-m-d');
                if ($data->discount_type == 1) {     // type of discount wether its flat on percetange
                        $discountRate = $data->price - $data->discount;
                } else {
                        $discountRate = $data->price - ( $data->price * ($data->discount / 100));
                }
                return $discountRate;
        }

        public function Taxcalculate($cart) {
                $bills = array();
                foreach ($cart as $cart_item) {
                        $product = Products::model()->findByPk($cart_item->product_id);
                        $tax_class = $product->tax;
                        $tax_details = explode(',', MasterTaxClass::model()->findByPk($tax_class)->tax_rate);


                        if ($product->is_discount_available == 1) {
                                $price = Yii::app()->Discount->DiscountExtax($product);
                        } else {
                                if ($product->wholesale_quantity != 0) {
                                        if ($cart_item->quantity >= $product->wholesale_quantity) {
                                                $price = $product->wholesale_price;
                                        } else {
                                                $price = $product->price;
                                        }
                                } else {
                                        $price = $product->price;
                                }
                        }
//
//
//                        $price = Yii::app()->Discount->WithoutDiscountType($product);
                        $subtotal += ($price * $cart_item->quantity);
                        foreach ($tax_details as $key => $val) {
                                $taxcalc = MaterTaxRates::model()->findByPk($val);
                                if ($taxcalc->type == 1) {
                                        if (array_key_exists($tax_rate->tax_name, $bills)) {
                                                $bills[$taxcalc->tax_name] = $bills[$taxcalc->tax_name] + ($taxcalc->tax_rate * $subtotal ) / 100;
                                        } else {
                                                $bills[$taxcalc->tax_name] = ($taxcalc->tax_rate * $subtotal ) / 100;
                                        }
                                } else if ($taxcalc->type == 2) {

                                        if (array_key_exists($taxcalc->tax_name, $bills)) {
                                                $bills[$taxcalc->tax_name] = $bills[$taxcalc->tax_name] + $taxcalc->tax_rate;
                                        } else {
                                                $bills[$taxcalc->tax_name] = $taxcalc->tax_rate;
                                        }
                                }
                        }
                }
                return $bills;
        }

        public function DiscountType($data) {
                date_default_timezone_set('Asia/Kolkata');
                $date = date('Y-m-d');
                if ($data->discount_type == 1) {     // type of discount wether its flat on percetange
                        if ($data->product_type == 4) {  // the value 4 is baragain products
                                if (($date > $data->special_price_to)) {
                                        $criteria = new CDbCriteria;
                                        $criteria->select = '*,MAX(bidd_amount) ';
                                        $bargained_rate = BargainDetails::model()->find($criteria);
                                        if (!empty($bargained_rate)) {
                                                Products::model()->updateAll(array("bidded_amount" => $bargained_rate->bidd_amount), 'id = ' . $data->id);
                                                $discountRate = $bargained_rate->bidd_amount;
                                        } else {
                                                $discountRate = $data->bargain_price;
                                        }
                                } else {
                                        $discountRate = $data->bargain_price;
                                }
                        } else {
                                $discountRate = $data->price - $data->discount;
                        }
                } else {
                        $discountRate = $data->price - ( $data->price * ($data->discount / 100));
                }
                if ($data->tax != 0) {
                        $tax_exist = MasterTaxClass::model()->findByPk($data->tax);
                        if (!empty($tax_exist)) {
//                                $tax_rates = $tax_exist->tax_rate;
                                $tax_rates = MaterTaxRates::model()->findAll(array("condition" => "id IN($tax_exist->tax_rate)"));
                                if (!empty($tax_rates)) {
                                        foreach ($tax_rates as $tax_rate) {
                                                if ($tax_rate->type == 1) {
                                                        $total_per += $tax_rate->tax_rate;
                                                } else if ($tax_rate->type == 2) {
                                                        $total_fixed += $tax_rate->tax_rate;
                                                }
                                        }
                                        $total_tax = ($total_per * $discountRate ) / 100;
                                        $discountRate = $discountRate + $total_tax + $total_fixed;
                                } else {
                                        $discountRate = $discountRate;
                                }
                        }
                }
                return $discountRate;
        }

        public function Taxonly($data, $price) {

                if ($data->tax != 0) {

                        $tax_exist = MasterTaxClass::model()->findByPk($data->tax);
                        if (!empty($tax_exist)) {

//                                $tax_rates = $tax_exist->tax_rate;
                                $tax_rates = MaterTaxRates::model()->findAll(array("condition" => "id IN($tax_exist->tax_rate)"));
                                if (!empty($tax_rates)) {

                                        foreach ($tax_rates as $tax_rate) {
                                                if ($tax_rate->type == 1) {
                                                        $total_per += $tax_rate->tax_rate;
                                                } else if ($tax_rate->type == 2) {
                                                        $total_fixed += $tax_rate->tax_rate;
                                                }
                                        }

                                        $total_per_tax = ($total_per * $price ) / 100;
                                        $final_tax = $total_per_tax + $total_fixed;
                                } else {
                                        $final_tax = 0;
                                }
                        }
                } else {
                        $final_tax = 0;
                }
                return $final_tax;
        }

        public function WithoutDiscountType($data) {
                date_default_timezone_set('Asia/Kolkata');
                $date = date('Y-m-d');
                $discountRate = $data->price;
                $total_tax_amount = Yii::app()->Discount->Taxonly($data, $data->price);
                $total_amount = $discountRate + $total_tax_amount;
                return $total_amount;
        }

        public function checks($model) {
                if ($data->stock_availability == 1) {
                        $new_from = $model->new_from;
                        $new_to = $model->new_to;
                        $today = date('Y-m-d');
                        if (strtotime($new_from) <= strtotime($today) && strtotime($new_to) >= strtotime($today)) {
                                echo '<span class="label label-danger">New </span> &nbsp';
                        }
                        $sale_from = $model->sale_from;
                        $sale_to = $model->sale_to;

                        if (strtotime($sale_from) <= strtotime($today) && strtotime($sale_to) >= strtotime($today)) {
                                echo '<span class = "label label-warning">Sale</span>';
                        }
                } else {
                        echo '';
                }
        }

}

?>