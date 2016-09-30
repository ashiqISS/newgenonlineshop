<?php

class ProductViewedController extends Controller {

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
                        'actions' => array('index', 'view', 'create', 'update', 'admin', 'MostPurchased', 'delete', 'SalesReport'),
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
                $model = new ProductViewed;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

                if (isset($_POST['ProductViewed'])) {
                        $model->attributes = $_POST['ProductViewed'];
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

                if (isset($_POST['ProductViewed'])) {
                        $model->attributes = $_POST['ProductViewed'];
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
                $dataProvider = new CActiveDataProvider('ProductViewed');
                $this->render('index', array(
                    'dataProvider' => $dataProvider,
                ));
        }

        /**
         * Manages all models.
         */
        public function actionAdmin() {
                $model = new ProductViewed('search');
                $model->unsetAttributes();  // clear any default values
                if (isset($_GET['ProductViewed']))
                        $model->attributes = $_GET['ProductViewed'];

                $this->render('admin', array(
                    'model' => $model,
                ));
        }

        /**
         * Returns the data model based on the primary key given in the GET variable.
         * If the data model is not found, an HTTP exception will be raised.
         * @param integer $id the ID of the model to be loaded
         * @return ProductViewed the loaded model
         * @throws CHttpException
         */
        public function loadModel($id) {
                $model = ProductViewed::model()->findByPk($id);
                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        /**
         * Performs the AJAX validation.
         * @param ProductViewed $model the model to be validated
         */
        protected function performAjaxValidation($model) {
                if (isset($_POST['ajax']) && $_POST['ajax'] === 'product-viewed-form') {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }

        public function actionSalesReport() {
                $criteria = new CDbCriteria();
                $sumary = new CDbCriteria();
                $fromdate = '';
                $todate = '';
                if (isset($_POST['slaes_filter_date_from']) && $_POST['slaes_filter_date_from'] != "") {
                        $criteria->addCondition("DOC >='" . $_POST['slaes_filter_date_from'] . "'");
                        $sumary->addCondition("DOC >='" . $_POST['slaes_filter_date_from'] . "'");
                        $fromdate = $_POST['slaes_filter_date_from'];
                }if (isset($_POST['slaes_filter_date_to']) && $_POST['slaes_filter_date_to'] != '') {
                        $criteria->addCondition("DOC <= '" . $_POST['slaes_filter_date_to'] . "'");
                        $sumary->addCondition("DOC <= '" . $_POST['slaes_filter_date_to'] . "'");
                        $todate = $_POST['slaes_filter_date_to'];
                }
                $sumary->select = 'SUM(amount) as amt ,count(order_id) cnt';
                $sales = OrderProducts::model()->findAll($criteria);
                $salesSummary = OrderProducts::model()->find($sumary);
                $this->render('sales', array('sales' => $sales, 'slaesSummary' => $salesSummary, 'fromdt' => $fromdate, 'todate' => $todate));
        }

        public function actionMostPurchased() {
                $model = new OrderProducts('MostPurchasedProducts');
                $model->unsetAttributes();  // clear any default values
                if (isset($_GET['ProductViewed']))
                        $model->attributes = $_GET['MostPurchasedProducts'];

                $this->render('productPurchased', array(
                    'model' => $model,
                ));
        }

}
