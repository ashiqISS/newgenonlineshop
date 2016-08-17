<?php

class MerchantDetailsController extends Controller {

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
//            array('allow', // allow all users to perform 'index' and 'view' actions
////                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete'),
//                'users' => array('*'),
//            ),
//            array('allow', // allow authenticated user to perform 'create' and 'update' actions
////                'actions' => array('create', 'update'),
//                'actions' => array('profile', 'editProfile', 'ChangePassword', 'home', 'featuredAds', 'mySales', 'paymentRequest'),
//                'users' => array('@'),
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

    public function actionHome() {
        $this->render('home');
    }

    public function actionProfile() {

        $id = Yii::app()->user->getState('merchant_id');
        $model = $this->loadModel($id);
        $user_id = Yii::app()->user->getState('user_id');
        $user_model = $this->loadUserModel($user_id);
        $this->render('profile', array(
            'model' => $model, 'user_model' => $user_model
        ));
    }

    public function actionEditProfile() {
        $id = Yii::app()->user->getState('merchant_id');
        $user_id = Yii::app()->user->getState('user_id');
        $model = $this->loadModel($id);
        $user_model = $this->loadUserModel($user_id);

        $logo1 = $model->shop_logo;
        $banner1 = $model->shop_banner;
        $doc = $model->DOC;
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);
//        if (isset($_POST['MerchantDetails'], $_POST['Users'])) {
        if (isset($_POST['MerchantDetails'])) {


            $model->attributes = $_POST['MerchantDetails'];
            $user_model->attributes = $_POST['Users'];
            $model->DOU = date('Y-m-d');
            $user_model->DOU = date('Y-m-d');
            $logo = CUploadedFile::getInstance($model, 'shop_logo');
            $banner = CUploadedFile::getInstance($model, 'shop_banner');

            $model->product_categories = $_POST['MerchantDetails']['product_categories'];
            $model->address = $_POST['MerchantDetails']['address'];
            $model->district = $_POST['MerchantDetails']['district'];
            $model->state = $_POST['MerchantDetails']['state'];
            $model->country = $_POST['MerchantDetails']['country'];
            $model->shop_logo = $logo->extensionName;
            $model->shop_banner = $banner->extensionName;

            $model->CB = '';
            $model->DOC = $doc;
//            print_r($_POST['MerchantDetails']);
//            print_r($model->attributes);
//            exit;
            // validate BOTH $model and $user_model
            $valid = $model->validate();
            $valid = $user_model->validate() && $valid;

            if ($valid) {

                if ($user_model->save()) {

                    $model->user_id = $user_model->id;
                    if ($logo != "") {
                        $id = $model->id;
                        $logo->saveAs(Yii::app()->basePath . "/../uploads/users/merchants/shop_logo/" . $model->id . "." . $logo->extensionName);
//                    $file = Yii::app()->basePath . "/../uploads/users/merchants/shop_logo/" . $model->id . "." . $logo->extensionName;
//                    $path = Yii::app()->basePath . "/../uploads/users/merchants/shop_logo/";
//                    $extension = $logo->extensionName;
//                    $this->Resize($file, 472, 339, $id, $path, $extension);
                    } else {
                        $model->shop_logo = $logo1;
                    }
                    if ($banner != "") {
                        $id = $model->id;
                        $banner->saveAs(Yii::app()->basePath . "/../uploads/users/merchants/shop_banner/" . $model->id . "." . $banner->extensionName);
//                    $file = Yii::app()->basePath . "/../uploads/users/merchants/shop_logo/" . $model->id . "." . $logo->extensionName;
//                    $path = Yii::app()->basePath . "/../uploads/users/merchants/shop_logo/";
//                    $extension = $logo->extensionName;
//                    $this->Resize($file, 472, 339, $id, $path, $extension);
                    } else {
                        $model->shop_banner = $banner1;
                    }
                    if ($model->save()) {


                        $this->redirect(array('profile'));
                    }
                }
            }
        }


        $this->render('edit_profile', array(
            'model' => $model, 'user_model' => $user_model
        ));
    }

    public function actionChangePassword() {
        $model = new ResetPassword;
        if (isset($_POST['ResetPassword'])) {
            $model->attributes = $_POST['ResetPassword'];
            if ($model->validate()) {
                $user_id = Yii::app()->user->getState('user_id');
                $user = Users::model()->findByPk($user_id);
                $user->password = $model->newPassword;
                if ($user->update()) {
                    Yii::app()->user->setFlash('passwordReset', "Password Changed!");
//                    $this->passwordChanged($user);
                    $model = new ResetPassword;
                }
            }
        }
        $this->render('reset_password', array('model' => $model));
    }

    public function passwordChanged($user_model) {
        Yii::import('user.extensions.yii-mail.YiiMail');
        $message = new YiiMailMessage;
        $message->view = "_info_password_changed";
        $params = array('user_model' => $user_model);
        $message->subject = 'Welcome To eCareAgora';
        $message->setBody($params, 'text/html');
        $message->addTo($user_model->email);
        $message->from = 'aathira@intersmart.com';
        if (Yii::app()->mail->send($message)) {
//            echo 'message send';
//            exit;
        } else {
            echo 'message not send';
            exit;
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return MerchantDetails the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = MerchantDetails::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, "The requested merchant entry for $id  does not exist.");
        return $model;
    }

    public function loadUserModel($id) {
        $user_model = Users::model()->findByPk($id);
        if ($user_model === null)
            throw new CHttpException(404, "The requested users entry for id : $id does not exist.");
        return $user_model;
    }

    public function actionLoadStates() {

        $data = States::model()->findAllByAttributes(array(
            'country_id' => $_POST['MerchantDetails_country']), array("order" => "state_name"));
        $flag = 0;
        $data = CHtml::listData($data, 'Id', 'state_name');
        foreach ($data as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

    public function actionLoadDistricts() {
        $data = Districts::model()->findAllByAttributes(array(
            'state_id' => $_POST['MerchantDetails_state']), array("order" => "district_name"));
        $flag = 0;
        $data = CHtml::listData($data, 'Id', 'district_name');
        foreach ($data as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

    public function actionFeaturedAds() {
        $this->render('featured_ads');
    }

    public function actionMySales() {
        $this->render('sales');
    }

    public function actionPaymentRequest() {
        $this->render('payment');
    }

}
