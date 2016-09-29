<?php

/**
 * This is the model class for table "product_viewed".
 *
 * The followings are the available columns in table 'product_viewed':
 * @property integer $id
 * @property integer $product_id
 * @property string $session_id
 * @property integer $user_id
 * @property string $date
 * @property integer $feild
 */
class ProductViewed extends CActiveRecord {

        public $product_name;
        public $product_code;

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'product_viewed';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('product_id, session_id, user_id, date, feild', 'required'),
                    array('product_id, user_id, feild', 'numerical', 'integerOnly' => true),
                    array('session_id', 'length', 'max' => 250),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, product_id, session_id, user_id, date, feild', 'safe', 'on' => 'search'),
                );
        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels() {
                return array(
                    'id' => 'ID',
                    'product_id' => 'Product',
                    'session_id' => 'Session',
                    'user_id' => 'User',
                    'date' => 'Date',
                    'feild' => 'Feild',
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
                $criteria->compare('product_id', $this->product_id);
                $criteria->compare('session_id', $this->session_id, true);
                $criteria->compare('user_id', $this->user_id);
                $criteria->compare('date', $this->date, true);
                $criteria->compare('feild', $this->feild);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        public function merchantSearch() {
                $criteria = new CDbCriteria(array(
                    'select' => 't.product_id,p.product_name,p.product_code',
                    'join' => 'LEFT JOIN products p ON (t.product_id = p.id AND p.merchant_id = :merchant_id)',
                    'group' => 'p.id',
                    'params' => array(':merchant_id' => Yii::app()->user->getState('merchant_id'))
                ));

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return ProductViewed the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
