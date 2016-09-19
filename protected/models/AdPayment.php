<?php

/**
 * This is the model class for table "ad_payment".
 *
 * The followings are the available columns in table 'ad_payment':
 * @property integer $id
 * @property integer $position
 * @property string $image
 * @property integer $vendor_name
 * @property integer $sort_order
 * @property string $display_from
 * @property string $display_to
 * @property integer $payment_status
 * @property integer $cb
 * @property string $doc
 *
 * The followings are the available model relations:
 * @property Merchant $vendorName
 * @property MasterAdLocation $position0
 */
class AdPayment extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'ad_payment';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('position, vendor_name, display_from, display_to', 'required'),
                    array('image', 'file', 'allowEmpty' => FALSE, 'types' => 'jpg,jpeg,gif,png', 'on' => 'create'),
//                    array('position, vendor_name, display_from, display_to, payment_status', 'required'),
                    array('position, vendor_name, sort_order, payment_status, cb, admin_approve, status', 'numerical', 'integerOnly' => true),
                    array('title', 'length', 'max' => 200),
                    array('image', 'length', 'max' => 100),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, title, position, image, vendor_name, sort_order, display_from, display_to, payment_status, cb, ub, dou, doc, link, admin_approve, status', 'safe', 'on' => 'search'),
                );
        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                    'vendorName' => array(self::BELONGS_TO, 'Merchant', 'vendor_name'),
                    'position0' => array(self::BELONGS_TO, 'MasterAdLocation', 'position'),
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels() {
                return array(
                    'id' => 'ID',
                    'title' => 'Title',
                    'position' => 'Position',
                    'image' => 'Image',
                    'vendor_name' => 'Vendor Name',
                    'sort_order' => 'Sort Order',
                    'display_from' => 'Display From',
                    'display_to' => 'Display To',
                    'payment_status' => 'Payment Status',
                    'cb' => 'Cb',
                    'doc' => 'Doc',
                    'link' => 'Link',
                    'admin_approve' => 'Admin Approve',
                    'status' => 'Status',
                );
        }

        /**
         * Retrieves a list of models based on the current search/filter conditions.
         *
         * Typical usecase:
         * - Initialize the model fields with values from filter form.
         * - Execute this method to get CActiveDataProvider instance which will filter
         * models according to data in model fields.
         * - Pass data provider to CGridView, CListView or any similar widget.
         *
         * @return CActiveDataProvider the data provider that can return the models
         * based on the search/filter conditions.
         */
        public function search() {
                // @todo Please modify the following code to remove attributes that should not be searched.

                $criteria = new CDbCriteria;

                $criteria->compare('id', $this->id);
                $criteria->compare('title', $this->title, true);
                $criteria->compare('position', $this->position);
                $criteria->compare('image', $this->image, true);
                $criteria->compare('vendor_name', $this->vendor_name);
                $criteria->compare('sort_order', $this->sort_order);
                $criteria->compare('display_from', $this->display_from, true);
                $criteria->compare('display_to', $this->display_to, true);
                $criteria->compare('payment_status', $this->payment_status);
                $criteria->compare('cb', $this->cb);
                $criteria->compare('doc', $this->doc, true);
                $criteria->compare('link', $this->link, true);
                $criteria->compare('admin_approve', $this->admin_approve);
                $criteria->compare('status', $this->status);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        public function search_2() {
                // @todo Please modify the following code to remove attributes that should not be searched.

                $criteria = new CDbCriteria;

                $criteria->compare('id', $this->id);
                $criteria->compare('title', $this->title, true);
                $criteria->compare('position', $this->position);
                $criteria->compare('image', $this->image, true);
                $criteria->compare('vendor_name', $this->vendor_name);
                $criteria->compare('sort_order', $this->sort_order);
                $criteria->compare('display_from', $this->display_from, true);
                $criteria->compare('display_to', $this->display_to, true);
                $criteria->compare('payment_status', $this->payment_status);
                $criteria->compare('cb', $this->cb);
                $criteria->compare('doc', $this->doc, true);
                $criteria->compare('link', $this->link, true);
                $criteria->compare('admin_approve', $this->admin_approve);
                $criteria->compare('status', $this->status);
                $criteria->addCondition('display_from <= "' . date('Y-m-d') . '" ');
                $criteria->addCondition('display_to >= "' . date('Y-m-d') . '" ');


                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'sort' => array(
                        'defaultOrder' => 'id DESC',
                    ),
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return AdPayment the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
