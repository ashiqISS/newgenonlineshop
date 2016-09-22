<?php

/**
 * This is the model class for table "merchant_message".
 *
 * The followings are the available columns in table 'merchant_message':
 * @property integer $id
 * @property string $message
 * @property integer $merchant_id
 * @property integer $from_to
 * @property integer $viewed
 * @property string $doc
 * @property integer $status
 */
class MerchantMessage extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'merchant_message';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('message, merchant_id', 'required'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, message, merchant_id, from_to, viewed, doc, status', 'safe', 'on' => 'search'),
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
                    'message' => 'Message',
                    'merchant_id' => 'Merchant',
                    'from_to' => 'From To',
                    'viewed' => 'Viewed',
                    'doc' => 'Doc',
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
                $criteria->compare('message', $this->message, true);
                $criteria->compare('merchant_id', $this->merchant_id);
                $criteria->compare('from_to', $this->from_to);
                $criteria->compare('viewed', $this->viewed);
                $criteria->compare('doc', $this->doc, true);
                $criteria->compare('status', $this->status);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return MerchantMessage the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
