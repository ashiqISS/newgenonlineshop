<?php

class CheckOutController extends Controller {

    public function accessRules() {
        return array(
//            array('allow', // allow all users to perform 'index' and 'view' actions
////                'actions' => array('addProduct', 'myProducts', 'edit', 'deleteproduct','view'),
//                'users' => array('*'),
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

    public function actionIndex() {
        $this->render('index');
    }
    
    public function actionCheckout()
    {
       if(isset($_POST['total_amt']))
       {
           $total_amt = $_POST['total_amt'];
           $user_id = Yii::app()->user->getState('user_id');
           $cart = Cart::model()->findAllByAttributes(array('user_id'=>$user_id));
            $this->render('checkout',array('total_amt' => $total_amt,'carts'=>$cart));
       }
        
    }

}
