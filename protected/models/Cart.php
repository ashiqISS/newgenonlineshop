<?php

/**
 * This is the model class for table "cart".
 *
 * The followings are the available columns in table 'cart':
 * @property integer $id
 * @property integer $user_id
 * @property string $session_id
 * @property integer $product_id
 * @property integer $quantity
 * @property integer $options
 * @property string $date
 *
 * The followings are the available model relations:
 * @property Products $product
 */
class Cart extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'cart';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    //array('user_id, product_id, quantity, options, date', 'required'),
                    array('user_id, product_id, quantity, options', 'numerical', 'integerOnly' => true),
                    array('session_id', 'length', 'max' => 225),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, user_id, session_id, product_id, quantity, options, date', 'safe', 'on' => 'search'),
                );
        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                    'product' => array(self::BELONGS_TO, 'Products', 'product_id'),
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels() {
                return array(
                    'id' => 'ID',
                    'user_id' => 'User',
                    'session_id' => 'Session',
                    'product_id' => 'Product',
                    'quantity' => 'Quantity',
                    'options' => 'Options',
                    'date' => 'Date',
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
                $criteria->compare('user_id', $this->user_id);
                $criteria->compare('session_id', $this->session_id, true);
                $criteria->compare('product_id', $this->product_id);
                $criteria->compare('quantity', $this->quantity);
                $criteria->compare('options', $this->options);
                $criteria->compare('date', $this->date, true);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return Cart the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
