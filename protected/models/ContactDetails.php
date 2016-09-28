<?php

/**
 * This is the model class for table "contact_details".
 *
 * The followings are the available columns in table 'contact_details':
 * @property integer $id
 * @property string $company_name
 * @property string $telephone
 * @property string $mobile1
 * @property string $mobile2
 * @property string $fax
 * @property string $email1
 * @property string $email2
 * @property string $map_link
 * @property string $doc
 * @property string $dou
 * @property integer $status
 */
class ContactDetails extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'contact_details';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('company_name, telephone, fax, email1, map_link', 'required'),
                    array('status', 'numerical', 'integerOnly' => true),
                    array('company_name, fax, email1, email2', 'length', 'max' => 200),
                    array('telephone', 'length', 'max' => 20),
                    array('mobile1, mobile2', 'length', 'max' => 15),
                    array('map_link', 'length', 'max' => 300),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, company_name, telephone, mobile1, mobile2, fax, email1, email2, map_link, doc, dou, status', 'safe', 'on' => 'search'),
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
                    'company_name' => 'Company Name',
                    'telephone' => 'Telephone',
                    'mobile1' => 'Mobile1',
                    'mobile2' => 'Mobile2',
                    'fax' => 'Fax',
                    'email1' => 'Email1',
                    'email2' => 'Email2',
                    'map_link' => 'Map Link',
                    'doc' => 'Doc',
                    'dou' => 'Dou',
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
                $criteria->compare('company_name', $this->company_name, true);
                $criteria->compare('telephone', $this->telephone, true);
                $criteria->compare('mobile1', $this->mobile1, true);
                $criteria->compare('mobile2', $this->mobile2, true);
                $criteria->compare('fax', $this->fax, true);
                $criteria->compare('email1', $this->email1, true);
                $criteria->compare('email2', $this->email2, true);
                $criteria->compare('map_link', $this->map_link, true);
                $criteria->compare('doc', $this->doc, true);
                $criteria->compare('dou', $this->dou, true);
                $criteria->compare('status', $this->status);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return ContactDetails the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
