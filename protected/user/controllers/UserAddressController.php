<?php

class UserAddressController extends Controller {

        /**
         * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
         * using two-column layout. See 'protected/views/layouts/column2.php'.
         */
        public $layout = '//layouts/column2';

        /**
         * @return array action filters
         */
        public function init() {
                date_default_timezone_set('Asia/Calcutta');
        }

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
                $model = new UserAddress;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

                if (isset($_POST['UserAddress'])) {
                        $model->attributes = $_POST['UserAddress'];
                        $model->address_2 = $_POST['UserAddress']['address_2'];
                        $model->userid = Yii::app()->user->getId();
                        $model->CB = 0;
                        $model->DOC = date('Y-m-d');
                        $model = $this->checkDefault($model, 'default_billing_address');
                        $model = $this->checkDefault($model, 'default_shipping_address');

                        if ($model->validate()) {
                                if ($model->save()) {

                                        Yii::app()->user->setFlash('address_updation', "New address added successfully.");
                                        $this->redirect(array('buyerDetails/AddressBook'));
                                } else {
                                        Yii::app()->user->setFlash('address_updation', "Sorry! There is some error..");
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

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

                if (isset($_POST['UserAddress'])) {
                        $model->attributes = $_POST['UserAddress'];
                        $model->address_2 = $_POST['UserAddress']['address_2'];
                        $model = $this->checkDefault($model, 'default_billing_address');
                        $model = $this->checkDefault($model, 'default_shipping_address');
                        if ($model->validate()) {
                                if ($model->save()) {
                                        Yii::app()->user->setFlash('address_updation', "Address updated successfully");
                                        $this->redirect(array('buyerDetails/AddressBook'));
                                } else {
                                        Yii::app()->user->setFlash('address_updation', "Sorry! There is some error..");
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
        public function actionDeleteAddress() {

                if (isset($_GET['id'])) {
                        if (UserAddress::model()->deleteByPk($_GET['id'])) {
                                Yii::app()->user->setFlash('address_updation', "Address deleted.");
                        } else {
                                Yii::app()->user->setFlash('address_updation', "Cannot remove address.Already in use");
                        }
                        $this->redirect(array('buyerDetails/AddressBook'));
                }
        }

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
                $dataProvider = new CActiveDataProvider('UserAddress');
                $this->render('index', array(
                    'dataProvider' => $dataProvider,
                ));
        }

        /**
         * Manages all models.
         */
        public function actionAdmin() {
                $model = new UserAddress('search');
                $model->unsetAttributes();  // clear any default values
                if (isset($_GET['UserAddress']))
                        $model->attributes = $_GET['UserAddress'];

                $this->render('admin', array(
                    'model' => $model,
                ));
        }

        /**
         * Returns the data model based on the primary key given in the GET variable.
         * If the data model is not found, an HTTP exception will be raised.
         * @param integer $id the ID of the model to be loaded
         * @return UserAddress the loaded model
         * @throws CHttpException
         */
        public function loadModel($id) {
                $model = UserAddress::model()->findByPk($id);
                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        /**
         * Performs the AJAX validation.
         * @param UserAddress $model the model to be validated
         */
        protected function performAjaxValidation($model) {
                if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-address-form') {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }

        public function actionLoadStates() {

                $data = States::model()->findAllByAttributes(array(
                    'country_id' => $_POST['UserAddress_country']), array("order" => "state_name"));
                $flag = 0;
                $data = CHtml::listData($data, 'Id', 'state_name');
                foreach ($data as $value => $name) {
                        echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
                }
        }

        public function actionLoadDistricts() {
                $data = Districts::model()->findAllByAttributes(array(
                    'state_id' => $_POST['UserAddress_state']), array("order" => "district_name"));
                $flag = 0;
                $data = CHtml::listData($data, 'Id', 'district_name');
                foreach ($data as $value => $name) {
                        echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
                }
        }

        public function checkDefault($model, $default) {
                $default_address = UserAddress::model()->findAllByAttributes(array('userid' => Yii::app()->user->getId(), $default => 1));
                if (empty($default_address)) {
                        $model->$default = 1;
                } elseif ($model->$default == 1) {
                        $address = UserAddress::model()->updateAll(array($default => 0), 'userid = ' . Yii::app()->user->getId());
                        $model->$default = 1;
                } elseif ($model->$default == 0) {
                        $model->$default = 0;
                }
                return $model;
        }

}
