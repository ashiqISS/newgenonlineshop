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
        $model = $this->loadModel($id);
        $user_id = $model->user_id;
        $user_model = $this->loadUserModel($user_id);
        $this->render('view', array(
            'model' => $model, 'user_model' => $user_model
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new BuyerDetails('admin_create');
        $user_model = new Users('admin_create');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['BuyerDetails'], $_POST['Users'])) {
            $model->attributes = $_POST['BuyerDetails'];
            $user_model->attributes = $_POST['Users'];
            $user_model->user_type = 1; // 1 = Buyer , 2 = Merchant, 3 = BuyerToMerchant , 4 = MerchantToBuyer
            $date1 = $_POST['BuyerDetails']['dob'];
            $newDate = date("Y-m-d", strtotime($date1));
            $model->dob = $newDate;
            $model->CB = $user_model->CB = $model->UB = $user_model->UB = Yii::app()->session['admin']['id'];
            $model->DOC = $user_model->DOC = date('Y-m-d');

            // validate BOTH $model and $user_model
            $valid = $model->validate();
            $valid = $user_model->validate() && $valid;

            if ($valid) {

                if ($user_model->save()) {
                    $model->user_id = $user_model->id;
                    if ($model->save()) {
                        $this->redirect(array('admin'));
                    }
                }
            }
        }
        $this->render('create', array(
            'model' => $model, 'user_model' => $user_model
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $user_id = $model->user_id;
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
                $this->redirect(array('admin'));
        }

        $this->render('update', array(
            'model' => $model, 'user_model' => $user_model
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model = $this->loadModel($id);
        $user_id = $model->user_id;
        $model->delete();
        $this->loadUserModel($user_id)->delete();

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
        $user_model = new Users('search');
        $model->unsetAttributes();  // clear any default values
        $user_model->unsetAttributes();  // clear any default values

        if (isset($_GET['BuyerDetails'], $_GET['Users'])) {
            $model->attributes = $_GET['BuyerDetails'];
            $user_model->attributes = $_GET['Users'];
        }
        $this->render('admin', array(
            'model' => $model, 'user_model' => $user_model
        ));

//        $rawData = Yii::app()->db->createCommand("SELECT * FROM buyer_details LEFT JOIN users  ON buyer_details.user_id = users.id")->queryAll();
//        $dataProvider = new CArrayDataProvider($rawData, array(
//            'id' => 'user',
//            'sort' => array(
//                'attributes' => array('*'
//                ),
//            ),
//            'pagination' => array(
//                'pageSize' => 25, //records display
//            ),
//        ));
//
//        $this->render('admin', array(
//            'dataProvider' => $dataProvider,'model'=>$model,'user_model'=>$user_model
//        ));
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
            throw new CHttpException(404, 'The requested buyer_details entry for id : $id does not exist.');
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

}
