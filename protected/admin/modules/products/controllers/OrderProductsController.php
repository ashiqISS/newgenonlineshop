<?php

class OrderProductsController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    public function init() {
        if (!isset(Yii::app()->session['admin']) || Yii::app()->session['post']['orders'] != 1) {
            $this->redirect(Yii::app()->request->baseUrl . '/admin.php/site/logOut');
        }
    }

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
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete', 'transferMoney'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new OrderProducts;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['OrderProducts'])) {
            $model->attributes = $_POST['OrderProducts'];
            $model->DOC = date('Y-m-d');
            if ($model->save())
                $this->redirect(array('admin', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['OrderProducts'])) {
            $model->attributes = $_POST['OrderProducts'];
            if ($model->save())
                $this->redirect(array('admin', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('OrderProducts');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new OrderProducts('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['OrderProducts']))
            $model->attributes = $_GET['OrderProducts'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionTransferMoney($id) {
        $order_products = OrderProducts::model()->findByPk($id);
        // reduce from admin account

        $deducted = $this->deductAdminAccount($order_products->rate);
        if ($deducted == 1) {
            $order_products->status = 5; // order completed
            if ($order_products->update()) {
                $this->orderHistoryCompleted($id);
            }
            $this->updateMerchantAccount($order_products->merchant_id, $order_products->rate);
        }
        $this->redirect(array('admin'));
    }

    public function orderHistoryCompleted($id) {
        $model = new OrderHistory;
        $order_product = OrderProducts::model()->findByPk($id);
        $model->merchant_id = $order_product->merchant_id;
        $model->product_id = $order_product->product_id;
        $model->order_products_id = $order_product->id;
        $model->order_id = $order_product->order_id;
        $model->order_status = 6;
        $model->date = date('Y-m-d');
        $model->save();
    }

    public function deductAdminAccount($amount) {
        $adminAcc = MerchantAccountMaster::model()->findByAttributes(array('merchant_id' => 0));
        $acc_bal = $adminAcc->available_balance - $amount;
        $adminAcc->available_balance = $acc_bal;
        if ($adminAcc->update()) {
            $merchant_id = 0;
            $ttype = 2;
            $this->updateTransactionHistory($merchant_id, $amount, $ttype);
            return 1;
            // todo : send mail to merchant with prev balance and new balance
        }
        return 0;
    }

    public function updateMerchantAccount($merchant_id, $amount) {
        $acc_update = 0;
        $prev_bal = 0;
        if ($model = MerchantAccountMaster::model()->findByAttributes(array('merchant_id' => $merchant_id))) {
            $prev_bal = $model->available_balance;
            $model->available_balance += $amount;

            if ($model->update()) {
                $acc_update = 1;
            }
        } else {
            $model = new MerchantAccountMaster;
            $model->merchant_id = $merchant_id;
            $model->available_balance = $amount;
            if ($model->save()) {
                $acc_update = 1;
            }
        }
        if ($acc_update == 1) {
            $ttype = 1;
            $this->updateTransactionHistory($merchant_id, $amount, $ttype);
            // todo : send mail to merchant with prev balance and new balance
        }
    }

    public function updateTransactionHistory($merchant_id, $amount, $transaction_type) {
        $history = new MerchantTransactionMaster;
        $history->merchant_id = $merchant_id;
        $history->transaction_type = $transaction_type; // deposit
        $history->amount = $amount;
        $history->DOC = date('Y-m-d');
        $history->save();
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return OrderProducts the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = OrderProducts::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param OrderProducts $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'order-products-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
