<?php

/**
 * This is the model class for table "static_page".
 *
 * The followings are the available columns in table 'static_page':
 * @property integer $id
 * @property string $category_name
 * @property integer $parent
 * @property integer $side_menu
 * @property integer $header_visibility
 * @property integer $sort_order
 * @property integer $has_page
 * @property string $canonical_name
 * @property string $link
 * @property string $title
 * @property string $heading
 * @property string $small_content
 * @property string $big_content
 * @property string $small_image
 * @property string $banner
 * @property string $big_image
 * @property integer $status
 * @property integer $field_1
 * @property string $field_2
 * @property string $field_3
 * @property integer $cb
 * @property integer $ub
 * @property string $doc
 * @property string $dou
 */
class StaticPage extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'static_page';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('category_name, header_visibility, has_page', 'required'),
                    array('parent, side_menu, header_visibility, sort_order, has_page, status, field_1, cb, ub', 'numerical', 'integerOnly' => true),
                    array('category_name, canonical_name, title, small_image, banner, big_image', 'length', 'max' => 200),
                    array('link', 'length', 'max' => 500),
                    array('heading, field_2, field_3', 'length', 'max' => 300),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, category_name, parent, side_menu, header_visibility, sort_order, has_page, canonical_name, link, title, heading, small_content, big_content, small_image, banner, big_image, status, field_1, field_2, field_3, cb, ub, doc, dou', 'safe', 'on' => 'search'),
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
                    'category_name' => 'Category Name',
                    'parent' => 'Parent',
                    'side_menu' => 'Side Menu',
                    'header_visibility' => 'Header Visibility',
                    'sort_order' => 'Sort Order',
                    'has_page' => 'Has Page',
                    'canonical_name' => 'Canonical Name',
                    'link' => 'Link',
                    'title' => 'Title',
                    'heading' => 'Heading',
                    'small_content' => 'Small Content',
                    'big_content' => 'Big Content',
                    'small_image' => 'Small Image',
                    'banner' => 'Banner',
                    'big_image' => 'Big Image',
                    'status' => 'Status',
                    'field_1' => 'Field 1',
                    'field_2' => 'Field 2',
                    'field_3' => 'Field 3',
                    'cb' => 'Cb',
                    'ub' => 'Ub',
                    'doc' => 'Doc',
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
                $criteria->compare('category_name', $this->category_name, true);
                $criteria->compare('parent', $this->parent);
                $criteria->compare('side_menu', $this->side_menu);
                $criteria->compare('header_visibility', $this->header_visibility);
                $criteria->compare('sort_order', $this->sort_order);
                $criteria->compare('has_page', $this->has_page);
                $criteria->compare('canonical_name', $this->canonical_name, true);
                $criteria->compare('link', $this->link, true);
                $criteria->compare('title', $this->title, true);
                $criteria->compare('heading', $this->heading, true);
                $criteria->compare('small_content', $this->small_content, true);
                $criteria->compare('big_content', $this->big_content, true);
                $criteria->compare('small_image', $this->small_image, true);
                $criteria->compare('banner', $this->banner, true);
                $criteria->compare('big_image', $this->big_image, true);
                $criteria->compare('status', $this->status);
                $criteria->compare('field_1', $this->field_1);
                $criteria->compare('field_2', $this->field_2, true);
                $criteria->compare('field_3', $this->field_3, true);
                $criteria->compare('cb', $this->cb);
                $criteria->compare('ub', $this->ub);
                $criteria->compare('doc', $this->doc, true);
                $criteria->compare('dou', $this->dou, true);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return StaticPage the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
