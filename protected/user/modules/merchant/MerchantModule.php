<?php

class MerchantModule extends CWebModule {

    public function init() {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        // import the module-level models and components
        $this->setImport(array(
            'merchant.models.*',
            'merchant.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action)) {
            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        } else
            return false;
    }

    public static function newTransaction($type, $amount) {
        $merchant_id = Yii::app()->user->getState('merchant_id');
        $transaction = new MerchantTransactionMaster;
        $transaction->merchant_id = $merchant_id;
        $transaction->transaction_type = $type;
        $transaction->amount = $amount;
        $transaction->DOC = date('Y-m-d');
        $transaction->save();
    }

    public static function updateAccountMaster($productOrder) {
        $merchant_id = Yii::app()->user->getState('merchant_id');
        if (MerchantAccountMaster::model()->findByAttributes(array('merchant_id' => $merchant_id))) {
            $accounts = MerchantAccountMaster::model()->findByAttributes(array('merchant_id' => $merchant_id));
            $accounts->available_balance += $productOrder->amount;
            $accounts->update();
        } else {
            //   Create new merchnat account master if not exists
            MerchantModule::newAccountMaster($merchant_id, $productOrder);
        }
    }

    public static function newAccountMaster($merchant_id, $productOrder) {
        $accounts = new MerchantAccountMaster;
        $accounts->merchant_id = $merchant_id;
        $accounts->available_balance = $productOrder->amount;
        $accounts->DOC = date('Y-m-d');
        $accounts->save();
    }

}
