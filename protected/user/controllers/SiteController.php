<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
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
        $this->render('home');
    }

    public function actionHome() {
        $this->layout = 'main';
        $this->render('home');
    }

    public function actionLogin() {
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
                    $this->redirect(array('ResetPassword'));
                }
            }
        }
        $this->render('forgot_password', array('model' => $model));
    }

    public function actionResetPassword() {
        $this->render('password_reset');
    }

    public function resetPasswordMail() {
        Yii::import('user.extensions.yii-mail.YiiMail');
        $message = new YiiMailMessage;
        $message->view = "_reset_password";
        $params = array('user' => $user);
        $message->subject = 'NewGenShop : Recover Password';
        $message->setBody($params, 'text/html');
        $message->addTo('aathira@intersmart.in');
//        $message->addTo($user->email);
        $message->from = 'aathira@intersmart.in';
        if (Yii::app()->mail->send($message)) {
//            echo 'message send';
//            exit;
        } else {
            echo 'message not send';
            exit;
        }
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

}
