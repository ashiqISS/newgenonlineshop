<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function init() {
        date_default_timezone_set('Asia/Calcutta');
    }

    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
//                $this->layout = 'test';
//        $this->render('index');
        $this->layout = 'main';
        $params = array();

        $criteriatop = new CDbCriteria;
        $criteriatop->addCondition('display_from <= "' . date('Y-m-d') . '" ');
        $criteriatop->addCondition('display_to >= "' . date('Y-m-d') . '" ');
        $top = AdPayment::model()->findAllByAttributes(array('position' => '4', 'admin_approve' => '1', 'status' => 1), $criteriatop);
        $params['top'] = $top;

        $criteria_top_left = new CDbCriteria;
        $criteria_top_left->addCondition('display_from <= "' . date('Y-m-d') . '" ');
        $criteria_top_left->addCondition('display_to >= "' . date('Y-m-d') . '" ');
        $top_left = AdPayment::model()->findByAttributes(array('position' => '5', 'admin_approve' => '1', 'status' => 1), $criteria_top_left, array('order' => 'id DESC', 'limit' => 2));
        $params['top_left'] = $top_left;

        $criteria_top_right = new CDbCriteria;
        $criteria_top_right->addCondition('display_from <= "' . date('Y-m-d') . '" ');
        $criteria_top_right->addCondition('display_to >= "' . date('Y-m-d') . '" ');
        $top_right = AdPayment::model()->findByAttributes(array('position' => '6', 'admin_approve' => '1', 'status' => 1), $criteria_top_right, array('order' => 'id DESC', 'limit' => 2));
        $params['top_right'] = $top_right;

        $criteria_top_left2 = new CDbCriteria;
        $criteria_top_left2->addCondition('display_from <= "' . date('Y-m-d') . '" ');
        $criteria_top_left2->addCondition('display_to >= "' . date('Y-m-d') . '" ');
        $top_left2 = AdPayment::model()->findAllByAttributes(array('position' => '7', 'admin_approve' => '1', 'status' => 1), $criteria_top_left2);
        $params['top_left2'] = $top_left2;

        $criteria_top_Right2 = new CDbCriteria;
        $criteria_top_Right2->addCondition('display_from <= "' . date('Y-m-d') . '" ');
        $criteria_top_Right2->addCondition('display_to >= "' . date('Y-m-d') . '" ');
        $top_Right2 = AdPayment::model()->findAllByAttributes(array('position' => '8', 'admin_approve' => '1', 'status' => 1), $criteria_top_Right2);
        $params['top_Right2'] = $top_Right2;

        $featured_products = Products::model()->findAllByAttributes(array('is_featured' => 1, 'is_admin_approved' => 1, 'status' => 1),array('order' => 'id DESC','limit' => 4));
        $params['featured_products'] = $featured_products;

        $criterialatest = new CDbCriteria;
        $date = date('Y-m-d');
        $criterialatest->condition = "status = 1 AND is_admin_approved = 1 AND '" . $date . "' >= new_from AND  '" . $date . "' <= new_to AND ( '" . $date . "' >= sale_from AND  '" . $date . "' <= sale_to) ";
        $latest_products = Products::model()->findAll($criterialatest);
        if (empty($latest_products)) {
            $criterialatest = new CDbCriteria;
            $criterialatest->condition = "status = 1 AND is_admin_approved = 1 AND ('$date' >= sale_from and '$date' <= sale_to) ORDER BY id desc";
            $latest_products = Products::model()->findAll($criterialatest);
        }
        $params['latest_products'] = $latest_products;

        $criteria_offers = new CDbCriteria;
        $criteria_offers->condition = "status = 1 AND is_admin_approved = 1 AND is_discount_available = 1 AND '" . $date . "' >= discount_from AND  '" . $date . "' <= discount_to AND ( '" . $date . "' >= sale_from AND  '" . $date . "' <= sale_to) ";
        $special_offers = Products::model()->findAll($criteria_offers);
        $params['special_offers'] = $special_offers;



        $this->render('home', $params);
    }

    public function actionHome() {
        $this->layout = 'main';
        $this->render('home', $params);
    }

    public function actionLogin() {
        $flag = 0;
        $model = new LoginForm;

        // uncomment the following code to enable ajax-based validation

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate()) {

                $user_model = Users::model()->findByAttributes(array('email' => $model->email));
                date_default_timezone_set('Asia/Calcutta');
                $user_model->last_login = date('Y-m-d H:i:s');
                $user_model->update();

                if ($user_model->user_status == 1) {
                    Yii::app()->user->setState('user_mail', null);
                    Yii::app()->user->setState('user_id', null);
                    Yii::app()->user->setState('user_type', null);
                    Yii::app()->user->setState('buyer_id', null);
                    Yii::app()->user->setState('merchant_id', null);

                    Yii::app()->user->logout();
                    $flag = 1;
//                    $this->render('activationPending',array('email'=>$model->email));
                } else {

                    if ($user_model->user_type == 1) {

                        // login buyer
                        $buyer = BuyerDetails::model()->findByAttributes(array('user_id' => $user_model->id));
                        $buyer_id = $buyer->id;
                        $buyer_fname = $buyer->first_name;
                        Yii::app()->user->setState('buyer_id', $buyer_id);
                        Yii::app()->user->setState('buyer_fname', $buyer_fname);
//                    $this->redirect(array('buyer/default/index'));
                        $this->redirect(array('product/products'));
                    } else if ($user_model->user_type == 2) {

                        // login merchant
                        $merchant = MerchantDetails::model()->findByAttributes(array('user_id' => $user_model->id));
                        $merchant_id = $merchant->id;
                        $merchant_name = $merchant->fullname;
                        $merchant_type = $merchant->merchant_type;
                        Yii::app()->user->setState('merchant_name', $merchant_name);
                        Yii::app()->user->setState('merchant_id', $merchant_id);
                        Yii::app()->user->setState('merchant_type', $merchant_type);
                        $this->redirect(array('merchant/merchantDetails/home'));
                    } else {
                        // login invalid
                        echo 'invalid login';
                    }
                }
                if ($flag == 1) {
                    $this->render('activationPending', array('email' => $model->email));
                } else {
                    $this->render('login', array('model' => $model));
                }
            }
        }
        $this->render('login', array('model' => $model));
    }

    public function actionLogout() {
        Yii::app()->user->setState('user_mail', null);
        Yii::app()->user->setState('user_id', null);
        Yii::app()->user->setState('user_type', null);
        Yii::app()->user->setState('buyer_id', null);
        Yii::app()->user->setState('merchant_id', null);

        Yii::app()->user->logout();

        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionForgotPassword() {
        $model = new ForgotPassword;
        if (isset($_POST['ForgotPassword'])) {
            $model->attributes = $_POST['ForgotPassword'];
            if ($model->validate()) {
                $email = $_POST['ForgotPassword']['email'];
                if ($user = Users::model()->findByAttributes(array('email' => $email))) {
                    $user->password = Utilities::genPassword();
                    $user->update();
                    $model = new ForgotPassword;
                    $this->resetPasswordMail($user);
                }
            }
        }
        $this->render('forgot_password', array('model' => $model));
    }

    public function actionResetPassword() {
        $this->render('password_reset');
    }

    public function resetPasswordMail($user) {
        Yii::import('user.extensions.yii-mail.YiiMail');
        $message = new YiiMailMessage;
        $message->view = "_reset_password";
        $params = array('user' => $user);
        $message->subject = 'NewGenShop : Recover Password';
        $message->setBody($params, 'text/html');
//        $message->addTo('aathira@intersmart.in');
        $message->addTo($user->email);
        $message->from = Yii::app()->params['infoEmail'];
        if (Yii::app()->mail->send($message)) {
            $this->redirect(array('ResetPassword'));
        } else {
            Yii::app()->user->setFlash('resetFailed', " Sorry, your request cannot be processed now due to some technical problems. Please try after some time.");
        }
    }

    public function actionResendActivation() {
//        echo 'hi';exit;
        $msg = "Not able to send mail now due to some technical problems. Please try after some time.";
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $user_model = Users::model()->findByAttributes(array('email' => $email));
            $utype = $user_model->user_type;
            Yii::import('user.extensions.yii-mail.YiiMail');
            $message = new YiiMailMessage;
            if ($utype == 2) {
                $view = "_user_activation_mail";
            } else {
                $view = "_buyer_activation_mail";
            }
            $message->view = $view;
            $params = array('user_model' => $user_model);
            $message->subject = 'Welcome To NewGenShop';
            $message->setBody($params, 'text/html');
            $message->addTo($user_model->email);
            $message->from = Yii::app()->params['infoEmail'];
            if (Yii::app()->mail->send($message)) {
                $msg = "Activation link send to your mail. Please check";
            } else {
                $msg = "Not able to send mail now due to some technical problems. Please try after some time.";
            }
        } else {
            $msg = "Not able to send mail now due to some technical problems. Please try after some time.";
        }
//        echo $msg;
//        $this->render('activation_resend', array('message' => $msg));
        $this->redirect(array('login'));
    }

    public function actionCategoryCat() {

        if (Yii::app()->request->isAjaxRequest) {

            $criteria = new CDbCriteria();
            $criteria->addSearchCondition('category_name', $_REQUEST['tag'], 'AND');

            //$criteria->compare('category_id',$_REQUEST['category'],true,'AND');
            if ($_REQUEST['taged'] != '') {

                $arrs = explode(',', $_REQUEST['taged']);
                $criteria->addNotInCondition('category_name', $arrs, 'AND');
            }
            $tags = ProductCategory::model()->findAll($criteria);
            $options = array();
            $_SESSION['category'][0] = '';
            foreach ($tags as $tag) {
                unset($_SESSION['category']);
                $cat_parent = $this->findParent(ProductCategory::model()->findByPk($tag->id));
                //echo $cat_parent;

                if ($_REQUEST['type'] == 'category') {
                    
                }
                echo '<div class="' . $_REQUEST['type'] . '_tag-sub" id="' . $tag->id . '">' . $cat_parent . '</div>';
            }
        }
    }

    public function findParent($data) {

        $index = count($_SESSION['category']);
        if ($data->id == $data->parent) {
            $_SESSION['category'][$index + 1] = $data->category_name;
        } else {
            $results = ProductCategory::model()->findByPk($data->parent);
            $_SESSION['category'][$index + 1] = $data->category_name;
            return $this->findParent($results);
        }
        $return = '';
        $category_arr = array_reverse($_SESSION['category']);
        foreach ($category_arr as $cat) {
            $return .=$cat . '>';
        }
        return rtrim($return, '>');
    }

    public function actionCategoryTagAdd() {

        if (Yii::app()->request->isAjaxRequest) {

            if (isset($_REQUEST['tag'])) {
                $model = new MasterCategoryTags;
                $model->category_tag = $_REQUEST['tag'];
                $model->CB = Yii::app()->session['admin']['id'];
                $model->UB = Yii::app()->session['admin']['id'];
                $model->DOC = date('Y-m-d');
                $model->save(false);
            }
        }
    }

    public function actionCategoryTag() {

        if (Yii::app()->request->isAjaxRequest) {

            $criteria = new CDbCriteria();
            $criteria->addSearchCondition('category_tag', $_REQUEST['tag'], 'AND');

            //$criteria->compare('category_id',$_REQUEST['category'],true,'AND');
            if ($_REQUEST['taged'] != '') {

                $arrs = explode(',', $_REQUEST['taged']);
                $criteria->addNotInCondition('category_tag', $arrs, 'AND');
            }
            $tags = MasterCategoryTags::model()->findAll($criteria);
            foreach ($tags as $tag) {
                if ($_REQUEST['type'] == 'category') {
                    
                }
                echo '<div class="' . $_REQUEST['type'] . '_tag-sub">' . $tag->category_tag . '</div>';
            }
        }
    }

    public function actionProduct($id) {
        $products = ProductCategory::model()->findByPk($id);
        $this->render('products', array('products' => $products));
    }

    public function actionCurrencyChange($id) {

        $data = Currency::model()->findByPk($id);
//                var_dump($data);
//                exit;

        Yii::app()->session['currency'] = $data;
        $this->redirect(Yii::app()->request->urlReferrer);
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-1.11.3.min.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bootstrap.min.js');
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionfaq() {
        $this->render('faq');
    }

    public function actionAboutUs() {
        $this->render('about');
    }

    public function actionContactUs() {
        $model = new ContactUs;
        if (isset($_POST['ContactUs'])) {
            $model->attributes = $_POST['ContactUs'];
            date_default_timezone_set('Asia/Calcutta');
            $model->date = date('Y-m-d H:i:s');
            if ($model->validate()) {
                if ($model->save()) {
                    $this->sendContactMail($model);
                    $model = new ContactUs;
                }
            }
        }
        $this->render('contact', array('model' => $model));
    }

    public function sendContactMail($model) {
        Yii::import('user.extensions.yii-mail.YiiMail');
        $message = new YiiMailMessage;
        $message->view = "_contact_us";
        $params = array('model' => $model);
        $message->subject = 'NewGenShop : Contact Us';
        $message->setBody($params, 'text/html');
        $message->addTo(Yii::app()->params['contactEmail']);
//       change to admin email
        $message->from = $model->email;
        if (Yii::app()->mail->send($message)) {
            Yii::app()->user->setFlash('contactus', " Your message has sent to admin. We will contact you soon..");
        } else {
            Yii::app()->user->setFlash('contactus', " Sorry, your message was not sent due to some technical problems. Please try after some time.");
        }
    }

}
