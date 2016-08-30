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
//            array('allow', // allow all users to perform 'index' and 'view' actions
//                'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete'),
//                'users' => array('*'),
//            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
//                'actions' => array('create', 'update'),
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
        $model = new BuyerDetails;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['BuyerDetails'])) {
            $model->attributes = $_POST['BuyerDetails'];
            if ($model->save())
                $this->redirect(array('admin'));
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

        if (isset($_POST['BuyerDetails'])) {
            $model->attributes = $_POST['BuyerDetails'];
            if ($model->save())
                $this->redirect(array('update', 'id' => $model->id));
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
        $dataProvider = new CActiveDataProvider('BuyerDetails');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new BuyerDetails('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['BuyerDetails']))
            $model->attributes = $_GET['BuyerDetails'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return BuyerDetails the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = BuyerDetails::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    
     public function loadUserModel($id) {
        $user_model = Users::model()->findByPk($id);
        if ($user_model === null)
            throw new CHttpException(404, "The requested users entry for id : $id does not exist.");
        return $user_model;
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

    public function actionMyAccount() {
        $user_id = Yii::app()->user->getId();
        $user = Users::model()->findByPk($user_id);
        $buyer = BuyerDetails::model()->findByAttributes(array('user_id'=>$user_id));
        $this->render('my_account',array('buyer'=>$buyer, 'user'=>$user));
    }

    public function actionEditProfile() {
        $user_id = Yii::app()->user->getId();
        $buyer_id = Yii::app()->user->getState('buyer_id');
        $model = $this->loadModel($buyer_id);
        $user_model = $this->loadUserModel($user_id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['BuyerDetails'], $_POST['Users'])) {
            $model->attributes = $_POST['BuyerDetails'];
            $user_model->attributes = $_POST['Users'];
            $date1 = $_POST['BuyerDetails']['dob'];
            $newDate = date("Y-m-d", strtotime($date1));
            $model->dob = $newDate;
            $model->gender = $_POST['BuyerDetails']['gender'];
            $model->DOU = date('Y-m-d');
            $user_model->DOU = date('Y-m-d');
            if ($model->save() && $user_model->save())
                $this->redirect(array('MyAccount'));
        }

        $this->render('edit_profile', array(
            'model' => $model, 'user_model' => $user_model
        ));
        
    }

    public function actionMyOrders() {
        $this->render('my_orders');
    }

    public function actionAddressBook() {
        $user_id = Yii::app()->user->getId();
        $address = UserAddress::model()->findAllByAttributes(array('userid'=>$user_id));
        $this->render('address_book',array('addresses'=>$address));
    }

    public function actionWishlist() {
        $this->render('wishlist');
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
                    $this->passwordChanged($user);
                    $model = new ResetPassword;
                    $this->refresh();
                }
            }
        }

        $this->render('change_password', array('model' => $model));
    }
    
       public function passwordChanged($user_model) {
        Yii::import('user.extensions.yii-mail.YiiMail');
        $message = new YiiMailMessage;
        $message->view = "_info_buyer_password_changed";
        $params = array('user_model' => $user_model);
        $message->subject = 'NewGen Shop : Password Changed';
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
