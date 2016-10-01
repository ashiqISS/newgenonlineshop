<?php

class ProductsController extends Controller {

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
////                'actions' => array('addProduct', 'myProducts', 'edit', 'deleteproduct','view'),
//                'users' => array('*'),
//            ),
            array('allow', // allow authenticated users to access all actions
                'users' => array('@'),
            ),
//            array('allow', // allow authenticated user to perform 'create' and 'update' actions
////                'actions' => array('create', 'update'),
//                'actions' => array('addProduct', 'myProducts', 'edit', 'deleteproduct','view'),
//                'users' => array('@'),
//            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
//                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionAddProduct() {
        $model = new Products('user_create');


        if (isset($_POST['Products'])) {

            $model->attributes = $_POST['Products'];
            $model->description = $_POST['Products']['description'];
            $model->meta_description = $_POST['Products']['meta_description'];
//            $model->new_from = $_POST['Products']['new_from'];
//            $model->new_to = $_POST['Products']['new_to'];
//            $model->sale_from = $_POST['Products']['sale_from'];
//            $model->sale_to = $_POST['Products']['sale_to'];
//            $model->special_price_from = $_POST['Products']['special_price_from'];
//            $model->special_price_to = $_POST['Products']['special_price_to'];
//            $model->DOC = $_POST['Products']['DOC'];
//            $model->DOU = $_POST['Products']['DOU'];

            $image = CUploadedFile::getInstance($model, 'main_image');
            $hover_image = CUploadedFile::getInstance($model, 'hover_image');
            $images = CUploadedFile::getInstancesByName('gallery_images');
            $model->main_image = $image->extensionName;
            $model->hover_image = $hover_image->extensionName;

            $model->merchant_id = Yii::app()->user->getState('merchant_id');
            $model->merchant_type = Yii::app()->user->getState('merchant_type');

            if ($model->related_products != "") {
                $model->related_products = implode(",", $model->related_products);
            } else {
                $model->related_products = "";
            }

            if ($_POST['Products']['new_from'] != "")
                $model->new_from = date("Y-m-d", strtotime($_POST['Products']['new_from']));
            else
                $model->new_from = '';

            if ($_POST['Products']['new_to'] != "")
                $model->new_to = date("Y-m-d", strtotime($_POST['Products']['new_to']));
            else
                $model->new_to = '';

            if ($_POST['Products']['sale_from'] != "")
                $model->sale_from = date("Y-m-d", strtotime($_POST['Products']['sale_from']));
            else
                $model->sale_from = '';

            if ($_POST['Products']['sale_to'] != "")
                $model->sale_to = date("Y-m-d", strtotime($_POST['Products']['sale_to']));
            else
                $model->sale_to = '';

            if ($_POST['Products']['special_price_from'] != "")
                $model->special_price_from = date("Y-m-d", strtotime($_POST['Products']['special_price_from']));
            else
                $model->special_price_from = '';

            if ($_POST['Products']['special_price_to'] != "")
                $model->special_price_to = date("Y-m-d", strtotime($_POST['Products']['special_price_to']));
            else
                $model->special_price_to = '';

            if ($_POST['Products']['discount_from'] != "")
                $model->discount_from = date("Y-m-d", strtotime($_POST['Products']['discount_from']));
            else
                $model->discount_from = '';

            if ($_POST['Products']['discount_to'] != "")
                $model->discount_to = date("Y-m-d", strtotime($_POST['Products']['discount_to']));
            else
                $model->discount_to = '';

            if ($model->canonical_name == '') {
                $model->canonical_name = preg_replace('#[ -]+#', '-', $model->product_name);
                $model->canonical_name = $model->canonical_name . '_' . $model->id;
            }

            $model->CB = 0;
            $model->UB = 0;
            $model->is_admin_approved = 0;
            $model->DOC = date('Y-m-d');
            $model->DOU = date('Y-m-d');


            if ($model->validate()) {


                if ($model->save()) {

                    if ($image != "") {
                        $id = $model->id;
                        $dimension[0] = array('width' => '116', 'height' => '155', 'name' => 'small');
                        $dimension[1] = array('width' => '322', 'height' => '500', 'name' => 'medium');
                        $dimension[2] = array('width' => '580', 'height' => '775', 'name' => 'big');
                        $dimension[3] = array('width' => '3016', 'height' => '4030', 'name' => 'zoom');
                        Yii::app()->Upload->uploadImage($image, $id, true, $dimension);
                    }

                    if ($hover_image != "") {
                        $id = $model->id;
                        $dimensions[0] = array('width' => '322', 'height' => '500', 'name' => 'hover');
                        Yii::app()->Upload->uploadHoverImage($hover_image, $id, true, $dimensions);
                    }

                    if ($images != "") {
                        $id = $model->id;
                        $dimension[0] = array('width' => '116', 'height' => '155', 'name' => 'small');
                        $dimension[1] = array('width' => '580', 'height' => '775', 'name' => 'big');
                        $dimension[3] = array('width' => '3016', 'height' => '4030', 'name' => 'zoom');
                        Yii::app()->Upload->uploadMultipleImage($images, $id, true, $dimension);
                    }

                    $this->redirect(array('../my-products'));
                }
            }
        }

        $this->render('add_product', array(
            'model' => $model,
        ));
    }

    public function actionEdit($product) {
        $id = $product;
        $model = $this->loadModel($id);
        $model->setScenario('update');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);
//        if (isset($_POST['Products'])) {
//            $model->attributes = $_POST['Products'];
//            if ($model->save())
//                $this->redirect(array('update', 'id' => $model->id));
//        }
//
//        $this->render('update', array(
//            'model' => $model,
//        ));
        $image1 = $model->main_image;
        $image0 = $model->gallery_images;
        $image2 = $model->hover_image;
        $doc = $model->DOC;

        if (isset($_POST['Products'])) {

            $this->performAjaxValidation($model);
            $model->attributes = $_POST['Products'];
            $model->description = $_POST['Products']['description'];
            $model->meta_description = $_POST['Products']['meta_description'];
//            $model->new_from = $_POST['Products']['new_from'];
//            $model->new_to = $_POST['Products']['new_to'];
//            $model->sale_from = $_POST['Products']['sale_from'];
//            $model->sale_to = $_POST['Products']['sale_to'];
//            $model->special_price_from = $_POST['Products']['special_price_from'];
//            $model->special_price_to = $_POST['Products']['special_price_to'];
//            $model->DOC = $doc;

            $image = CUploadedFile::getInstance($model, 'main_image');
            $hover_image = CUploadedFile::getInstance($model, 'hover_image');
            $images = CUploadedFile::getInstancesByName('gallery_images');
            $model->main_image = $image->extensionName;
            $model->hover_image = $hover_image->extensionName;

//            if ($model->search_tag != "") {
//                $model->search_tag = implode(",", $model->search_tag);
//            } 
            if ($model->related_products != "") {
                $model->related_products = implode(",", $model->related_products);
            } else {
                $model->related_products = "";
            }

            if ($_POST['Products']['new_from'] != "")
                $model->new_from = date("Y-m-d", strtotime($_POST['Products']['new_from']));
            else
                $model->new_from = 0;

            if ($_POST['Products']['new_to'] != "")
                $model->new_to = date("Y-m-d", strtotime($_POST['Products']['new_to']));
            else
                $model->new_to = 0;

            if ($_POST['Products']['sale_from'] != "")
                $model->sale_from = date("Y-m-d", strtotime($_POST['Products']['sale_from']));
            else
                $model->sale_from = 0;

            if ($_POST['Products']['sale_to'] != "")
                $model->sale_to = date("Y-m-d", strtotime($_POST['Products']['sale_to']));
            else
                $model->sale_to = 0;

            if ($_POST['Products']['special_price_from'] != "")
                $model->special_price_from = date("Y-m-d", strtotime($_POST['Products']['special_price_from']));
            else
                $model->special_price_from = 0;

            if ($_POST['Products']['special_price_to'] != "")
                $model->special_price_to = date("Y-m-d", strtotime($_POST['Products']['special_price_to']));
            else
                $model->special_price_to = 0;
            if ($_POST['Products']['discount_from'] != "")
                $model->discount_from = date("Y-m-d", strtotime($_POST['Products']['discount_from']));
            else
                $model->discount_from = 0;

            if ($_POST['Products']['discount_to'] != "")
                $model->discount_to = date("Y-m-d", strtotime($_POST['Products']['discount_to']));
            else
                $model->discount_to = 0;

            if ($model->canonical_name == '') {
                $model->canonical_name = preg_replace('#[ -]+#', '-', $model->product_name);
                $model->canonical_name = $model->canonical_name . '_' . $model->id;
            }


            $model->UB = 0;
//            $model->DOU = date('Y-m-d');
//            $model->DOC = date('Y-m-d');
            $model->DOU = date('Y-m-d');
            if ($image != "") {
                $id = $model->id;
                $dimension[0] = array('width' => '116', 'height' => '155', 'name' => 'small');
                $dimension[1] = array('width' => '322', 'height' => '500', 'name' => 'medium');
                $dimension[2] = array('width' => '580', 'height' => '775', 'name' => 'big');
                $dimension[3] = array('width' => '3016', 'height' => '4030', 'name' => 'zoom');
                Yii::app()->Upload->uploadImage($image, $id, true, $dimension);
            } else {
                $model->main_image = $image1;
            }

            if ($hover_image != "") {
                $id = $model->id;
                $dimensions[0] = array('width' => '322', 'height' => '500', 'name' => 'hover');
                Yii::app()->Upload->uploadHoverImage($hover_image, $id, true, $dimensions);
            } else {

                $model->hover_image = $image2;
            }

            if ($images != "") {
                $id = $model->id;
                $dimension[0] = array('width' => '116', 'height' => '155', 'name' => 'small');
                $dimension[1] = array('width' => '580', 'height' => '775', 'name' => 'big');
                $dimension[3] = array('width' => '3016', 'height' => '4030', 'name' => 'zoom');
                Yii::app()->Upload->uploadMultipleImage($images, $id, true, $dimension);
            } else {
                $model->gallery_images = $image0;
            }

            if ($model->canonical_name == '') {
                $model->canonical_name = preg_replace('#[ -]+#', '-', $model->product_name);
                $model->canonical_name = $model->canonical_name . '_' . $model->id;
            }

            if ($model->validate()) {
                if ($model->save()) {

                    $this->redirect(array('../my-products'));
                }
            }
        }
        $this->render('add_product', array(
            'model' => $model,
        ));
    }

    public function actionCloneProduct($id) {
        $model = new Products;
        $model1 = Products::model()->findByPk($id);
        $model->attributes = $model1->attributes;

        $model->DOC = date('Y-m-d H:i:s');
        $model->status = 1;
        $model->merchant_id = Yii::app()->user->getState('merchant_id');
        $model->merchant_type = Yii::app()->user->getState('merchant_type');
        $model->description = $model1->description;
        $model->meta_description = $model1->meta_description;
        $model->discount_from = $model1->discount_from;
        $model->discount_to = $model1->discount_to;
        $model->meta_description = $model1->meta_description;
        $model->new_from = $model1->new_from;
        $model->new_to = $model1->new_to;
        $model->sale_from = $model1->sale_from;
        $model->sale_to = $model1->sale_to;
        $model->special_price_from = $model1->special_price_from;
        $model->special_price = $model1->special_price;
        $model->special_price_to = $model1->special_price_to;

        if ($model->save(FALSE)) {
            $model->canonical_name = str_replace(" ", "-", $model->product_name) . '-' . $model->id;
            $folder = Yii::app()->Upload->folderName(0, 1000, $model->id) . '/';
            $src = yii::app()->basePath . '/../uploads/products/' . $folder . $id . '/';
            $dst = yii::app()->basePath . '/../uploads/products/' . $folder . $model->id . '/';
            $this->recurse_copy($src, $dst);
            $this->redirect(array('../my-products'));
        }
    }

    public function recurse_copy($src, $dst) {
        $dir = opendir($src);
        @mkdir($dst);
        while (false !== ( $file = readdir($dir))) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if (is_dir($src . '/' . $file)) {
                    $this->recurse_copy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    public function actionDeleteProduct($product) {
//        echo 'hi';exit;
        $id = $product;
        $this->loadModel($id)->delete();
        $this->redirect(array('../my-products'));
    }

    public function actionView($product) {
        $id = $product;
        $this->render('view_product', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionMyProducts() {
        $merchant_id = Yii::app()->user->getState('merchant_id');
//        $products = Products::model()->findAllByAttributes(array('merchant_id' => $merchant_id), array('order' => 'DOC DESC'));
//        $this->render('my_products', array('data' => $products));
        $criteria = new CDbCriteria();
        $criteria->select = "*";
        $criteria->condition = "merchant_id = $merchant_id";
        $criteria->order = 'id DESC';
        $data = new CActiveDataProvider('Products', array('criteria' => $criteria, 'pagination' => array('pageSize' => 10)));
        $this->render('my_products', array(
            'ModelInstance' => Products::model()->findAll($criteria),
            'dataProvider' => $data
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Products the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Products::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Products $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'products-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
