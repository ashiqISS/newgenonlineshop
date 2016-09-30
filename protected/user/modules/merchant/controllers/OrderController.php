<?php

class OrderController extends Controller {

        /**
         * @return array action filters
         */
        public function filters() {
                return array(
                    'accessControl', // perform access control for CRUD operations
                    'postOnly + delete', // we only allow deletion via POST request
                );
        }

        /**
         * Specifies the access control rules.
         * This method is used by the 'accessControl' filter.
         * @return array access control rules
         */
        public function accessRules() {
                return array(
                    array('allow', // allow authenticated users to access all actions
                        'users' => array('@'),
                    ),
                    array('allow', // allow admin user to perform 'admin' and 'delete' actions
                        'users' => array('admin'),
                    ),
                    array('deny', // deny all users
                        'users' => array('*'),
                    ),
                );
        }

        public function actionPrintProductInvoice($id) {
                $product_order_id = $id;
                if (isset($product_order_id)) {
                        $productOrder = OrderProducts::model()->findByPk($product_order_id);
                        $product = Products::model()->findByPk($productOrder->product_id);
                        $order = Order::model()->findByPk($productOrder->order_id);
                        $user_address = UserAddress::model()->findByPk($order->ship_address_id);
                        $bill_address = UserAddress::model()->findByPk($order->bill_address_id);

                        $params = array();
                        $params['productOrder'] = $productOrder;
                        $params['order'] = $order;
                        $params['product'] = $product;
                        $params['user_address'] = $user_address;
                        $params['bill_address'] = $bill_address;

//            $order_details = OrderProducts::model()->findAllByAttributes(array('order_id' => $id));
                        $this->renderPartial('_product_invoice', $params);
                }
        }

        public function actionPrintBulkInvoice() {
                $id = Yii::app()->user->getState('merchant_id');
                $productOrders = OrderProducts::model()->findAllByAttributes(array('merchant_id' => $id));
                $this->renderPartial('_bulk_invoice', array('productOrders' => $productOrders));
        }

        public function actionPrintSalesReport() {
                $merchant_id = Yii::app()->user->getState('merchant_id');
                $criteria = new CDbCriteria();
                $sumary = new CDbCriteria();
                if (isset($_REQUEST['PrintStart']) && $_REQUEST['PrintStart'] != "") {
                        $criteria->addCondition("DOC >='" . $_REQUEST['PrintStart'] . "'");
                        $sumary->addCondition("DOC >='" . $_REQUEST['PrintStart'] . "'");
                }if (isset($_REQUEST['PrintEnd']) && $_REQUEST['PrintEnd'] != '') {
                        $criteria->addCondition("DOC <= '" . $_REQUEST['PrintEnd'] . "'");
                        $sumary->addCondition("DOC <= '" . $_REQUEST['PrintEnd'] . "'");
                }
                $sumary->select = 'SUM(amount) as amt ,count(order_id) cnt';
                $criteria->compare('merchant_id', $merchant_id, false);
                $sumary->compare('merchant_id', $merchant_id, false);
                $sales = OrderProducts::model()->findAll($criteria);
                $salesSummary = OrderProducts::model()->find($sumary);
                $merchant_details = MerchantDetails::model()->findByPk($merchant_id);
                $userData = Users::model()->findByPk(array($merchant_details->user_id));


                $this->renderPartial('_sales_report', array('sales' => $sales, 'salesSummary' => $salesSummary, 'userData' => $userData, 'merchant_details' => $merchant_details));
        }

        public function actionPrintProductPurchased() {

                $criteria = new CDbCriteria(array(
                    'select' => 't.*,COUNT(product_id) AS value_occurrence',
                    'condition' => 't.merchant_id =' . Yii::app()->user->getState('merchant_id'),
                    'group' => 't.product_id',
                    'order' => 'value_occurrence DESC'
                ));


                $purchased = OrderProducts::model()->findAll($criteria);
                $merchant_details = MerchantDetails::model()->findByPk(Yii::app()->user->getState('merchant_id'));
                $this->renderPartial('_product_purchased_report', array('purchased' => $purchased, 'merchant_details' => $merchant_details));
        }

        public function actionPrintMerchantProductViewed() {
                $criteria = new CDbCriteria(array(
                    'select' => 't.product_id,p.product_name,p.product_code',
                    'join' => 'LEFT JOIN products p ON (t.product_id = p.id AND p.merchant_id = :merchant_id)',
                    'group' => 'p.id',
                    'params' => array(':merchant_id' => Yii::app()->user->getState('merchant_id'))
                ));
                $viewed = ProductViewed::model()->findAll($criteria);
                $merchant_details = MerchantDetails::model()->findByPk(Yii::app()->user->getState('merchant_id'));
                $this->renderPartial('_product_viewed_report', array('viewed' => $viewed, 'merchant_details' => $merchant_details));
        }

        public function actionChangeOrderStatus() {
                if (isset($_POST['order_id'])) {
                        $order_id = $_POST['order_id'];
                        $product_id = $_POST['product_id'];
                        $order_status = $_POST["order_status"];
                        $history = OrderHistory::model()->findByAttributes(array('order_id' => $order_id, 'product_id' => $product_id));
                        $history->order_status = $order_status;
                        $history->order_status_comment = OrderStatus::model()->findByPk($order_status)->description;
                        if ($history->update()) {
                                Yii::app()->user->setFlash('history_update', "Order Status updated successfully.");
                                if ($order_status == 5) { // completed
                                        $productOrder = OrderProducts::model()->findByAttributes(array('order_id' => $order_id, 'product_id' => $product_id));
                                        //   Create new Sales Report
                                        $this->newSalesReport($product_id, $order_id, $productOrder);
                                }
                        } else {
                                Yii::app()->user->setFlash('history_update', "Order Status updation failed.");
                        }
                        // todo sent mail to customer
                }
                $this->redirect(array('../merchant/merchantDetails/home'));
        }

        public function newSalesReport($product_id, $order_id, $productOrder) {
                $merchant_id = Yii::app()->user->getState('merchant_id');
                $sales = new SalesReport;
                $sales->merchant_id = $merchant_id;
                $sales->product_id = $product_id;
                $sales->order_id = $order_id;
                $sales->quantity = $productOrder->quantity;
                $sales->total_amount = $productOrder->amount;
                $sales->DOC = date('Y-m-d');
                if ($sales->save()) {
                        $type = 1; // deposit
                        $amount = $productOrder->amount;
                        MerchantModule::newTransaction($type, $amount);
                        MerchantModule::updateAccountMaster($productOrder);
                        // todo send earning mail
                }
        }

}
