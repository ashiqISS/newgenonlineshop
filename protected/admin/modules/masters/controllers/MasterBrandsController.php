<?php

class MasterBrandsController extends Controller {

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
        $model = new MasterBrands;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['MasterBrands'])) {
            $model->attributes = $_POST['MasterBrands'];
            $model->CB = $model->UB = Yii::app()->session['admin']['id'];
            $model->DOC = date('Y-m-d');
            $model->category_id = $_POST['MasterBrands']['category_id'];
            $logo = CUploadedFile::getInstance($model, 'logo');
            $model->logo = $logo->extensionName;

            $valid = $model->validate();

            if ($valid) {
                if ($model->save()) {
                    if ($logo != "") {
                        $id = $model->id;
                        $logo->saveAs(Yii::app()->basePath . "/../uploads/products/brands/" . $model->id . "." . $logo->extensionName);
                    }
                    $this->redirect(array('admin'));
                }
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
        $logo1 = $model->logo;
        $doc = $model->DOC;
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['MasterBrands'])) {
            $model->attributes = $_POST['MasterBrands'];
            $model->DOU = date('Y-m-d');
            $model->category_id = $_POST['MasterBrands']['category_id'];
            $logo = CUploadedFile::getInstance($model, 'logo');
            $model->logo = $logo->extensionName;
            $model->CB = Yii::app()->session['admin']['id'];
            $model->DOC = $doc;

            if ($model->validate()) {
                if ($model->save()) {
                    if ($logo != "") {
                        $id = $model->id;
                        $logo->saveAs(Yii::app()->basePath . "/../uploads/products/brands/" . $model->id . "." . $logo->extensionName);
                    } else {
                        $model->logo = $logo1;
                    }
                    $this->redirect(array('admin'));
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
        $dataProvider = new CActiveDataProvider('MasterBrands');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new MasterBrands('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['MasterBrands']))
            $model->attributes = $_GET['MasterBrands'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return MasterBrands the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = MasterBrands::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param MasterBrands $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'master-brands-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
