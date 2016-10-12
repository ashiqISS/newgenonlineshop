<?php

class MerchantDetailsController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
//    public $layout = '//layouts/column2';

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
                'actions' => array('create', 'userActivation', 'completeRegistration'),
                'users' => array('*'),
            ),
//            array('allow', // allow authenticated user to perform 'create' and 'update' actions
//                'actions' => array('create', 'update'),
//                'users' => array('@'),
//            ),
//            array('allow', // allow admin user to perform 'admin' and 'delete' actions
//                'actions' => array('admin', 'delete'),
//                'users' => array('admin'),
//            ),
//            array('deny', // deny all users
//                'users' => array('*'),
//            ),
        );
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $this->layout = '';
        $model = new MerchantDetails('user_create');
        $user_model = new Users('user_create');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['MerchantDetails'], $_POST['Users'])) {
            $model->attributes = $_POST['MerchantDetails'];
            $user_model->attributes = $_POST['Users'];
            $user_model->user_type = 2; // 1 = Buyer , 2 = Merchant, 3 = BuyerToMerchant , 4 = MerchantToBuyer
            $model->CB = $user_model->CB = $model->UB = $user_model->UB = 0; // 0 for users
            $model->DOC = $user_model->DOC = date('Y-m-d');
            $model->product_categories = $_POST['MerchantDetails']['product_categories'];

            $ver_id = mt_rand(10000, 99999) . time();
            $model->is_payment_done = 0;
            $user_model->user_status = 1;
            $user_model->activation_link = $ver_id;

            // validate BOTH $model and $user_model
            $valid = $model->validate();
            $valid = $user_model->validate() && $valid;

            if ($valid) {
                $user_model->password = md5($user_model->password);
                $user_model->confirm_password = md5($user_model->confirm_password);
                if ($user_model->save()) {

                    $model->user_id = $user_model->id;
                    if ($model->save()) {
                        // uncomment the following for sending activation mail
                        $this->sendActivation($user_model);
                        $this->render('info_activation', array('user_model' => $user_model));
                        exit;
                    }
                }
            } 
        }

        $this->render('create', array(
            'model' => $model, 'user_model' => $user_model
        ));
    }

    public function sendActivation($user_model) {
        Yii::import('user.extensions.yii-mail.YiiMail');
        $message = new YiiMailMessage;
        $message->view = "_user_activation_mail";
        $params = array('user_model' => $user_model);
        $message->subject = 'Welcome To NewGenShop';
        $message->setBody($params, 'text/html');
        $message->addTo($user_model->email);
        $message->from = Yii::app()->params['infoEmail'];
        if (Yii::app()->mail->send($message)) {
//            echo 'message send';
//            exit;
        } else {
            echo 'message not send';
            exit;
        }
    }

    public function actionUserActivation($id) {
        $user_model = Users::model()->findByAttributes(array('activation_link' => $id));
        $user_model->user_status = 2;
        $user_model->update();
        $model = MerchantDetails::model()->findByAttributes(array('user_id' => $user_model->id));
        $this->render('user_activation', array('model' => $model));
    }

    // action will be called after successful payment
    public function actionCompleteRegistration($id) {
        $transaction_id = "12345564";
        $payment_status = "success";
        $merchant_id = $id;
        $model = Merchant::model()->findByPk($merchant_id);
        $model->status = "active";
        $model->is_payment_done = 1;
        $model->save();
    }

    public static function siteURL() {
        $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
        $domainName = $_SERVER['HTTP_HOST'];
        return $protocol . $domainName .Yii::app()->baseUrl.'/';
    }

}
