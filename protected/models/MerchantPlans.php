<?php

/**
 * This is the model class for table "merchant_plans".
 *
 * The followings are the available columns in table 'merchant_plans':
 * @property integer $id
 * @property integer $plan_id
 * @property string $user_id
 * @property string $plan_name
 * @property string $amount
 * @property string $date_of_creation
 * @property string $no_of_product
 * @property string $no_of_product_left
 * @property string $no_of_ads
 * @property string $no_of_ads_left
 * @property string $no_of_days
 * @property string $no_of_days_left
 * @property integer $status
 * @property integer $cb
 * @property string $doc
 * @property integer $ub
 * @property string $dou
 */
class MerchantPlans extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'merchant_plans';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('plan_id, user_id, plan_name, amount', 'required'),
                    array('plan_id, status, cb, ub', 'numerical', 'integerOnly' => true),
                    array('user_id, amount, no_of_product, no_of_product_left, no_of_ads, no_of_ads_left, no_of_days, no_of_days_left', 'length', 'max' => 200),
                    array('plan_name', 'length', 'max' => 250),
                    array('dou', 'safe'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, plan_id, user_id, plan_name, amount, no_of_product, no_of_product_left, no_of_ads, no_of_ads_left, no_of_days, no_of_days_left, status, cb, doc, ub, dou', 'safe', 'on' => 'search'),
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
                    'plan_id' => 'Plan',
                    'user_id' => 'User',
                    'plan_name' => 'Plan Name',
                    'amount' => 'Amount',
                    'no_of_product' => 'No Of Product',
                    'no_of_product_left' => 'No Of Product Left',
                    'no_of_ads' => 'No Of Ads',
                    'no_of_ads_left' => 'No Of Ads Left',
                    'no_of_days' => 'No Of Days',
                    'no_of_days_left' => 'No Of Days Left',
                    'status' => 'Status',
                    'cb' => 'Cb',
                    'doc' => 'Doc',
                    'ub' => 'Ub',
                    'dou' => 'Dou',
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
                $criteria->compare('plan_id', $this->plan_id);
                $criteria->compare('user_id', $this->user_id, true);
                $criteria->compare('plan_name', $this->plan_name, true);
                $criteria->compare('amount', $this->amount, true);
                $criteria->compare('no_of_product', $this->no_of_product, true);
                $criteria->compare('no_of_product_left', $this->no_of_product_left, true);
                $criteria->compare('no_of_ads', $this->no_of_ads, true);
                $criteria->compare('no_of_ads_left', $this->no_of_ads_left, true);
                $criteria->compare('no_of_days', $this->no_of_days, true);
                $criteria->compare('no_of_days_left', $this->no_of_days_left, true);
                $criteria->compare('status', $this->status);
                $criteria->compare('cb', $this->cb);
                $criteria->compare('doc', $this->doc, true);
                $criteria->compare('ub', $this->ub);
                $criteria->compare('dou', $this->dou, true);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return MerchantPlans the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
