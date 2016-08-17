<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MenuCategory
 *
 * @author admin
 */
class MenuCategory extends CApplicationComponent {

        public function MenuCategories($cats, $parent) {
                if (!empty($cats)) {
                        $find_ids = $this->ids($cats, $parent, $categ);
                } else {
                        $find_ids[0] = $parent->id;
                }

                if (!empty($categ)) {
                        $srt = $this->sorting($categ);
                }

                if (!empty($find_ids) || $find_ids != '') {
                        $find_in_set = '';
                        foreach ($find_ids as $find_id) {
                                if ($find_id != '') {
                                        $find_in_set .= "FIND_IN_SET('$find_id',`category_id`) OR ";
                                }
                        }
                }

                $find_in_set = rtrim($find_in_set, ' OR');
                if ($find_in_set != '') {
                        return $dataProvider = new CActiveDataProvider('Products', array(
                            'criteria' => array(
                                'condition' => $find_in_set,
                            ),
                            'pagination' => array(
                                'pageSize' => 6,
                            ),
                            'sort' => array(
                                //'defaultOrder' => 'price ASC',
                                'defaultOrder' => $srt,
                            )
                                )
                        );
                } else {
                        return $dataProvider = '';
                }
        }

        public function ids($cats, $parent) {
                $ids = array();
                foreach ($cats as $cat) {
                        /* 3rd level of subcategory */
                        $subcats = ProductCategory::model()->findAllByattributes(array('parent' => $parent->id));

                        if (!empty($subcats) || $subcats != '') {

                                foreach ($subcats as $subcat) {
                                        $_SESSION['category_new'][0] = '';
                                        $vals = $this->selectCategory($subcat, $parent->id);
                                        if (!empty($vals) || $vals != '') {
                                                foreach ($vals as $val) {
                                                        if (!in_array($val, $ids)) {
                                                                array_push($ids, $val);
                                                        }
                                                }
                                        }

                                        $find_ids = $ids;
                                }
                        }
                }

                $cat_details = ProductCategory::model()->findByPk($parent->id);

                $vals = $this->selectCategory($cat_details, $parent->id);

                if (!empty($vals) || $vals != '') {
                        foreach ($vals as $val) {
                                if (!in_array($val, $ids)) {
                                        array_push($ids, $val);
                                }
                        }
                }
                return $ids;
        }

        public function selectCategory($data, $id) {
                $index = count($_SESSION['category_new']);
                if ($data->id == $id) {
                        $_SESSION['category_new'][$index + 1] = $data->id;
                } else {
                        $results = ProductCategory::model()->findByPk($data->parent);
                        $_SESSION['category_new'][$index + 1] = $data->id;
                        return $this->selectCategory($results, $id);
                }
                $return = array();
                $category_arr = array_reverse($_SESSION['category_new']);
                foreach ($category_arr as $cat) {
                        array_push($return, $cat);
                }
                return $return;
        }

        public function findParent($parent) {
                $master = ProductCategory::model()->findByPk($parent);
                if ($master != '') {
                        if ($master->id == $master->parent) {
                                return $master->id;
                        } else {
                                return $this->findParent($master->parent);
                        }
                } else {
                        return $parent;
                }
        }

}
