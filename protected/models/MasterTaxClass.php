<?php

/**
 * This is the model class for table "master_tax_class".
 *
 * The followings are the available columns in table 'master_tax_class':
 * @property integer $id
 * @property string $tax_class_name
 * @property integer $tax_rate
 * @property string $doc
 * @property string $dou
 * @property integer $cb
 * @property integer $ub
 * @property integer $status
 */
class MasterTaxClass extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'master_tax_class';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('tax_class_name, tax_rate,status', 'required'),
                    array('cb, ub, status', 'numerical', 'integerOnly' => true),
                    array('tax_class_name', 'length', 'max' => 250),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, tax_class_name, tax_rate, doc, dou, cb, ub, status', 'safe', 'on' => 'search'),
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
                    'tax_class_name' => 'Tax Class Name',
                    'tax_rate' => 'Tax Rate',
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
                $criteria->compare('tax_class_name', $this->tax_class_name, true);
                $criteria->compare('tax_rate', $this->tax_rate);
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
         * @return MasterTaxClass the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
