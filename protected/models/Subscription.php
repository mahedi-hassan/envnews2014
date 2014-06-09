<?php

/**
 * This is the model class for table "{{user_subscription}}".
 *
 * The followings are the available columns in table '{{user_subscription}}':
 * @property string $id
 * @property integer $user_id
 * @property integer $package_id
 * @property integer $subscription_type
 * @property string $categories
 * @property integer $status 	
 */
class Subscription extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Subscription the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{user_subscription}}';
    }

    /**
     * @return limit validation rules for model attributes.
     */
    public function limitSelection($attribute, $params) {
        $noc = Package::get_cat_no($this->package_id);
        if (count($this->$attribute) > $noc)
            $this->addError($attribute, "You are only allowed to select maximum " . $noc . " news " . $attribute);
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, package_id, subscription_type, status', 'numerical', 'integerOnly' => true),
            array('user_id', 'unique', 'message' => ("This user is already subscribes!.")),
            array('categories', 'safe'),
            array('categories', 'required', 'message' => "Select atleast one item from {attribute}", 'on'=>'update'),
            array('categories', 'limitSelection', 'on'=>'update'),
            //array('categories', 'required', 'message' => "Select atleast one item from {attribute}"),
            //array('categories', 'limitSelection'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user_id, package_id, subscription_type, categories, status', 'safe', 'on' => 'search'),
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
            'user_id' => 'User',
            'package_id' => 'Package',
            'subscription_type' => 'Subscription Type',
            'categories' => 'Categories',
            'status' => 'Status',
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
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('package_id', $this->package_id);
        $criteria->compare('subscription_type', $this->subscription_type);
        $criteria->compare('categories', $this->categories, true);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 50,
            ),
            'sort' => array('defaultOrder' => 'id DESC')
        ));
    }

    public function beforeSave() {
        if (!empty($this->categories))
            $this->categories = implode(',', $this->categories);
        return parent::beforeSave();
    }

    public function afterFind() {
        $this->categories = explode(',', $this->categories);
        return parent::afterFind();
    }

    public static function get_package() {
        $value = Subscription::model()->findByAttributes(array('user_id' => Yii::app()->user->id));
        if (!empty($value->package_id)) {
            return $value->package_id;
        } else {
            return null;
        }
    }

    public static function get_categories_news($array) {
        $val = '';
        foreach ($array as $key => $values) {
            $val .= NewsCategory::getNewsCategoryName($values) . ', ';
        }
        return $val;
    }

}
