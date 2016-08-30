<?php

class BuyerDetailsController extends Controller {

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
                'actions' => array('create', 'userActivation'),
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
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new BuyerDetails('user_create');
        $user_model = new Users('user_create');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['BuyerDetails'], $_POST['Users'])) {
            $model->attributes = $_POST['BuyerDetails'];
            $user_model->attributes = $_POST['Users'];
            $user_model->user_type = 1; // 1 = Buyer , 2 = Merchant, 3 = BuyerToMerchant , 4 = MerchantToBuyer
            $date1 = $_POST['BuyerDetails']['dob'];
            $newDate = date("Y-m-d", strtotime($date1));
            $model->dob = $newDate;
            $model->CB = $user_model->CB = $model->UB = $user_model->UB = 0;
            $model->DOC = $user_model->DOC = date('Y-m-d');
            $ver_id = mt_rand(10000, 99999) . time();
            $user_model->activation_link = $ver_id;
            $user_model->user_status = 1;
            // validate BOTH $model and $user_model
            $valid = $model->validate();
            $valid = $user_model->validate() && $valid;

            if ($valid) {
                if ($user_model->save()) {
                    $model->user_id = $user_model->id;
                    if ($model->save()) {
                        // uncomment the following for sending activation mail
                        $this->sendActivation($user_model);
                        $this->render('info_activation', array('user_model' => $user_model));
                        $model = new BuyerDetails('user_create');
                        $user_model = new Users('user_create');
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
        $message->view = "_buyer_activation_mail";
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
        $user_model->user_status = 3;
        $user_model->update();
        $model = BuyerDetails::model()->findByAttributes(array('user_id' => $user_model->id));
        $this->render('user_activation', array('model' => $model));
    }

    /**
     * Performs the AJAX validation.
     * @param BuyerDetails $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'buyer-details-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public static function siteURL() {
        $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
        $domainName = $_SERVER['HTTP_HOST'];
        return $protocol . $domainName .Yii::app()->baseUrl.'/';
    }

}
