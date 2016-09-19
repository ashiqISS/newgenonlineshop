<?php

/**
 * This is the model class for table "master_ad_location".
 *
 * The followings are the available columns in table 'master_ad_location':
 * @property integer $id
 * @property string $ad_location
 * @property string $size
 * @property string $status
 * @property integer $cb
 * @property string $doc
 */
class MasterAdLocation extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'master_ad_location';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('ad_location, size', 'required'),
                    array('cb', 'numerical', 'integerOnly' => true),
                    array('ad_location, size', 'length', 'max' => 250),
                    array('status', 'length', 'max' => 20),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, ad_location, size, status, cb, doc', 'safe', 'on' => 'search'),
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
                    'ad_location' => 'Ad Location',
                    'size' => 'Size',
                    'status' => 'Price',
                    'cb' => 'Cb',
                    'doc' => 'Doc',
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
                $criteria->compare('ad_location', $this->ad_location, true);
                $criteria->compare('size', $this->size, true);
                $criteria->compare('status', $this->status, true);
                $criteria->compare('cb', $this->cb);
                $criteria->compare('doc', $this->doc, true);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return MasterAdLocation the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
