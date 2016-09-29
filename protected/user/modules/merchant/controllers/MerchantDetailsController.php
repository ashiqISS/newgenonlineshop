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

    public function actionDashBoard() {
        $user_id = Yii::app()->user->getId();
        $merchant_id = Yii::app()->user->getState('merchant_id');
        $userdetails = Users::model()->findByPk($user_id);
        $sale = OrderProducts::model()->findAllByAttributes(array('merchant_id' => $merchant_id), array('order' => 'id DESC', 'limit' => 15));
        $this->render('dashboard', array('userdetails' => $userdetails, 'sale' => $sale));
    }

    public function actionMyOrders() {
        $user_id = Yii::app()->user->getId();
        $merchant_id = Yii::app()->user->getState('merchant_id');
//        $userdetails = Users::model()->findByPk($user_id);
        $sale = OrderProducts::model()->findAllByAttributes(array('merchant_id' => $merchant_id), array('order' => 'id DESC'));
        $this->render('my_orders', array('sale' => $sale));
    }

//    public function actionHome() {
//        $id = Yii::app()->user->getState('merchant_id');
//        $filterSelected = '';
//        $criteria = new CDbCriteria;
////        $criteria->condition = "t.merchant_id = $id";
////        print_r($_POST);
//        $criteria->order = "t.id desc";
////        $productOrders = OrderProducts::model()->findAllByAttributes(array('merchant_id' => $id));
//        if (isset($_POST['filter_status_drpdwn']) && ($_POST['filter_status_drpdwn']) != '') {
//            $filterSelected = $status = $_POST['filter_status_drpdwn'];
//            $criteria->join = "JOIN order_history as h ON t.id = h.order_products_id AND h.order_status = $status AND t.merchant_id = $id";
//        }
//        if (isset($_POST['filter_date_from']) && ($_POST['filter_date_from']) != '') {
//            $from_date = $_POST['filter_date_from'];
//            $date_to = $_POST['filter_date_to'];
//            if ($date_to == '') {
//                $date_to = '2099-12-31';
//            }
////            $criteria->addBetweenCondition('t.DOC', $from_date, $date_to, 'AND');
//            $criteria->addCondition("t.DOC >= '$from_date' AND t.DOC <= '$date_to'");
//        }
//        if (isset($_POST['filter_date_to']) && ($_POST['filter_date_to']) != '') {
//            $date_to = $_POST['filter_date_to'];
//            $from_date = $_POST['filter_date_from'];
//            if ($from_date == '') {
//                $from_date = '2099-12-31';
//            }
////            $criteria->addBetweenCondition('t.DOC', $from_date, $date_to, 'AND');
//            $criteria->addCondition("t.DOC >= '$from_date' AND t.DOC <= '$date_to'");
//        }
//
//        $criteria->condition = "t.merchant_id = $id";
//
//        $productOrders = OrderProducts::model()->findAll($criteria);
//        $this->render('home', array('productOrders' => $productOrders, 'filterSelected' => $filterSelected));
//    }

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
                    $this->passwordChanged($user);
                    $model = new ResetPassword;
                }
            }
        }
        $this->render('reset_password', array('model' => $model));
    }

    public function actionMessages() {
        if (Yii::app()->user->getState('user_type') == 2) {
            $model = new MerchantMessage();
            if (isset($_POST['MerchantMessage'])) {
                $model->attributes = $_POST['MerchantMessage'];
                $model->merchant_id = Yii::app()->user->getState('user_id');
                $model->doc = date('Y-m-d H:i:s');
                $model->from_to = 1;
                if ($model->validate()) {
                    if ($model->save()) {
                        $this->redirect(array('Messages'));
                    }
                }
            }
            $message = MerchantMessage::model()->findAllByAttributes(array('merchant_id' => Yii::app()->user->getState('user_id')), array('order' => 'id DESC'));
            $this->render('messages', array(
                'model' => $model, 'messages' => $message
            ));
        }
//                $this->render('messages');
    }

    public function passwordChanged($user_model) {
        Yii::import('user.extensions.yii-mail.YiiMail');
        $message = new YiiMailMessage;
        $message->view = "_info_password_changed";
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

        if (Yii::app()->user->getId()) {
            if (Yii::app()->user->getState('user_type') == "2") {
                $model = new AdPayment('create');
                if (isset($_POST['AdPayment'])) {
                    $model->attributes = $_POST['AdPayment'];
                    $image = CUploadedFile::getInstance($model, 'image');
                    if ($_POST['AdPayment']['display_from'] != "")
                        $model->display_from = date("Y-m-d", strtotime($_POST['AdPayment']['display_from']));
                    else
                        $model->display_from = 0;

                    if ($_POST['AdPayment']['display_to'] != "")
                        $model->display_to = date("Y-m-d", strtotime($_POST['AdPayment']['display_to']));
                    else
                        $model->display_to = 0;

                    $model->vendor_name = Yii::app()->user->getId();
                    $model->image = $image->extensionName;
                    $model->cb = Yii::app()->session['user']['id'];
                    $model->doc = date('Y-m-d H:i:s');
                    $model->link = $_POST['AdPayment']['link'];
                    if ($model->validate()) {
                        if ($model->save()) {
                            if ($model->image != "") {
                                $dimension_size = MasterAdLocation::model()->findByAttributes(array('id' => $model->position));
                                $size = explode('X', $dimension_size->size);
                                $size1 = $size[0];
                                $size2 = $size[1];
                                $dimension[0] = array('width' => '116', 'height' => '155', 'name' => 'small');
                                $dimension[1] = array('width' => $size1, 'height' => $size2, 'name' => 'big');
                                Yii::app()->Upload->uploadAdImage1($image, $model->id, true, $dimension);
//
                            }
                            Yii::app()->user->setFlash('paid', 'Success Waiting For Admin Approve.');
                            $this->redirect(array('FeaturedAds'));
                        }
                    }
                }
                $this->render('featured_ads', array(
                    'model' => $model,
                ));
            } else {
                $this->redirect(Yii::app()->getBaseUrl() . '/user.php/login');
            }
        }
    }

    public function actionMostViewed() {
        $model = new ProductViewed('merchantSearch');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['ProductViewed']))
            $model->attributes = $_GET['ProductViewed'];

        $this->render('productViewed', array(
            'model' => $model,
        ));
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

    public function actionMySales() {

        $merchant_id = Yii::app()->user->getState('merchant_id');
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
        $criteria->compare('merchant_id', $merchant_id, false);
        $sumary->compare('merchant_id', $merchant_id, false);
        $sales = OrderProducts::model()->findAll($criteria);
        $salesSummary = OrderProducts::model()->find($sumary);
        //$sales = OrderProducts::model()->findAllByAttributes(array('merchant_id' => $merchant_id));

        $this->render('sales', array('sales' => $sales, 'slaesSummary' => $salesSummary, 'fromdt' => $fromdate, 'todate' => $todate));
    }

    public function actionPaymentRequest() {
        $merchant_id = Yii::app()->user->getState('merchant_id');
        $user_id = Yii::app()->user->getId();
        $account = 0;
        $model = new RequestPayment;
        $merchant_account = MerchantAccountMaster::model()->findByAttributes(array('merchant_id' => $merchant_id));
        $banking_data = BankingDetails::model()->findAllByAttributes(array('user_id' => $user_id));


        if (isset($_POST['RequestPayment'])) {
            $model->withdraw_amount = $_POST['RequestPayment']['withdraw_amount'];
            $account = $_POST['account'];

            if ($model->validate()) {
                $payoutModel = new MerchantPayoutHistory;
                $payoutModel->merchant_id = $merchant_id;
                $payoutModel->available_balance = $merchant_account->available_balance;
                $payoutModel->requested_amount = $model->withdraw_amount;
                $payoutModel->payment_account = $account;
                $payoutModel->status = 1;
                $payoutModel->DOC = date('Y-m-d');

                if ($payoutModel->save()) {
                    // to create history , we refer request id
                    MerchantPayoutHistory::model()->updateByPk($payoutModel->id, array('request_id' => $payoutModel->id));
                    // to avoid form submissions
                    $model = new RequestPayment;
                    $payoutModel1 = $payoutModel;
                    $payoutModel = new MerchantPayoutHistory;

                    Yii::app()->user->setFlash('RequestPayment', "Your request has placed succesfully to admin. Admin will process your request and notify you soon. ");
                    $requestStatus = 1;
//                    $this->mailPayoutRequest($requestStatus, $payoutModel1);
                } else {
                    $payoutModel1 = $payoutModel;

                    Yii::app()->user->setFlash('RequestPayment', " Sorry, your request is not placed. Please try after some time.");
                    $requestStatus = 0;
//                    $this->mailPayoutRequest($requestStatus, $payoutModel1);
                }
            }
        }
        $payoutHistory = MerchantPayoutHistory::model()->findAllByAttributes(array('merchant_id' => $merchant_id));
        $this->render('payment', array('account_data' => $merchant_account, 'banking_data' => $banking_data, 'model' => $model, 'payoutHistory' => $payoutHistory));
    }

    public function mailPayoutRequest($requestStatus, $payoutModel) {
        Yii::import('user.extensions.yii-mail.YiiMail');
        $user_id = Yii::app()->user->getId();
        $user_model = Users::model()->findByPk($user_id);
        if ($requestStatus == 1) {
            $subject = "Payout Request Placed";
            $status = "placed";
            // mail to admin
            $message = new YiiMailMessage;
            $message->view = "_payout_request";
            $params = array('user_model' => $user_model, 'payoutModel' => $payoutModel);
            $message->subject = "NewGen Shop : $subject";
            $message->setBody($params, 'text/html');
            $message->addTo(Yii::app()->params['adminEmail']);
            $message->from = $user_model->email;
            Yii::app()->mail->send($message);
        } else {
            $subject = "Payout Request Failed";
            $status = "failed";
        }
        // mail to user
        $message = new YiiMailMessage;
        $message->view = "_info_payout_request";
        $params = array('user_model' => $user_model, 'status' => $status, 'payoutModel' => $payoutModel);
        $message->subject = "NewGen Shop : $subject";
        $message->setBody($params, 'text/html');
        $message->addTo($user_model->email);
        $message->from = Yii::app()->params['infoEmail'];
        Yii::app()->mail->send($message);
    }

    public function actionViewPayouts($id) {
        $this->render('view_payout_history', array(
            'model' => $this->loadPayoutHistory($id),
        ));
    }

    public function loadPayoutHistory($id) {
        $model = MerchantPayoutHistory::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested history does not exist.');
        return $model;
    }

    public function actionViewHistory($id) {
        $model = OrderProducts::model()->findByPk($id);
        if (!empty($model)) {
            $this->render('view_order', array(
                'model' => $model,
            ));
        } else {
            echo 'No History Available';
            // to do add error page
        }
    }

    public function actionNewOrderHistory($id) {
        $model = new OrderHistory;
        $order_product = OrderProducts::model()->findByPk($id);
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['OrderHistory'])) {
            $model->attributes = $_POST['OrderHistory'];
            $model->product_id = $order_product->product_id;
            $model->order_products_id = $order_product->id;
            $model->order_id = $order_product->order_id;
            $model->date = $_POST['OrderHistory']['date'];
            if ($model->save()) {
                if ($model->order_status == 5) {
                    $this->updateOrderProductStatus($model->order_products_id);
                }
                $this->redirect(['ViewHistory', 'id' => $id]);
            }
        }

        $this->render('create_new_order_history', array(
            'model' => $model,
            'order_product' => $order_product,
        ));
    }

    public function updateOrderProductStatus($id) {
        OrderProducts::model()->updateByPk($id, array('status' => 4));
        // Item delivered to customer
    }

    public function actionPrintProductInvoice($id) {
        $product_order_id = $id;
        if (isset($product_order_id)) {
            $productOrder = OrderProducts::model()->findByPk($product_order_id);
            $product = Products::model()->findByPk($productOrder->product_id);
            $order = Order::model()->findByPk($productOrder->order_id);
            $user_address = UserAddress::model()->findByPk($order->ship_address_id);
            $bill_address = UserAddress::model()->findByPk($order->bill_address_id);

            $params = array();
            $params['productOrder'] = $productOrder;
            $params['order'] = $order;
            $params['product'] = $product;
            $params['user_address'] = $user_address;
            $params['bill_address'] = $bill_address;

//            $order_details = OrderProducts::model()->findAllByAttributes(array('order_id' => $id));
            $this->renderPartial('_product_invoice', $params);
        }
    }

    public function actionPrintShippingDetail($id) {
        $product_order_id = $id;
        if (isset($product_order_id)) {
            $productOrder = OrderProducts::model()->findByPk($product_order_id);
            $product = Products::model()->findByPk($productOrder->product_id);
            $order = Order::model()->findByPk($productOrder->order_id);
            $user_address = UserAddress::model()->findByPk($order->ship_address_id);
            $bill_address = UserAddress::model()->findByPk($order->bill_address_id);

            $params = array();
            $params['productOrder'] = $productOrder;
            $params['order'] = $order;
            $params['product'] = $product;
            $params['user_address'] = $user_address;
            $params['bill_address'] = $bill_address;

//            $order_details = OrderProducts::model()->findAllByAttributes(array('order_id' => $id));
            $this->renderPartial('_product_ship_invoice', $params);
        }
    }

    public function MerchantPlanHistory($data) {
        $model = new MerchantPlansHistory;
        $model->plan_id = $data;
        $plan = PlanDetails::model()->findByPk($model->plan_id);
        $model->user_id = Yii::app()->user->getState('merchant_id');
        $model->plan_name = $plan->plan_name;
        $model->amount = $plan->amount;
        $model->featured = $plan->featured;
        $model->no_of_product = $plan->no_of_products;
        $model->no_of_ads = $plan->no_of_ads;
        $model->no_of_days = $plan->no_of_days;
        $model->doc = date('Y-m-d H:i:s');
        $model->dou = date('Y-m-d H:i:s');
        $model->status = 1;
        if ($model->save(false)) {
            return true;
        }
    }

    public function actionUpgradePlan() {
        $model = new MerchantPlans;

        if (isset($_POST['PlanDetails'])) {
            $plan_exist = MerchantPlans::model()->findByAttributes(array('user_id' => Yii::app()->user->getState('merchant_id')));
            if (!empty($plan_exist)) {
                $date = date('Y-m-d', strtotime($plan_exist->doc));
                $exp_date = date("Y-m-d", strtotime($date . " + $plan_exist->no_of_days days"));
                $today = date('Y-m-d');

                if ($today > $exp_date) {
                    $model->plan_id = $_POST['PlanDetails']['id'];
                    $plan = PlanDetails::model()->findByPk($model->plan_id);
                    $model->user_id = Yii::app()->user->getState('merchant_id');
                    $model->plan_name = $plan->plan_name;
                    $model->amount = $plan->amount;
                    $model->featured = $plan->featured;
                    $model->featured_left = $plan->featured;
                    $model->no_of_product = $plan->no_of_products;
                    $model->no_of_product_left = $plan->no_of_products;
                    $model->no_of_ads = $plan->no_of_ads;
                    $model->no_of_ads_left = $plan->no_of_ads;
                    $model->no_of_days = $plan->no_of_days;
                    $model->no_of_days_left = $plan->no_of_days;
                    $model->doc = date('Y-m-d H:i:s');
                    $model->dou = date('Y-m-d H:i:s');
                    $model->status = 1;
                    if ($model->save(false)) {
                        $this->MerchantPlanHistory($_POST['PlanDetails']['id']);
                        $plan_exist->delete();
                        Yii::app()->user->setFlash('success', "Your Plan Upgrade Successfully!!!!");
                        $this->redirect(array('UpgradePlan'));
                    } else {
                        Yii::app()->user->setFlash('Error', "Error Occured!!!!");
                        $this->redirect(array('UpgradePlan'));
                    }
                } else {
                    $model->plan_id = $_POST['PlanDetails']['id'];
                    $plan = PlanDetails::model()->findByPk($model->plan_id);
                    $model->user_id = Yii::app()->user->getState('merchant_id');
                    $model->plan_name = $plan->plan_name;
                    $model->amount = $plan->amount;
                    $model->featured = $plan->featured + $plan_exist->featured_left;
                    $model->featured_left = $plan->featured + $plan_exist->featured_left;
                    $model->no_of_product = $plan->no_of_products + $plan_exist->no_of_product_left;
                    $model->no_of_product_left = $plan->no_of_products + $plan_exist->no_of_product_left;
                    $model->no_of_ads = $plan->no_of_ads + $plan_exist->no_of_ads_left;
                    $model->no_of_ads_left = $plan->no_of_ads + $plan_exist->no_of_ads_left;
                    $model->no_of_days = $plan->no_of_days + $plan_exist->no_of_days_left;
                    $model->no_of_days_left = $plan->no_of_days + $plan_exist->no_of_days_left;
                    $model->doc = date('Y-m-d H:i:s');
                    $model->dou = date('Y-m-d H:i:s');
                    $model->status = 1;
                    if ($model->save(false)) {

                        $this->MerchantPlanHistory($_POST['PlanDetails']['id']);
                        $plan_exist->delete();
                        Yii::app()->user->setFlash('success', "Your Plan Upgrade Successfully!!!!");
                        $this->redirect(array('UpgradePlan'));
                    } else {
                        Yii::app()->user->setFlash('Error', "Error Occured!!!!");
                        $this->redirect(array('UpgradePlan'));
                    }
                }
            } else {
                $model->plan_id = $_POST['PlanDetails']['id'];
                $plan = PlanDetails::model()->findByPk($model->plan_id);
                $model->user_id = Yii::app()->user->getState('merchant_id');
                $model->plan_name = $plan->plan_name;
                $model->amount = $plan->amount;
                $model->featured = $plan->featured;
                $model->featured_left = $plan->featured;
                $model->no_of_product = $plan->no_of_products;
                $model->no_of_product_left = $plan->no_of_products;
                $model->no_of_ads = $plan->no_of_ads;
                $model->no_of_ads_left = $plan->no_of_ads;
                $model->no_of_days = $plan->no_of_days;
                $model->no_of_days_left = $plan->no_of_days;
                $model->doc = date('Y-m-d H:i:s');
                $model->dou = date('Y-m-d H:i:s');
                $model->status = 1;
                if ($model->save(false)) {
                    $this->MerchantPlanHistory($_POST['PlanDetails']);
                    Yii::app()->user->setFlash('success', "Your Plan Upgrade Successfully!!!!");
                    $this->redirect(array('UpgradePlan'));
                } else {
                    Yii::app()->user->setFlash('Error', "Error Occured!!!!");
                    $this->redirect(array('UpgradePlan'));
                }
            }
        }

        $allplans = PlanDetails::model()->findAllByAttributes(array('status' => 1));
        $yourplans = MerchantPlans::model()->findAllByAttributes(array('status' => 1, 'user_id' => Yii::app()->user->getState('merchant_id')));
        $this->render('merchant_plans', array('model' => $model, 'plan' => $plan, 'allplans' => $allplans, 'yourplans' => $yourplans));
    }

    public function actionUpgradePlanProduct() {
        $plan_id = $_POST['plan_id'];
        $plan_date = $_POST['plan_date'];
        $plan = PlanDetails::model()->findByPk($plan_id)->amount;
        $plan_featured = PlanDetails::model()->findByPk($plan_id)->featured;
        $plan_products_id = PlanDetails::model()->findByPk($plan_id)->id;
        $array = array('plan' => $plan, 'plan_featured' => $plan_featured, 'plan_products_id' => $plan_products_id);
        $json = CJSON::encode($array);
        echo $json;
    }

    public function actionUpgradePlanProductdate() {
        $plan_date = $_POST['plan_date'];
        $plan_id = $_POST['plan_id'];
        $plan = PlanDetails::model()->findByPk($plan_id)->no_of_days;
        $date = $plan_date;
        $newdate = strtotime('+' . $plan . 'day', strtotime($date));
        $newdates = date('j-m-Y', $newdate);

        echo $newdates;
        $array = array('plan_date' => $plan_date, 'newdates' => $newdates);
        $json = CJSON::encode($array);
        echo $json;
    }

    public function actionMerchantPlanDetail($plan) {
        $model = MerchantPlans::model()->findByPk($plan);

        $this->render('merchant_plans_details', array('model' => $model));
    }

    public function actionPlanDetail($plan) {
        $model = PlanDetails::model()->findByPk($plan);

        $this->render('plan_details', array('model' => $model));
    }

}
