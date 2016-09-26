<?php

/**
 * This is the model class for table "merchant_plans_history".
 *
 * The followings are the available columns in table 'merchant_plans_history':
 * @property integer $id
 * @property integer $plan_id
 * @property string $user_id
 * @property string $plan_name
 * @property string $amount
 * @property integer $featured
 * @property string $no_of_product
 * @property string $no_of_ads
 * @property string $no_of_days
 * @property integer $status
 * @property integer $cb
 * @property string $doc
 * @property integer $ub
 * @property string $dou
 */
class MerchantPlansHistory extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'merchant_plans_history';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
//			array('id, plan_id, user_id, plan_name, amount, featured, no_of_product, no_of_ads, no_of_days, status, cb, doc, ub', 'required'),
                    array('id, plan_id, featured, status, cb, ub', 'numerical', 'integerOnly' => true),
                    array('user_id, amount, no_of_product, no_of_ads, no_of_days', 'length', 'max' => 200),
                    array('plan_name', 'length', 'max' => 250),
                    array('dou', 'safe'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, plan_id, user_id, plan_name, amount, featured, no_of_product, no_of_ads, no_of_days, status, cb, doc, ub, dou', 'safe', 'on' => 'search'),
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
                    'featured' => 'Featured',
                    'no_of_product' => 'No Of Product',
                    'no_of_ads' => 'No Of Ads',
                    'no_of_days' => 'No Of Days',
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
                $criteria->compare('featured', $this->featured);
                $criteria->compare('no_of_product', $this->no_of_product, true);
                $criteria->compare('no_of_ads', $this->no_of_ads, true);
                $criteria->compare('no_of_days', $this->no_of_days, true);
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
         * @return MerchantPlansHistory the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
