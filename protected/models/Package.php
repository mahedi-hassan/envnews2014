<?php

/**
 * This is the model class for table "{{package}}".
 *
 * The followings are the available columns in table '{{package}}':
 * @property string $id
 * @property integer $group_id
 * @property string $package_name
 * @property double $regular_price
 * @property double $discount
 * @property double $tax
 * @property integer $no_of_category
 * @property integer $status
 */
class Package extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Package the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{package}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('group_id, status, no_of_category', 'numerical', 'integerOnly' => true),
            array('regular_price, discount, tax', 'numerical'),
            array('package_name', 'length', 'max' => 250),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, group_id, package_name, regular_price, discount, tax, no_of_category, status', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'PackageGroup' => array(self::BELONGS_TO, 'PackageGroup', 'group_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'group_id' => 'Group',
            'package_name' => 'Package Name',
            'regular_price' => 'Regular Price',
            'discount' => 'Discount',
            'tax' => 'Tax',
            'status' => 'Status',
            'no_of_category' => 'No of Category',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('group_id', $this->group_id);
        $criteria->compare('package_name', $this->package_name, true);
        $criteria->compare('regular_price', $this->regular_price);
        $criteria->compare('discount', $this->discount);
        $criteria->compare('tax', $this->tax);
        $criteria->compare('no_of_category', $this->no_of_category);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array('defaultOrder' =>array('id' => CSort::SORT_ASC,))
        ));
    }

    public static function get_no_of_cat() {
        //get package id
        $package = Subscription::get_package();
        //get no of category 
        if (!empty($package)) {
            $value = Package::model()->findByAttributes(array('id' => $package));
            if (!empty($value->no_of_category)) {
                return $value->no_of_category;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }
    
    public static function get_cat_no($id) {
        //get no of category 
            $value = Package::model()->findByAttributes(array('id' => $id));
            if (!empty($value->no_of_category)) {
                return $value->no_of_category;
            } else {
                return 0;
            }        
    }
    
    public static function getPackageGroupName($id) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('title')
                ->from('{{package_group}}')
                ->where('id=:id', array(':id' => $id))
                ->queryScalar();        
        return $returnValue;
    }
    public static function getPackageName($id) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('package_name')
                ->from('{{package}}')
                ->where('id=:id', array(':id' => $id))
                ->queryScalar();        
        return $returnValue;
    }
    public function getPackages() {
        return $this->package_name . " - " . Package::getPackageGroupName($this->group_id);
    }

}
