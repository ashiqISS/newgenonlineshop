<?php

/**
 * This is the model class for table "mater_tax_rates".
 *
 * The followings are the available columns in table 'mater_tax_rates':
 * @property integer $id
 * @property string $tax_name
 * @property double $tax_rate
 * @property integer $type
 * @property integer $zone
 * @property string $doc
 * @property string $dou
 * @property integer $cb
 * @property integer $ub
 * @property integer $status
 */
class MaterTaxRates extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'mater_tax_rates';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('tax_name, tax_rate, type', 'required'),
                    array('type, zone, cb, ub, status', 'numerical', 'integerOnly' => true),
                    array('tax_rate', 'numerical'),
                    array('tax_name', 'length', 'max' => 250),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, tax_name, tax_rate, type, zone, doc, dou, cb, ub, status', 'safe', 'on' => 'search'),
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
                    'tax_name' => 'Tax Name',
                    'tax_rate' => 'Tax Rate',
                    'type' => 'Type',
                    'zone' => 'Zone',
                    'doc' => 'Doc',
                    'dou' => 'Dou',
                    'cb' => 'Cb',
                    'ub' => 'Ub',
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
                $criteria->compare('tax_name', $this->tax_name, true);
                $criteria->compare('tax_rate', $this->tax_rate);
                $criteria->compare('type', $this->type);
                $criteria->compare('zone', $this->zone);
                $criteria->compare('doc', $this->doc, true);
                $criteria->compare('dou', $this->dou, true);
                $criteria->compare('cb', $this->cb);
                $criteria->compare('ub', $this->ub);
                $criteria->compare('status', $this->status);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return MaterTaxRates the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
