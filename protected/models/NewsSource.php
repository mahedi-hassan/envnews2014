<?php

/**
 * This is the model class for table "{{news_source}}".
 *
 * The followings are the available columns in table '{{news_source}}':
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property string $description
 * @property integer $published
 */
class NewsSource extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return NewsSource the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{news_source}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title', 'required'),
            array('published, lang', 'numerical', 'integerOnly' => true),
            array('title, alias', 'length', 'max' => 255),
            array('description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, alias, description, published, lang', 'safe', 'on' => 'search'),
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
            'title' => 'Title',
            'alias' => 'Alias',
            'description' => 'Description',
            'published' => 'Published',
            'lang' => 'Language',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('alias', $this->alias, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('published', $this->published);
        $criteria->compare('lang', $this->lang);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 20,
            ),
        ));
    }

    /**
     * Retrieves User name by ID.
     * @return string.
     */
    public function getUserName($id) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('name')
                ->from('{{user_admin}}')
                ->where('id=:id', array(':id' => $id))
                ->queryScalar();

        return $returnValue;
    }

    //get news source alias
    public static function get_news_source($id) {
        $source = NewsSource::model()->findByAttributes(array('id' => $id));
        if (!empty($source->alias)) {
            return $source->alias;
        } else {
            return $source->id;
        }
    }

    //get news source title
    public static function get_source_title($id) {
        $source = NewsSource::model()->findByAttributes(array('id' => $id));
        if (!empty($source->title)) {
            return $source->title;
        } else {
            return NULL;
        }
    }

}