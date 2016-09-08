<?php

class RequestPayment extends CFormModel {

    public $withdraw_amount;
    public $withdraw_account;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            // email is required
            array('withdraw_amount', 'required'),          
            array('withdraw_amount', 'numerical', 'message' => 'Withdraw Amount invalid'), 
            array('withdraw_amount', 'check'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'withdraw_amount' => 'Withdraw Amount',
            'withdraw_account' => 'Withdraw Account',
        );
    }

    public function check() {
        $withdraw_amount  = $this->withdraw_amount;
        $merchant_id = Yii::app()->user->getState('merchant_id');
        if (MerchantAccountMaster::model()->findByAttributes(array('merchant_id' => $merchant_id))) {
            $main = MerchantAccountMaster::model()->findByAttributes(array('merchant_id' => $merchant_id));
            $main_bal = $main->available_balance;
            if ($withdraw_amount > $main_bal) {
                $this->addError('withdraw_amount', 'Withdraw Amount is more than available balance');
            }
        }
    }

}
