<?php

class MerchantPayoutHistoryController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

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
                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete'),
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
        $model = new MerchantPayoutHistory('create');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['MerchantPayoutHistory'])) {
            $model->attributes = $_POST['MerchantPayoutHistory'];
            $model->DOC = date('Y-m-d');
            if ($model->status == 5) {
                $model->validatorList->add(
                        CValidator::createValidator('required', $model, 'comment')
                );
            }
            if ($model->status == 4) {
                $model->validatorList->add(
                        CValidator::createValidator('required', $model, 'transaction_reference')
                );
            }
            if ($model->validate()) {

                if ($model->save())
                    $this->redirect(array('admin'));
            }
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
        $prev_status = $model->status;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['MerchantPayoutHistory'])) {
            print_r($_POST);
            $model->attributes = $_POST['MerchantPayoutHistory'];
            $model->transaction_reference = $_POST['MerchantPayoutHistory']['transaction_reference'];
            if ($model->status == 5) {
                $model->validatorList->add(
                        CValidator::createValidator('required', $model, 'comment')
                );
            }
            if ($model->status == 4) {
                $model->validatorList->add(
                        CValidator::createValidator('required', $model, 'transaction_reference')
                );
            }
            if ($model->validate()) {
                if ($prev_status != $model->status) {
                  
                    if ($model->status == 4) {

                        // approved
                        $avail_balance = $model->available_balance;
                        $req_amount = $model->requested_amount;
                        if ($avail_balance > $req_amount) {
                            $acc_bal = $avail_balance - $req_amount;
                            $model->available_balance = $acc_bal;
                        } else {
                            $model->addError('requested_amount', 'Requested Amount is greater than Available Balance');
                        }
                    }
                }

                if ($model->save()) {
                    $this->updateMerchantAccountmaster($model->merchant_id, $model->available_balance);
                    $this->updateMerchantTransactionMaster($model->merchant_id, $model->requested_amount);
                    // todo send mail to user status changed
                    $this->redirect(array('view', 'id' => $model->id));
                }
            }
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
        $dataProvider = new CActiveDataProvider('MerchantPayoutHistory');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new MerchantPayoutHistory('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['MerchantPayoutHistory']))
            $model->attributes = $_GET['MerchantPayoutHistory'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return MerchantPayoutHistory the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = MerchantPayoutHistory::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param MerchantPayoutHistory $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'merchant-payout-history-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function updateMerchantAccountmaster($merchant_id, $avail_balance) {
        $accMaster = MerchantAccountMaster::model()->findByAttributes(array('merchant_id' => $merchant_id));
        $accMaster->available_balance = $avail_balance;
        if($accMaster->update())
        {
            // todo send mail
        }
    }
    
    public function updateMerchantTransactionMaster($merchant_id, $req_amount)
    {
       $transactionModel = new MerchantTransactionMaster;
       $transactionModel->merchant_id = $merchant_id;
       $transactionModel->transaction_type = 3;// payout credit
       $transactionModel->amount = $req_amount;
       $transactionModel->DOC = $req_amount;
       
       
    }

//    public function mailRequestStatusChanged($history) {
//        Yii::import('user.extensions.yii-mail.YiiMail');
//        $message = new YiiMailMessage;
//        $message->view = "_info_buyer_password_changed";
//        $params = array('user_model' => $user_model);
//        $message->subject = 'NewGen Shop : Password Changed';
//        $message->setBody($params, 'text/html');
//        $message->addTo($user_model->email);
//        $message->from = Yii::app()->params['infoEmail'];
//        if (Yii::app()->mail->send($message)) {
////            echo 'message send';
////            exit;
//        } else {
////            echo 'message not send';
////            exit;
//        }
//    }
    
    public function mailPayoutStatusChanged($history) {
        Yii::import('user.extensions.yii-mail.YiiMail');
        $message = new YiiMailMessage;
        $message->view = "_info_buyer_password_changed";
        $params = array('user_model' => $user_model);
        $message->subject = 'NewGen Shop : Payout Request Status Changed';
        $message->setBody($params, 'text/html');
        $message->addTo($user_model->email);
        $message->from = Yii::app()->params['infoEmail'];
        if (Yii::app()->mail->send($message)) {
//            echo 'message send';
//            exit;
        } else {
//            echo 'message not send';
//            exit;
        }
    }
    
    

}
