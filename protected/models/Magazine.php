<?php

/**
 * This is the model class for table "{{magazine}}".
 *
 * The followings are the available columns in table '{{magazine}}':
 * @property integer $id
 * @property string $title
 * @property string $cover_image
 * @property string $description
 * @property string $issue_no
 * @property string $published_by
 * @property string $published_time
 * @property integer $created_by
 * @property string $created_time
 * @property integer $modified_by
 * @property string $modified_time
 * @property integer $status
 */
class Magazine extends CActiveRecord {

    public $file;

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Magazine the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{magazine}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title', 'required'),
            array('created_by, modified_by, status', 'numerical', 'integerOnly' => true),
            array('title, issue_no', 'length', 'max' => 255),
            array('cover_image', 'length', 'max' => 250),
            array('cover_image', 'file', 'types' => 'jpg,jpeg,gif,png', 'allowEmpty' => true, 'minSize' => 2, 'maxSize' => 1024 * 1024 * 2, 'tooLarge' => 'The file was larger than 5MB. Please upload a smaller file.', 'wrongType' => 'File format was not supported.', 'tooSmall' => 'File size was too small or empty.'),
            array('published_by', 'length', 'max' => 150),
            array('published_time', 'length', 'max' => 100),
            array('description, modified_time, cover_image', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, cover_image, description, issue_no, published_by, published_time, created_by, created_time, modified_by, modified_time, status', 'safe', 'on' => 'search'),
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
            'cover_image' => 'Cover Image',
            'description' => 'Description',
            'issue_no' => 'Issue No',
            'published_by' => 'Published By',
            'published_time' => 'Published Date',
            'created_by' => 'Created By',
            'created_time' => 'Created Date',
            'modified_by' => 'Modified By',
            'modified_time' => 'Modified Date',
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
        $criteria->compare('title', $this->title, true);
        $criteria->compare('cover_image', $this->cover_image, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('issue_no', $this->issue_no, true);
        $criteria->compare('published_by', $this->published_by, true);
        $criteria->compare('published_time', $this->published_time, true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('created_time', $this->created_time, true);
        $criteria->compare('modified_by', $this->modified_by);
        $criteria->compare('modified_time', $this->modified_time, true);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
